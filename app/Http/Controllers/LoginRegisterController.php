<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Session;



class LoginRegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }
   
    public function signUp()
    {
        \Auth::logout();
        return view('frontend.sign-up');
    
    }

    public function store(Request $request)
    {
      

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:2'
        ]);

        try {
            $users = new User();        
            $users->name=$request->name;
            $users->email=$request->email;
            $users->password=Hash::make($request->password);
            $users->remember_token=$request->_token;
            $users->role_id =\Auth::id();

            $users->save();

            $credentials = $request->only('email', 'password');
            $data =\Auth::attempt($credentials); 
            $request->session()->regenerate();
            $output['status']='sucess';
            $output['message']='You have successfully logged in';
            $output['apiremark']='You have successfully logged in';
            $output['act']='CONTINUE';
            return response()->json($output);

        } catch (Exception $e) {
              
            $message = $e->getMessage();
           // var_dump('Exception Message: '. $message);
  
            $code = $e->getCode();       
           // var_dump('Exception Code: '. $code);
  
            $string = $e->__toString();       
           // var_dump('Exception String: '. $string);
            $output['status']='failed';
            $output['message']=$message;
            $output['apiremark']=$message;
            $output['act']='RETRY';
            return response()->json($output,400);
        }
  
       
    }

    public function signIn()
    {
        
        return view('frontend.sign-in');
    }

   
    public function checkUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $output['status']='success';
            $output['message']='You have successfully logged in';
            $output['apiremark']='You have successfully logged in';
            $output['act']='CONTINUE';
            return response()->json($output);
            // return redirect()->route('dashboard')
            //     ->withSuccess('You have successfully logged in!');
        }else{
            $output['status']='failed';
            $output['message']='Your provided credentials do not match in our records.';
            $output['apiremark']='Your provided credentials do not match in our records.';
            $output['act']='RETRY';
            return response()->json($output,400); 
        }

        // return back()->withErrors([
        //     'email' => 'Your provided credentials do not match in our records.',
        // ])->onlyInput('email');

    } 
    
    public function dashboard()
    { // print_r(session()->all());
        if(\Auth::check())
        {
            //$request->session()->put('lat', '18.551451');
            //$request->session()->put('lon', '73.934784');
            Session::put('mysessionid', \Auth::id());
            Session::put('lat', '18.551451');
            
            Session::put('lon', '73.934784');
            return view('frontend.index');
 
        }
        
        return redirect()->route('signIn')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    
    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('signIn')
            ->withSuccess('You have logged out successfully!');
    }    

}