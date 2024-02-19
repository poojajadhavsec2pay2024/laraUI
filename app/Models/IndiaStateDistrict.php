<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndiaStateDistrict extends Model
{
    protected $table='india_statedistrict';
    protected $fillable = ["id", "state", "district","stateCode", "created_at", "updated_at"];

}
