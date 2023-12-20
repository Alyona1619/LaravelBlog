<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['title', 'content', 'publish_at', 'published'];

    protected $dates = ['publish_at'];

    public function setPublishAtAttribute($value)
    {
        $this->attributes['publish_at'] = $value ?: null;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

