<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        
        'user_id', 'avatar', 'description', 
        'phone', 'adress', 'about',
        'facebook', 'twitter', 'instagram', 'youtube',
        'pinterest', 'website', 'github', 'linkedin',
    ];

    protected $appends = ['profilecover_path', 'avatar_path'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAvatarPathAttribute()
    {
        return asset('uploads/images/user_images/avatar/' . $this->avatar);

    }
    public function getProfileCoverPathAttribute()
    {
        return asset('uploads/images/user_images/profile_imgs/' . $this->profilecover);

    }
}
