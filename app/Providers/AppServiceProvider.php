<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\User;
use App\Post;
use App\Category;
use App\Tag;
use App\Setting;
use App\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();

        /**
         *** Front End View Files
        */
        
        // Make Users Through In Page [PostCreate]
        View::composer(['post.create'], function ($view) {
            $view->with('user', User::all());
        });

        // Make Categories Through In Page [Post => Create, Edit]
        View::composer(['post.create', 'post.edit'], function ($view) {
            $view->with('categories', Category::all());
        });

        // Make Tags Through In Pages
        // Use In Fornt-End Index & Single Page
        View::composer(['tag.index', 'post.create', 'post.edit', 'front-end.index', 'front-end.singlepage', 'front-end.search'], function ($view) {
            $view->with('tags', Tag::all());
        });

        // Make Setting Through In All Views
        View::composer('*', function ($view) {
            $view->with('settings', Setting::all());
        });

        
        /**
         *** Front End View Files
        */

        View::composer(['front-end.index', 'front-end.singlepage', 'front-end.search'], function ($view) {
            // Will Show 6 Post In Every Sub-Category In Meag Menu & Ststus Is Puplished
            $view->with('latest_posts', Post::with('category')
                ->where('status', '=', 0)
                ->orderBy('created_at', 'desc')->take(4)->get());
        });


        View::composer(['front-end.index', 'front-end.singlepage', 'front-end.search'], function ($view) {
            // Will Show 8 Parent Category & Dhow All Child With Meag Menu
            $view->with('categories', Category::where('parent_id',NULL)->take(8)->get());
        });
        

        View::composer(['front-end.index','front-end.search'], function ($view) {
            // Show 10 Post In Headline Trending Sections
            $view->with('trending', Post::where('status', '=', 0)->orderBy('view_count','desc')->take(10)->get());
        });
        

        View::composer(['front-end.singlepage','front-end.search'], function ($view) {

            // Show 6 Category Name In SideBar Ordering BY Post Count In Category
            $view->with('allcategories', Category::with('posts')->withCount('posts')->orderBy('posts_count','desc')->take(6)->get());

            // Show 4 Post In SideBar Ordering BY Views
            $view->with('popularpost', Post::with('category')->where('status', '=', 0)->orderBy('view_count','desc')->take(4)->get());

            // Get PopularPost With Count Comment In Post Where commentable_id = Post->ID 
            $view->with('post_comment', Post::withCount('comments')->orderBy('comments_count','desc')->get());

            //Get Comment & Replies
            $view->with('comment', Comment::with('replies')->get());

        });
        
        
    }
}
