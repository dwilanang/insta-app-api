<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Like;

class Post extends Model
{
    protected $fillable = ['user_id', 'caption', 'image'];
    protected $appends = ['likes_count', 'image_url', 'profile_image_url', 'is_liked'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return "https://ui-avatars.com/api/?name={$this->user->name}&background=random";
        }

        return asset('storage/' . $this->image);
    }

    public function getProfileImageUrlAttribute()
    {
        if (!$this->user->profile_image) {
            return "https://ui-avatars.com/api/?name={$this->user->name}&background=random";
        }

        return asset('storage/' .$this->user->profile_image);
    }

    public function getIsLikedAttribute()
    {
        $user = Auth::user();
        if (!$user) return false;

        return $this->likes->contains('user_id', $user->id);
    }
}
