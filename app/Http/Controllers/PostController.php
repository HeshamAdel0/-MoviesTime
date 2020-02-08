<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use App\Post;
use App\Category;
use App\User;
use App\Tag;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_post'])->only('index');
        $this->middleware(['permission:create_post'])->only('create');
        $this->middleware(['permission:update_post'])->only('update', 'edit', 'status');
        $this->middleware(['permission:delete_post'])->only('destroy', 'trash','harddelete', 'restore');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$posts = Post::with('category', 'user')->paginate(1);
        
        // Serach Functions
        $posts = Post::with('category', 'user')->when($request->search, function ($query) use ($request){

            return $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('slug', 'like', '%' . $request->search . '%');
        })->latest()->paginate(10);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('post.create');
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
            "title"          => "required|string|max:255",
            "content"        => "required|string",
            "excerpt"        => "required|string|max:255",
            "tags"           => "required|array",
            "categories"     => "required|array",
            
        ]);

        $request_data              = $request->except(['photo', 'slug', 'user_id']);
        $request_data['slug']      = Str::slug($request->title);
        $request_data['user_id']   = Auth::id();

        if ($request->photo) {

            Image::make($request->photo)
                ->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/images/post_images/' . $request->photo->hashName()));

                $request_data['photo'] = $request->photo->hashName();

        }//end of if

        $post = Post::create($request_data);
        
        // Add Multi Category & Tags
        $post->category()->sync($request->categories);
        $post->tag()->sync($request->tags);

        Session::flash('success', 'You Successfully Add New Post!');
        return redirect()->Route('posts');
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
        $post = Post::find($id);
        return view('post.edit', compact('post'));
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
            "title"          => "required|string|max:255",
            "content"        => "required|string",
            "excerpt"        => "required|string|max:255",
            "tags"           => "required|array",
            "categories"     => "required|array",
        ]);

    
        $posts = Post::find($id);

        if ($request->photo) {
            if ($posts->photo != 'post_imag_default.jpg') {
                //Check if have a default image dont remove the image
                //if not have a default image 
                    //1:remove old image
                    //2: add a new image
                Storage::disk('public_uploads')->delete('/images/post_images/' . $posts->photo);
                
            }
            Image::make($request->photo)
                ->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/images/post_images/' . $request->photo->hashName()));

            $posts->photo = $request->photo->hashName();

        }

        $posts->title           = $request->title;
        $posts->content         = $request->content;
        $posts->excerpt         = $request->excerpt;
        $posts->slug            = Str::slug($request->title);
        $posts->save();

        // Edit Multi Category & Tags
        $posts->category()->sync($request->categories);
        $posts->tag()->sync($request->tags);

        $post_name = $posts->title;
        Session::flash('success', 'You Successfully Update Post ' . ( $post_name ));
        return redirect()->Route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // used soft delete
        $post = Post::find($id);
        $post->delete();
        $post_name = $post->title;
        Session::flash('success', 'You Successfully Trashed Post ' . ( $post_name ));
        return redirect()->back();
    }

    /**
     * Show All Posts In Trash.
    */
    public function trash()
    {
        // function move post soft delete to trashed
        $posts = Post::onlyTrashed()->get();
        return view('post.trash',compact('posts'));
    }

    /**
     * Return Post From Trash To Posts.
    */
    public function restore($id)
    {
        // function back any post in trash to posts
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        $post_name = $post->title;
        Session::flash('success', 'You Successfully Restore The Post ' . ( $post_name ));
        return redirect()->Route('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function harddelete($id)
    {
        // function hared delete (normal delete)
        $post = Post::withTrashed()->where('id', $id)->first();
        if ($post->photo != 'post_imag_default.jpg') {
                //Check if have a default image dont remove the image
                //if not have a default image 
                    //1:remove old image
                    //2: add a new image
            Storage::disk('public_uploads')->delete('/images/post_images/' . $post->photo);       
        }
        $post->forceDelete();
        $post_name = $post->title;
        Session::flash('success', 'You Successfully Deleted Post ' . ( $post_name ));
        return redirect()->back();
    }


    /**
     * Change Post Status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $post = Post::find($id);
        // Cheak Post Status Is Puplished OR No
        if ($post->status == 1) {
            // Make Post Ststus Puplished
            echo $status = 0;
            echo $session_msg = " Puplished";
        } elseif ($post->status == 0) {
            // Make Post Status UnPuplished
            echo $status = 1;
            echo $session_msg = " UnPuplished";
        }
        DB::update('update posts set status = ?  where id = ?', [$status , $post->id]);
        Session::flash('success', 'The Post Is ' . $session_msg . ' Now!');
        return redirect()->back();
    }
}
