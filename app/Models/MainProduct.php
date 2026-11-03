<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainProduct extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'status',
        'amount',
        'department',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'hsn_code',
    ];
}