<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'name', 'slug', 'weight'
    ];

    public function addtag()
    {
        $this->firstOrCreate([
            'name' => 'test',
            'slug' => 'test'
        ]);
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'taggable');
    }
}
