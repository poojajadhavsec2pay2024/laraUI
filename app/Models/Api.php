<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected $table='apis';
    protected $fillable = ["id", "product", "apiname", "url", "username","password","option1", "option2", "option3","option4","code","status"];
   

}
