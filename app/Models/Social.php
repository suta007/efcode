<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Social extends Authenticatable
{
    use HasFactory;
    protected $guard = 'social';
    protected $table = 'socials';

    protected $fillable = [
        'name', 'email', 'image', 'provider', 'provider_id', 'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
