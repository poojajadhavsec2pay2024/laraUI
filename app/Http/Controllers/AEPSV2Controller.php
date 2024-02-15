<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aepsreports;


class AEPSV2Controller extends Controller
{
    public function merchantOnboard(Request $request)
    {
        // print_r($request->all());
        // exit();
        $data['api']="AepsmerchantOnboard";
        $data["via"]="web";
       // $data['sessionid']=Session::get('mysessionid');
       // $data['lat']=Session::get('lat');
       // $data['lon']=Session::get('lon');
       $data['merchantmobilenumber']=$request->merchantmobilenumber;
       $data['latitude']=$request->latitude;
       $data['longitude']=$request->longitude;
       $data['submerchantid']=$request->submerchantid;
       $data['statecode']=$request->statecode;
       $data['city']=$request->city;
       $data['merchant_name']=$request->merchant_name;
       $data['address']=$request->address;
       $data['pannumber']=$request->pannumber;
       $data['pincode']=$request->pincode;
      $mockmode = false;

        $result = \AEPSApiv4::merchantOnboarding($data, $mockmode);
        dd($result);
    
    }
    public function merchantOnboard_statusCheck(Request $request)
    {
        
        $data['api']="AepsmerchantOnboardStatusCheck";
        $data["via"]="web";
        $data['mobile']=$request->mobile;
        $data['pipe']=$request->pipe;
        $data['merchantcode']=$request->merchantcode;
        $mockmode = false;

        $result = \AEPSApiv4::Onboarding_statusCheck($data, $mockmode);
        dd($result);
    
    }
    public function aeps2FA(Request $request)
    {
        
        $data['api']="Aeps2FA";
        $data["via"]="web";
        $data['accessmodetype']=$request->accessmodetype;
        $data['adhaarnumber']=$request->adhaarnumber;
        $data['mobilenumber']=$request->mobilenumber;
        $data['latitude']=$request->latitude;
        $data['longitude']=$request->longitude;
        $data['referenceno']=$request->referenceno;
        $data['submerchantid']=$request->submerchantid;
        $data['timestamp']=$request->timestamp;
        $data['data']=$request->data;
        $data['ipaddress']=$request->ipaddress;
      
        $mockmode = false;

        $result = \AEPSApiv4::aeps2FA($data, $mockmode);
        dd($result);
    
    }

    public function stateList(Request $request)
    {
        
        $data['api']="AepsstateList";
        $data["via"]="web";
        $mockmode = false;

        $result = \AEPSApiv4::aepsStateList($data, $mockmode);
        dd($result);
    
    }
    public function bankList(Request $request)
    {
        
        $data['api']="AepsbankList";
        $data["via"]="web";
        $mockmode = false;

        $result = \AEPSApiv4::aepsBankList($data, $mockmode);
        dd($result);
    
    }
  
    public function transaction(Request $request)
    {
        
        $data['api']="AepsWithdrawl";
        $data["via"]="web";
        $data['merchant_name']=$request->merchant_name;
        $data['pannumber']=$request->pannumber;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['pincode']=$request->pincode;
        $data['statecode']=$request->statecode;
        $data['mobilenumber']=$request->mobilenumber;
        $data['accessmodetype']=$request->accessmodetype;
        $data['ipaddress']=$request->ipaddress;
        $data['adhaarnumber']=$request->adhaarnumber;
        $data['merchantmobilenumber']=$request->merchantmobilenumber;
        $data['latitude']=$request->latitude;
        $data['longitude']=$request->longitude;
        $data['referenceno']=$request->referenceno;
        $data['nationalbankidentification']=$request->nationalbankidentification;
        $data['pipe']=$request->pipe;
        $data['transcationtype']=$request->transcationtype;
        $data['requestremarks']=$request->requestremarks;
        $data['submerchantid']=$request->submerchantid;
        $data['data']=$request->data;
        $data['timestamp']=$request->timestamp;
        $data['request_type']=$request->request_type;
        
        if($request->request_type=='CW')
        {
        $data['amount']=$request->amount;
        }
       
        $mockmode = false;
        $Aepsreports = new Aepsreports();        
        $Aepsreports->merchant_name=$request->merchant_name;
        $Aepsreports->pannumber=$request->pannumber;
        $Aepsreports->address=$request->address;
        $Aepsreports->city=$request->city;
        $Aepsreports->pincode=$request->pincode;
        $Aepsreports->statecode=$request->statecode;
        $Aepsreports->mobilenumber=$request->mobilenumber;
        $Aepsreports->accessmodetype=$request->accessmodetype;
        $Aepsreports->ipaddress=$request->ipaddress;
        $Aepsreports->adhaarnumber=$request->adhaarnumber;
        $Aepsreports->merchantmobilenumber=$request->merchantmobilenumber;
        $Aepsreports->latitude=$request->latitude;
        $Aepsreports->longitude=$request->longitude;
        $Aepsreports->referenceno=$request->referenceno;
        $Aepsreports->nationalbankidentification=$request->nationalbankidentification;
        $Aepsreports->pipe=$request->pipe;
        $Aepsreports->transcationtype=$request->transcationtype;
        $Aepsreports->requestremarks=$request->requestremarks;
        $Aepsreports->submerchantid=$request->submerchantid;
        $Aepsreports->timestamp=$request->timestamp;
        $Aepsreports->request_type=$request->request_type;
        
        if($request->request_type=='Withdrawl')
        {
            $Aepsreports->amount=$request->amount;
        }
        $Aepsreports->status='pending';
        $Aepsreports->save();
        $insertedId = $Aepsreports->id;
       
        $result = \AEPSApiv4::aepsTransaction($data, $mockmode);
        $updateaepsreport = Aepsreports::find($insertedId);
        
         if($result['apistatus']=="TRANSACTION_SUCCESS"){
             $updateaepsreport->status = "Success";
         }else if($result['apistatus']=="TRANSACTION_FAILED"){
             $updateaepsreport->status = "Failed";
         }else if($result['apistatus']=="TRANSACTION_TIMEOUT"){
             $updateaepsreport->status = "Timeout";
         }else{
             $updateaepsreport->status = "pending" ; //$result['status'];
         }
         $updateaepsreport->balanceamount = isset($result['balanceamount']) ? $result['balanceamount'] : "NA";
         $updateaepsreport->apistatus = $result['apistatus'];
         $updateaepsreport->apiremark = isset($result['apiremark']) ? $result['apiremark'] : "NA";
         $updateaepsreport->ack = isset($result['refno2']) ? $result['refno2'] : "NA";
         $updateaepsreport->referenceno = isset($result['bankrrn']) ? $result['bankrrn'] : $request->referenceno;
         $updateaepsreport->save();
         
         dd($result);
      
       
    
    }
    public function transaction_status(Request $request)
    {
        
        $data['api']="AepsWithdrawl";
        $data["via"]="web";
        $data['reference']=$request->reference;
        $mockmode = false;

        $result = \AEPSApiv4::aepsTransactionStatus($data, $mockmode);
        $reportcount = Aepsreports::where('referenceno',$request->reference)->first();
       // dd($reportcount);
       //if(count($reportcount)>0){
            if($result['refno2']=='NA')
            {
                $refno2="NA";
            }else{
                $refno2=$result['refno2'];
            }
        
            $transation_status=Aepsreports::where('id',$reportcount->id)
                        ->update(['ack'=>$refno2,
                        'status' => $result['status'],
                        'apistatus' =>  $result['apistatus'],
                        'apiremark'=>$result['apiremark']
                    ]);
          //   }
        
        dd($result);
    
    }
}
