<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteLead extends Model
{
    protected $table = 'quote_leads';

    protected $fillable = [
        'fullname',
        'city',
        'mobile',
        'email',
        'subject',
        'message',
        'request_count',
        'leadid',
        'category',
        'status',
        'source',
        'assignto',
        'ipaddress',
        'header'
    ];
}