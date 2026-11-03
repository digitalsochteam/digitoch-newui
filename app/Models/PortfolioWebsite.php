<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioWebsite extends Model
{
    protected $table = 'portfolio_websites';

    protected $fillable = [
        'website_name',
        'website_link',
        'description',
        'file',
        'iamge'
    ];
}