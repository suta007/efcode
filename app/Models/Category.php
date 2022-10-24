<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'name', 'slug'
    ];

    public function posts()
    {
        return $this->hasOne(Post::class);
    }
}
