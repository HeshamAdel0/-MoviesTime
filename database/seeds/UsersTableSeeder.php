<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([

        	"name"     => "owner",
        	"email"    => "owner@app.com",
        	"password" => bcrypt('12345678'),
            "status"   => 0,

        ]);

        $user->attachRole('owner');
    }
}
