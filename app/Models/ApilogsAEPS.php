<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApilogsAEPS extends Model
{
    //use  HasFactory;
    //public $timestamps = false;
    public $table="apilogs_aeps";
    protected $fillable = [
        'product',
        'url',
        'encrypted_response',
        'source',
        'txnid',
        'header',
        'request',
        'response',
        'responsecode'
    ];
}
