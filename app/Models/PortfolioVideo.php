<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioVideo extends Model
{
    protected $table = 'portfolio_videos';
    protected $fillable = [
        'company_name',
        'description',
        'video_link',
        'thumbnail',
    ];


}