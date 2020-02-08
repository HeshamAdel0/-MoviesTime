<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = \App\Profile::create([
         	"user_id"      => 1,
            "nickname"     => "Owner Project",
            "description"  => "CEO Project",
            "about"        => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna",
            "phone"        => "0123456789",
            "adress"       => "Egypt,Alex",
            "facebook"     => "Hesham.H.Adel",
            "twitter"      => "H_Adel5",
            "instagram"    => "h_adel0",
            "youtube"      => "UCPzB16fs2IIFH_oVDT3F5kw",
            "pinterest"    => "heshamadel2",
            "website"      => "https://www.facebook.com/Hesham.H.Adel",
            "github"       => "HeshamAdel007",
            "linkedin"     => "heshamadel000",
        ]);
    }
}
