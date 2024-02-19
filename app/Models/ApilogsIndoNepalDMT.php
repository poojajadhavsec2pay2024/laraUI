<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApilogsIndoNepalDMT extends Model
{
    //use  HasFactory;
    //public $timestamps = false;
    public $table="apilogs_indonepaldmt";
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
