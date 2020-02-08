<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* 
     * User Event Boot
     * Function Whene Register New User 
     * Make A Profile
     * User Add Role User
     */
    protected static function boot() {
        parent::boot();

        static::created( function ($user) {
            $user->profile()->create([
                'user_id' => $user->id,
            ]);

            $user->attachRole('user');
        });
    }

    public function role() {
        return $this->hasOne(Role::class, 'id');
    }

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }
}
