<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = \App\Post::create([
         	"user_id"      => 1,
            "title"        => "Movies Time",
            "slug"         => "movies-time",
            "status"       => 0,
            "content"      => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna",
            "excerpt"      =>"Lorem ipsum dolor sit amet",
        ]);
    }
}
