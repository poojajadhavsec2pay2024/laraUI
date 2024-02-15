<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dmtreports extends Model
{
    protected $table='dmtreports';
    protected $fillable = ["id", "mobile", "referenceid", "pipe", "pincode","address","dob", "gst_state", "bene_id","txntype","amount","status","apistatus","apiremark","ack"];
    

}
