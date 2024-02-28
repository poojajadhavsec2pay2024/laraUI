<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndoNepalDmtApilogs extends Model
{
    public $table="indonepaldata_apilogs";
    protected $fillable = [
        'product',
        'url',
        'source',
        'txnid',
        'user_id',
        'header',
        'request',
        'response',
        'responsecode',
        "created_at", 
        "updated_at"
    ];
}
