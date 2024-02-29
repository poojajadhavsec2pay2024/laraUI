<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use app\Helpers\DMTV5Helper;
use Session;
use App\models\IndiaStateDistrict;
use App\models\NepalStateDistrict;
use App\models\IndoNepalRemitters;
use App\models\ReportDmt;
use App\models\Global_Settings;
use App\models\User;
use App\models\ApiTokens;
use App\models\IndoNepalDmtApilogs;
use Carbon\Carbon;
use Crypt;

class IndoNepalApiDmtController extends Controller
{

    public static function checkIndonepalAuth(Request $request)
    {

                        //dd($request->all());
                    $userId = $request->user_id;
                    $user = ApiTokens::where('user_id',$userId)->where('token',$request->token)->first();
                   
                   
                    if (!$user || $user->token !== $request->token) {
                        $output["status"]="error";
                        $output['apistatus']='AUTHENTICATION_FAILED';
                        $output["message"]= "User Not Found!";
                        $output['apiremark']= $output['message'];

                        return $output;
                       
                    }
                    if($request->mockmodestatus)
                    {
                    $output["mockmodestatus"]=$request->mockmodestatus;
                    }else{
                      $output["mockmodestatus"]="SUCCESS";
                    }
                  if($user->mockmode == $request->environmentmode && $request->environmentmode!='uat')
                  {
                    
                    if ($user->ip1 === $request->ip() || $user->ip2 === $request->ip()) {
                        
                      }
                    else{
                        $output["status"]="error";
                        $output['apistatus']='AUTHENTICATION_FAILED';
                        $output["message"]= "Please Whiteleast the ip address !";
                        $output["code"]= "400";
                        $output['apiremark']= $output['message'];
                        return $output;
                      
                    }
                }
                    
                    if ($user->status !== 'active') {
                        $output["status"]="error";
                        $output['apistatus']='AUTHENTICATION_FAILED';
                        $output["message"]= "User not active !";
                        $output["code"]= "400";
                        $output['apiremark']= $output['message'];
                        
                        return $output; //response()->json($output,401);
                        //return response()->json(['status' => 'error', 'message' => 'User is not active !'], 401);
                    }
                        $output["status"]="success";
                        $output['apistatus']='AUTHENTICATION_SUCCESS';
                        $output["message"]= "Authentication successful";
                        $output["code"]= "200";
                        $output['apiremark']= $output['message'];
                        
                        return $output;
                   // return response()->json(['status' => 'success', 'message' => 'Authentication successful'], 200);

    }
    public function getOutletDetails(Request $request)
    {
       // dd($request->all());
      
        $data['api']="indonepalactivationStatus";
        $data["via"]="api";
        $data['mobile']=$request->mobile;
        $data['email']=$request->email;
        $data['aadhaar']=$request->aadhaar;
        $data['pan']=$request->pan;
        $data['bankAccountNo']=$request->bankAccountNo;
        $data['bankIfsc']=$request->bankIfsc;
        $data['latitude']=$request->latitude;
        $data['longitude']=$request->longitude;
        $data['consent']=$request->consent;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING

        $result = \DmtApiv5::getOutletDetails($data, $mockmode,$validateData['mockmodestatus']);
        dd($result);
    
    }
    public function getvalidateOutletDetails(Request $request)
    {
        
        $data['api']="indonepalvalidateoutletdetailss";
        $data["via"]="api";
        $data['otpReferenceID']=$request->otpReferenceID;
        $data['otp']=$request->otp;
        $data['hash']=$request->hash;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
      $result = \DmtApiv5::validateoutletdetails($data, $mockmode,$validateData['mockmodestatus']);
    
        dd($result);
    
    }
    public function validateoutletdetails1(Request $request)
    {
        
        $data['api']="indonepalvalidateoutletdetailss";
        $data["via"]="api";
        $data['otpReferenceID']=$request->otpReferenceID;
        $data['otp']=$request->otp;
        $data['hash']=$request->hash;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING

        $result = \DmtApiv5::validateoutletdetails($data, $mockmode,$validateData['mockmodestatus']);
        dd($result);
    
    }
    public function activationStatus(Request $request)
    {
        $rules=array(
            'partnerTxnId' => 'required'
          
         );
         $validator = \Validator::make($request->all(),$rules);
         if($validator->fails()){
          foreach($validator->errors()->messages() as $key => $value){
              $error = $value[0];
          }
          return response()->json(['status' => 'failed','message' => $error], 400);
         }
        $data['api']="indonepalactivationStatus";
        $data["via"]="api";
        $data['partnerTxnId']=$request->partnerTxnId;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
         //dd($data);
        $result = \DmtApiv5::activationStatus($data, $mockmode,$validateData['mockmodestatus']);
        dd($result);
    
    }
    public function staticData(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        

            $validateData=self::checkIndonepalAuth($request);
           
            if($validateData["status"]!="success"){

                $this->logAndRespond($request, $validateData,$apiName,$url,'400');
                return response()->json(['status' => 'failed','message' => $validateData['message']], 400);
            }
            
            
        $rules=array(
            'type' => 'required|string'
          
         );
         $validator = \Validator::make($request->all(),$rules);
         if($validator->fails()){
          foreach($validator->errors()->messages() as $key => $value){
              $error = $value[0];
          }
            $output["status"]="failed";
            $output['apistatus']='VALIDATION_FAILED';
            $output["message"]= $error;
            $output["code"]= "200";
            $output['apiremark']= $output['message'];
                        
            $this->logAndRespond($request, $output,$apiName,$url,'200');
          return response()->json($output, 200);
         }
         
        
        
        $data["via"]="api";
        $data['type']=$request->type;
        $mockmode = true;
        
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        /*Available Types are :Gender, Nationality, IDType, IncomeSource, Relationship, PaymentMode, RemittanceReason*/

        $result = \DmtApiv5::staticData($data, $mockmode,$validateData['mockmodestatus']);

        if($result['apistatus'] == 'DATA_FETCHED_SUCCESSFULLY'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Static Data List Fetch successfully";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
              
        }
        else if($result['apistatus'] == 'DATA_FETCH_FAILED'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Unable to fetch the Static Data list";
            $output['data']= $result['data'];
             $this->logAndRespond($request, $output,$apiName,$url,'200');
           
        }else {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
             $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        return response()->json($output,200);
    }

        /*This API Used to Fetch the location of PAyment*/
    public function paymentLocationList(Request $request)
    {
            $url = $request->url();
            $uriSegments = explode('/', $url);
            $uriSegments = array_filter($uriSegments);
            $apiName= end($uriSegments);
            $validateData=self::checkIndonepalAuth($request);
           
            if($validateData["status"]!="success"){

                $this->logAndRespond($request, $validateData,$apiName,$url,'200');
                return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
            }
            $rules=array(
                'paymentMode' => 'required|string',
                'country' => 'required|string',
                'state' => 'required|string',
                'district' => 'required|string'
            );
         $validator = \Validator::make($request->all(),$rules);
         if($validator->fails()){
          foreach($validator->errors()->messages() as $key => $value){
              $error = $value[0];
          }
            $output["status"]="failed";
            $output['apistatus']='VALIDATION_FAILED';
            $output["message"]= $error;
            $output["code"]= "200";
            $output['apiremark']= $output['message'];           
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        
          return response()->json($output, 200);
         }
        $data['api']="indonepalmentLocationList";
        $data["via"]="api";
        if($request->type=='Cash Payment'){
        $data['type']='CASHPAY';
        }else{
            $data['type']='ACCOUNTPAY';
        }
    
        $data['country']='NEPAL';
        $data['state']=$request->state;
        $data['district']=$request->district;
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING

        $result = \DmtApiv5::paymentLocationList($data, $mockmode,$validateData['mockmodestatus']);
        if($result['apistatus'] == 'LOCATION_FETCHED_SUCCFULLY'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Payment Location List Fetch successfully";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
        }
        else if($result['apistatus'] == 'LOCATION_FETCH_FAILED'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Unable to fetch the payment location list";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }else {
            $output['status'] = "failed";
            
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
           // return response()->json($output,200);
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }

        return response()->json($output,200);
        
    
    }
    public function stateDistrict(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        $rules=array(
            'country' => 'required|string'
         );
         $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
            $output["status"]="failed";
            $output['apistatus']='VALIDATION_FAILED';
            $output["message"]= $error;
            $output["code"]= "200";
            $output['apiremark']= $output['message'];           
            $this->logAndRespond($request, $output,$apiName,$url,'200');
         return response()->json($output, 200);
        }
        $data['api']="indonepalstateDistrict";
        $data["via"]="api";
        $data['country']=$request->country;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING

        $result = \DmtApiv5::stateDistrict($data, $mockmode,$validateData['mockmodestatus']);
        // dd($result['data'][0]->state);
            //    $i=0;
            //     foreach($result['data'] as $value)
            //     {
            //         //dd($value->state);
                
            //     //$dmt_statedistrict  = new stateDistrict();     
            //     $dmt_statedistrict  = new nepal_stateDistrict();       
            //     $dmt_statedistrict->state=$value->state;
            //     $dmt_statedistrict->district = $value->district;
            //     $dmt_statedistrict->stateCode = $value->stateCode;
            //     $dmt_statedistrict->save();
            //     $i++;
            //     }
            //     dd($result);
            if($result['apistatus'] == 'FETCH_DATA'){
                $output['status'] = "success";
                $output['apistatus']=$result['apistatus'];
                $output['apiremark']=$result['apiremark'];
                $output['message'] = "State District Data Fetch successfully";
                $output['data']= $result['data'];
                $this->logAndRespond($request, $output,$apiName,$url,'200');
                
            }
            else if($result['apistatus'] == 'FETCH_DATA_FAILED'){
                $output['status'] = "success";
                $output['apistatus']=$result['apistatus'];
                $output['apiremark']=$result['apiremark'];
                $output['message'] = "Unable to fetch the State District Data";
                $output['data']= $result['data'];
                $this->logAndRespond($request, $output,$apiName,$url,'200');
            }else {
                $output['status'] = "failed";
                $output['apistatus']='API_CALLFAILED';
                $output['message']= "Unknown resposne received. Please try again";
            // return response()->json($output,200);
                $this->logAndRespond($request, $output,$apiName,$url,'200');
            }

     return response()->json($output,200);
    
    }
    public function remitterProfile(Request $request)
    {  
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        $rules=array(
           'mobile' => 'required|numeric|digits:10',
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         $output["status"]="failed";
         $output['apistatus']='VALIDATION_FAILED';
         $output["message"]= $error;
         $output["code"]= "200";
         $output['apiremark']= $output['message'];           
         $this->logAndRespond($request, $output,$apiName,$url,'200');
         return response()->json($output, 200);
        }
        $data['api']="indonepalremitterProfile";
        $data["via"]="api";
        $data['mobile']=$request->mobile;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING

        $remittercheck = IndoNepalRemitters::where('mobile',$request->mobile)->first();
        if(!isset($remittercheck))
        {
            //dd('kkkk');
            $output['status'] = "success";
            $output['apistatus']='NOT_REGISTERED';
            $output['message']="Remitter Not Found !";
            $output['apiremark']= $output['message'];
            $output['data'] =[];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $output['message']], 200);
        }
        $result = \DmtApiv5::remitterProfile($data, $mockmode,$validateData['mockmodestatus']);
       if(!empty($result['data']))
       {
       
        $remdata['id']=$result['data']->id;
        $remdata['mobile']=$result['data']->mobile;
        $remdata['firstName']=$result['data']->firstName;
        $remdata['gender']=$result['data']->gender;
        $remdata['dob']=$result['data']->dob;
        $remdata['address']=$result['data']->address;
        $remdata['city']=$result['data']->city;
        $remdata['state']=$result['data']->state;
        $remdata['district']=$result['data']->district;
        $remdata['nationality']=$result['data']->nationality;
        $remdata['employer']=$result['data']->employer;
        $remdata['incomeSource']=$result['data']->incomeSource;
        $remdata['status']=$result['data']->status;
        $remdata['beneficiaries']=$result['data']->beneficiaries;
        $remdata['ids']=$result['data']->ids[0];
       
        }else{
            $remdata=[];
        }
        if($result['apistatus'] == 'REGISTERED'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] ="Data Fetch Sucessfully";
            $output['data']= $remdata;
            Session::put('remitter_mobileNumber', $request->mobile);
            Session::put('senderID', $remdata['id']);
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
        }
        else if($result['apistatus'] == 'NOT_REGISTERED'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter Fetch Data Failed";
            $output['data']= $remdata;
            Session::put('rem_mobileNo', $request->mobile);
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
        }else {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'200');

        }

        return response()->json($output,200);
    
    }
    public function sendOtp(Request $request)
    {
       
            $url = $request->url();
            $uriSegments = explode('/', $url);
            $uriSegments = array_filter($uriSegments);
            $apiName= end($uriSegments);
            $validateData=self::checkIndonepalAuth($request);
           
            if($validateData["status"]!="success"){

                $this->logAndRespond($request, $validateData,$apiName,$url,'200');
                return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
            }
            
            if($request->operation=='FUND_TRANSFER')
            {
               
           $rules=array(
                'operation' => 'required|in:FUND_TRANSFER,REMITTER_REGISTRATION', // operation must be one of these values
                'mobile' => 'required|numeric|digits:10', // mobile must be numeric and exactly 10 digits long
                'paymentMode' => 'required|in:Cash Payment,Account Deposit', // paymentMode must be one of these values
                'beneficiaryId' => 'required|numeric', // beneficiaryId must exist in the beneficiaries table's id column
                'transferAmount' => 'required|numeric|min:0', // transferAmount must be a non-negative numeric value
            );
           
        }else{
           
                 $rules=array(
                 'operation' => 'required|in:FUND_TRANSFER,REMITTER_REGISTRATION', // operation must be one of these values
                 'mobile' => 'required|numeric|digits:10', // mobile must be numeric and exactly 10 digits long
                    
                );
               
           }
           $validator = \Validator::make($request->all(),$rules);
          
           if($validator->fails()){
           
           foreach($validator->errors()->messages() as $key => $value){
               $error = $value[0];
           }
          
           $this->logAndRespond($request, $error,$apiName,$url,'200');
           return response()->json(['status' => 'failed','message' => $error], 200);
           }

        $data['api']="indonepalsendOtp";
        $data["via"]="api";
        $data["operation"]=$request->operation;/*FundTransfer,RemitterRegistration*/
        $data["mobile"]=$request->mobile;
        $data["paymentMode"]=$request->paymentMode;/* (Account Deposit,Cash Payment)Mandatory(Optional If operation is Remitter Registration)*/
        $data["bankBranchId"]=$request->bankBranchId;/*Optional(Mandatory when paymentMode is Account Deposit)*/
        $data["accountNumber"]=$request->accountNumber;/*Optional(Mandatory when paymentMode is Account Deposit)*/
        $data["beneficiaryId"]=$request->beneficiaryId;/*Optional(Mandatory if operation is FundTransfer*/
        $data["transferAmount"]=$request->transferAmount;
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::sendOtp($data, $mockmode,$validateData['mockmodestatus']);
        if(!empty($result['data']))
       {
        $remdata=$result['data']->otpReference;
       }else{
        $remdata=[];
       }
        if($result['apistatus'] == 'OTP_SEND'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "OTP sent to remitter mobile number";
            $output['otpReference']= $remdata;
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
        }
        else if($result['apistatus'] == 'OTP_SEND_FAILED'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Could not send OTP to remitter mobile number.";
            $output['otpReference']= $remdata;
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }else {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
           
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }

        return response()->json($output,200);
    
    
    }
    public function remitterRegistration(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        $rules=array(
            'name' => 'required|string|max:32',
            'gender' => 'required|in:Female,Male,Other',
            'dob' => 'required|before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            'address' => 'required|string|max:255',
            'mobileno' => 'required|numeric|digits:10',
            'state' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'nationality' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'employer' => 'required|string|max:100',
            'idType' => 'required|string|max:50',
            'idNumber' => 'required',
            'incomeSource' => 'required|string|max:50',
            'remitterType' => 'required|numeric|in:1,2,3,4',
            'incomeSourceType' => 'required|numeric|in:1,2,3,4,5,6',
            'annualIncome' => 'required|numeric|in:1,2,3,4',
            'otpReference' => 'required',
            //'otp' => 'required|numeric|max:6',
        );
        $validator = \Validator::make($request->all(),$rules);
          
           if($validator->fails()){
           
           foreach($validator->errors()->messages() as $key => $value){
               $error = $value[0];
           }
          
           $this->logAndRespond($request, $error,$apiName,$url,'200');
           return response()->json(['status' => 'failed','message' => $error], 200);
           }
        
        $data['api']="indonepalremitterRegistration";
        $data["via"]="api";
        $data["name"] =$request->name;
        $data["gender"] =$request->gender;
        $data["dob"] =$request->dob;
        $data["address"] =$request->address;
        $data["mobile"] =$request->mobileno;
        $data["state"] =$request->state;
        $data["district"] =$request->district;
        $data["city"] =$request->city;
        $data["nationality"] =$request->nationality;
        $data["email"] =$request->email;
        $data["employer"] =$request->employer;
        $data["idType"] =$request->idType;
        $data["idNumber"] =$request->idNumber;
        $data["idExpiryDate"] =$request->idExpiryDate;
        $data["idIssuedPlace"] =$request->idIssuedPlace;
        $data["incomeSource"] =$request->incomeSource;
        $data["remitterType"] =$request->remitterType;
        $data["incomeSourceType"] =$request->incomeSourceType;
        $data["annualIncome"] =$request->annualIncome;
        $data["otpReference"] =$request->otpReference;
        $data["otp"] =$request->otp;    
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $remittercheck = IndoNepalRemitters::where('mobile',$request->mobileno)->first();
        if(isset($remittercheck))
        {
            //dd('kkkk');
            $output['status'] = "success";
            $output['apistatus']='NOT_REGISTERED';
            $output['message']="Remitter already Registered !";
            $output['apiremark']= $output['message'];
           
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            return response()->json($output, 200);
        }
        $create['name']=$request->name;
        $create['gender']=$request->gender;
        $create['dob']=$request->dob;
        $create['address']=$request->address;
        $create['mobile']=$request->mobileno;
        $create['state']=$request->state;
        $create['district']=$request->district;
        $create['city']=$request->city;
        $create['nationality']=$request->nationality;
        $create['email']=$request->email;
        $create['employer']=$request->employer;
        $create['idType']=$request->idType;
        $create['idNumber']=$request->idNumber;
        $create['idExpiryDate']=$request->idExpiryDate;
        $create['idIssuedPlace']=$request->idIssuedPlace;
        $create['incomeSource']=$request->incomeSource;
        $create['remitterType']=$request->remitterType;
        $create['incomeSourceType']=$request->incomeSourceType;
        $create['annualIncome']=$request->annualIncome;
        $create['via']='api';
        $create['status']='Pending';
        $create['user_id']=$request->user_id;
     
        $instantPay_RemitterReport =IndoNepalRemitters::create($create);

            $insertedId = $instantPay_RemitterReport->id;
        $result = \DmtApiv5::remitterRegistration($data, $mockmode,$validateData['mockmodestatus']);
        if(!empty($result['data']))
        {
        
         $remdata['id']=$result['data']->id;
         $remdata['mobile']=$result['data']->mobile;
         $remdata['firstName']=$result['data']->firstName;
         $remdata['gender']=$result['data']->gender;
         $remdata['dob']=$result['data']->dob;
         $remdata['address']=$result['data']->address;
         $remdata['city']=$result['data']->city;
         $remdata['state']=$result['data']->state;
         $remdata['district']=$result['data']->district;
         $remdata['nationality']=$result['data']->nationality;
         $remdata['employer']=$result['data']->employer;
         $remdata['incomeSource']=$result['data']->incomeSource;
         $remdata['status']=$result['data']->status;
         $remdata['beneficiaries']=$result['data']->beneficiaries;
         $remdata['ids']=$result['data']->ids[0];
        
         }else{
             $remdata=[];
         }
        if($result['apistatus'] == 'REGISTRATION_SUCCESSFUL'){

            $updateRemitterReport=IndoNepalRemitters::where('id',$insertedId)
            ->update([
            'status' =>'registered',
            'apiremark'=>$result['apiremark'],
            'remitter_id'=>$result['data']->id
                 ]);
            //$updateRemitterReport->status = "Registered";
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter registration successful";
            $output['data']= $remdata;
            Session::put('rem_mobileNo', $result['data']->mobile);
            Session::put('senderID', $remdata['id']);
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
        }
        else if($result['apistatus'] == 'REGISTRATION_INPROCESS'){
           
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter registration is pending";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else if($result['apistatus'] == 'REGISTRATION_INVALID_INPUT'){
           
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = $result['message'];
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }else {
           
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        
        return response()->json($output,200);
    }
    public function remitterEkycInitiate(Request $request)
    {

        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message'], ], 200);
        }
        $rules=array( 
            'remitterId' => 'required|numeric'
         );
         $validator = \Validator::make($request->all(),$rules);
         if($validator->fails()){
          foreach($validator->errors()->messages() as $key => $value){
              $error = $value[0];
          }
          $this->logAndRespond($request, $error,$apiName,$url,'200');
          return response()->json(['status' => 'failed','message' => $error ], 200);
         }
         $remittercheck = IndoNepalRemitters::where('remitter_id',$request->remitterId)->first();
        if(!isset($remittercheck))
        {
            //dd('kkkk');
            $output['status'] = "success";
            $output['apistatus']='REMITTER_NOT_FOUND';
            $output['message']="Remitter Not Found!";
            $output['apiremark']= $output['message'];
           
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            return response()->json($output, 200);
        }
        $data['api']="indonepalremitterEkycInitiate";
        $data["via"]="api";
        $data["remitterId"] =$request->remitterId;
         $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING,SUCCESS
        $result = \DmtApiv5::remitterEkycInitiate($data, $mockmode,$validateData['mockmodestatus']);
        if(!empty($result['data']))
        {
        
         $remdata['referenceKey']=$result['data']->referenceKey;
         $remdata['url']=$result['data']->url;
         }else{
            $remdata['referenceKey']=[];
            $remdata['url']=[];
         }
        
        if($result['apistatus'] == 'RIMITTER_INITIATE_SUCCESSFUL'){ 
            $updateRemitterReport=IndoNepalRemitters::where('remitter_id',$request->remitterId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'rbl_pending',
            'apiremark'=>$result['apiremark'],
            'referenceKey'=>$result['data']->referenceKey
                 ]);
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter Ekyc Initiate Succesfully";
            $output['referenceKey']= $remdata['referenceKey'];
            $output['url']= $remdata['url'];
            Session::put('referenceKey', $result['data']->referenceKey);
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
        }
        else if($result['apistatus'] == 'REMITTER_INITIATE_FAILED'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Failed to Initiate Remitter Ekyc please try again";;
            $output['referenceKey']= $remdata['referenceKey'];
            $output['url']= $remdata['url'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }else {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
           
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        return response()->json($output,200);
    
    }
    public function remitterEkycInitiateStatus(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        $rules=array(
            'remitterId' => 'required|numeric',
            'referenceKey' => 'required|string|max:255'
         );
         $validator = \Validator::make($request->all(),$rules);
         if($validator->fails()){
          foreach($validator->errors()->messages() as $key => $value){
              $error = $value[0];
          }
          $this->logAndRespond($request, $error,$apiName,$url,'200');
          return response()->json(['status' => 'failed','message' => $error], 200);
         }
        $data['api']="indonepalremitterEkycInitiateStatus";
        $data["via"]="api";
        $data["remitterId"] =$request->remitterId;
        $data["referenceKey"] =$request->referenceKey;
       
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::remitterEkycInitiateStatus($data, $mockmode,$validateData['mockmodestatus']);
       // dd($result);
        if($result['apistatus'] == 'EKYC_SUCCESSFUL'){ 
            $updateRemitterReport=IndoNepalRemitters::where('remitter_id',$request->remitterId)->where('user_id',$request->user_id)
            ->update([
            'apiremark'=>$result['apiremark'],
            'status' =>'rbl_done'
                 ]);
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = $result['message'];
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
        }
        else if($result['apistatus'] == 'EKYC_UNDER_PROCESS'){
            $output['status'] = "pending";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter eKYC is under process. Please wait or Do the completion.";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else if($result['apistatus'] == 'REMITTER_EKYC_FAILED'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter eKYC failed. Please retry the RBL UIDAI verification again.";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }else {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        return response()->json($output,200);
    
    }
    public function remitterEkycProcess(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        $rules=array(
                // 'remitterId' => 'required',
                // 'referenceKey' => 'required',
                'remitterId' => 'required|numeric',
                'referenceKey' => 'required|string|max:255',
                'ekycdata' => 'required'
            );
            $validator = \Validator::make($request->all(),$rules);
         if($validator->fails()){
          foreach($validator->errors()->messages() as $key => $value){
              $error = $value[0];
          }
          $this->logAndRespond($request, $error,$apiName,$url,'200');
          return response()->json(['status' => 'failed','message' => $error], 200);
         }
        $data['api']="indonepalremitterEkycProcess";
        $data["via"]="api";
       // $data["authenticationKey"] =$request->authenticationKey;
        $data["remitterId"] =$request->remitterId;
        $data["referenceKey"] =$request->referenceKey;
        $data["ekycdata"] =$request->ekycdata;
       
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::remitterEkycProcess($data, $mockmode,$validateData['mockmodestatus']);
        if($result['apistatus'] == 'REMITTER_EKYC_SUCCESS'){
            $updateRemitterReport=IndoNepalRemitters::where('remitter_id',$request->remitterId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'ekyc_done',
            'rdsVer' =>$result['rdsVer']
                 ]);
        }
        else{
            $updateRemitterReport=IndoNepalRemitters::where('remitter_id',$request->remitterId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'ekyc_pending',
            'rdsVer' =>$result['rdsVer']
                 ]);
        }
       
        if($result['apistatus'] == 'REMITTER_EKYC_SUCCESS'){ 
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Biometric eKYC completed successfully.";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else if($result['apistatus'] == 'REMITTER_EKYC_UNDER_PROCESS'){
            
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Biometric eKYC is still processing. Please wait.";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else if($result['apistatus'] == 'REMITTER_EKYC_FAILED'){
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Biometric eKYC failed. Please try again.";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }else {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        return response()->json($output,200);
    
    }
    public function remitterUpdate(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        $rules=array(
            'remitterType' => 'required|numeric|in:1,2,3,4',
            'incomeSourceType' => 'required|numeric|in:1,2,3,4,5,6',
            'annualIncome' => 'required|numeric|in:1,2,3,4',
            'remitterId' => 'required'
        );
        $validator = \Validator::make($request->all(),$rules);
            if($validator->fails()){
             foreach($validator->errors()->messages() as $key => $value){
                 $error = $value[0];
             }
             $this->logAndRespond($request, $error,$apiName,$url,'200');
          return response()->json(['status' => 'failed','message' => $error], 200);
            }
        $data['api']="indonepalremitterUpdate";
        $data["via"]="api";
        $data["remitterType"] =$request->remitterType;
        $data["incomeSourceType"] =$request->incomeSourceType;
        $data["annualIncome"] =$request->annualIncome;
        $data["remitterId"] =$request->remitterId;
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::remitterUpdate($data, $mockmode,$validateData['mockmodestatus']);
        if($result['apistatus'] == 'REMITTER_UPDATE_SUCCESS'){

          
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter Updated successfully";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            
        }
        else if($result['apistatus'] == 'REMITTER_UPDATE_FAILED'){
           
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter registration is pending";
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else {
           
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        
        return response()->json($output,200);
    
    }
    public function beneficiaryRegistration(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        if($request->operation=='Account Deposit')
            {
               
           $rules=array(
            'remitterMobile' => 'required|numeric|digits:10', // Assuming mobile numbers are strings and maximum length is 15
            'name' => 'required|string|max:255', // Assuming beneficiary name is a string with a maximum length of 255 characters
            'gender' => 'required|in:Female,Male,Other', // Assuming gender must be one of these values
            'mobile' => 'required|numeric|digits:10', // Assuming mobile numbers are strings and maximum length is 15
            'relationship' => 'required|string|max:255', // Assuming relationship is a string with a maximum length of 255 characters
            'address' => 'required|string|max:255', // Assuming address is a string with a maximum length of 255 characters
            'paymentMode' => 'required|in:Cash Payment,Account Deposit', // Assuming payment mode is a string with a maximum length of 255 characters
            'bankBranchId' => 'required|numeric',
            'accountNumber'=> 'required|numeric', // Assuming bank branch ID is a numeric value
            );
           
        }else{
           
            $rules=array(
                'remitterMobile' => 'required|numeric|digits:10', // Assuming mobile numbers are strings and maximum length is 15
                'name' => 'required|string|max:255', // Assuming beneficiary name is a string with a maximum length of 255 characters
                'gender' => 'required|in:Female,Male,Other', // Assuming gender must be one of these values
                'mobile' => 'required|numeric|digits:10', // Assuming mobile numbers are strings and maximum length is 15
                'relationship' => 'required|string|max:255', // Assuming relationship is a string with a maximum length of 255 characters
                'address' => 'required|string|max:255', // Assuming address is a string with a maximum length of 255 characters
                'paymentMode' => 'required|in:Cash Payment,Account Deposit', // Assuming payment mode is a string with a maximum length of 255 characters
                'bankBranchId' => 'required|numeric', // Assuming bank branch ID is a numeric value
            );
               
           }
       
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         $this->logAndRespond($request, $error,$apiName,$url,'200');
          return response()->json(['status' => 'failed','message' => $error], 200);
        }
        $data['api']="indonepalbeneficiaryRegistration";
        $data["via"]="api";
        $data["remitterMobile"]=$request->remitterMobile; 
        $data["name"]=$request->name;
        $data["gender"]=$request->gender;
        $data["mobile"]=$request->mobile;
        $data["relationship"]=$request->relationship;
        $data["address"]=$request->address;
        $data["paymentMode"]=$request->paymentMode;/* Payment mode Account Deposite then branch id and account number Mandatory*/
        $data["bankBranchId"]=$request->bankBranchId;
        $data["accountNumber"]=$request->accountNumber;
        $mockmode = true;
        //dd($data);
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $remittercheck = IndoNepalRemitters::where('mobile',$request->remitterMobile)->first();
        
        if(!isset($remittercheck))
        {
            //dd('kkkk');
            $output['status'] = "success";
            $output['apistatus']='NOT_REGISTERED';
            $output['message']="For adding the beneficiary, the remitter's mobile number is not registered.";
            $output['apiremark']= $output['message'];
           
            $this->logAndRespond($request, $output,$apiName,$url,'200');
            return response()->json($output, 200);
        }
        $result = \DmtApiv5::beneficiaryRegistration($data, $mockmode,$validateData['mockmodestatus']);
       //dd($result);
        if(!empty($result['data']))
       {
       
        $remdata['id']=$result['data']->id;
        $remdata['mobile']=$result['data']->mobile;
        $remdata['firstName']=$result['data']->firstName;
        $remdata['gender']=$result['data']->gender;
        $remdata['dob']=$result['data']->dob;
        $remdata['address']=$result['data']->address;
        $remdata['city']=$result['data']->city;
        $remdata['state']=$result['data']->state;
        $remdata['district']=$result['data']->district;
        $remdata['nationality']=$result['data']->nationality;
        $remdata['employer']=$result['data']->employer;
        $remdata['incomeSource']=$result['data']->incomeSource;
        $remdata['status']=$result['data']->status;
        $remdata['beneficiaries']=$result['data']->beneficiaries;
        $remdata['ids']=$result['data']->ids[0];
       
        }else{
            $remdata=[];
        }
        if($result['apistatus'] == 'BENEFICIARY_REGISTER_SUCCESSFULLY'){ 
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Beneficiary Added Successfully";
            $output['data']= $remdata;
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else if($result['apistatus'] == 'BENEFICIARY_REGISTER_FAILED'){
            
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Not able to add the Beneficiary please add valid data";
            $output['data']= $remdata;
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        return response()->json($output,200);
    
    }
    public function serviceCharge(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        if($request->transferAmount)
        {
            $rules=array(
                'country' => 'required|string', 
                'transferAmount' => 'required|numeric|min:0', 
                'paymentMode' => 'required|in:Cash Payment,Account Deposit', 
                'bankBranchId' => 'required|numeric', 
            );
               
           
       
        }else{
            $rules=array(
                'country' => 'required|string', 
                'payoutAmount' => 'required|numeric', 
                'paymentMode' => 'required|in:Cash Payment,Account Deposit', 
                'bankBranchId' => 'required|numeric', 
            );
        }
       
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
        foreach($validator->errors()->messages() as $key => $value){
            $error = $value[0];
        }
        $this->logAndRespond($request, $error,$apiName,$url,'200');
        return response()->json(['status' => 'failed','message' => $error], 200);
        }
        $data['api']="indonepalserviceCharge";
        $data["via"]="api";
        $data["country"]=$request->country;
        $data["paymentMode"]=$request->paymentMode;
        $data["transferAmount"]=$request->transferAmount;
        $data["payoutAmount"]=$request->payoutAmount;
        $data["bankBranchId"]=$request->bankBranchId;
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::serviceCharge($data, $mockmode,$validateData['mockmodestatus']);
        if(!empty($result['data']))
       {
       
       
        $remdata['transferAmount']=$result['data']->transferAmount;
        $remdata['serviceCharge']=$result['data']->serviceCharge;
        $remdata['collectionAmount']=$result['data']->collectionAmount;
        $remdata['collectionCurrency']=$result['data']->collectionCurrency;
        $remdata['exchangeRate']=$result['data']->exchangeRate;
        $remdata['payoutAmount']=$result['data']->payoutAmount;
        $remdata['payoutCurrency']=$result['data']->payoutCurrency;
    
       
        }else{
            $remdata=[];
        }
        if($result['apistatus'] == 'DATA_FETCHED_SUCCESSFUL'){ 
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Service charge retrieved successfully.";
            $output['transferAmount']=$remdata['transferAmount'];
            $output['serviceCharge']=$remdata['serviceCharge'];
            $output['collectionAmount']=$remdata['collectionAmount'];
            $output['exchangeRate']=$remdata['exchangeRate'];
            $output['payoutAmount']=$remdata['payoutAmount'];
            $output['payoutCurrency']=$remdata['payoutCurrency'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
       
        else if($result['apistatus'] == 'DATA_FETCHED_FAILED'){
            
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Unable to Fetch the service Charge";
            $output['data']= $remdata;
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        return response()->json($output,200);
    
    
    
    }
    public function fundTransfer(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        $rules=array(
            'externalRef' => 'required',
            'remitterMobile' => 'required|numeric|digits:10', 
            'beneficiaryId' => 'required|numeric', 
            'transferAmount' => 'required|numeric|min:0', 
            'remittanceReason' => 'required|string|max:255',
            'otpReference' => 'required',
            'otp' => 'required|max:6',
            
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         $this->logAndRespond($request, $error,$apiName,$url,'200');
         return response()->json(['status' => 'failed','message' => $error], 200);
        }
        $data['api']="indonepalfundTransfer";
        $data["via"]="api";
        //do {
            $request['txnid'] = $this->transcode().rand(1111111111, 9999999999);
      //  } while (ReportDmt::where("txnid", "=", $request->txnid)->first() instanceof DMTReport);
       
        $data["externalRef"] =$request['txnid'];
       
       // $data["externalRef"]=$externalRef;
        $data["remitterMobile"]=$request->remitterMobile;
        $data["beneficiaryId"]=$request->beneficiaryId;
        $data["transferAmount"]=$request->transferAmount;
        $data["remittanceReason"]=$request->remittanceReason;
        $data["otpReference"]=$request->otpReference;
        $data["otp"]=$request->otp;
        //$data["latitude"]="10.0000";
       // $data["longitude"]="20.0000";
        $data["latitude"]=$request->latitude;
        $data["longitude"]=$request->longitude;
        $mockmode = true;
        $mockmodestatus="FAILED";//FAILED,PENDING,SUCCESS
        if($request->receiver_paymentMode=='Cash Payment')
        {
            $paymentMode='cashpayment';
        }else{
            $paymentMode='accountdeposit';
        }
        $remitter = IndoNepalRemitters::where('mobile',$request->remitterMobile)->first();
           //dd($remitter->name);
           $create['mobile']=$request->remitterMobile;
           $create['txnid']=$request['txnid'];
           $create['sender_name']=$remitter->name;
           $create['beneficiary_id']=$request->beneficiaryId;
          // $create['beneficiary_name']=$request->b_name;
          // $create['beneficiary_account']=$request->rec_account;
          // $create['beneficiary_bankid']=$request->beneficiaryId;
           $create['amount']=$request->transferAmount;
           $create['transfer_mode']=$paymentMode;
          // $create['charge']=$request->service_rate;
           $create['status']='pending';
           $create['source']='s2p';
           $create['api_id']='110';
           $create['via']=$data["via"];
           $create['lat']="10.0000";
           $create['lon']="20.0000";
           $create['user_id']=$request->user_id;
           $create['ip']=$request->ip();
        
        $instantPayReportDmt =ReportDmt::create($create);
        $reportDmtinsertedId = $instantPayReportDmt->id;
        $result = \DmtApiv5::fundTransfer($data, $mockmode,$validateData['mockmodestatus']);
        if($result['apistatus'] == 'TRANSFER_SUCCESSFUL'){ 
            if($result['data'])
            {
            $updateFundTransfer=ReportDmt::where('id',$reportDmtinsertedId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'success',
            'apiremark'=>$result['apiremark'],
            'refno'=>$result['data']->txnReferenceId,
            'refno2'=>$result['data']->poolReferenceId
                 ]);
            }
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] ="Your transaction was successful.";
            if (isset($result['data']->pool)) {
                unset($result['data']->pool);
            }
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else if($result['apistatus'] == 'TRANSFER_PENDING'){
            if($result['data'])
            {
            $updateFundTransfer=ReportDmt::where('id',$reportDmtinsertedId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'pending',
            'apiremark'=>$result['apiremark'],
            'refno'=>$result['data']->txnReferenceId,
            'refno2'=>$result['data']->poolReferenceId
                 ]);
                }
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Your transaction is under progress. Please wait.";
            if (isset($result['data']->pool)) {
                 unset($result['data']->pool);
            }
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
           
        }
        else if($result['apistatus'] == 'TRANSFER_FAILED'){
            if($result['data'])
            {
            $updateFundTransfer=ReportDmt::where('id',$reportDmtinsertedId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'failed',
            'apiremark'=>$result['apiremark'],
            'refno'=>$result['data']->txnReferenceId,
            'refno2'=>$result['data']->poolReferenceId
                 ]);
            }
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Transaction Failed";
            if (isset($result['data']->pool)) {
                unset($result['data']->pool);
            }
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
           
        }
        else {
            
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        return response()->json($output,200);
    
    
    }
    public function fetchTransactionStatus(Request $request)
    {
        $url = $request->url();
        $uriSegments = explode('/', $url);
        $uriSegments = array_filter($uriSegments);
        $apiName= end($uriSegments);
        $validateData=self::checkIndonepalAuth($request);
       
        if($validateData["status"]!="success"){

            $this->logAndRespond($request, $validateData,$apiName,$url,'200');
            return response()->json(['status' => 'failed','message' => $validateData['message']], 200);
        }
        $rules=array(
           'ipayId' => 'required',
           'latitude' => 'required',
           'longitude' => 'required',
            
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         $this->logAndRespond($request, $error,$apiName,$url,'200');
         return response()->json(['status' => 'failed','message' => $error], 200);
        }
        $data['api']="indonepalfetchTransactionStatus";
        $data["via"]="api";
        $data["ipayId"]=$request->ipayId;
        $data["latitude"]=$request->latitude;
        $data["longitude"]=$request->longitude;
       // $data["latitude"]="10.0000";
        //$data["longitude"]="20.0000";
        $mockmode = true;
        $mockmodestatus="PENDING";//FAILED,PENDING,SUCCESS
        $result = \DmtApiv5::fetchTransactionStatus($data, $mockmode,$validateData['mockmodestatus']);
        if($result['apistatus'] == 'TRANSFER_SUCCESSFUL'){ 
            $updateFundTransfer=ReportDmt::where('refno2',$request->ipayId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'success',
            'apiremark'=>$result['apiremark'],
                 ]);
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] ="Your transaction was successful.";
            if (isset($result['data']->pool)) {
                unset($result['data']->pool);
            }
            $output['data']= $result['data'];
        }
        else if($result['apistatus'] == 'TRANSFER_PENDING'){
            $updateFundTransfer=ReportDmt::where('refno2',$request->ipayId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'pending',
            'apiremark'=>$result['apiremark'],
                 ]);
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Your transaction is under progress. Please wait.";
            if (isset($result['data']->pool)) {
                 unset($result['data']->pool);
            }
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else if($result['apistatus'] == 'TRANSFER_FAILED'){
            $updateFundTransfer=ReportDmt::where('refno2',$request->ipayId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'failed',
            'apiremark'=>$result['apiremark'],
                 ]);
            $output['status'] = "success";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Transaction Failed";
            if (isset($result['data']->pool)) {
                unset($result['data']->pool);
            }
            $output['data']= $result['data'];
            $this->logAndRespond($request, $output,$apiName,$url,'200');
        }
        else {
            $updateFundTransfer=ReportDmt::where('refno2',$request->ipayId)->where('user_id',$request->user_id)
            ->update([
            'status' =>'failed',
            'apiremark'=>$result['apiremark'],
                 ]);
            $output['status'] = "failed";
           
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $this->logAndRespond($request, $output,$apiName,$url,'400');
        }
        return response()->json($output,200);
    
    }
    public function logAndRespond($request, $response,$api="none",$url="none",$code='200')
    {
        $txnID=rand();
        $createdata['product']=$api;
        $createdata['url']=$url;
        $createdata['responsecode']=$code;
        $createdata['request']=json_encode($request->all());
        $createdata['response']=json_encode($response);
        $createdata['txnid']=$txnID;
        $createdata['source']='api';
        $createdata['user_id']=$request->user_id;
        $instantPaydataReport =IndoNepalDmtApilogs::create($createdata);
            if($instantPaydataReport) {
                $output["status"]="success";
                $output["message"]="Request processing success.";
                return $output;        
            }else{
                $output["status"]="failed";
                $output["message"]="Request processing failed. Please contact admin .";
                return $output;
            }
        
    }
    public function transcode()
    {
     $code = \DB::table('companies')->where('domain', $_SERVER['HTTP_HOST'])->first();
        if($code){
      return $code->txnprefix;
        }else{
            return "SECP";
        }
    }
  
    
   
}
