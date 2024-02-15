<?php 
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DMTV4Controller;
use app\Helpers\PortalAPIHub;


class DMTV4Helper {

    public static function createpaysprintHeader()
    {
        $timestamp= time();
            $secret = "UFMwMDEyNGQ2NTliODUzYmViM2I1OWRjMDc2YWNhMTE2M2I1NQ==";
            $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
            $payload = json_encode(['timestamp' => $timestamp,'partnerId' => 'PS001', 'reqid'=>"C".time()]);
            $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
            $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
            $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
            $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
            $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
        
        // $header = [ 'Accept: application/json',
        //             'Content-Type: application/json',   
        //             'Authorisedkey:MzNkYzllOGJmZGVhNWRkZTc1YTgzM2Y5ZDFlY2EyZTQ=',
        //             'Token:'.$jwt
        //     ];
        $header= array(
            'Authorisedkey: MzNkYzllOGJmZGVhNWRkZTc1YTgzM2Y5ZDFlY2EyZTQ=',
            'Token:'. $jwt,
            'Content-Type: application/json',
            'accept: application/json'
        );
       
        
        $output["status"]="success";
        $output["apiUrl"]="https://paysprint.in/service-api/api/v1/service/dmt/";
       // $output["initiator_id"]=$initiator_id;
       // $output["usercode"]=$usercode;
      // $output["message"]="API not found, or service is down";
     //   $output["Authorisedkey"]="MzNkYzllOGJmZGVhNWRkZTc1YTgzM2Y5ZDFlY2EyZTQ=";
        $output["header"]=$header;
       //print_r($header);
        return $output;

    }
    public static function searchCustomer($data, $mockMode)
    {
        $paysprintData=self::createpaysprintHeader();
            if($paysprintData["status"]!="success"){
                $output["status"]="failed";
                $output["message"]=$paysprintData["message"];
                return $output;
            }

        $txnID=$data['txnid'];
        $product="PaysprintDMT";
        // $url=$paysprintData["apiUrl"]."customers/mobile_number:".$data["mobile"]."?initiator_id=".$paysprintData["initiator_id"]."&user_code=".$paysprintData["usercode"];
        $url=$paysprintData["apiUrl"]."remitter/queryremitter";
        $data['bank3_flag']='yes';
        $para['bank3_flag']=$data['bank3_flag'];
        $para['mobile']= $data['mobile'];
        $parameters=json_encode($para);

        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "YES", "DMTV4Helper", $txnID);
        
            if($result["code"]!=200){
                $Resmessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_REMMITER_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $result=array(
                "response" => array(
                    "status"=> false,
                    "response_code"=> 0,
                    "stateresp"=> "b3c1e519-cf15-4145-8c26-c3d03e9d2f00",
                    "message"=> "Remitter not registered OTP sent for new registration."
                  
            ),
                "error"=>"",
                "code" =>200,
                
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            return $output;
        }

        if($jsonD->response_code==1) //1== registered //code added by pooja jadhav
        {
            // $newdata['mobile']=$jsonD->data->mobile;
            // $newdata['mobile']=$data["mobile"];
            // $newdata['txnid']=$data["txnid"];
            // $beneficiaries=self::getBeneficiaries($newdata, $mockMode);
            
            $output['status'] = "success";
            $output['message'] = "Request completed";
            $output['apistatus']='REGISTERED';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['name'] = $jsonD->data->fname .' '.$jsonD->data->lname;
            $output['mobile']= $jsonD->data->mobile;
            $output['totallimit']= $jsonD->data->bank3_limit+$jsonD->data->bank2_limit+$jsonD->data->bank1_limit;
            $output['usedlimit']= 30000-$output['totallimit'];
            $output['usercode']= "NA";
            $output['statedesc']="NA";
            //above code parameter not in paysprint api
            $output['beneficiaries']="NA";
        } 
        else if ($jsonD->response_code==0)   //0==not registered  //code added by pooja jadhav
        { 
            $output['status'] = "success";
            // $output['act'] = "CONTINUE"; //050623 Vidyadhar
            $output['apistatus']='NOT_REGISTERED';
            $output['message']= "Number not registered for service.";
            $output['apiremark']= isset($jsonD->message) ? $jsonD->message : "NA";
            $output['stateresp']=$jsonD->stateresp;

        } 
       
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
        }
        
        return $output;

    }

    public static function registerCustomer($data, $mockMode)
    {
       
        
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }
        $para['mobile']= $data['mobile'];
        $para['firstname']=$data['firstname'];
        $para['lastname']= $data['lastname'];
        $para['address']=$data['address'];
        $para['otp']= $data['otp'];
        $para['pincode']=$data['pincode'];
        $para['stateresp']= $data['stateresp'];
        $para['bank3_flag']=$data['bank3_flag'];
        $para['dob']= $data['dob'];
        $para['gst_state']=$data['gst_state'];
        
         $parameters=json_encode($para);
        $txnID=rand();
        $product="PaysprintDMT";
       $url=$paysprintData["apiUrl"]."remitter/registerremitter";     
        if(!$mockMode){
            $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "YES", "DMTV4Helper", $txnID);
            if($result["code"]!=200){
                $Resmessage=json_decode($result['response']);
                $output["status"]="pending";
                $output['apistatus']='REGISTERTION_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
                  $output["code"]=$result["code"];
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $result=array(
                "response"=>array(
                    "status"=> true,
                    "response_code"=> 1,
                    "message"=> "Remitter Successfully Registered",
                    ),
                "error"=>"",
                "code" =>200,
                
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }
        
        
        if($result["code"]!=200){
            $output["status"]="pending";
            $output["message"]="External API call failed with ".$result["code"];
            return $output;
        }     
        if($mockMode){
            $jsonD=json_decode(json_encode($result["response"]));
        }else{
            $jsonD=json_decode(($result["response"]));
        }
        
        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            return $output;
        }

        if($jsonD->response_code==1) //1= registered //code added by pooja jadhav
        {
            $output['status'] = "success";
            $output['response_code'] = $jsonD->response_code;
            $output['apistatus']='REGISTRATION_SUCCESSFUL';
            $output['message']='Customer Registered !';
            $output['apiremark']= isset($jsonD->message) ? $jsonD->message : "NA";
            $output['otprefid'] = rand(111111111,999999999); //$jsonD->data->otp_ref_id; 010323 changed as per eko mail
            
        } 
        else if ($jsonD->response_code==0)   //0=err  //code added by pooja jadhav
        { 
            $output["status"]="success";
            // $output['act'] = "RETRY"; 
            $output['apistatus']='REGISTRATION_FAILED';
            $output['message']=isset($jsonD->message)? $jsonD->message : 'Could not register. Please try again';
            $output['apiremark']= isset($jsonD->message)? $jsonD->message : 'NA';
        } 
        else if ($jsonD->response_code==3)   //3=Invalid OTP  //code added by pooja jadhav
        { 
            $output["status"]="success";
            // $output['act'] = "RETRY"; 
            $output['apistatus']='Invalid OTP';
            $output['message']=isset($jsonD->message)? $jsonD->message : 'Could not register. Please Provide valid OTP';
            $output['apiremark']= isset($jsonD->message)? $jsonD->message : 'NA';
        }
        else if ($jsonD->response_code==4)   //4=Already register  //code added by pooja jadhav
        { 
            $output["status"]="success";
            // $output['act'] = "RETRY"; 
            $output['apistatus']='Customer already registered';
            $output['message']=isset($jsonD->message)? $jsonD->message : 'Could not register. Customer already registered';
            $output['apiremark']= isset($jsonD->message)? $jsonD->message : 'NA';
        }
        else if($jsonD->response_code==-1)   //-1=pending 
        {
            $output['status'] = "success";
            $output['apistatus']='REGISTRATION_PENDING';
            $output['message']= isset($jsonD->message)? $jsonD->message : 'Registration pending';
            $output['apireamrk']= isset($jsonD->message)? $jsonD->message : 'NA';
            $output['otprefid'] = rand(111111111,999999999); //$jsonD->data->otp_ref_id; 010323 changed as per eko mail
        }
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne, please try again";
            $output['apireamrk']= isset($jsonD->message)? $jsonD->message : 'NA';
        }

        return $output;
    }
    public static function addBeneficiary($data, $mockMode)
    {
       
	    
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }

        // dd($paysprintData["initiator_id"]);
        $para['mobile']=$data['mobile'];
        $para['benename']=$data['benename'];
        $para['bankid']=$data['bankid'];
        $para['accno']=$data['accno'];
        $para['ifsccode']=$data['ifsccode'];
        $para['verified']=$data['verified'];
        $para['gst_state']=$data['gst_state'];
        $para['dob']=$data['dob'];
        $para['address']=$data['address'];
        $para['pincode']=$data['pincode'];
         $parameters=json_encode($para);
             $txnID=rand();
        $product="PaysprintDMT";
        $url=$paysprintData["apiUrl"]."/beneficiary/registerbeneficiary";
        // $parameters='initiator_id='.$paysprintData["initiator_id"].'&recipient_mobile='.$data["b_mobile"].'&bank_id='.$data['bankid']
        // .'&recipient_type=3&recipient_name='.$data["b_name"].'&user_code='.$paysprintData["usercode"];
        // // $url=$paysprintData["apiUrl"].'customers/mobile_number:'.$data["mobile"]."/recipients?acc_ifsc=".$data["b_accountno"]."_".$data["b_ifsc"]; 

        if(!$mockMode){
            $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "YES", "DMTV4Helper", $txnID);
            if($result["code"]!=200){
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
                $Resmessage=json_decode($result['response']);
                $output["status"]="pending";
                $output['apistatus']='ADD_BENE_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')'; 
                $output["code"]=$result["code"];   
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $result=array(
                 "response" => array(
                    "status"=> true,
                    "response_code"=> 1,
                    "data"=> [
                        "bene_id"=> 900,
                        "bankid"=> "309",
                        "bankname"=> "HDFC BANK",
                        "name"=> "XYZ ABCD",
                        "accno"=> "5XXXXXXXXXXX2",
                        "ifsc"=> "HDFC000XXX5",
                        "verified"=> "0",
                        "banktype"=> "ALL",
                        "status"=> 1,
                        "bank3"=> true
                    ],
                    "message"=> "Receiver account successfully added."
                ),
                    "error" => "",
                    "code" => 200
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }
        
        
        
        if($result["code"]!=200){
            $output["status"]="pending";
            $output["message"]="External API call failed with ".$result["code"];
            return $output;
        }         
        
      
        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            return $output;
        }

        if($jsonD->response_code==1) //1= registered  //code added by pooja jadhav check
        {
            $output['status'] = "success";
            $output['apistatus']='BENEFICIARY_REGSUCCESS';
            $output['message']= "Beneficiary successfuly registered";
            $output["apiremark"]=isset($jsonD->message) ? $jsonD->message : "NA";
            $output["beneficiary_id"]=isset($jsonD->data->bene_id) ? $jsonD->data->bene_id : "NA";
            $output["beneficiary_data"]=isset($jsonD->data) ? $jsonD->data : "NA";
            
        } 
        // else if ($jsonD->response_code==-1)   
        // { 
        //     $output['status'] = "success";
        //     $output['apistatus']='BENEFICIARY_ALREADYEXISTS';
        //     $output["message"] =  "Failed to add beneficiary. Beneficiary already exists";
        //     $output['apiremark']= isset($jsonD->message) ? $jsonD->message : 'NA';
        // }
        else if ($jsonD->response_code==0)   //0=err //code added by pooja jadhav
        { 
            $output['status'] = "success";
            $output['apistatus']='BENEFICIARY_REGFAILED';
            $output["apiremark"] = isset($jsonD->message) ? $jsonD->message : "NA";
            $output['message']= isset($jsonD->message) ? $jsonD->message : 'Failed to add beneficiary. Please try again';
        } 
        else if ($jsonD->response_code==3)   //3=err //code added by pooja jadhav check
        { 
            $output['status'] = "success";
            $output['apistatus']='Remitter accounts not found for this Mobile no';
            $output["apiremark"] = isset($jsonD->message) ? $jsonD->message : "NA";
            $output['message']= 'Failed to add beneficiary. Remitter accounts not found  for this Mobile no';
        } 
         
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "API call faield, Please try again";
        }
        
        return ($output);  
    }
    public static function getBeneficiaries($data, $mockMode)
    {
       
	    
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }
        
        $para['mobile']=$data['mobile'];
        $parameters=json_encode($para);
            $txnID=rand();
       $product="PaysprintDMT";
       $url=$paysprintData["apiUrl"]."/beneficiary/registerbeneficiary/fetchbeneficiary";
        
        if(!$mockMode){
            $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "yes", "DMTV4Helper", $txnID);
            // dd(json_decode($result["response"])->response_status_id);
            $Resmessage=json_decode($result['response']) ;
                        if($result["code"]!=200){
                $output["status"]="pending";
                $output['apistatus']='GET_BENE_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')'; 
                 $output["code"]=$result["code"];
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            
            $result= array('response'=>array( "status"=> true,
            "response_code"=> 1,
            "data"=> [
              [
                "bene_id"=> "9XXXXX4",
                "bankid"=> "309",
                "bankname"=> "HDFC BANK",
                "name"=> "XYZ ABCD",
                "accno"=> "5XXXXXXXXXX2",
                "ifsc"=> "HDFC0000XXX",
                "verified"=> "0",
                "banktype"=> "ALL",
                "paytm"=> true
              ]
            ]),
            	"error" => "",
            	"code" => 200
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }
        
    
        if($result["code"]!=200){
            $output["status"]="pending";
            $output["message"]="External API call failed with ".$result["code"].''.$result["message"];
            $output["code"]= $result["code"];
            return $output;
        }   
        
        if(!$mockMode){
            $jsonD=json_decode(($result["response"]));
        }else{
            $jsonD=json_decode(json_encode($result["response"]));
        }
        
        // $jsonD=json_decode(($result["response"]));
        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            return $output;
        }

        if($jsonD->response_code==1) //1= registered // code added by pooja jadhav
        {
            $output['status'] = "success";
            $output['code'] = $result["code"];
            $output['apistatus']='LIST_FETCHED';
            $output['message']='Beneficiary list fetched';
            $output['apiremark']= isset($jsonD->message) ? $jsonD->message : "NA";
            //exit();
            $benedatas = [];
            if(sizeof($jsonD->data) > 0){
                foreach ($jsonD->data as $value) {
                    $benedata['b_id']   = $value->bene_id;
                    $benedata['b_name'] = $value->name;
                    $benedata['b_account'] = $value->accno;
                    $benedata['b_mobile']  = "NA";
                    $benedata['b_bank'] = $value->bankname;
                    $benedata['b_ifsc'] = $value->ifsc;
                    $benedata['b_bankid'] = $value->bankid;
                    $benedata['b_status'] = $value->verified;
                    $benedata['banktype'] = $value->banktype;
                    $benedata['paytm'] = $value->paytm;
                   
                    $benedatas[] = $benedata;
                }
            }
            $output['beneficiary'] = $benedatas;
        } 
        // else if ($jsonD->response_code==1 || $jsonD->response_code== -1)   //1=err
        // { 
        //     $output['status'] = "success";
        //     $output['code'] = $result["code"];
        //     $output['apistatus']='LIST_EMPTY';
        //     $output['message']='Could not fetch beneficiaries';
        //     $output['apiremark']= isset($jsonD->message) ? $jsonD->message : 'Could not fetch beneficiary list';
        // } 
        else if ($jsonD->response_code==2)   //3=err //code added by pooja jadhav
        { 
            $output['status'] = "success";
            $output['apistatus']='Remitter accounts not found for this Mobile no';
            $output["apiremark"] = isset($jsonD->message) ? $jsonD->message : "NA";
            $output['message']= 'Remitter record not found  for this Mobile no';
        } 
        else 
        {
            $output['status'] = "failed";
            $output['code'] = $result["code"];
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne, please try again";
            $output['apireamrk']= isset($jsonD->message)? $jsonD->message : 'NA';
        }

        return $output;

    }
    public static function deleteBeneficiaries($data, $mockMode)
    {
       
	    
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }
        
        $para['mobile']=$data['mobile'];
        $para['bene_id']=$data['bene_id'];
        $parameters=json_encode($para);
            $txnID=rand();
       $product="PaysprintDMT";
       $url=$paysprintData["apiUrl"]."/beneficiary/registerbeneficiary/deletebeneficiary";
        //$product="EkoDMT";
        // $url=$paysprintData["apiUrl"].'customers/mobile_number:'.$data["mobile"]."/recipients?initiator_id=".$paysprintData["initiator_id"]."&user_code=".$paysprintData["usercode"]; 


        if(!$mockMode){
            $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "yes", "DMTV4Helper", $txnID);
            // dd(json_decode($result["response"])->response_status_id);
          // print_r(json_decode($result['response'])->response_code);
          $Jes=json_decode($result['response']);
            if($result["code"]!=200){
                $Resmessage=json_decode($result['response'])  ;
                $output["status"]="pending";
                $output['apistatus']='DELETED_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
                $output["code"]=$result["code"];
                
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            
            $result= array('response'=>array( "status"=> true,
            "response_code"=> 1,
            "message"=> "Beneficiary record deleted successfully."
          ),
            	"error" => "",
            	"code" => 200
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }
        
        
        // $jsonD=json_decode(($result["response"]));
        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apiremark']= $output["message"];
            
            return $output;
        }

        if($jsonD->response_code==1) //1= registered // code added by pooja jadhav
        {
            $output['status'] = "success";
            $output['code'] = $result["code"];
            $output['apistatus']='BENEFICIARY_DELETED';
            $output['message']='Beneficiary record deleted successfully';
            $output['apiremark']= isset($jsonD->message) ? $jsonD->message : "NA";
            
        } 
        else if ($jsonD->response_code==2)   //2=Details not found
        { 
            $output['status'] = "success";
           
            $output['apistatus']='NOT_FOUND';
            $output['message']='Beneficiary or Remitter details not found.';
            $output['apiremark']= isset($jsonD->message) ? $jsonD->message : 'Beneficiary or Remitter details not found.';
            $output['code'] = $result["code"];
        } 
       
        // else if($jsonD->response_code==-1)   //-1=pending 
        // {
        //     $output['status'] = "success";
        //     $output['code'] = $result["code"];
        //     $output['apistatus']='ALREADY_Deleted';
        //     $output['message']= isset($jsonD->message)? $jsonD->message : 'Deleted beneficiary pending';
        //     $output['apireamrk']= isset($jsonD->message)? $jsonD->message : 'NA';
        // }
        else if($jsonD->response_code==0)   //0=unable to delete 
        {
            $output['status'] = "success";
            $output['code'] = $result["code"];
            $output['apistatus']='BENEFICIARY_UNABLE_TO_DELETE';
            $output['message']= isset($jsonD->message)? $jsonD->message : 'Unable to Deleted beneficiary';
            $output['apireamrk']= isset($jsonD->message)? $jsonD->message : 'NA';
        }
        
        else 
        {
            $output['status'] = "failed";
            $output['code'] = $result["code"];
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne, please try again";
            $output['apireamrk']= isset($jsonD->message)? $jsonD->message : 'NA';
        }

        return $output;

    }

    public static function accountVerification($data, $mockMode)
    {
       
	    
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }

        $para['mobile']=$data['mobile'];
        $para['accno']=$data['accno'];
        $para['bankid']=$data['bankid'];
        $para['benename']=$data['benename'];
        $para['referenceid']=$data['referenceid'];
        $para['pincode']=$data['pincode'];
        $para['address']=$data['address'];
        $para['dob']=$data['dob'];
        $para['gst_state']=$data['gst_state'];
        $para['bene_id']=$data['bene_id'];
        $parameters=json_encode($para);
             $txnID=rand();
        $product="PaysprintDMT";
        $url=$paysprintData["apiUrl"]."/beneficiary/registerbeneficiary/benenameverify";

        if(!$mockMode){
            $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "YES", "DMTV4Helper", $txnID);
            if($result["code"]!=200){
                $Resmessage=json_decode($result['response']);
                $output["status"]="pending";
                $output['apistatus']='TRANS_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
               
                $output["code"]=$result["code"];
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $result=array(
                 "response" => array(
                    "status"=> true,
                    "response_code"=> 1,
                    "utr"=> "2XXXXXXXXXX7",
                    "ackno"=> 13943433,
                    "txn_status"=> 1,
                    "benename"=> "Mr  XYZ ABCD",
                    "message"=> "Transaction Successful",
                    "balance"=> 20085.14,
                    "refid"=> "1XXXX0"
                    
                ),
                    "error" => "",
                    "code" => 200
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }
                 
        
        if(!$mockMode){
            $jsonD=json_decode(($result["response"]));
        }else{
            $jsonD=json_decode(json_encode($result["response"]));
        }
        
        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            return $output;
        }
        if($jsonD->response_code==1)
        {
                if($jsonD->txn_status==1) //1= registered  //code added by pooja jadhav
                {
                    $output['status'] = "success";
                    $output['apistatus']='TRANSFER_SUCCESSFUL';
                    $output['message']= "Transaction successfull";
                    $output["apiremark"]=isset($jsonD->message) ? $jsonD->message : "NA";
                    $output["utr"]=isset($jsonD->utr) ? $jsonD->utr : "NA";
                    $output["ackno"]=isset($jsonD->ackno) ? $jsonD->ackno : "NA";
                    $output["txn_status"]=isset($jsonD->txn_status) ? $jsonD->txn_status : "NA";
                    $output["benename"]=isset($jsonD->benename) ? $jsonD->benename : "NA";
                
                } 
                //2=Transaction In Process 3=Transaction Sent To Bank  4=Transaction on Hold
                else if(in_array($jsonD->txn_status, [2,3,4])) {
                    $output['status'] = "success";
                    $output['apistatus']='TRANSFER_PENDING';
                    $output['message']= "Transfer Pending";
                    $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                    $output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
                   // $output['balance']=isset($jsonD->balance) ? $jsonD->balance : 'NA';
                   
                   // $output['refno']=isset($jsonD->data->bank_ref_num) ? $jsonD->data->bank_ref_num : 'NA';
                    // $output['tid']=isset($jsonD->data->tid) ? $jsonD->data->tid : 'NA';
                    $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
                // global else, unknown fallback-pending case
                }
            }
         
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "API call faield, Please try again";
        }
        
        return ($output);  
    }
    public static function DMTTransfer($data, $mockMode) 
    {
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            $output["apiremark"]=$output["message"];
            return $output;
        }
	    //dd($data);
        $para['mobile']=$data['customer_mobile'];
        $para['referenceid']=$data['txnid'];
      //$para['pipe']=$data['pipe'];
        $para['pipe']="bank1";
        $para['pincode']=$data['pincode'];
        $para['address']=$data['address'];
        $para['dob']=$data['dob'];
        $para['gst_state']=$data['gst_state'];
        $para['bene_id']=$data['b_id'];
       
        $para['txntype']=$data['transfer_mode'];
        $para['amount']=$data['amount'];
        $parameters=json_encode($para);
            // $txnID=rand();
        $product="PaysprintDMT";
        $url=$paysprintData["apiUrl"]."/transact/transact";

        if(!$mockMode){
            $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "YES", "DMTV4Helper", $data['txnid']);
            if($result["code"]!=200){
                $Resmessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='TRANSFER_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
                $output["apiremark"]=isset($Resmessage->message) ? $Resmessage->message : "NA";
                
                $output["code"]=$result["code"];
                   return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $result= array(
                    "response"=>array(
                        "status"=> true,
                        "response_code"=> 1,
                        "ackno"=> "XXXX",
                        "utr"=> "XXXXXXXXXXX",
                        "txn_status"=> 1,
                        "benename"=> "BENE NAME",
                        "remarks"=> "Transaction Successful - BENE NAME",
                        "message"=> "Transaction Successful.",
                        "customercharge"=> "40.00",
                        "gst"=> "6.10",
                        "tds"=> "1.57",
                        "netcommission"=> "29.83",
                        "remitter"=> "9515979805",
                        "account_number"=> "48580100004968",
                        "paysprint_share"=> "2.5",
                        "txn_amount"=> "4000",
                        "balance"=> 2135786.5
                      
                ),
                "error" => "",
                "code" => 200
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }
        

        if($result["code"]!=200){
            $output["status"]="success";
            $output['apistatus']='TRANSFER_PENDING';
            $output["message"]="External API call failed with ".$result["code"];
            $output['apiremark']=$output["message"];
            $output['act']='TERMINATE';
            return $output;
        }         
        if($mockMode){
            $jsonD=json_decode(json_encode($result["response"]));
        }else{
            $jsonD=json_decode(($result["response"]));
        }
        
        
        // dd($jsonD);
        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apiremark']=$output["message"];
            return $output;
        }
        
        // dd($jsonD);

        if($jsonD->response_code==1)  //1==Sucess code added by pooja jadhav 
         {
            //0= SUCCESS
            // dd($jsonD->data->client_ref_id);
            if($jsonD->txn_status==1) //1==Sucessfully transations code added by pooja jadhav 
            {
                $output['status'] = "success";
                $output['apistatus']='TRANSFER_SUCCESSFUL';
                $output['message']= "Transfer successful";
                $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                $output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
                $output['balance']=isset($jsonD->balance) ? $jsonD->balance : 'NA';
                $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
                $output['tid']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';


            //0 = FAILED    5=Transaction Failed
            }else if(in_array($jsonD->txn_status,[0,5])) //Failed Transaction code added by pooja jadhav
             {
                $output['status'] = "success";
                $output['apistatus']='TRANSFER_FAILED';
                $output['message']= "Transfer Failed";
                $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                $output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
                $output['balance']=isset($jsonD->balance) ? $jsonD->balance : 'NA';
                $output['tid']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                $output['apiremark']=isset($jsonD->reason) ? $jsonD->reason : "NA";
            //2 = Transaction In Process     3 = Transaction Sent To Bank     4 =Transaction on Hold 
            }else if(in_array($jsonD->txn_status, [2,3,4])) {
                $output['status'] = "success";
                $output['apistatus']='TRANSFER_PENDING';
                $output['message']= "Transfer Pending";
                $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                $output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
                $output['balance']=isset($jsonD->balance) ? $jsonD->balance : 'NA';
                $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
                $output['tid']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';

            // global else, unknown fallback-pending case
            }else{
                $output['status'] = "success";
                $output['apistatus']='TRANSFER_PENDING';
                $output['message']= "Unknown response received, transaction pending";
                $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                $output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
                $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
                $output['tid']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';

            }

        }else if($jsonD->response_code==0){ 
            $output['status'] = "failed";
            $output['apistatus']='TRANSFER_FAILED';
            $output['message']= isset($jsonD->data->reason) ? $jsonD->data->reason : "NA";
            $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
            $output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
            $output['balance']=isset($jsonD->balance) ? $jsonD->balance : 'NA';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['tid']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';


        }else{ //global else, unknown fallback-pending case
            $output['status'] = "success";
            $output['apistatus']='TRANSFER_PENDING';
            $output['message']= "Unknown response received, transaction pending";
            $output['refno']=isset($jsonD->data->bank_ref_num) ? $jsonD->data->bank_ref_num : 'NA';
            $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
            $output['tid']=isset($jsonD->data->tid) ? $jsonD->data->tid : 'NA';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
        }
        return $output;
        
    }
    public static function DMTTrans_status($data, $mockMode)
    {
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            $output['apiremark']=$output["message"];
            return $output;
        }
       $para['referenceid']=$data['referenceid'];
        $parameters=json_encode($para);
             $txnID=rand();
        $product="PaysprintDMT";
        $url=$paysprintData["apiUrl"]."/transact/transact/querytransact";


        $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "YES", "DMTV4Helper", $txnID);
        // dd(json_decode($result["response"]));
        if($result["code"]!=200){

            $Resmessage=json_decode($result['response']);
            $output["status"]="success";
            $output['apistatus']='TRANS_PENDING';
            $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
            $output['apiremark']= isset($Resmessage->message) ? $Resmessage->message : "NA";
 
            $output["code"]=$result["code"];
              return $output;
        }         
        $jsonD=json_decode(($result["response"]));


        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apiremark']= $output["message"];
            return $output;
        }

        //some response came
            if($jsonD->response_code==1)  //successful
            {
                $output['status'] = "success";
                $output['apistatus']='TRANSFER_SUCCESSFUL';
                $output['message']="Transaction query completed";
               $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                $output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
                $output['refundtxnid'] = isset($jsonD->refundtxnid) ? $jsonD->refundtxnid : 'NA';
                $output['daterefunded'] = isset($jsonD->daterefunded) ? $jsonD->daterefunded : 'NA';
                $output['amount'] = isset($jsonD->amount) ? $jsonD->amount : 'NA';
                $output['apiremark']= isset($jsonD->message) ? $jsonD->message : "NA";
                $output['tid']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
            }
            elseif($jsonD->response_code==0) { //0=fail
                $output['status'] = "failed";
                $output['apistatus']='TRANSFER_FAILED';
                $output['message']="Transaction query completed";
                $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                $output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
                $output['amount'] = isset($jsonD->amount) ? $jsonD->amount : 'NA';
                $output['apiremark']= isset($jsonD->message) ? $jsonD->message : "NA";
            } 
            elseif($jsonD->response_code==2) { //2=Transaction not found.
                $output['status'] = "success";
                $output['apistatus']='TRANSFER_FAILED';
                $output['message']="Transaction not Found";
                $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : "NA";
               $output['refno']=isset($jsonD->utr) ? $jsonD->utr : "NA";
              $output['amount'] = isset($jsonD->amount) ? $jsonD->amount : "NA";
                $output['apiremark']= isset($jsonD->message) ? $jsonD->message : "NA";
            } 
            else{
                $output['status'] = "success";
                $output['apistatus']='TRANSFER_PENDING';
                $output['message']= "Unknown response received, transaction pending";
               // $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : 'NA';
                //$output['refno']=isset($jsonD->utr) ? $jsonD->utr : 'NA';
               $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            }

           
       

        return $output;
    }
    public static function sendRefundOTP($data, $mockMode)
    {
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }
       $para['referenceid']=$data['referenceid'];
       $para['ackno']=$data['ackno'];

        $parameters=json_encode($para);
             $txnID=rand();
        $product="PaysprintDMT";
        $url=$paysprintData["apiUrl"]."/refund/refund/resendotp";

    
        if(!$mockMode){
            $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "YES", "DMTV4Helper", $txnID);
            if($result["code"]!=200){
                $Resmessage=json_decode($result['response'])  ;
                $output["status"]="sucess";
                $output['apistatus']='REFUND_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
                $output["code"]=$result["code"];
            
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $result= array("response" => array("status"=> true,
            "response_code"=> 1,
            "message"=> "Refund Otp Successfully Sent."
            	),	
              "error" => "",
              "code" => 200,
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }

        
        if($result["code"]!=200){
            $output["status"]="pending";
            $output["message"]="External API call failed with ".$result["code"];
            return $output;
        }         
        $jsonD=json_decode(json_encode($result["response"]));
        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            return $output;
        }

        if($jsonD->response_code == 1) //1==Sucessful code added by pooja
         {
            $output["status"]="Success";
            $output["apistatus"]="REQUEST_SUCCESS";
            $output["message"]="Request successful";
            $output["apiremark"]= isset($jsonD->message) ? $jsonD->message : "NA";
        }
        else if($jsonD->response_code == 2) //2==Sucessful Already Refunded code added by pooja
         {
            $output["status"]="Success";
            $output["apistatus"]="REQUEST_SUCCESS";
            $output["message"]="Transaction not found or already refunded";
            $output["apiremark"]= isset($jsonD->message) ? $jsonD->message : "NA";
         }else{
            $output["status"]="Success";
            $output["apistatus"]="REQUEST_FAILED";
            $output["message"]="Failed to send OTP. Please try again";
            $output["apiremark"]= isset($json->message) ? $jsonD->message : "NA";
        }

        return $output;


    }
    public static function refundTransaction($data, $mockMode)
    { 
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }
       $para['referenceid']=$data['referenceid'];
       $para['ackno']=$data['ackno'];
       $para['otp']=$data['otp'];
       $parameters=json_encode($para);
             $txnID=rand();
        $product="PaysprintDMT";
        $url=$paysprintData["apiUrl"]."/refund/refund/";

        if(!$mockMode){
            $result=\PortalAPIHub::curl($product, $url, "POST", $parameters, $paysprintData["header"], "YES", "DMTV4Helper", $txnID);
            if($result["code"]!=200){
                $Resmessage=json_decode($result['response'])  ;
                $output["status"]="sucess";
                $output['apistatus']='REFUND_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$Resmessage->message.')';
                $output["code"]=$result["code"];
            
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $result= array("response" => array(
                "status"=> true,
                "response_code"=> 1,
                "message"=> "Transaction Successfully Refunded"
              
            	),	
              "error" => "",
              "code" => 200,
            );
            $jsonD=json_decode(json_encode($result["response"]));
        }
          
       // $jsonD=json_decode(($result["response"]));
        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            return $output;
        }

        if($jsonD->response_code==1) //1==Successful refund
        {
            $output["status"]="success";
            $output["apistatus"]="REFUND_SUCCESS";
            $output["message"]="Refund successful";
            $output["apiremark"]= isset($json->message) ? $jsonD->message : "NA";
            $output["refundrefno"]=isset($jsonD->data->refund_tid) ? $jsonD->data->refund_tid : "NA";
        }else{
            $output["status"]="success";
            $output["apistatus"]="REFUND_FAILED";
            $output["message"]="Refund failed. Please try again";
            $output["apiremark"]= isset($jsonD->message) ? $jsonD->message : "NA";
        }
        return $output;
    }
}