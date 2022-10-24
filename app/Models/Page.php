<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\HasTag;

class Page extends Model
{
    use HasFactory, HasTag;
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
}
