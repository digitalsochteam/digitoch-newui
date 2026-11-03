<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPackageSubscription extends Model
{
    use HasFactory;

    protected $table = 'product_package_subscription';

    protected $fillable = [
        'product_package_id',
        'title',
        'description',
        'image',
        'ispopular',
        'head',
        'color',
    ];

    protected $casts = [
        'ispopular' => 'boolean',
        'head' => 'array',
    ];

    public function productPackage()
    {
        return $this->belongsTo(ProductPackage::class, 'product_package_id');
    }


}