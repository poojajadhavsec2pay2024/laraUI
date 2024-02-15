<?php 
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DMTV5Controller;
use app\Helpers\PortalAPIHub;
use app\Helpers\DmtRes;


class DMTV5Helper {
    public static function createinstantpayHeader()
    {
        
        // $output["Client-Id"]='YWY3OTAzYzNlM2ExZTJlOT68QMu0XiuFFDmZlXNYj3Y=';
        // $output["Client-Secret"]='0d9b01aaa2690d546f8f19999ad63421ea23a44048173b20d8fdce87ae8088c7';
        // $output["Endpoint-Ip"]='182.79.52.230';
        // $output["Outlet-Id"]='361985';

       
        $header= array(
            'X-Ipay-Auth-Code: 1',
            'X-Ipay-Client-Id:YWY3OTAzYzNlM2ExZTJlOT68QMu0XiuFFDmZlXNYj3Y=',
            'X-Ipay-Client-Secret:0d9b01aaa2690d546f8f19999ad63421ea23a44048173b20d8fdce87ae8088c7',
            'X-Ipay-Endpoint-Ip:182.79.52.230',
            'X-Ipay-Outlet-Id:361985',
            'Content-Type: application/json',
        );
        $output["status"]="success";
        $output["apiUrl"]="https://api.instantpay.in/fi/remit/out/nepal/";
        $output["header"]=$header;
       // $output["header"]=$header;
       
        return $output;

    }
    public static function getOutletDetails($data, $mockMode,$mockmodestatus)
    {
        $instantpaykey=self::createinstantpayHeader();
        
        $header= array(
            'X-Ipay-Auth-Code: 1',
            'X-Ipay-Client-Id:'.$instantpaykey['Client-Id'],
            'X-Ipay-Client-Secret:'.$instantpaykey['Client-Secret'],
            'X-Ipay-Endpoint-Ip:'.$instantpaykey['Endpoint-Ip'],
            'Content-Type: application/json',
        );
        $instantpayData["status"]="success";
        $instantpayData["header"]=$header;
        $txnID=rand();
        $product="InstantpayDMT";
        $url="https://api.instantpay.in/user/outlet/signup/initiate";
        $para['mobile']=$data['mobile'];
        $para['email']=$data['email'];
        //$para['aadhaar']=$data['aadhaar'];
        $para['pan']=$data['pan'];
        $para['bankAccountNo']=$data['bankAccountNo'];
        $para['bankIfsc']=$data['bankIfsc'];
        $para['latitude']=$data['latitude'];
        $para['longitude']=$data['longitude'];
        $para['consent']=$data['consent'];
        $aadhaarNumber= \PortalAPIHub::aadhardataEncrypt($data['aadhaar']);
        $para['aadhaar']=$aadhaarNumber;
        $parameters=json_encode($para);
       //dd($parameters);
        if(!$mockMode){   
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           // dd($result);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_REMMITER_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $value='activationStatus';
            $result = \DmtRes::response($value,$mockmodestatus);
           // dd($result);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            return $output;
        }
        //dd($jsonD->data);
        if($jsonD->statuscode=='TXN') //TXN=="Transaction Successful",
        {
            
            $output['status'] = "success";
            $output['message'] = "Transaction Successful";
            $output['apistatus']='TRANSACTION_SUCCESS';
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['refno'] = isset($jsonD->ipay_uuid) ? $jsonD->ipay_uuid : "NA";
            $output['txnid'] =isset($jsonD->orderid) ? $jsonD->orderid : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : "NA";
            
                   
        } 
        else if ($jsonD->statuscode=='TSU') //"Transaction Status Unavailable"
        { 
            $output['status'] = "success";
            // $output['act'] = "CONTINUE"; //050623 Vidyadhar
            $output['apistatus']='NOT_REGISTERED';
            $output['message']= "Transaction Status Unavailable";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['refno'] = isset($jsonD->ipay_uuid) ? $jsonD->ipay_uuid : "NA";
            $output['txnid'] =isset($jsonD->orderid) ? $jsonD->orderid : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : "NA";
            
        } 
       
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
        }
        
        return $output;

    }
    public static function validateoutletdetails($data, $mockMode,$mockmodestatus)
    {
        $instantpaykey=self::createinstantpayHeader();
        
        $header= array(
            'X-Ipay-Auth-Code: 1',
            'X-Ipay-Client-Id:'.$instantpaykey['Client-Id'],
            'X-Ipay-Client-Secret:'.$instantpaykey['Client-Secret'],
            'X-Ipay-Endpoint-Ip:'.$instantpaykey['Endpoint-Ip'],
            'Content-Type: application/json',
        );
        $instantpayData["status"]="success";
        $instantpayData["header"]=$header;
        $txnID=rand();
        $product="InstantpayDMT";
        $url="https://api.instantpay.in/user/outlet/signup/validate";
        $para['otpReferenceID']=$data['otpReferenceID'];
        $para['otp']=$data['otp'];
        $para['hash']=$data['hash'];
        $parameters=$para;
        // dd($parameters);
        if(!$mockMode){   
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           // dd($result);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_REMMITER_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $value='activationStatus';
            $result = \DmtRes::response($value,$mockmodestatus);
           // dd($result);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            return $output;
        }
        //dd($jsonD->data);
        if($jsonD->statuscode=='TXN') //TXN=="Transaction Successful",
        {
            
            $output['status'] = "success";
            $output['message'] = "Transaction Successful";
            $output['apistatus']='TRANSACTION_SUCCESS';
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['refno'] = isset($jsonD->ipay_uuid) ? $jsonD->ipay_uuid : "NA";
            $output['txnid'] =isset($jsonD->orderid) ? $jsonD->orderid : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : "NA";
            
                   
        } 
        else if ($jsonD->statuscode=='TSU') //"Transaction Status Unavailable"
        { 
            $output['status'] = "success";
            // $output['act'] = "CONTINUE"; //050623 Vidyadhar
            $output['apistatus']='NOT_REGISTERED';
            $output['message']= "Transaction Status Unavailable";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['refno'] = isset($jsonD->ipay_uuid) ? $jsonD->ipay_uuid : "NA";
            $output['txnid'] =isset($jsonD->orderid) ? $jsonD->orderid : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : "NA";
            
        } 
       
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
        }
        
        return $output;

    }
    public static function activationStatus($data, $mockMode,$mockmodestatus)
    {
            $instantpayData=self::createinstantpayHeader();
            if($instantpayData["status"]!="success"){
                $output["status"]="failed";
                $output['apistatus']='HEADER_PENDING';
                $output["message"]= "Header creation failed";
                $output['apiremark']= $output['message'];
                  return $output;
            }
          $url=$instantpayData["apiUrl"]."outletActivationStatus";
          $txnID=rand();
          $product="InstantpayDMT";
          $para['partnerTxnId']=$data['partnerTxnId'];
          $parameters=json_encode($para);
        
        if(!$mockMode){   
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
             if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output['apistatus']='IN-ACTIVE';
                $output['message']= "Outlet Unauthorized or Inactive";
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $value='activationStatus';
            $result = \DmtRes::response($value,$mockmodestatus);
              $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }
         if($jsonD->statuscode=='TXN') //TXN=="Transaction Successful",
        {
            
            $output['status'] = "success";
            $output['message'] = "Outlet Authorized And Active";
            $output['apistatus']='ACTIVE';
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['refno'] = isset($jsonD->ipay_uuid) ? $jsonD->ipay_uuid : "NA";
            $output['txnid'] =isset($jsonD->orderid) ? $jsonD->orderid : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];      
        } 
        else if (in_array($jsonD->statuscode, ['OUI','IAC','ODI','RPI'])) //"Transaction Status Unavailable"
        { 
            $output['status'] = "failed";
            $output['apistatus']='IN-ACTIVE';
            $output['message']= "Outlet Unauthorized or Inactive";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['refno'] = isset($jsonD->ipay_uuid) ? $jsonD->ipay_uuid : "NA";
            $output['txnid'] =isset($jsonD->orderid) ? $jsonD->orderid : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];
            
        } 
       
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output["message"];
            $output["code"]=$result["code"]; 


        }
        
        return $output;

    }
    public static function staticData($data, $mockMode,$mockmodestatus)
    {
         $instantpayData=self::createinstantpayHeader();
            if($instantpayData["status"]!="success"){
                $output["status"]="failed";
                $output['apistatus']='HEADER_PENDING';
                $output["message"]= "Header creation failed";
                $output['apiremark']= $output['message'];
                return $output;
            }
          $url=$instantpayData["apiUrl"]."staticData";
          $txnID=rand();
          $product="InstantpayDMT";
          ///* Available Types are :Gender, Nationality, IDType, IncomeSource, Relationship, PaymentMode, RemittanceReason */
          $para['type']=$data['type']; //
          $parameters=json_encode($para);
        
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           // dd($result);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_REMMITER_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output['message'];
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='staticData';
            $result = \DmtRes::response($value,$mockmodestatus);
    
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output['message'];
            return $output;
        }

        if($jsonD->statuscode=='TXN') //TXN== Transaction Successful //code added by pooja jadhav
        {
            $output['status'] = "success";
            $output['message'] = "Request completed";
            $output['apistatus']='DATA_FETCHED_SUCCESSFULLY';
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

            
        } 
        else if (in_array($jsonD->statuscode, ['RPI','ERR'])) //RPI==Request Parameters are Invalid or Incomplete  //code added by pooja jadhav
        { 
            $output['status'] = "success";
            $output['apistatus']='DATA_FETCH_FAILED';
            $output['message']= "Unable to  fetch Static Data";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];


        } 
       
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output["code"]=$result["code"]; 
                
        }
        
        return $output;

    }
    public static function paymentLocationList($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
          $url=$instantpayData["apiUrl"]."paymentLocationList";
             
          $txnID=rand();
          $product="InstantpayDMT";
          $para['type']=$data['type'];
          $para['country']=$data['country'];
          $para['state']=$data['state'];
          $para['district']=$data['district'];
          $parameters=json_encode($para);
        
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_REMMITER_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output["code"]=$result["code"]; 
                $output['apiremark']=$output['message'];
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='paymentLocationList';
            $result = \DmtRes::response($value,$mockmodestatus);
        
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output['message'];
            return $output;
        }

        if($jsonD->statuscode=='TXN') //1== registered //code added by pooja jadhav
        {
            $output['status'] = "success";
            $output['message'] = "Payment Location List Fetch successfully";
            $output['apistatus']='LOCATION_FETCHED_SUCCFULLY';
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] = $jsonD->data;
           
        } 
        else if (in_array($jsonD->statuscode, ['SPD','ERR','TUP','RPI']))   //SPD==Service Provider Downtime  //code added by pooja jadhav
        { 
            $output['status'] = "failed";
            $output['apistatus']='LOCATION_FETCH_FAILED';
            $output['message']= "Unable to fetch the payment location list";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        } 
       
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
        }
        
        return $output;

    }
    public static function stateDistrict($data, $mockMode,$mockmodestatus)
    { 
        
            $instantpayData=self::createinstantpayHeader();
            if($instantpayData["status"]!="success"){
                $output["status"]="failed";
                $output['apistatus']='HEADER_PENDING';
                $output["message"]= "Header creation failed";
                $output['apiremark']= $output['message'];
                  return $output;
            }
            $url=$instantpayData["apiUrl"]."stateDistrict";  
            $txnID=rand();
            $product="InstantpayDMT";
            $para['country']=$data['country'];
            $parameters=json_encode($para);
            
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='stateDistrict';
            $result = \DmtRes::response($value,$mockmodestatus);
        
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
            $output['message'] = "Data Fetch Sucessfully";
            $output['apistatus']='FETCH_DATA';
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] = $jsonD->data;
        } 
        else if (in_array($jsonD->statuscode, ['RPI','ERR','SPD']))   
        //Err==Provider Failure ,SPD== Service Provider Downtime ,RPI==Request Parameter Invalid //code added by pooja jadhav
        { 
            $output['status'] = "success";
            $output['apistatus']='FETCH_DATA_FAILED';
            $output['message']= "Fetch Data Failed";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        } 
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function remitterProfile($data, $mockMode,$mockmodestatus)
    {
        // $instantpaykey=self::createinstantpayHeader();
        // $header= array(
        //         'X-Ipay-Auth-Code: 1',
        //         'X-Ipay-Client-Id:'.$instantpaykey['Client-Id'],
        //         'X-Ipay-Client-Secret:'.$instantpaykey['Client-Secret'],
        //         'X-Ipay-Endpoint-Ip:'.$instantpaykey['Endpoint-Ip'],
        //         'X-Ipay-Outlet-Id:'.$instantpaykey['Outlet-Id'],
        //         'X-Ipay-Request-Hash:123456789|123456789|123456789|123456789|123456789|123456789|1234',
        //         'X-Ipay-Request-Timestamp: 1665638508000',
        //         'X-Ipay-Hash-Check: OFF',
        //         'User-Agent: InstantPayAPITest/1.0.0',
        //         'Content-Type: application/json',
        //     );
        //     $instantpayData["status"]="success";
            $instantpayData=self::createinstantpayHeader();
            if($instantpayData["status"]!="success"){
                $output["status"]="failed";
                $output['apistatus']='HEADER_PENDING';
                $output["message"]= "Header creation failed";
                $output['apiremark']= $output['message'];
                  return $output;
            }
            $url=$instantpayData["apiUrl"]."remitterProfile";
            $txnID=rand();
            $product="InstantpayDMT";
            $para['mobile']=$data['mobile'];
            $parameters=json_encode($para);
            
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
            
            //d//d($result);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="failed";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='remitterProfile';
            $result = \DmtRes::response($value,$mockmodestatus);
        
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
            $output['message'] = "Data Fetch Sucessfully";
            $output['apistatus']='REGISTERED';
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] = $jsonD->data;
        }
         //Err==Provider Failur   RPI==Request Parameters are Invalid or Incomplete //code added by pooja jadhav
 
        elseif(in_array($jsonD->statuscode,['RPI','ERR',"RNF"])) 
        { 
            $output['status'] = "success";
            $output['apistatus']='NOT_REGISTERED';
            $output['message']="Remitter Fetch Data Failed";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        } 
        elseif($jsonD->statuscode=="RNF") 
        { 
            $output['status'] = "success";
            $output['apistatus']='NOT_REGISTERED1';
            $output['message']="Remitter Fetch Data Failed";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        } 
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function sendOtp($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
           $url=$instantpayData["apiUrl"]."otpRequest"; 
            $txnID=rand();
            $product="InstantpayDMT";
            //$para["operation"]=$data['operation'];
            $para["mobile"]=$data['mobile'];
            if($data['operation']!='REMITTER_REGISTRATION')
            {
           $para["paymentMode"]=$data['paymentMode'];
           $para["bankBranchId"]=$data['bankBranchId'];
           $para["accountNumber"]=$data['accountNumber'];
           $para["beneficiaryId"]=$data['beneficiaryId'];
           $para["transferAmount"]=$data['transferAmount'];
            }
            else{
                $para["operation"]='RemitterRegistration';
                $para["transferAmount"]=0;
            }
           
            $parameters=json_encode($para);
          
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $value='sendOtp';
            $result = \DmtRes::response($value,$mockmodestatus);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
            $output['message'] = "OTP sent to remitter mobile number";
            $output['apistatus']='OTP_SEND';
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] = $jsonD->data;
        }
         //Err==Provider Failure  //code added by pooja jadhav

        else if (in_array($jsonD->statuscode, ['RPI','RAR','ERR']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='OTP_SEND_FAILED';
            $output['message']= "Could not send OTP.";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        } 
        
        else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function remitterRegistration($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
           $url=$instantpayData["apiUrl"]."remitterRegistration";
            $txnID=rand();
            $product="InstantpayDMT";
            $para["name"] =$data["name"];
            $para["gender"] =$data["gender"];
            $para["dob"] =$data["dob"];
            $para["address"] =$data["address"];
            $para["mobile"] =$data["mobile"];
            $para["state"] =$data["state"];
            $para["district"] =$data["district"];
            $para["city"] =$data["city"];
            $para["nationality"] =$data["nationality"];
            $para["email"] =$data["email"];
            $para["employer"] =$data["employer"];
            $para["idType"] =$data["idType"];
            $para["idNumber"] =$data["idNumber"];
            $para["idExpiryDate"] =$data["idExpiryDate"];
            $para["idIssuedPlace"] =$data["idIssuedPlace"];
            $para["incomeSource"] =$data["incomeSource"];
            $para["remitterType"] =$data["remitterType"];
            $para["incomeSourceType"] =$data["incomeSourceType"];
            $para["annualIncome"] =$data["annualIncome"];
            $para["otpReference"] =$data["otpReference"];
            $para["otp"] =$data["otp"];
            $parameters=json_encode($para);
            
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                 return $output;
            }  
                 $jsonD=json_decode(($result["response"]));
        }else{
            $value='remitterRegistration';
            $result = \DmtRes::response($value,$mockmodestatus);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
           $output['apistatus']='REGISTRATION_SUCCESSFUL';
           $output['message'] = "Remitter registration successful";
           $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
           $output['data'] = $jsonD->data;
        }
        else if ($jsonD->statuscode=='TUP')   
        { 
            $output['status'] = "suceess";
            $output['apistatus']='REGISTRATION_INPROCESS';
            $output['message']= "Remitter registration is pending";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }
        //"IVC" => "Invalid Verification Code or OTP",
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI']))   
        { 
            $output['status'] = "suceess";
            $output['apistatus']='REGISTRATION_INVALID_INPUT';
            $output['message']= "The selected operation is invalid.";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }    
        return $output;

    }
    public static function remitterEkycInitiate($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
            $url=$instantpayData["apiUrl"]."remitterEkycInitiate"; 
            
            $txnID=rand();
            $product="InstantpayDMT";
            $para["remitterId"] =$data["remitterId"];
            $parameters=json_encode($para);
            
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $value='remitterEkycInitiate';
            $result = \DmtRes::response($value,$mockmodestatus);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
            $output['status'] = "success";
            $output['apistatus']='RIMITTER_INITIATE_SUCCESSFUL';
            $output['message'] = "Remitter Ekyc Initiate Succesfully";
            $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] = $jsonD->data;
        }
       
        //"ISE" => "System Error", "IVC" => "Invalid Verification Code or OTP","RPI" => "Request Parameters are Invalid or Incomplete",
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI','ISE']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='REMITTER_INITIATE_FAILED';
            $output['message']= "Failed to Initiate Remitter Ekyc ";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function remitterEkycInitiateStatus($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
            return $output;
        }
            $url=$instantpayData["apiUrl"]."remitterEkycInitiateStatus"; 
            $txnID=rand();
            $product="InstantpayDMT";
            $para["remitterId"] =$data["remitterId"];
            $para["referenceKey"] =$data["referenceKey"];
            $parameters=json_encode($para);
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $value='remitterEkycInitiateStatus';
            $result = \DmtRes::response($value,$mockmodestatus);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
           $output['apistatus']='EKYC_SUCCESSFUL';
           $output['message'] = "Remitter Ekyc completed Succesfully";
           $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
           $output['data'] = $jsonD->data;
        }
        else if ($jsonD->statuscode=='TUP')   
        { 
            $output['status'] = "pending";
            $output['apistatus']='EKYC_UNDER_PROCESS';
            $output['message']= "Remitter Ekyc In Progress";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI','ISE']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='REMITTER_EKYC_FAILED';
            $output['message']= "Remitter Ekyc Failed ";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function remitterEkycProcess($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
           $url=$instantpayData["apiUrl"]."remitterEkycProcess"; 
           $txnID=rand();
           $product="InstantpayDMT";
           $para["remitterId"] =$data["remitterId"];
           $para["referenceKey"] =$data["referenceKey"];
           //$para["authenticationKey"] =$data["authenticationKey"];
           $ekycdata =$data["ekycdata"];
           $xml = simplexml_load_string($ekycdata);
           //dd($xml);
           $json = json_encode($xml);
           $array = json_decode($json,TRUE);
           $biometricData["rdsId"] = $array['DeviceInfo']['@attributes']['rdsId'];
           $biometricData["dpId"] = $array['DeviceInfo']['@attributes']['dpId'];
           $biometricData["rdsVer"] = $array['DeviceInfo']['@attributes']['rdsVer'];
           $biometricData["mi"] = $array['DeviceInfo']['@attributes']['mi'];
           $biometricData["mc"] = $array['DeviceInfo']['@attributes']['mc'];
           $biometricData["dc"] = $array['DeviceInfo']['@attributes']['dc'];
           $biometricData["ci"] = (string)$xml->Skey['ci'][0];
           $biometricData["hmac"] = $array['Hmac'];
           $biometricData["sessionKey"] = $array['Skey'];
           $biometricData["pidData"] = $array['Data'];
           $para["biometricData"]=$biometricData;
           $parameters=json_encode($para);
           //dd($parameters);
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           // dd($result);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='remitterEkycProcess';
            $result = \DmtRes::response($value,$mockmodestatus);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
           $output['apistatus']='REMITTER_EKYC_SUCCESS';
           $output['message'] = "Remitter Ekyc Successful";
           $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
           $output['data'] = $jsonD->data;
        }
        else if ($jsonD->statuscode=='TUP')   
        { 
            $output['status'] = "pending";
            $output['apistatus']='REMITTER_EKYC_UNDER_PROCESS';
            $output['message']= "Remitter Ekyc Pending";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI','ISE']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='REMITTER_EKYC_FAILED';
            $output['message']= "Remitter Ekyc Failed.";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function remitterUpdate($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
           $url=$instantpayData["apiUrl"]."remitterUpdate"; 
           $txnID=rand();
           $product="InstantpayDMT";
           $para["remitterType"] =$data["remitterType"];
           $para["incomeSourceType"] =$data["incomeSourceType"];
           $para["annualIncome"] =$data["annualIncome"];
           $para["remitterId"] =$data["remitterId"];
           $parameters=json_encode($para);
          // dd($parameters);
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
            $value='remitterUpdate';
            $result = \DmtRes::response($value,$mockmodestatus);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
           $output['apistatus']='REMITTER_UPDATE_SUCCESS';
           $output['message'] = "Remitter Updated Successful";
           $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
           $output['data'] = $jsonD->data;
        }
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI','ISE']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='REMITTER_UPDATE_FAILED';
            $output['message']= "Update Remitter Failed";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function beneficiaryRegistration($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
            $url=$instantpayData["apiUrl"]."beneficiaryRegistration"; 
            $txnID=rand();
            $product="InstantpayDMT";
            $para["remitterMobile"]=$data["remitterMobile"]; 
            $para["name"]=$data["name"];
            $para["gender"]=$data["gender"];
            $para["mobile"]=$data["mobile"];
            $para["relationship"]=$data["relationship"];
            $para["address"]=$data["address"];
            $para["paymentMode"]=$data["paymentMode"];
        if($para["paymentMode"]!='Cash Payment')  //CASH_PAYMENT
        {
            $para["bankBranchId"]=$data["bankBranchId"];
            $para["accountNumber"]=$data["accountNumber"];
        }else{
            $para["paymentMode"]='Cash Payment';
        }
        $parameters=json_encode($para);
          // dd($parameters);
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='beneficiaryRegistration';
            $result = \DmtRes::response($value,$mockmodestatus);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
           $output['apistatus']='BENEFICIARY_REGISTER_SUCCESSFULLY';
           $output['message'] = "Beneficiary Added Successfully";
           $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
           $output['data'] = $jsonD->data;
        }
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI','ISE']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='BENEFICIARY_REGISTER_FAILED';
            $output['message']= "Not able to add the Beneficiary";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function serviceCharge($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
            $url=$instantpayData["apiUrl"]."serviceCharge"; 
            $txnID=rand();
            $product="InstantpayDMT";
            $para["country"]=$data["country"];
            $para["paymentMode"]=$data["paymentMode"];
           if($data["transferAmount"])
           {
             $para["transferAmount"]=$data["transferAmount"];
           }else{
             $para["transferAmount"]="";
           }
           if($data["payoutAmount"])
           {
             $para["payoutAmount"]=$data["payoutAmount"];
        }else{
             $para["payoutAmount"]="";
           }
             $para["bankBranchId"]=$data["bankBranchId"];
             $parameters=json_encode($para);
           //dd($parameters);
        if(!$mockMode){        
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"];     
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='serviceCharge';
            $result = \DmtRes::response($value,$mockmodestatus);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
           $output['apistatus']='DATA_FETCHED_SUCCESSFUL';
           $output['message'] = "Service Charge Fetch Successfully";
           $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
           $output['data'] = $jsonD->data;
        }
       
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI','ISE']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='DATA_FETCHED_FAILED';
            $output['message']= "Unable to Fetch the service Charge";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function fundTransfer($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
           $url=$instantpayData["apiUrl"]."fundTransfer"; 
           $txnID=rand();
           $product="InstantpayDMT";
           $para["externalRef"]=$data["externalRef"];
           $para["remitterMobile"]=$data["remitterMobile"];
           $para["beneficiaryId"]=$data["beneficiaryId"];
           $para["transferAmount"]=$data["transferAmount"];
           $para["remittanceReason"]=$data["remittanceReason"];
           $para["otpReference"]=$data["otpReference"];
           $para["otp"]=$data["otp"];
           $para["latitude"]=$data["latitude"];
           $para["longitude"]=$data["longitude"];
           $parameters=json_encode($para);
           //dd($parameters);
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "POST", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           // dd($result);

            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='fundTransfer';
            $result = \DmtRes::response($value,$mockmodestatus);
            
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
           $output['apistatus']='TRANSFER_SUCCESS';
           $output['message'] = "Transaction Successful";
           $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
           $output['data'] = $jsonD->data;
        }
        else if ($jsonD->statuscode=='TUP')   
        { 
            $output['status'] = "pending";
            $output['apistatus']='TRANSFER_UNDER_PROCESS';
            $output['message']= "Transaction Under Progress";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI','ISE','DTX']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='TRANSFER_FAILED';
            $output['message']= "Transaction Failed";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }
    public static function fetchTransactionStatus($data, $mockMode,$mockmodestatus)
    {
        $instantpayData=self::createinstantpayHeader();
        if($instantpayData["status"]!="success"){
            $output["status"]="failed";
            $output['apistatus']='HEADER_PENDING';
            $output["message"]= "Header creation failed";
            $output['apiremark']= $output['message'];
              return $output;
        }
           $url=$instantpayData["apiUrl"]."fetchTransactionStatus"; 
           $txnID=rand();
           $product="InstantpayDMT";
           $para["ipayId"]=$data["ipayId"];
           $para["latitude"]=$data["latitude"];
           $para["longitude"]=$data["longitude"];
           $parameters=json_encode($para);
           //dd($parameters);
        if(!$mockMode){
                    
            $result = \PortalAPIHub::curl($product, $url, "GET", $parameters, $instantpayData["header"], "YES", "DMTV5Helper", $txnID);
           // dd($result);

            if($result["code"]!=200){
                $resMessage=json_decode($result['response']);
                $output["status"]="success";
                $output['apistatus']='FETCH_DATA_PENDING';
                $output["message"]="External API call failed with ".$result["code"].'( ' .$resMessage->status.')';
                $output['apiremark']=$output["message"];
                $output["code"]=$result["code"]; 
                
                 return $output;
            }  
            $jsonD=json_decode(($result["response"]));
        }else{
        
            $value='fetchTransactionStatus';
            $result = \DmtRes::response($value,$mockmodestatus);
          //dd($result);
            $jsonD=json_decode(json_encode($result["response"]));
        }

        if(json_last_error() != 0){
            $output["status"]="failed";
            $output["message"]="Response parsing error from  external API";
            $output['apistatus']='API_CALLFAILED';
            $output['apiremark']=$output["message"];
            return $output;
        }

        if($jsonD->statuscode=="TXN") //1== Transaction Successful //code added by pooja jadhav
        {
           $output['status'] = "success";
           $output['apistatus']='TRANSFER_SUCCESSFUL';
           $output['message'] = "Transaction Status Fetch  Successful";
           $output['apiremark']=isset($jsonD->status) ? $jsonD->status : "NA";
           $output['data'] = $jsonD->data;
        }
        else if ($jsonD->statuscode=='TUP')   
        { 
            $output['status'] = "pending";
            $output['apistatus']='TRANSFER_PENDING';
            $output['message']= "Status of Transaction Under Process";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }
        else if (in_array($jsonD->statuscode, ['IVC','ERR','RPI','ISE']))   
        { 
            $output['status'] = "success";
            $output['apistatus']='TRANSACTION_FAILED';
            $output['message']= "Transaction Status Failed to Fetch";
            $output['apiremark']= isset($jsonD->status) ? $jsonD->status : "NA";
            $output['data'] =isset($jsonD->data) ? $jsonD->data : [];

        }  else 
        {
            $output['status'] = "failed";
            $output['apistatus']='API_CALLFAILED';
            $output['message']= "Unknown resposne received. Please try again";
            $output['apiremark']=$output['message'];
            $output['code']=$result["code"];
        }
        
        return $output;

    }

}