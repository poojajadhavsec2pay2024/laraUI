<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstantPayRemitterReport extends Model
{
    protected $table='instantPay_RemitterReport';
    protected $fillable = ["name","user_id","remitter_id ","gender","dob","address","mobile","state","district","city","nationality","email","employer","idType","idNumber","idExpiryDate","idIssuedPlace","incomeSource","remitterType","incomeSourceType","annualIncome","referenceKey","otp","status","created_at","updated_at"];
    
    }
