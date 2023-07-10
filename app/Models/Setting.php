<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'director',
        'str',
        'tf',
        'email',
        'twitter',
        'facebook',
        'youtube',
        'linkedin',
    ];
}
