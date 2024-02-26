<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Helpers\DMTV5Helper;
use Session;
use App\models\IndiaStateDistrict;
use App\models\NepalStateDistrict;
use App\models\IndoNepalRemitters;
use App\models\ReportDmt;
use App\models\Global_Settings;
use App\models\User;
use Carbon\Carbon;
use Crypt;

class DMTV5Controller extends Controller
{
    public function getOutletDetails(Request $request)
    {
       // dd($request->all());
      
        $data['api']="indonepalactivationStatus";
        $data["via"]="web";
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

        $result = \DmtApiv5::getOutletDetails($data, $mockmode,$mockmodestatus);
        dd($result);
    
    }
    public function getvalidateOutletDetails(Request $request)
    {
        
        $data['api']="indonepalvalidateoutletdetailss";
        $data["via"]="web";
        $data['otpReferenceID']=$request->otpReferenceID;
        $data['otp']=$request->otp;
        $data['hash']=$request->hash;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
      $result = \DmtApiv5::validateoutletdetails($data, $mockmode,$mockmodestatus);
    
        dd($result);
    
    }
    public function validateoutletdetails1(Request $request)
    {
        dd($request->all());
        $data['api']="indonepalvalidateoutletdetailss";
        $data["via"]="web";
        $data['otpReferenceID']=$request->otpReferenceID;
        $data['otp']=$request->otp;
        $data['hash']=$request->hash;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING

        $result = \DmtApiv5::validateoutletdetails($data, $mockmode,$mockmodestatus);
        dd($result);
    
    }
    public function activationStatus(Request $request)
    {
        $request->validate([
            'partnerTxnId' => 'required'
          
         ]);
        $data['api']="indonepalactivationStatus";
        $data["via"]="web";
        $data['partnerTxnId']=$request->partnerTxnId;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
         //dd($data);
        $result = \DmtApiv5::activationStatus($data, $mockmode,$mockmodestatus);
        dd($result);
    
    }
    public function staticData(Request $request)
    {
        $request->validate([
            'type' => 'required|string'
          
         ]);
        $data['api']="indonepalstaticData";
        $data["via"]="web";
        $data['type']=$request->type;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        /*Available Types are :Gender, Nationality, IDType, IncomeSource, Relationship, PaymentMode, RemittanceReason*/

        $result = \DmtApiv5::staticData($data, $mockmode,$mockmodestatus);
       dd($result);
    }

        /*This API Used to Fetch the location of PAyment*/
    public function paymentLocationList(Request $request)
    {
        $request->validate([
            'paymentMode' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string'
         ]);
        $data['api']="indonepalmentLocationList";
        $data["via"]="web";
        if($request->type=='Cash Payment'){
        $data['type']='CASHPAY';
        }else{
            $data['type']='ACCOUNTPAY';
        }
    
        $data['country']='NEPAL';
        $data['state']=$request->state;
        $data['district']=$request->district;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING

        $result = \DmtApiv5::paymentLocationList($data, $mockmode,$mockmodestatus);
        if($result['apistatus'] == 'LOCATION_FETCHED_SUCCFULLY'){
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Payment Location List Fetch successfully";
            $output['data']= $result['data'];
            
            
        }
        else if($result['apistatus'] == 'LOCATION_FETCH_FAILED'){
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Unable to fetch the payment location list";
            $output['data']= $result['data'];
            
        }else {
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }

        return response()->json($output,200);
        
    
    }
    public function stateDistrict(Request $request)
    {
        $request->validate([
            'country' => 'required|string'
         ]);
        
        $data['api']="indonepalstateDistrict";
        $data["via"]="web";
        $data['country']=$request->country;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING

        $result = \DmtApiv5::stateDistrict($data, $mockmode,$mockmodestatus);
       // dd($result['data'][0]->state);
       $i=0;
        foreach($result['data'] as $value)
        {
            //dd($value->state);
           
        //$dmt_statedistrict  = new stateDistrict();     
        $dmt_statedistrict  = new nepal_stateDistrict();       
        $dmt_statedistrict->state=$value->state;
        $dmt_statedistrict->district = $value->district;
        $dmt_statedistrict->stateCode = $value->stateCode;
        $dmt_statedistrict->save();
        $i++;
        }
        dd($result);
    
    }
    public function remitterProfile(Request $request)
    {
        $request->validate([
           'mobile' => 'required'
        ]);
       
        $data['api']="indonepalremitterProfile";
        $data["via"]="web";
        $data['mobile']=$request->mobile;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
     
        $result = \DmtApiv5::remitterProfile($data, $mockmode,$mockmodestatus);
       
        if($result['apistatus'] == 'REGISTERED'){
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] ="Data Fetch Sucessfully";
            $output['data']= $result['data'];
            Session::put('remitter_mobileNumber', $request->mobile);
            Session::put('senderID', $result['data']->id);
            
        }
        else if($result['apistatus'] == 'NOT_REGISTERED'){
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter Fetch Data Failed";
            $output['data']= $result['data'];
            Session::put('rem_mobileNo', $request->mobile);
            
        }else {
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }

        return response()->json($output,200);
    
    }
    public function sendOtp(Request $request)
    {
            if($request->operation=='FUND_TRANSFER')
            {
           
           $rules=array(
                'operation' => 'required|in:FUND_TRANSFER,REMITTER_REGISTRATION', // operation must be one of these values
                'mobile' => 'required|numeric|digits:10', // mobile must be numeric and exactly 10 digits long
                'paymentMode' => 'required|in:Cash Payment,Account Deposit', // paymentMode must be one of these values
                'beneficiaryId' => 'required|exists:beneficiaries,id', // beneficiaryId must exist in the beneficiaries table's id column
                'transferAmount' => 'required|numeric|min:0', // transferAmount must be a non-negative numeric value
            );
        }else{
           
            $rules=array(
                'operation' => 'required|in:FUND_TRANSFER,REMITTER_REGISTRATION', // operation must be one of these values
                'mobile' => 'required|numeric|digits:10', // mobile must be numeric and exactly 10 digits long
             
                );
                $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
        }
       

        }
        $data['api']="indonepalsendOtp";
        $data["via"]="web";
        $data["operation"]=$request->operation;/*FundTransfer,RemitterRegistration*/
        $data["mobile"]=$request->mobile;
        $data["paymentMode"]=$request->paymentMode;/* (Account Deposit,Cash Payment)Mandatory(Optional If operation is Remitter Registration)*/
        $data["bankBranchId"]=$request->bankBranchId;/*Optional(Mandatory when paymentMode is Account Deposit)*/
        $data["accountNumber"]=$request->accountNumber;/*Optional(Mandatory when paymentMode is Account Deposit)*/
        $data["beneficiaryId"]=$request->beneficiaryId;/*Optional(Mandatory if operation is FundTransfer*/
        $data["transferAmount"]=$request->transferAmount;
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::sendOtp($data, $mockmode,$mockmodestatus);
        if($result['apistatus'] == 'OTP_SEND'){
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "OTP sent to remitter mobile number";
            $output['data']= $result['data'];
            
        }
        else if($result['apistatus'] == 'OTP_SEND_FAILED'){
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Could not send OTP to remitter mobile number.";
            $output['data']= $result['data'];
        }else {
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }

        return response()->json($output,200);
    
    
    }
    public function remitterRegistration(Request $request)
    {
       //dd($request->dob);
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
            'remitterType' => 'required|string|max:50',
            'incomeSourceType' => 'required|string|max:50',
            'annualIncome' => 'required',
            'otpReference' => 'required',
            //'otp' => 'required|numeric|max:6',
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
        }
        
        $data['api']="indonepalremitterRegistration";
        $data["via"]="web";
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

        $instantPay_RemitterReport =IndoNepalRemitters::create(['name'=>$request->name,
           'gender'=>$request->gender,
           'dob'=>$request->dob,
           'address'=>$request->address,
           'mobile'=>$request->mobileno,
           'state'=>$request->state,
           'district'=>$request->district,
           'city'=>$request->city,
           'nationality'=>$request->nationality,
           'email'=>$request->email,
           'employer'=>$request->employer,
           'idType'=>$request->idType,
           'idNumber'=>$request->idNumber,
           'idExpiryDate'=>$request->idExpiryDate,
           'idIssuedPlace'=>$request->idIssuedPlace,
           'incomeSource'=>$request->incomeSource,
           'remitterType'=>$request->remitterType,
           'incomeSourceType'=>$request->incomeSourceType,
           'annualIncome'=>$request->annualIncome,
           'otp'=>$request->otp,
           'status'=>'Pending',
           'user_id'=>\Auth::id()
        ]);
            $insertedId = $instantPay_RemitterReport->id;
        $result = \DmtApiv5::remitterRegistration($data, $mockmode,$mockmodestatus);

        if($result['apistatus'] == 'REGISTRATION_SUCCESSFUL'){

            $updateRemitterReport=IndoNepalRemitters::where('id',$insertedId)
            ->update([
            'status' =>'registered',
            'apiremark'=>$result['apiremark'],
            'remitter_id'=>$result['data']->id
                 ]);
            //$updateRemitterReport->status = "Registered";
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter registration successful";
            $output['data']= $result['data'];
            Session::put('rem_mobileNo', $result['data']->mobile);
            Session::put('senderID', $result['data']->id);
            
        }
        else if($result['apistatus'] == 'REGISTRATION_INPROCESS'){
           
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter registration is pending";
            $output['data']= $result['data'];
        }
        else if($result['apistatus'] == 'REGISTRATION_INVALID_INPUT'){
           
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = $result['message'];
            $output['data']= $result['data'];
        }else {
           
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }
        return response()->json($output,200);
    
    }
    public function remitterEkycInitiate(Request $request)
    {

        sleep(3);
        $rules=array( 
            'remitterId' => 'required|numeric'
         );
         $validator = \Validator::make($request->all(),$rules);
         if($validator->fails()){
          foreach($validator->errors()->messages() as $key => $value){
              $error = $value[0];
          }
          return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
         }
        $data['api']="indonepalremitterEkycInitiate";
        $data["via"]="web";
        $data["remitterId"] =$request->remitterId;
         $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::remitterEkycInitiate($data, $mockmode,$mockmodestatus);
        
        if($result['apistatus'] == 'RIMITTER_INITIATE_SUCCESSFUL'){ 
            $updateRemitterReport=IndoNepalRemitters::where('remitter_id',$request->remitterId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'rbl_pending',
            'apiremark'=>$result['apiremark'],
            'referenceKey'=>$result['data']->referenceKey
                 ]);
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter Ekyc Initiate Succesfully";
            $output['data']= $result['data'];
            Session::put('referenceKey', $result['data']->referenceKey);
           
            
        }
        else if($result['apistatus'] == 'REMITTER_INITIATE_FAILED'){
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Failed to Initiate Remitter Ekyc please try again";;
            $output['data']= $result['data'];
        }else {
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }
        return response()->json($output,200);
    
    }
    public function remitterEkycInitiateStatus(Request $request)
    {
        $rules=array(
            'remitterId' => 'required|numeric',
            'referenceKey' => 'required|string|max:255'
         );
         $validator = \Validator::make($request->all(),$rules);
         if($validator->fails()){
          foreach($validator->errors()->messages() as $key => $value){
              $error = $value[0];
          }
          return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
         }
        $data['api']="indonepalremitterEkycInitiateStatus";
        $data["via"]="web";
        $data["remitterId"] =$request->remitterId;
        $data["referenceKey"] =$request->referenceKey;
       
        $mockmode = true;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::remitterEkycInitiateStatus($data, $mockmode,$mockmodestatus);
       // dd($result);
        if($result['apistatus'] == 'EKYC_SUCCESSFUL'){ 
            $updateRemitterReport=IndoNepalRemitters::where('remitter_id',$request->remitterId)->where('user_id',\Auth::id())
            ->update([
            'apiremark'=>$result['apiremark'],
            'status' =>'rbl_done'
                 ]);
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = $result['message'];
            $output['data']= $result['data'];
           
            
        }
        else if($result['apistatus'] == 'EKYC_UNDER_PROCESS'){
            $output['status'] = "pending";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter eKYC is under process. Please wait or Do the completion.";
            $output['data']= $result['data'];
        }
        else if($result['apistatus'] == 'REMITTER_EKYC_FAILED'){
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Remitter eKYC failed. Please retry the RBL UIDAI verification again.";
            $output['data']= $result['data'];
        }else {
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }
        return response()->json($output,200);
    
    }
    public function remitterEkycProcess(Request $request)
    {
      //  dd($request->ekycdata);
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
             return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
            }
        $data['api']="indonepalremitterEkycProcess";
        $data["via"]="web";
       // $data["authenticationKey"] =$request->authenticationKey;
        $data["remitterId"] =$request->remitterId;
        $data["referenceKey"] =$request->referenceKey;
        $data["ekycdata"] =$request->ekycdata;
       
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::remitterEkycProcess($data, $mockmode,$mockmodestatus);
        if($result['apistatus'] == 'REMITTER_EKYC_SUCCESS'){
            $updateRemitterReport=IndoNepalRemitters::where('remitter_id',$request->remitterId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'ekyc_done'
                 ]);
        }
        else{
            $updateRemitterReport=IndoNepalRemitters::where('remitter_id',$request->remitterId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'ekyc_pending'
                 ]);
        }
       
        if($result['apistatus'] == 'REMITTER_EKYC_SUCCESS'){ 
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Biometric eKYC completed successfully.";
            $output['data']= $result['data'];
            
        }
        else if($result['apistatus'] == 'REMITTER_EKYC_UNDER_PROCESS'){
            
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Biometric eKYC is still processing. Please wait.";
            $output['data']= $result['data'];
        }
        else if($result['apistatus'] == 'REMITTER_EKYC_FAILED'){
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Biometric eKYC failed. Please try again.";
            $output['data']= $result['data'];
        }else {
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }
        return response()->json($output,200);
    
    }
    public function remitterUpdate(Request $request)
    {
        $rules=array(
            'remitterType' => 'required',
            'incomeSourceType' => 'required',
            'annualIncome' => 'required',
            'remitterId' => 'required'
        );
        $validator = \Validator::make($request->all(),$rules);
            if($validator->fails()){
             foreach($validator->errors()->messages() as $key => $value){
                 $error = $value[0];
             }
             return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
            }
        $data['api']="indonepalremitterUpdate";
        $data["via"]="web";
        $data["remitterType"] =$request->remitterType;
        $data["incomeSourceType"] =$request->incomeSourceType;
        $data["annualIncome"] =$request->annualIncome;
        $data["remitterId"] =$request->remitterId;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::remitterUpdate($data, $mockmode,$mockmodestatus);
        dd($result);
    
    }
    public function beneficiaryRegistration(Request $request)
    {
        
        $rules=array(
            'remitterMobile' => 'required|numeric|digits:10', // Assuming mobile numbers are strings and maximum length is 15
            'b_name' => 'required|string|max:255', // Assuming beneficiary name is a string with a maximum length of 255 characters
            'gender' => 'required|in:Female,Male,Other', // Assuming gender must be one of these values
            'b_mobile' => 'required|numeric|digits:10', // Assuming mobile numbers are strings and maximum length is 15
            'relationship' => 'required|string|max:255', // Assuming relationship is a string with a maximum length of 255 characters
            'address' => 'required|string|max:255', // Assuming address is a string with a maximum length of 255 characters
            'paymentMode' => 'required|in:Cash Payment,Account Deposit', // Assuming payment mode is a string with a maximum length of 255 characters
            'bankBranchId' => 'required|numeric', // Assuming bank branch ID is a numeric value
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
        }
        $data['api']="indonepalbeneficiaryRegistration";
        $data["via"]="web";
        $data["remitterMobile"]=$request->remitterMobile; 
        $data["name"]=$request->b_name;
        $data["gender"]=$request->gender;
        $data["mobile"]=$request->b_mobile;
        $data["relationship"]=$request->relationship;
        $data["address"]=$request->address;
        $data["paymentMode"]=$request->paymentMode;/* Payment mode Account Deposite then branch id and account number Mandatory*/
        $data["bankBranchId"]=$request->bankBranchId;
        $data["accountNumber"]=$request->accountno;
        $mockmode = false;
        //dd($data);
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::beneficiaryRegistration($data, $mockmode,$mockmodestatus);
       
        if($result['apistatus'] == 'BENEFICIARY_REGISTER_SUCCESSFULLY'){ 
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Beneficiary Added Successfully";
            $output['data']= $result['data'];
            
        }
        else if($result['apistatus'] == 'BENEFICIARY_REGISTER_FAILED'){
            
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Not able to add the Beneficiary please add valid data";
            $output['data']= $result['data'];
        }
        else {
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }
        return response()->json($output,200);
    
    }
    public function serviceCharge(Request $request)
    {
        $data['api']="indonepalserviceCharge";
        $data["via"]="web";
        $data["country"]=$request->country;
        $data["paymentMode"]=$request->paymentMode;
        $data["transferAmount"]=$request->transferAmount;
        $data["payoutAmount"]=$request->payoutAmount;
        $data["bankBranchId"]=$request->bankBranchId;
        $mockmode = false;
        $mockmodestatus="SUCCESS";//FAILED,PENDING
        $result = \DmtApiv5::serviceCharge($data, $mockmode,$mockmodestatus);
        if($result['apistatus'] == 'DATA_FETCHED_SUCCESSFUL'){ 
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Service charge retrieved successfully.";
            $output['data']= $result['data'];
            
        }
       
        else if($result['apistatus'] == 'DATA_FETCHED_FAILED'){
            
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Unable to Fetch the service Charge";
            $output['data']= $result['data'];
        }
        else {
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }
        return response()->json($output,200);
    
    
    
    }
    public function fundTransfer(Request $request)
    {
      
       $rules=array(
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
         return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
        }
        $data['api']="indonepalfundTransfer";
        $data["via"]="web";
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
        $data["latitude"]="10.0000";
        $data["longitude"]="20.0000";
        //$data["latitude"]=$request->latitude;
        //$data["longitude"]=$request->longitude;
        $mockmode = true;
        $mockmodestatus="FAILED";//FAILED,PENDING,SUCCESS
        if($request->receiver_paymentMode=='Cash Payment')
        {
            $paymentMode='cashpayment';
        }else{
            $paymentMode='accountdeposit';
        }
        $instantPayReportDmt =ReportDmt::create([
            'mobile'=>$request->remitterMobile,
            'txnid'=>$data["externalRef"],
            'sender_name'=>$request->sen_name,
            'beneficiary_id'=>$request->beneficiaryId,
            'beneficiary_name'=>$request->b_name,
            'beneficiary_account'=>$request->rec_account,
            'beneficiary_bankid'=>$request->rec_bankBranchId,
            'amount'=>$request->transferAmount,
            'transfer_mode'=>$paymentMode,
            'charge'=>$request->service_rate,
            'status'=>'pending',
            'source'=>'s2p',
            'api_id'=>'110',
            'via'=>$data["via"],
            'lat'=>"10.0000",
            'lon'=>"20.0000",
            'user_id'=>\Auth::id(),
            'ip'=>getHostByName(getHostName()),
        ]);
        $reportDmtinsertedId = $instantPayReportDmt->id;
        $result = \DmtApiv5::fundTransfer($data, $mockmode,$mockmodestatus);
        
        if($result['apistatus'] == 'TRANSFER_SUCCESSFUL'){ 
            $updateFundTransfer=ReportDmt::where('id',$reportDmtinsertedId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'success',
            'apiremark'=>$result['apiremark'],
            'refno'=>$result['data']->txnReferenceId,
            'refno2'=>$result['data']->poolReferenceId
                 ]);
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] ="Your transaction was successful.";
            if (isset($result['data']->pool)) {
                unset($result['data']->pool);
            }
            $output['data']= $result['data'];
        }
        else if($result['apistatus'] == 'TRANSFER_PENDING'){
            $updateFundTransfer=ReportDmt::where('id',$reportDmtinsertedId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'pending',
            'apiremark'=>$result['apiremark'],
            'refno'=>$result['data']->txnReferenceId,
            'refno2'=>$result['data']->poolReferenceId
                 ]);
            $output['status'] = "success";
            $output['act'] = "TERMINATE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Your transaction is under progress. Please wait.";
            if (isset($result['data']->pool)) {
                 unset($result['data']->pool);
            }
            $output['data']= $result['data'];
           
        }
        else if($result['apistatus'] == 'TRANSFER_FAILED'){
            $updateFundTransfer=ReportDmt::where('id',$reportDmtinsertedId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'failed',
            'apiremark'=>$result['apiremark'],
            'refno'=>$result['data']->txnReferenceId,
            'refno2'=>$result['data']->poolReferenceId
                 ]);
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Transaction Failed";
            if (isset($result['data']->pool)) {
                unset($result['data']->pool);
            }
            $output['data']= $result['data'];
           
        }
        else {
            $updateFundTransfer=ReportDmt::where('id',$reportDmtinsertedId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'failed',
            'apiremark'=>$result['apiremark'],
            'refno'=>$result['data']->txnReferenceId,
            'refno2'=>$result['data']->poolReferenceId
                 ]);
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }
        return response()->json($output,200);
    
    
    }
    public function fetchTransactionStatus(Request $request)
    {
        $rules=array(
            'ipayId' => 'required',
            
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
        }
        $data['api']="indonepalfetchTransactionStatus";
        $data["via"]="web";
        $data["ipayId"]=$request->ipayId;
        // $data["latitude"]=$request->latitude;
        // $data["longitude"]=$request->longitude;
        $data["latitude"]="10.0000";
        $data["longitude"]="20.0000";
        $mockmode = true;
        $mockmodestatus="PENDING";//FAILED,PENDING,SUCCESS
        $result = \DmtApiv5::fetchTransactionStatus($data, $mockmode,$mockmodestatus);
        if($result['apistatus'] == 'TRANSFER_SUCCESSFUL'){ 
            $updateFundTransfer=ReportDmt::where('refno2',$request->ipayId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'success',
            'apiremark'=>$result['apiremark'],
                 ]);
            $output['status'] = "success";
            $output['act'] = "CONTINUE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] ="Your transaction was successful.";
            if (isset($result['data']->pool)) {
                unset($result['data']->pool);
            }
            $output['data']= $result['data'];
        }
        else if($result['apistatus'] == 'TRANSFER_PENDING'){
            $updateFundTransfer=ReportDmt::where('refno2',$request->ipayId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'pending',
            'apiremark'=>$result['apiremark'],
                 ]);
            $output['status'] = "success";
            $output['act'] = "TERMINATE";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Your transaction is under progress. Please wait.";
            if (isset($result['data']->pool)) {
                 unset($result['data']->pool);
            }
            $output['data']= $result['data'];
           
        }
        else if($result['apistatus'] == 'TRANSFER_FAILED'){
            $updateFundTransfer=ReportDmt::where('refno2',$request->ipayId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'failed',
            'apiremark'=>$result['apiremark'],
                 ]);
            $output['status'] = "success";
            $output['act'] = "RETRY";
            $output['apistatus']=$result['apistatus'];
            $output['apiremark']=$result['apiremark'];
            $output['message'] = "Transaction Failed";
            if (isset($result['data']->pool)) {
                unset($result['data']->pool);
            }
            $output['data']= $result['data'];
           
        }
        else {
            $updateFundTransfer=ReportDmt::where('refno2',$request->ipayId)->where('user_id',\Auth::id())
            ->update([
            'status' =>'failed',
            'apiremark'=>$result['apiremark'],
                 ]);
            $output['status'] = "failed";
            $output['act'] = "TERMINATE";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            return response()->json($output,400);
        }
        return response()->json($output,200);
    
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
    public function indoNepalRemitterRegister(Request $request)
    {
           
        if(\Auth::check())
        {   
            $session_value = session()->all();
            if($request->mobile)
            {
                $mobile =$request->mobile;
            }else{
                $mobile =$session_value['rem_mobileNo'];
            }
         
            $user_id=\Auth::id();
            $statedata = IndiaStateDistrict::distinct()->select('state','stateCode')->get();
            $remitterInfo = IndoNepalRemitters::where('user_id',$user_id)->where('mobile',$mobile)->first();
            $version_value  = Global_Settings::get();
            $data['statedata']=$statedata;
            $data['remitterInfo']=$remitterInfo;
            $data['mobile']=$mobile;
            $data['version_value']=$version_value;
            if(isset($remitterInfo)){
              
            if( $remitterInfo->status=="pending") {
                $data["isEditable"]=true;
            }
            else{
                $data["isEditable"]=false;
            }
        }else{
            $data["isEditable"]=true;
        }
           //dd($data['version_value']);
            return view('frontend.remitterRegister',compact('data'));//blank
        }
        return redirect()->route('signIn')
            ->withErrors([
            'email' => 'Please login to Again.',
        ])->onlyInput('email');   
    }
    public function getDistrict(Request $request)
    {
       // dd($request->statecode);
       sleep(5);
            $data = IndiaStateDistrict::where('stateCode',$request->statecode)->distinct()->pluck('district');
          
           $output['status']='success';
           $output['message']='District Fetch Successfully';
           $output['apiremark']='District Fetch Successfully';
           $output['act']='CONTINUE';
           $output['data']=$data;
            return response()->json($output);
    }
    public function indoNepalDMT()
    {
        if(\Auth::check())
        {    
            $statedata = NepalStateDistrict::distinct()->select('state','stateCode')->get();
            $data['statedata']=$statedata;
            return view('frontend.instantPay',compact('data'));
            //return view('frontend.instantPay');//blank
        }
        return redirect()->route('signIn')
            ->withErrors([
            'email' => 'Please login to Again.',
        ])->onlyInput('email');   
    }
    public function getNepalDistrict(Request $request)
    {
       // dd($request->statecode);
            $data = NepalStateDistrict::where('state',$request->state)->distinct()->pluck('district');
           // dd($data);
           $output['status']='success';
           $output['message']='District Fetch Successfully';
           $output['apiremark']='District Fetch Successfully';
           $output['act']='CONTINUE';
           $output['data']=$data;
            return response()->json($output);
    }
    public function addBeneficiaryOtp(Request $request)
    {
        $session_value = session()->all();
        $rules=array(
            'name' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits:10',
        );
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
         foreach($validator->errors()->messages() as $key => $value){
             $error = $value[0];
         }
         return response()->json(['status' => 'failed','message' => $error, 'act'=>'RETRY'], 400);
        }
        $sendsmsdata['header'] =  "SECPAY";//\MyHelper::getObjectValue("companies", "id", $companyid, "senderid"); 
        $sendsmsdata['companyname'] = "Sec2pay";//\MyHelper::getObjectValue("companies", "id", $companyid, "sendername");
        //Anuja 201023
        $otp=rand(11111, 99999);
        $sendsmsdata['otp']=$otp;
        $sendsmsdata['name']=$request->name; //here add name
        $sendsmsdata['action']=$request->action;
        $sendsmsdata['submitotp']=$request->submitotp;
        
        $sendsmsdata['mobile']=$request->mobile;
        $sendsmsdata['source']="WEB";  
      // dd($sendsmsdata);
       // $sendsms=\MyHelper::sendSMS('settlement_bank_add', $sendsmsdata);
        $sendsms['status']='success';
        if($sendsmsdata['action']=='VERIFY_OTP')
        {
            if($sendsmsdata['submitotp']==$session_value['beneotp']){
            $output['status']='success';
            $output['message']= "OTP has been verified successfully!";
            $output['act']='CONTINUE';
            $output['action']=$sendsmsdata['action'];
            $output['apistatus']="OTP_VERIFIED";
            $output['apiremark']=$output['message'];
            
           // Session::put('beneotp', $otp);
            return response()->json($output,200);
        }else{
            return response()->json(['status' => 'failed','act' =>'RETRY','message' => 'Something Went wrong(STNF)','act'=>'TERMINATE'], 400);
        }
    }
        
    if($sendsmsdata['action']=='SEND_OTP'){
        if($sendsms['status'] != "failed"){
            
           // dd($sendsmsdata);
            $output['status']='success';
            $output['message']= "OTP has been sent successfully!";
            $output['act']='CONTINUE';
            $output['otp']=$otp;
            $output['action']=$sendsmsdata['action'];
            $output['apistatus']="OTP_SEND";
            $output['apiremark']=$output['message'];
            
            Session::put('beneotp', $otp);
            return response()->json($output,200);
        }else{
            return response()->json(['status' => 'failed','act' =>'RETRY','message' => 'Something Went wrong(STNF)','act'=>'TERMINATE'], 400);
        }
    }

      
    }
   
    
   
}
