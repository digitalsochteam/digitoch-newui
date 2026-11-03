<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $table = 'product_details';

    protected $fillable = [
        'product_id',
        'category',
        'subcategory',
        'product',
        'product_details',
        'position',
        'product_subheading',
        'product_detail',
        'product_image',
        'faqs',
        'slug',
        "meta_title",
        "meta_description"
    ];

    protected $casts = [
        'faqs' => 'array',
    ];

    public function products()
    {
        return $this->belongsTo(MainProduct::class, 'product_id');
    }
}