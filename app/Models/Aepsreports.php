<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aepsreports extends Model
{
    protected $table='aepsreports';
    protected $fillable = ["id", "merchant_name", "pannumber", "address", "city","pincode","statecode", "mobilenumber", "accessmodetype","ipaddress","adhaarnumber","merchantmobilenumber","latitude","longitude","referenceno", "nationalbankidentification","pipe","transcationtype","requestremarks","submerchantid","timestamp","request_type","status","apistatus","apiremark","ack"];
   

}
