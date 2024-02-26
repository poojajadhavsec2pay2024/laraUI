<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiTokens extends Model
{
    protected $table='apitokens';
    protected $fillable = ["id", "user_id", "tokens","ip","status","created_at", "updated_at"];
}
