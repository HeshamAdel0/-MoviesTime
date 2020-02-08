<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = \App\Tag::create([

        	"name"     => "MoviesTime",
        ]);
    }
}
