<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApilogsInstantPayDMT extends Model
{
    //use  HasFactory;
    //public $timestamps = false;
    public $table="apilogs_instantpaydmt";
    protected $fillable = [
        'product',
        'url',
        'source',
        'txnid',
        'header',
        'request',
        'response',
        'responsecode'
    ];

}
