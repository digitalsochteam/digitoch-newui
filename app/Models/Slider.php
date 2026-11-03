<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';

    protected $fillable = [
        'title',
        'description',
        'image_one',
        'image_two',
        'image_symbol',
        'slug',
        'tablename',
        'itemid',
    ];
}