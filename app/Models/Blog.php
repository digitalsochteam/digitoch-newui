<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'image',
        'title',
        'description',
        'tags',
        "slug",
        "meta_title",
        "meta_description",
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tags' => 'array', // lets you work with tags as a PHP array
    ];
}