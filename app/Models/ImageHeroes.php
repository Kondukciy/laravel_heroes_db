<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageHeroes extends Model
{
    protected $fillable
        = [
            'heroes_id',
            'src',
            'main',
        ];
}
