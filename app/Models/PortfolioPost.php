<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioPost extends Model
{
    protected $table = 'portfolio_post';

    protected $fillable = [
        'image'
    ];
}