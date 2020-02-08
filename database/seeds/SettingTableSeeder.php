<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = \App\Setting::create([
            "website_name"  	  => "Movies Time",
            "website_email"       => "moviestime@info.com",
            "website_adress"      => "Egypt,Alex",
            "website_description" => "writing Something Smart",
            "website_facebook"    => "Hesham.H.Adel",
            "website_twitter"     => "H_Adel5",
            "website_instagram"   => "h_adel0",
            "website_youtube"     => "UCPzB16fs2IIFH_oVDT3F5kw",
            "website_pinterest"   => "heshamadel2",
            "website_github"      => "HeshamAdel007",
            "website_linkedin"    => "heshamadel000",
        ]);
    }
}
