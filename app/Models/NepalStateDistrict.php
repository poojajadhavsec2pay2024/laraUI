<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NepalStateDistrict extends Model
{
    protected $table='nepal_statedistrict';
    protected $fillable = ["id", "state", "district","stateCode", "created_at", "updated_at"];

}
