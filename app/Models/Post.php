<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\HasTag;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, HasTag, Searchable;
    protected $table = 'posts';

    protected $fillable = [
        'name',
        'slug',
        'content',
        'user_id',
        'category_id',
        'picture'
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function cate()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
