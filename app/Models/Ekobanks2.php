<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekobanks2 extends Model
{
    protected $table='ekobanks2';
    protected $fillable = ["id", "bankid", "bankcode", "bankname", "masterifsc","shortcode","	imps_status", "netft_status", "isverificationavail", "url"];
}
