<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public static function index()
    {
        return view('frontend.home');
    }
}
