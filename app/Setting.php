<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        
        'website_name', 'website_email', 'website_description', 
        'website_adress', 'website_logo', 'website_facebook', 
        'website_twitter', 'website_instagram','website_youtube',
        'website_pinterest', 'website_github', 'website_linkedin',
    ];

    protected $appends = ['logo_path'];

     public function getLogoPathAttribute()
    {
        return asset('uploads/images/logo/' . $this->website_logo);

    }
}
