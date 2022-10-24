<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    use HasFactory;
    protected $table = 'taggables';
    //protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'tag_id', 'taggable_id', 'taggable_type'
    ];

    /*     public function taggable()
    {
        return $this->morphTo();
    } */
}
