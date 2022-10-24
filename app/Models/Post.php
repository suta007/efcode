<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\Slug;


class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'name',
        'slug',
        'content',
        'user_id',
        'category _id'
    ];

    public function Addtag(array $posttag = [])
    {
        foreach ($posttag as $item) {
            $tag = Tag::firstOrCreate([
                'name' => $item,
                'slug' => Slug::slugify($item)
            ]);
            $tag->increment('weight');

            Taggable::firstOrCreate([
                'tag_id' => $tag->id,
                'taggable_id' => $this->id,
                'taggable_type' => get_class(),
            ]);
        }
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function cate()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
