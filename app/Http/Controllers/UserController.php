<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\User;
use App\Role;
use App\Permission;
use App\Profile;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('update', 'edit', 'status');
        $this->middleware(['permission:delete_users'])->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$users = User::with('role')->first()->paginate(1);
        
        // Serach Functions
        $users = User::with('role')->when($request->search, function ($query) use ($request){

            return $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
        })->latest()->paginate(10);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all()->except(1); // Show All Roles Except Owner
        return view('user.create', compact('permissions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            "name"        => "required|string|max:255",
            "email"       => "required|max:255",
            'password'    => "required|confirmed",
            'role'        => "required|array",
            
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'status', 'role','permissions']);
        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);
        //Whene Create New Admin Make Profile Dynamic For This User
        $profile = Profile::create([ 
            'user_id' => $user->id,
        ]);

        $user->syncRoles($request->role);
        //$user->syncPermissions($request->permissions);

        Session::flash('success', 'You Successfully To Add A New Admin!');
        return redirect()->Route('admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        $roles = Role::all()->except(1); // Show All Roles Except Owner
        return view('user.edit', compact('user', 'permissions', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request,[
            "name"        => "required|string|max:255",
            "email"       => "required|max:255",
            'role'        => "required|array",
            'permissions' => "required|array",
        ]);

        $user = User::find($id);

        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->save();
        $user->syncRoles($request->role);
        $user->syncPermissions($request->permissions);
        Session::flash('success', 'You Successfully Update Admin!');
        return redirect()->Route('admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user_name = $user->name;
        $user->profile()->delete(); // Delete Profile Whene Delete User
        $user->posts()->delete(); // Delete All Post Whene Delete This User
        $user->delete();
        Session::flash('success', 'You Successfully To Deleted Admin ' . $user_name);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $user = User::find($id);
        // Cheak User Status Is Active OR No
        if ($user->status == 1) {
            // Make User Ststus Activated
            echo $status = 0;
            echo $session_msg = " Activated";
        } elseif ($user->status == 0) {
            // Make User Ststus Un-Activated
            echo $status = 1;
            echo $session_msg = " Un-Activated";
        }
        DB::update('update users set status = ?  where id = ?', [$status , $user->id]);
        Session::flash('success', 'Admin Is ' . $session_msg . ' Now!');
        return redirect()->back();
    }

}
