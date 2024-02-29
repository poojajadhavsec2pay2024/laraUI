<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndoNepalRemitters extends Model
{
    protected $table='indonepal_remitters';
    protected $fillable = ["name","user_id","remitter_id ","gender","dob","address","mobile","state","district","city","nationality","email","employer","idType","idNumber","idExpiryDate","idIssuedPlace","incomeSource","remitterType","incomeSourceType","annualIncome","referenceKey","via","status","apiremark","rdsVer","created_at","updated_at"];
    
    }
