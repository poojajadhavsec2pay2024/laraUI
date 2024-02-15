<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use App\models\stateDistrict;

class InterfaceController extends Controller
{
    public function accordion()
    {
        return view('frontend.accordion');//blank
    }
    public function blank()
    {
        return view('frontend.blank');//blank
    }
    public function signInpage()
    {
        \Auth::logout();
        return view('frontend.sign-in');//blank
    }
    public function signUppage()
    {
        \Auth::logout();
        return view('frontend.sign-up');//blank
    }
    public function getCustomer()
    {
        if(\Auth::check())
        {
           
            
            return view('frontend.datagrid');//blank
 
        }
        
        return redirect()->route('signIn')
            ->withErrors([
            'email' => 'Please login to Again.',
        ])->onlyInput('email');
        
       
       
    }
    public function getCustomerProfile()
    {
        
        if(\Auth::check())
        {
            
            return view('frontend.Empty');//blank
 
        }
        
        return redirect()->route('signIn')
            ->withErrors([
            'email' => 'Please login to Again.',
        ])->onlyInput('email');
        
       
       
    }
    public function instantPayDMT()
    {
        if(\Auth::check())
        {    
            return view('frontend.instantPay');//blank
        }
        return redirect()->route('signIn')
            ->withErrors([
            'email' => 'Please login to Again.',
        ])->onlyInput('email');   
    }
    public function instantPayRemitterRegister()
    {
       
        if(\Auth::check())
        {    
            $statedata = stateDistrict::distinct()->select('state','stateCode')->get();
           // dd($statedata);
            return view('frontend.remitterRegister',compact('statedata'));//blank
        }
        return redirect()->route('signIn')
            ->withErrors([
            'email' => 'Please login to Again.',
        ])->onlyInput('email');   
    }
    public function getDistrict(Request $request)
    {
       // dd($request->statecode);
            $data = stateDistrict::where('stateCode',$request->statecode)->distinct()->pluck('district');
           // dd($data);
           $output['status']='success';
           $output['message']='District Fetch Successfully';
           $output['apiremark']='District Fetch Successfully';
           $output['act']='CONTINUE';
           $output['data']=$data;
            return response()->json($output);
    }

    
}
