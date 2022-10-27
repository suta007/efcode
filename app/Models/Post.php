<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\HasTag;


class Post extends Model
{
    use HasFactory, HasTag;
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
        return $this->belongsTo(Category::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
