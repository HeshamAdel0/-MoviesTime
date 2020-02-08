<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Comment;

class FrontEndController extends Controller
{
    /**
        *** Show Posts In Home Page
    **/

    public function index()
    { 

        // Show 6 Post In Header Sections
        $feature_post = Post::with('category')->where('status', '=', 0)
            ->orderBy('created_at', 'desc')->take(6)->get();

        // Show 6 Post In Last Aricles Sections
        $latest_articles = Post::where('status', '=', 0)
            ->orderBy('created_at', 'desc')->take(6)->get();

        return view('front-end.index', compact('feature_post', 'latest_articles'));

    }

    /**
        *** Show Post Content In Single Page
    **/

    public function singlePage($id, $slug)
    {
    	// Get Post ID & Slig Name & Make Url To Post Details
        $posts = Post::with('category')->where('id','slug' , [$id, $slug])->first();

        // Get The Post Title & Category Name & Show All In Breadcrumb
        $breadcrumb = Post::with('category')->where('id' , $id)->get();

        // Show Post Details
        $singelpost = Post::with('category')->where('status', '=', 0)->where('id' , $id)->get();

        // Get Count Comment & Replies In Post Where commentable_id = Post ID 
        //$comment = Comment::with('replies')->where('commentable_id', '=', $id)->get();

        // Start View Count
        $post = Post::where('id' , $id)->first(); // Get Post ID
        $postKey = 'post_' . $post->id; // Make A Key

        // Cheack If Post Has A Key Or No
        if (!Session::has($postKey)) {
            $post->increment('view_count');
            Session::put($postKey, 1);
        } else {
        	//Every Time Watch Post Add Views +1
            $post->increment('view_count');
            Session::put($postKey, 1);
        }

        return view('front-end.singlepage', compact('posts', 'breadcrumb', 'singelpost'));   
    }

    /**
        *** Get Search Results
    **/

    public function search(Request $request)
    { 
        $posts = Post::with('category', 'user', 'tag')->when($request->search, function ($query) use ($request){

            return $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('slug', 'like', '%' . $request->search . '%');
        })->latest()->paginate(10);

        return view('front-end.search', compact('posts'));

    }


}
