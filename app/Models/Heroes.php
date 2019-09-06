<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heroes extends Model
{
    protected $fillable
        = [
            'nickname',
            'slug',
            'real_name',
            'origin_description',
            'superpowers',
            'catch_phrase',

        ];

    public function heroesImages(){
        return $this->hasMany(ImageHeroes::class);
    }
}
