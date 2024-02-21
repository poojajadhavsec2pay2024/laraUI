<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Helpers\DMTV5Helper;
use Session;
use App\models\IndiaStateDistrict;
use App\models\NepalDtateDistrict;
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
      
        $data['api']="instantpayactivationStatus";
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
        
        $data['api']="instantpayvalidateoutletdetailss";
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
        $data['api']="instantpayvalidateoutletdetailss";
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
        $data['api']="instantpayactivationStatus";
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
            'type' => 'required'
          
         ]);
        $data['api']="instantpaystaticData";
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
            'paymentMode' => 'required',
            'state' => 'required',
            'district' => 'required'
         ]);
        $data['api']="instantpaymentLocationList";
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
            'country' => 'required'
         ]);
        
        $data['api']="instantpaystateDistrict";
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
       
        $data['api']="instantpayremitterProfile";
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
            $request->validate([
                'operation' => 'required',
                'mobile' => 'required',
                'paymentMode' => 'required',
                'beneficiaryId' => 'required',
                'transferAmount' => 'required' 
            ]);
        }else{
            $request->validate([
                'operation' => 'required',
                'mobile' => 'required',
            ]);
        }
        $data['api']="instantpaysendOtp";
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
        $request->validate([
            'name' => 'required|max:32',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'mobileno' => 'required',
            'state' => 'required',
            'district' => 'required',
            'city' => 'required',
            'nationality' => 'required',
            'email' => 'required|email',
            'employer' => 'required',
            'idType' => 'required',
            'idNumber' => 'required',
            'incomeSource' => 'required',
            'remitterType' => 'required',
            'incomeSourceType' => 'required',
            'annualIncome' => 'required',
            'otpReference' => 'required',
            'otp' => 'required'
        ]);
        
        $data['api']="instantpayremitterRegistration";
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
        $request->validate([
            'remitterId' => 'required'
         ]);
        $data['api']="instantpayremitterEkycInitiate";
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
        $request->validate([
            'remitterId' => 'required',
            'referenceKey' => 'required'
         ]);
        $data['api']="instantpayremitterEkycInitiateStatus";
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
            $request->validate([
                'remitterId' => 'required',
                'referenceKey' => 'required',
                'ekycdata' => 'required'
            ]);
        $data['api']="instantpayremitterEkycProcess";
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
        $request->validate([
            'remitterType' => 'required',
            'incomeSourceType' => 'required',
            'annualIncome' => 'required',
            'remitterId' => 'required'
        ]);
        $data['api']="instantpayremitterUpdate";
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
        $request->validate([
            'remitterMobile' => 'required',
            'b_name' => 'required',
            'gender' => 'required',
            'b_mobile' => 'required',
            'relationship' => 'required',
            'address' => 'required',
            'paymentMode' => 'required',
            'bankBranchId' => 'required',
        ]);
        $data['api']="instantpaybeneficiaryRegistration";
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
        $data['api']="instantpayserviceCharge";
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
       // dd($request->all());
        $data['api']="instantpayfundTransfer";
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
        $data['api']="instantpayfetchTransactionStatus";
        $data["via"]="web";
        $data["ipayId"]=$request->ipayId;
        $data["latitude"]=$request->latitude;
        $data["longitude"]=$request->longitude;
        $mockmode = false;
        $mockmodestatus="PENDING";//FAILED,PENDING
        $result = \DmtApiv5::fetchTransactionStatus($data, $mockmode,$mockmodestatus);
        dd($result);
    
    }
    public function viewHistory(Request $request, $type,$id=0)
    {
        if(\Auth::check())
        {  
            $user = \Auth::User();
        ini_set('memory_limit', '-1');
        // if($id != 0){
        //     $userid=$id;
        //     $data['user']=User::where('id',$userid)->first(["name", "id", "role_id","scheme_id", "wl_id","ent_id","dt_id","md_id"]);
        //     $finalaray["id"] = $userid;
        // }else{
        //     $userid=\Auth::id();
        //     $data['user']=User::where('id',$userid)->first(["name", "id", "role_id","scheme_id", "wl_id","ent_id","dt_id","md_id"]);
        // }
               $thdata['id']='ID';
               $thdata['srno']='Sr.no';
               $thdata['Date']='Date';
               $thdata['txnid']='Transaction Id';
               $thdata['providename']='Provider';
               $thdata['user']='User';
               $thdata['amount']='Amount';
               $thdata['commission']='Profit';
               $thdata['user_tds']='User Tds';
               $thdata['refno']='Reference. no';
               $thdata['status']='Status';
               $thdata['userid'] = 'User Id';
               $thdata['name']='Member Details';
               $thdata['parentname']='Parent Details';
               $thdata['remark']='Remark';
           
               $thdata['statuss']='Status';
               $thdata['role']='User Role';
               $currentDate = Carbon::now()->format('Y-m-d');
               $user=Auth::user();
               $tddata=array();
    		   $returnArray=array();
    		   $finalArray=array();
               $finalArray['thdata'] = $thdata;
               if(empty($finalArray['tddata']))
               {
                   $finalArray['tddata'] = array();
               }else{
                   $finalArray['thdata'] = $thdata;
               }

            $encryptedData["tddata"] = $finalArray['tddata'];
            $encryptedData["thdata"] =  $finalArray['thdata'];
            /*--------Abhishek Complaint Change 140224-START----------*/
             //$complaintCategories = ComplaintCategory::all(); 
             $encryptedData["complaintCategories"] = "";  
             $encryptedData["service"] =  "indonepaldmt"; 
              /*--------Abhishek Complaint Change 140224--END---------*/
            if((isset($request->fromdate) && !empty($request->fromdate)) 
               && (isset($request->todate) && !empty($request->todate))){
                  $encryptedData["from_date"] =  $request->fromdate;
                  $encryptedData["to_date"] =  $request->todate;
                   $encryptedData["status"] =  $request->status;
               }else{
                  $encryptedData["from_date"] =  $currentDate;
                  $encryptedData["to_date"] =  $currentDate;
                   $encryptedData["status"] =  '';
               }
            //return view('frontend.viewhistory');//blank
            return view('frontend.viewhistory.'.$type)->with($encryptedData);
        }
        return redirect()->route('signIn')
            ->withErrors([
            'email' => 'Please login to Again.',
        ])->onlyInput('email');  
    
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
    public function instantPayRemitterRegister(Request $request)
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
           // dd($data);
           $output['status']='success';
           $output['message']='District Fetch Successfully';
           $output['apiremark']='District Fetch Successfully';
           $output['act']='CONTINUE';
           $output['data']=$data;
            return response()->json($output);
    }
    public function instantPayDMT()
    {
        if(\Auth::check())
        {    
            $statedata = NepalDtateDistrict::distinct()->select('state','stateCode')->get();
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
            $data = NepalDtateDistrict::where('state',$request->state)->distinct()->pluck('district');
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
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);
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
