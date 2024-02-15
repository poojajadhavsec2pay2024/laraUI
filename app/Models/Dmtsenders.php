<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Vidyadhar 09062023
//DMT transaction report

class Dmtsenders extends Model
{
    protected $table='dmtsenders';
    protected $fillable = ["id", "name", "mobile", "pincode","address","dob","gst_state", "company_id","api","user_id", "created_at", "updated_at"];

}