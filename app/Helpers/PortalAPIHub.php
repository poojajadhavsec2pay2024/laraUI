<?php 
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TestController;
use App\Models\ApilogsDMT;
use App\Models\ApilogsIndoNepalDMT;
use App\Models\ApilogsAEPS;
use DB;
class PortalAPIHub {

public static function curl($product, $url , $method='GET', $parameters, $header, $log="no", $source="none", $txnid="none")      
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
    curl_setopt($curl, CURLOPT_ENCODING, "");
    curl_setopt($curl, CURLOPT_TIMEOUT, 180);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    if($parameters != ""){
        curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
    }
    if(sizeof($header) > 0){
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
    }
    $response = curl_exec($curl);
    $err = curl_error($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    //echo $response;

    if($log != "no"){
         if(in_array($product, ["PaysprintDMT"])){
            ApilogsDMT::create([
                "product"=>$product,
                "url" => $url,
                "source" => $source,
               "txnid" => $txnid,
               "header" => json_encode($header),
               "request" => $parameters,
                "response" => $response,
                "responsecode" => $code
            ]);
        }
        if(in_array($product, ["InstantpayDMT"])){
            ApilogsIndoNepalDMT::create([
                "product"=>$product,
                "url" => $url,
                "source" => $source,
               "txnid" => $txnid,
               "header" => json_encode($header),
               "request" => $parameters,
                "response" => $response,
                "responsecode" => $code
            ]);
        }
       
    }

    return ["response" => $response, "error" => $err, 'code' => $code];
}

public static function curlAEPS($product, $url , $method='GET', $plainData,$request, $header, $log="no", $source="none", $txnid="none")      
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
    curl_setopt($curl, CURLOPT_ENCODING, "");
    curl_setopt($curl, CURLOPT_TIMEOUT, 180);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    if($request != ""){
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request));
    }
    if(sizeof($header) > 0){
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header); 
    }
    $response = curl_exec($curl);
    $err = curl_error($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    //echo $response;
    if($log != "no"){
         if(in_array($product, ["PaysprintAeps"])){
            ApilogsAEPS::create([
                "product"=>$product,
                "url" => $url,
                "source" => $source,
                "encrypted_response"=>json_encode($request),
               "txnid" => $txnid,
               "header" => json_encode($header),
               "request" => json_encode($plainData),
                "response" => $response,
                "responsecode" => $code
            ]);
        }
       
    }

    return ["response" => $response, "error" => $err, 'code' => $code];
}
public static function dataEncrypt($plainData)      
{
    $key ='060e37d1f82cde00';	//(provided by PAYSPRINT)
    $iv  = '788a4b959058271e'; 
    $cipher = openssl_encrypt(json_encode($plainData,true), 'AES-128-CBC', $key, $options=OPENSSL_RAW_DATA, $iv);
    $request1= base64_encode($cipher);
    return $request1;
}
public static function aadhardataEncrypt($aadharData)      
{
    
    $encryptionKey='8bdcec336fac74a08bdcec336fac74a0';
    $ivlen = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($aadharData,'aes-256-cbc', $encryptionKey, OPENSSL_RAW_DATA, $iv);
    $encryptedData = base64_encode($iv . $ciphertext);
    
    return $encryptedData;
}
// $aadhaarNumber=269522539187;
//         $encryptionKey='9293d18db741bc609293d18db741bc60';
//         $ivlen = openssl_cipher_iv_length('aes-256-cbc');
//         $iv = openssl_random_pseudo_bytes($ivlen);
//         $ciphertext = openssl_encrypt($aadhaarNumber,'aes-256-cbc', $encryptionKey, OPENSSL_RAW_DATA, $iv);
//         $encryptedData = base64_encode($iv . $ciphertext);
// 				echo $encryptedData


}
