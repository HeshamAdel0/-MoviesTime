<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Tag;


class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_tags'])->only('index');
        $this->middleware(['permission:create_tags'])->only('create');
        $this->middleware(['permission:update_tags'])->only('edit');
        $this->middleware(['permission:delete_tags'])->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'   => 'required|max:255',
        ]);

        $tag = new Tag;
        $tag->name  = $request->name;
        $tag->save();
        Session::flash('success', 'You Successfully Add New Tag!');
        return redirect()->back();
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
        $tags = Tag::find($id);
        return view('tag.edit', compact('tags'));
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
        $this->validate($request,[
            'name'   => 'required|max:255',
        ]);

        $tags = Tag::find($id);
        $tags->name  = $request->name;
        $tags->save();
        Session::flash('success', 'You Successfully Add Edit Tag');
        return redirect()->Route('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = Tag::find($id);
        $tags->delete();
        Session::flash('success', 'You Successfully Delete Tag!');
        return redirect()->Route('tags');
    }
}
