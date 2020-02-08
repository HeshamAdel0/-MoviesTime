<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            LaratrustSeeder::class,
            SettingTableSeeder::class,
            UsersTableSeeder::class,
            ProfileTableSeeder::class,
            CategoryTableSeeder::class,
            PostTableSeeder::class,
            TagTableSeeder::class,
        ]);
    }
}
