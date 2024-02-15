<?php 
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AEPSV2Controller;
use app\Helpers\PortalAPIHub;


class AEPSV2OnboardingHelper {

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
        $output["apiUrl"]="https://paysprint.in/service-api/api/v1/service/aeps/";
        $output["header"]=$header;
       //print_r($header);
        return $output;

    }
    public static function merchantOnboarding($data, $mockMode)
    {
        
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }
        $prefix="S2M";
        $txnid = $prefix.rand(1111111111, 9999999999);
         $para['merchantmobilenumber']=$data['merchantmobilenumber'];
         $para['latitude']= $data['latitude'];
         $para['longitude']=$data['longitude'];
         $para['submerchantid']= $data['submerchantid'];
         $para['statecode']=$data['statecode'];
         $para['city']= $data['city'];
         $para['merchant_name']=$data['merchant_name'];
         $para['address']= $data['address'];
         $para['pannumber']=$data['pannumber'];
         $para['pincode']= $data['pincode'];
         $plainData=$para;
    		
         $request1 = \PortalAPIHub::dataEncrypt($plainData);
         //dd($result1);
         $body["body"]=$request1;
         $url=$paysprintData["apiUrl"]."v2/Merchantonboard/index";
         $data["source"]='web';
         if($mockMode == false){
                    //$plainData == variable is actually posting data  $body==Encrypted Data
                $result = \PortalAPIHub::curlAEPS("PaysprintAeps", $url, "POST", $plainData,$body, $paysprintData["header"], "yes", $data["source"], $txnid);
              // dd($result);
                if($result["code"]!=200){
                    $ResMessage=json_decode($result['response']);
                    $output["status"]="success";
                    $output['apistatus']='ONBOARDING_FAILED';
                    $output['apiremark']=isset($ResMessage->message) ? $ResMessage->message : "NA";
                    $output["message"]="External API call failed with ".$result["code"].'( ' .$ResMessage->message.')';
                    $output["code"]=$result["code"]; 
                     
           
                    return $output;
                }        
                $jsonD=json_decode(($result["response"]));
         }else{
            $result=array(
                  "response" => array(
                        "status"=> true,
                        "response_code"=> 1,
                        "message"=> "Merchant data processed"
                ),
                  "error" => "",
                  "code" => 200
                   );
            $jsonD=json_decode(json_encode($result["response"]));
        }
       

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output["apiremark"]=$output["message"];
            return $output;
        }
    
        if($jsonD->response_code==1 && $jsonD->error_code==0 && $jsonD->status =="true") //1== registered //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Marchant Registered successful";
            $output['apistatus']='ONBOARDING_SUCCESSFUL';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
           
        } 
       
       
        else{
            $output["status"]="failed";
            $output['apistatus']='ONBOARDING_FAILED';
            $output["message"]="Onboarding request failed";
            $output["apiremark"]=isset($jsonD->data->remarks) ? $jsonD->data->remarks : $jsonD->message;
        }
    

        return $output;
    }
    public static function onboardingStatusCheck($data, $mockMode)
    {
        
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            $output['apiremark']=$output["message"];

            return $output;
        }
        $prefix="S2M";
        $txnid = $prefix.rand(1111111111, 9999999999);
          $para['mobile']=$data['mobile'];
         $para['pipe']= $data['pipe'];
         $para['merchantcode']=$data['merchantcode'];
         $plainData=$para;
         $url=$paysprintData["apiUrl"]."v2/merchantonboard/getonboardstatus";
         $data["source"]='web';
         if($mockMode == false){
                    $result = \PortalAPIHub::curlAEPS("PaysprintAeps", $url, "POST", $plainData,$plainData, $paysprintData["header"], "yes", $data["source"], $txnid);
                if($result["code"]!=200){
                    $ResMessage=json_decode($result['response']);
                    $output["status"]="success";
                    $output['apistatus']='REQUEST_FAILED';
                    $output['apiremark']=isset($ResMessage->message) ? $ResMessage->message : "NA";
                    $output["message"]="External API call failed with ".$result["code"].'( ' .$ResMessage->message.')';
                    $output["code"]=$result["code"]; 
                     
           
                    return $output;
                }        
                $jsonD=json_decode(($result["response"]));
         }else{
            $result=array(
                  "response" => array(
                    "response_code"=> 1,
                    "status"=> true,
                    "message"=> "Onboarding completed",
                    "is_approved"=> "Accepted"
                ),
                  "error" => "",
                  "code" => 200
                   );
            $jsonD=json_decode(json_encode($result["response"]));
        }
       

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apiremark']=$output["message"];

            return $output;
        }
    
        if($jsonD->response_code==1 && strolower($jsonD->is_approved)=='accepted') //1== registered //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Onboarding Completed successfully";
            $output['apistatus']='ONBOARDING_COMPELTE';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
           
        } else if($jsonD->response_code==1 && $jsonD->is_approved=='Rejected') 
        {
             
            $output['status'] = "success";
            $output['message'] = "Merchant Onboarding Rejected";
            $output['apistatus']='ONBOARDING_REJECTED';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
           
        } 
        else if($jsonD->response_code==1 && $jsonD->is_approved=='Pending') 
        {
             
            $output['status'] = "success";
            $output['message'] = "Onboarding request is pending.";
            $output['apistatus']='ONBOARDING_PENDING';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
           
        } 
        else if($jsonD->response_code==0 && $jsonD->is_approved=='Pending') 
        {
             
            $output['status'] = "success";
            $output['message'] = "Onboarding request is pending.";
            $output['apistatus']='ONBOARDING_PENDING';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
           
        } 
        else{
            $output["status"]="failed";
            $output['apistatus']='API_CALLFAILED';
            $output["message"]="Unknown response received";
            $output["apiremark"]=isset($jsonD->data->remarks) ? $jsonD->data->remarks : $jsonD->message;
        }
    

        return $output;
    }
    public static function aeps2FA($data, $mockMode)
    {
        
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            $output['apiremark']=$output["message"];

            return $output;
        }
         $prefix="S2M";
         $txnid = $prefix.rand(1111111111, 9999999999);
         $para['accessmodetype']=$data['accessmodetype'];
         $para['adhaarnumber']=$data['adhaarnumber'];
         $para['mobilenumber']=$data['mobilenumber'];
         $para['latitude']=$data['latitude'];
         $para['longitude']=$data['longitude'];
         $para['referenceno']=$data['referenceno'];
         $para['submerchantid']=$data['submerchantid'];
         $para['timestamp']=$data['timestamp'];
         $para['data']=$data['data'];
         $para['ipaddress']=$data['ipaddress'];
         $plainData=$para;
         $request1 = \PortalAPIHub::dataEncrypt($plainData);
         $body["body"]=$request1;
         $url=$paysprintData["apiUrl"]."kyc/Twofactorkyc/twofactorauthlogin";
         $data["source"]='web';
         if($mockMode == false){
                    //$plainData == variable is actually posting data  $body==Encrypted Data
                $result = \PortalAPIHub::curlAEPS("PaysprintAeps", $url, "POST", $plainData,$body, $paysprintData["header"], "yes", $data["source"], $txnid);
                if($result["code"]!=200){
                    $ResMessage=json_decode($result['response']);
                    $output["status"]="success";
                    $output['apistatus']='BIO_AUTH_FAILED';
                    $output['apiremark']=isset($ResMessage->message) ? $ResMessage->message : "NA";
                    $output["message"]="External API call failed with ".$result["code"].'( ' .$ResMessage->message.')';
                    $output["code"]=$result["code"]; 
                    return $output;
                }        
                    $jsonD=json_decode(($result["response"]));
            }else{
                  $result=array(
                  "response" => array(
                    "message"=> "Bio auth submitted successfully",
                    "response_code"=> 1,
                    "status"=> true,
                    "error_code"=> 0
                    ),
                  "error" => "",
                  "code" => 200
                   );
            $jsonD=json_decode(json_encode($result["response"]));
        }
       

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apiremark']=$output["message"];

            return $output;
        }
    
        if($jsonD->response_code==1 && $jsonD->errorcode==0000 && $jsonD->status =="true") //1== registered //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Bio auth submitted successfully";
            $output['apistatus']='BIO_AUTH_SUCCESS';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
           
        } 
       
       
        else{
            $output["status"]="failed";
            $output['apistatus']='BIO_AUTH_FAILED';
            $output["message"]="Merchant 2FA request failed";
            $output["apiremark"]=isset($jsonD->data->remarks) ? $jsonD->data->remarks : $jsonD->message;
        }
    

        return $output;
    }
    public static function aepsStateList($data, $mockMode)
    {
        
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            return $output;
        }
        $prefix="S2M";
        $txnid = $prefix.rand(1111111111, 9999999999);
         
         $plainData=[];
         $url=$paysprintData["apiUrl"]."v2/Banklist/statelist";
         $data["source"]='web';
         if($mockMode == false){
                    //$plainData == variable is actually posting data  $body==Encrypted Data  //for this api no need to encrypt so parameter passs as it is
                    
                $result = \PortalAPIHub::curlAEPS("PaysprintAeps", $url, "POST", $plainData,$plainData, $paysprintData["header"], "yes", $data["source"], $txnid);
                //dd($result);
                if($result["code"]!=200){
                    $ResMessage=json_decode($result['response']);
                    $output["status"]="success";
                    $output['apistatus']='NOT_REGISTERED';
                    $output['apiremark']=isset($ResMessage->message) ? $ResMessage->message : "NA";
                    $output["message"]="External API call failed with ".$result["code"].'( ' .$ResMessage->message.')';
                    $output["code"]=$result["code"]; 
                     
           
                    return $output;
                }        
                $jsonD=json_decode(($result["response"]));
         }else{
            $result=array(
                  "response" => array(
                    "status"=> true,
                    "response_code"=> 1,
                    "statecodelist"=> [
                      "status"=> true,
                      "message"=> "Request Completed",
                      "data"=> [
                        [
                          "statename"=> "Delhi",
                          "statecode"=> "DL"
                        ],
                        [
                          "statename"=> "Haryana",
                          "statecode"=> "HR"
                        ],
                        [
                          "statename"=> "Maharashtra",
                          "statecode"=> "MH"
                        ],
                       
                      ]
                    ],
                    "message"=> "state list successfully fetched"
                  
                ),
                  "error" => "",
                  "code" => 200
                   );
            $jsonD=json_decode(json_encode($result["response"]));
        }
       

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            return $output;
        }
    
        if($jsonD->response_code==1 && $jsonD->status=='true') //1== registered //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Request Completed";
            $output['apistatus']='STATE_LIST_FETCHED';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['statecodelist']=isset($jsonD->statecodelist) ? $jsonD->statecodelist : "NA";
           
        }   
        else{
            $output["status"]="failed";
            $output['apistatus']='STATE_LIST_FETCH_REQUEST_FAILED';
            $output["message"]="Unknown response received";
            $output["apiremark"]=isset($jsonD->data->remarks) ? $jsonD->data->remarks : $jsonD->message;
        }
    

        return $output;
    }
    public static function aepsBankList($data, $mockMode)
    {
        
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            $output['apiremark']=$output["message"];
            return $output;
        }
        $prefix="S2M";
        $txnid = $prefix.rand(1111111111, 9999999999);
         
         $plainData=[];
         $url=$paysprintData["apiUrl"]."banklist/index";
         $data["source"]='web';
         if($mockMode == false){
                    //$plainData == variable is actually posting data  $body==Encrypted Data  //for this api no need to encrypt so parameter passs as it is
                    
                $result = \PortalAPIHub::curlAEPS("PaysprintAeps", $url, "POST", $plainData,$plainData, $paysprintData["header"], "yes", $data["source"], $txnid);
                dd($result);
                if($result["code"]!=200){
                    $ResMessage=json_decode($result['response']);
                    $output["status"]="success";
                    $output['apistatus']='NOT_REGISTERED';
                    $output['apiremark']=isset($ResMessage->message) ? $ResMessage->message : "NA";
                    $output["message"]="External API call failed with ".$result["code"].'( ' .$ResMessage->message.')';
                    $output["code"]=$result["code"]; 
                     
           
                    return $output;
                }        
                $jsonD=json_decode(($result["response"]));
         }else{
            $result=array(
                  "response" => array(
                    "status"=> true,
                    "response_code"=> 1,
                    "statecodelist"=> [
                      "status"=> true,
                      "message"=> "Request Completed",
                      "data"=> [
                        [
                          "statename"=> "Delhi",
                          "statecode"=> "DL"
                        ],
                        [
                          "statename"=> "Haryana",
                          "statecode"=> "HR"
                        ],
                        [
                          "statename"=> "Maharashtra",
                          "statecode"=> "MH"
                        ],
                       
                      ]
                    ],
                    "message"=> "state list successfully fetched"
                  
                ),
                  "error" => "",
                  "code" => 200
                   );
            $jsonD=json_decode(json_encode($result["response"]));
        }
       

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apiremark']=$output["message"];
            return $output;
        }
    
        if($jsonD->response_code==1 && $jsonD->status=='true') //1== registered //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Request Completed";
            $output['apistatus']='BANK_LIST_FETCH';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['statecodelist']=isset($jsonD->statecodelist) ? $jsonD->statecodelist : "NA";
           
        }   
        else{
            $output["status"]="failed";
            $output['apistatus']='BANK_LIST_FAILED';
            $output["message"]="Onboarding request failed";
            $output["apiremark"]=isset($jsonD->data->remarks) ? $jsonD->data->remarks : $jsonD->message;
        }
    

        return $output;
    }
    
    public static function aepsTransaction($data, $mockMode)
    {
        
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            $output['apiremark']=$output["message"];
           
            return $output;
        }
        $prefix="S2M";
        $txnid = $prefix.rand(1111111111, 9999999999);
          $para['merchant_name']=$data['merchant_name'];
         $para['pannumber']=$data['pannumber'];
         $para['address']=$data['address'];
         $para['city']=$data['city'];
         $para['pincode']=$data['pincode'];
         $para['statecode']=$data['statecode'];
         $para['mobilenumber']=$data['mobilenumber'];
         $para['accessmodetype']=$data['accessmodetype'];
         $para['ipaddress']=$data['ipaddress'];
         $para['adhaarnumber']=$data['adhaarnumber'];
         $para['merchantmobilenumber']=$data['merchantmobilenumber'];
         $para['latitude']=$data['latitude'];
         $para['longitude']=$data['longitude'];
         $para['referenceno']=$data['referenceno'];
         $para['nationalbankidentification']=$data['nationalbankidentification'];
         $para['pipe']=$data['pipe'];
         $para['transcationtype']=$data['transcationtype'];
         $para['requestremarks']=$data['requestremarks'];
         $para['submerchantid']=$data['submerchantid'];
         $para['data']=$data['data'];  //$para["txtPidData"]
         $para['timestamp']=$data['timestamp'];

         $request_type=$data['request_type'];
        
        if($request_type=='CW')
        {
            $para['amount']=$data['amount'];
        }
         $plainData=$para;
         //dd($plainData);
    	 $request1 = \PortalAPIHub::dataEncrypt($plainData);
         $body["body"]=$request1;
         if($request_type=='CW')
         {
            $url=$paysprintData["apiUrl"]."v2/cashwithdraw/index";
         }else if($request_type=='MS')
         {
            $url=$paysprintData["apiUrl"]."v2/ministatement/index";
         }
         else if($request_type=='BE')
         {
            $url=$paysprintData["apiUrl"]."v2/balanceenquiry/index";
         }else{
            $url="";
         }
         
         $data["source"]='web';
         if($mockMode == false){
                    //$plainData == variable is actually posting data  $body==Encrypted Data
                $result = \PortalAPIHub::curlAEPS("PaysprintAeps", $url, "POST", $plainData,$body, $paysprintData["header"], "yes", $data["source"], $txnid);
              // dd($result);
                if($result["code"]!=200){
                    $ResMessage=json_decode($result['response']);
                    $output["status"]="success";
                    $output['apistatus']='TRANSACTION_PENDING';
                    $output['apiremark']=isset($ResMessage->message) ? $ResMessage->message : "NA";
                    $output["message"]="External API call failed with ".$result["code"].'( ' .$ResMessage->message.')';
                    $output["code"]=$result["code"]; 
                     
           
                    return $output;
                }        
                $jsonD=json_decode(($result["response"]));
         }else{
            $result=array(
                  "response" => array(
                    "status"=>true,"message"=>"Transaction is successful","ackno"=>230707,"amount"=>"100","balanceamount"=>"9988.0","bankrrn"=>"1078397466149989","bankiin"=>606985,"response_code"=>1,"errorcode"=>"AEPS-NPCI-00","clientrefno"=>78765679,"last_aadhar"=>"7849","name"=>"pooja jadhav"
                ),
                  "error" => "",
                  "code" => 200
                   );
            $jsonD=json_decode(json_encode($result["response"]));
        }
       

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apiremark']=$output["message"];
            return $output;
        }
    
        if($jsonD->response_code==1 && $jsonD->status =="true") //1== Success //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Transaction is successful";
            $output['apistatus']='TRANSACTION_SUCCESS';
            $output['balanceamount']=isset($jsonD->balanceamount) ? $jsonD->balanceamount : "NA";
            $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : "NA";
            $output['bankrrn']=isset($jsonD->bankrrn) ? $jsonD->bankrrn : "NA";
            $output['clientrefno']=isset($jsonD->clientrefno) ? $jsonD->clientrefno : "NA";
            $output['amount']=isset($jsonD->amount) ? $jsonD->amount : "NA";
            $output['ministatement']=isset($jsonD->ministatement) ? $jsonD->ministatement : "[]";
           
          
        } 
        else if($jsonD->response_code==0) //0== FAILED //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Transaction failed ";
            $output['apistatus']='TRANSACTION_FAILED';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['balanceamount']=isset($jsonD->balanceamount) ? $jsonD->balanceamount : "NA";
            $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : "NA";
            $output['bankrrn']=isset($jsonD->bankrrn) ? $jsonD->bankrrn : "NA";
            $output['clientrefno']=isset($jsonD->clientrefno) ? $jsonD->clientrefno : "NA";
            $output['ministatement']=isset($jsonD->ministatement) ? $jsonD->ministatement : "[]";
           
           
        } 
        else if($jsonD->response_code==2) //2== ERROR OR REQUEST TIMEOUT //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Transaction failed due to timeout";
            $output['apistatus']='TRANSACTION_TIMEOUT';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['balanceamount']=isset($jsonD->balanceamount) ? $jsonD->balanceamount : "NA";
            $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : "NA";
            $output['bankrrn']=isset($jsonD->bankrrn) ? $jsonD->bankrrn : "NA";
            $output['clientrefno']=isset($jsonD->clientrefno) ? $jsonD->clientrefno : "NA";
           
           
        } 
        else{
            $output["status"]="failed";
            $output['apistatus']='TRANSACTION_PENDING';
            $output["message"]="Unkown response Recive";
            $output["apiremark"]=isset($jsonD->data->remarks) ? $jsonD->data->remarks : $jsonD->message;
        }
    

        return $output;
    }
    public static function aepsTransactionStatus($data, $mockMode)
    {
        
        $paysprintData=self::createpaysprintHeader();
        if($paysprintData["status"]!="success"){
            $output["status"]="failed";
            $output["message"]=$paysprintData["message"];
            $output['apiremark']=$output["message"];
            return $output;
        }
            $prefix="S2M";
            $txnid = $prefix.rand(1111111111, 9999999999);
            $para['reference']=$data['reference'];
            $plainData=$para;
            $request1 = \PortalAPIHub::dataEncrypt($plainData);
            $body["body"]=$request1;
            $url=$paysprintData["apiUrl"]."v2/Aepsquery/query";
            $data["source"]='web';
         if($mockMode == false){
                    //$plainData == variable is actually posting data  $body==Encrypted Data
                $result = \PortalAPIHub::curlAEPS("PaysprintAeps", $url, "POST", $plainData,$body, $paysprintData["header"], "yes", $data["source"], $txnid);
              // dd($result);
                if($result["code"]!=200){
                    $ResMessage=json_decode($result['response']);
                    $output["status"]="success";
                    $output['apistatus']='TRANSACTION_PENDING';
                    $output['apiremark']=isset($ResMessage->message) ? $ResMessage->message : "NA";
                    $output["message"]="External API call failed with ".$result["code"].'( ' .$ResMessage->message.')';
                    $output['refno2']= "NA";
                   
                    $output["code"]=$result["code"]; 
                    return $output;
                }        
                $jsonD=json_decode(($result["response"]));
         }else{
            $result=array(
                  "response" => array(
                    "status"=>true,"txnstatus"=>"1","message"=>"Transaction is successful","ackno"=>"230710","amount"=>"100.00","bankrrn"=>"1005094661887096","response_code"=>1,"errorcode"=>"0","settled_id"=>""
                ),
                  "error" => "",
                  "code" => 200
                   );
            $jsonD=json_decode(json_encode($result["response"]));
        }
       

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apiremark']=$output["message"];
            return $output;
        }
    
        if($jsonD->response_code==1 && $jsonD->status =="true" && $jsonD->txnstatus==1) //1== Success //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Transaction is successful";
            $output['apistatus']='TRANSACTION_SUCCESS';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : "NA";
            $output['bankrrn']=isset($jsonD->bankrrn) ? $jsonD->bankrrn : "NA";
            $output['settled_id']=isset($jsonD->settled_id) ? $jsonD->settled_id : "NA";
            $output['amount']=isset($jsonD->amount) ? $jsonD->amount : "NA";
           
          
        } 
        else if($jsonD->response_code==0 && $jsonD->status =="true" && $jsonD->txnstatus==3) //0== FAILED //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Transaction failed ";
            $output['apistatus']='TRANSACTION_FAILED';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : "NA";
            $output['bankrrn']=isset($jsonD->bankrrn) ? $jsonD->bankrrn : "NA";
            $output['settled_id']=isset($jsonD->settled_id) ? $jsonD->settled_id : "NA";
            $output['amount']=isset($jsonD->amount) ? $jsonD->amount : "NA";
           
           
        } 
        else if($jsonD->response_code==2 && $jsonD->status =="true" && $jsonD->txnstatus==2) //0== ERROR OR REQUEST TIMEOUT //code added by pooja jadhav
        {
             
            $output['status'] = "success";
            $output['message'] = "Transaction pending due to timeout";
            $output['apistatus']='TRANSACTION_PENDING';
            $output['apiremark']=isset($jsonD->message) ? $jsonD->message : "NA";
            $output['refno2']=isset($jsonD->ackno) ? $jsonD->ackno : "NA";
            $output['bankrrn']=isset($jsonD->bankrrn) ? $jsonD->bankrrn : "NA";
            $output['settled_id']=isset($jsonD->settled_id) ? $jsonD->settled_id : "NA";
            $output['amount']=isset($jsonD->amount) ? $jsonD->amount : "NA";
           
           
        } 
        else{
            $output["status"]="failed";
            $output['apistatus']='TRANSACTION_PENDING';
            $output["message"]="Unkown response Recive";
            $output["apiremark"]=isset($jsonD->data->remarks) ? $jsonD->data->remarks : $jsonD->message;
        }
    

        return $output;
    }
}
?>