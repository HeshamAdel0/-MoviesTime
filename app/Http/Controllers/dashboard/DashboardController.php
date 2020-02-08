<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Tag;

class DashboardController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
    	$post = Post::count();
    	$category = Category::count();
    	$tag = Tag::count();
        return view('dashboard.index', compact('user', 'post', 'category', 'tag'));
    }
}
