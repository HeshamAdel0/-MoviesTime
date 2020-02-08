<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
   
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"         => "required|string|max:255",
            "email"        => "required|max:255",
            "comment_body" => "required|string",
            
        ]);

        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->body = $request->comment_body;
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $this->validate($request,[
            "name"         => "required|string|max:255",
            "email"        => "required|max:255",
            "comment_body" => "required|string",
            
        ]);
        
        $reply = new Comment();
        $reply->name = $request->name;
        $reply->email = $request->email;
        $reply->body = $request->comment_body;
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }

}
