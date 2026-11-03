<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    use HasFactory;

    protected $table = 'productpackages';

    protected $fillable = [
        'slug',
        'title',
        'description',
        'image',
        "meta_title",
        "meta_description",
    ];
}