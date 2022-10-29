<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\HasTag;
use Laravel\Scout\Searchable;

class Page extends Model
{
    use HasFactory, HasTag, Searchable;
    protected $table = 'pages';

    protected $fillable = [
        'name',
        'slug',
        'content',
        'user_id'
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function searchableAs()
    {
        return 'page_index';
    }
}
