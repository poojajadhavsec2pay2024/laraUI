<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('frontend.userList', compact('user'));
    
    }
    public function showUser(Request $request)
    {
       // dd($request->all());
       // $id=$request->id;
        $user = User::all();
        return view('frontend.userList2', compact('user'));
    
        //return view('frontend.renderview', compact('user'));
    
    }

    public function getUser(Request $request)
    {
        
        $userData=User::select('name','email')->where('id', $request->id)->first();
        if(isset($userData))
        {
            $output['status']="success";
            $output['message']="User Data Found !";

            $temp["userName"]=$userData->name;
            $temp["userEmail"]=$userData->email;

            $output['userData']=$temp;
        }
       else{
            $output['status']="failed";
            $output['message']="User Data Not Found !";
            $temp["userName"]="NA";
            $temp["userEmail"]="NA";
            $output['userData']=$temp;
        }
     
         return response()->json($output);
    
    }
    public function getUserRenderView(Request $request)
    {
        
        $userData=User::select('id','name','email')->where('id', $request->id)->first();
       
        $data['userData']=$userData;
         //return view('frontend.renderview')->with($data);
       return view('frontend.renderview')->with('userData', $userData);
       
    }
}
