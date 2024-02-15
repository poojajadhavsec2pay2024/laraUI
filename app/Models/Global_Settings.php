<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Global_Settings extends Model
{
    protected $table='global_settings';
    protected $fillable = ["id", "code", "value"];
}
