<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        
        'title', 'slug', 'content', 'excerpt', 
        'status', 'photo', 'category_id','user_id',
    ];

    protected $appends = ['photo_path'];

    //protected $dates = ['deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function getPhotoPathAttribute()
    {
        return asset('uploads/images/post_images/' . $this->photo);

    }//end of get photo path

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

	public function category()
    {
      return $this->belongsToMany(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        //return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id')->orderBy('created_at', 'desc');
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at', 'desc');
    }
    
    
}
