<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use app\Helpers\DMTHelper;
use app\Helpers\DMTV4Helper;
use App\Models\Dmtsenders;
use App\Models\Dmtreports;
use App\Models\Api;
use App\models\User;
use App\models\Ekobanks2;
use Session;
use DB;

class DMTV4Controller extends Controller
{
    public function queryRemitter(Request $request)
    {
        $rules = array(
            'mobile' => 'required|numeric',
        );
   
    $validator = \Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        foreach ($validator->errors()->messages() as $key => $value) {
            $error = $value[0];
        }
        $output['status']='failed';
        $output['message']=$error;
        $output['apiremark']=$error;
        $output['act']='RETRY';
        return response()->json($output,400);
    }
   // dd(Auth::user());
    $user=User::where('id',\Auth::id())->first();
    if(!$user)
    {
        $output['status']='failed';
        $output['message']='User not found or user inactive';
        $output['apiremark']='User not found or user inactive';
        $output['act']='TERMINATE';
        return response()->json($output,400);
    }
   
    if($user->status == "blocked")
    {
        $output['status']='failed';
        $output['message']='User not found or user inactive';
        $output['apiremark']='User not found or user inactive';
        $output['act']='TERMINATE';
        return response()->json($output,400);
    }
   
    //api id
    $api_id = Api::select('id')->where('product',"dmt")->where('status','enabled')->first();
    if(!$api_id)
    {
        $output['status']='failed';
        $output['message']='Api not found and not active';
        $output['apiremark']='Api not found and not active';
        $output['act']='TERMINATE';
        return response()->json($output,400);
    }
   //dd(Session::get('mysessionid'));
    if(!Session::get('lat')){
        $output['status']='failed';
        $output['message']='Cannot find device location';
        $output['apiremark']='Cannot find device location';
        $output['act']='TERMINATE';
        return response()->json($output,400);
    }
   
    if(!Session::get('lon')){
        $output['status']='failed';
        $output['message']='Cannot find device location';
        $output['apiremark']='Cannot find device location';
        $output['act']='TERMINATE';
        return response()->json($output,400);
    }
   
    do {
        $request['txnid'] = $this->transcode().rand(1111111111, 9999999999);
    } while (Dmtreports::where("txnid", "=", $request->txnid)->first() instanceof DMTReport);
   
    $data['api']="dmtsearchcustomer";
    $data["via"]="web";
    $data['sessionid']=Session::get('mysessionid');
    $data['lat']=Session::get('lat');
    $data['lon']=Session::get('lon');
    $data['txnid']=$request->txnid;
    $data["mobile"]=$request->mobile;
    $mockmode = false;

if(1==2){
   $result = \DMTApi::searchCustomer($data, $mockmode);
}else{
    $result = \DmtApiv4::searchCustomer($data, $mockmode);
}
    if($result['apistatus'] == 'REGISTERED'){
        if(1==2){
        $beneficiaries = \DMTApi::getBeneficiaries($data, $mockmode);
        }else{
            $beneficiaries = \DmtApiv4::getBeneficiaries($data, $mockmode);
       
        }
        $beneficiaries = json_decode(json_encode($beneficiaries));
        if($beneficiaries->code != 200){
            $output['message'] = "Unable to fetch beneficiaries, please try again";
        }else{
            $output['message'] = $result['message'];
        }

        $output['status'] = $result['status'];
        $output['act'] = "CONTINUE";
        $output['apistatus']=$result['apistatus'];
        $output['apiremark']=$result['apiremark'];
        $output['name'] = $result['name'];
        $output['mobile']= $result['mobile'];
        $output['totallimit']= $result['totallimit'];
        $output['usedlimit']= $result['usedlimit'];
        $output['usercode']= $result['usercode'];
        $output['statedesc']=$result['statedesc'];
        $output['beneficiaries']=$beneficiaries;
       
        Session::put('mobileNumber', $request->mobile);
        Session::put('senderName', $result['name']);
    }
    else if($result['apistatus'] == 'NOT_REGISTERED'){
        $output['status'] = $result['status'];
        $output['act'] = "CONTINUE"; //050623 Vidyadhar
        $output['apistatus']=$result['apistatus'];
        $output['message']= $result['message'];
        $output['apiremark']= $result['apiremark'];
    }else if($result['apistatus'] == 'REGISTRATION_PENDING'){
        $output['status'] = $result['status'];
        $output["act"] = "CONTINUE";  //050623 Vidyadhar
        $output['apistatus']= $result['apistatus'];
        $output['message']= $result['message'];
        $output['apiremark']= $result['apiremark'];
        $output['mobile'] = $result['mobile'];
        $output['name1']= $result['name1'];
        if($output['name1']!="NA")
        {
            $output['name'] = explode(" ", $output['name1']);
            $output['fname']=$output['name'][0];
            $output['lname']=isset($output['name'][1]) ? $output['name'][1]: '' ; ////$output['name'][1]
        }
    }else {
        $output['status'] = "failed";
        $output['act'] = "TERMINATE";
        $output['apistatus']='API_CALLFAILED';
        $output['message']= "Unknown resposne received. Please try again";
        return response()->json($output,400);
    }
   //dd($output);
    return response()->json($output,200);
    
    }
    public function registerRemitter(Request $request)
    {
        
        // exit();
       $data['api']="dmtregisterremitter";
       $data["via"]="web";
       $data['sessionid']=Session::get('mysessionid');
       $data['lat']=Session::get('lat');
       $data['lon']=Session::get('lon');
       $data['mobile']=$request->mobile;
       $data['firstname']=$request->firstname;
       $data['lastname']=$request->lastname;
       $data['address']=$request->address;
       $data['otp']=$request->otp;
       $data['pincode']=$request->pincode;
       $data['stateresp']=$request->stateresp;
       $data['dob']=$request->dob;
       $data['bank3_flag']=$request->bank3_flag;
       $data['gst_state']=$request->gst_state;
      //  $data["parameter"]=$request->all();
        $mockmode = false;

        $result = \DmtApiv4::registerCustomer($data, $mockmode);
        if($result['status']=='success' && $result['apistatus']=='REGISTRATION_SUCCESSFUL'){
            Dmtsenders::create([
                "name"=>$request->firstname.' '.$request->lastname,
                "mobile" => $request->mobile,
                "pincode" => $request->pincode,
                "address" => $request->address,
                "dob" => $request->dob,
                "gst_state" => $request->gst_state,
               "company_id" => "12",
               "api" => "Paysprint",
               "user_id" => "234",
               
            ]);
        }
        dd($result);
    
    }
    public function registerBeneficiary(Request $request)
    {
        // print_r($request->all());
        // exit();
        $data['api']="dmtregisterbeneficiary";
        $data["via"]="web";
        $data['sessionid']=Session::get('mysessionid');
        $data['lat']=Session::get('lat');
        $data['lon']=Session::get('lon');
       $data['mobile']=$request->mobile;
       $data['benename']=$request->benename;
       $data['bankid']=$request->bankid;
       $data['accno']=$request->accno;
       $data['ifsccode']=$request->ifsccode;
       $data['verified']=$request->verified;
       $data['gst_state']=$request->gst_state;
       $data['dob']=$request->dob;
       $data['address']=$request->address;
       $data['pincode']=$request->pincode;
      //  $data["parameter"]=$request->all();
        $mockmode = false;
        $result = \DmtApiv4::addBeneficiary($data, $mockmode);
        dd($result);
    
    }
    public function fetchBeneficiary(Request $request)
    {
        // print_r($request->all());
        // exit();
        $data['api']="dmtfetchbeneficiary";
        $data["via"]="web";
        $data['sessionid']=Session::get('mysessionid');
        $data['lat']=Session::get('lat');
        $data['lon']=Session::get('lon');
       $data['mobile']=$request->mobile;
       
        $mockmode = false;
        $result = \DmtApiv4::getBeneficiaries($data, $mockmode);
       // dd($result);
    
    }
    public function deleteBeneficiary(Request $request)
    {
        // print_r($request->all());
        // exit();
        $data['api']="dmtdeletebeneficiary";
        $data["via"]="web";
        $data['sessionid']=Session::get('mysessionid');
        $data['lat']=Session::get('lat');
        $data['lon']=Session::get('lon');
       $data['mobile']=$request->mobile;
       $data['bene_id']=$request->bene_id;
        $mockmode = false;
        $result = \DmtApiv4::deleteBeneficiaries($data, $mockmode);
        dd($result);
    
    }
    public function pennyDrop(Request $request)
    {
        // print_r($request->all());
        // exit();
        $data['api']="dmtpennydrop";
        $data["via"]="web";
        $data['sessionid']=Session::get('mysessionid');
        $data['lat']=Session::get('lat');
        $data['lon']=Session::get('lon');
       $data['mobile']=$request->mobile;
       $data['accno']=$request->accno;
       $data['bankid']=$request->bankid;
       $data['benename']=$request->benename;
       $data['referenceid']=$request->referenceid;
       $data['pincode']=$request->pincode;
       $data['address']=$request->address;
       $data['dob']=$request->dob;
       $data['gst_state']=$request->gst_state;
       $data['bene_id']=$request->bene_id;
      
        $mockmode = true;
        $result = \DmtApiv4::accountVerification($data, $mockmode);
        dd($result);
    
    }
    public function sendMoney(Request $request){
       
        // if(!\MyHelper::can('service_dmt',\Auth::user()->role->slug))   //070923 J
        // {
        //     $output['status']='failed';
        //     $output['message']='Permission Not Allowed';
        //     $output['apiremark']='Permission Not Allowed';
        //     $output['act']='RETRY';
        //     return response()->json($output,400);
        // }
       
        $rules = array(
            'sen_mbl' => 'required|numeric',
            'sen_name' => 'required',
            'ben_id' => 'required',
            'tr_amount' => 'required|numeric',
            'tr_mode' => 'required'
        );
       
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            foreach ($validator->errors()->messages() as $key => $value) {
                $error = $value[0];
            }
            $output['status']='failed';
            $output['message']=$error;
            $output['apiremark']=$error;
            $output['act']='RETRY';
            return response()->json($output,400);
        }
       
        $user=User::where('id',\Auth::id())->first();
        if(!$user)
        {
            $output['status']='failed';
            $output['message']='User not found or user inactive';
            $output['apiremark']='User not found or user inactive';
            $output['act']='RETRY';
            return response()->json($output,400);
        }
       
        if(!$user->status == "blocked")
        {
            $output['status']='failed';
            $output['message']='User not found or user inactive';
            $output['apiremark']='User not found or user inactive';
            $output['act']='RETRY';
            return response()->json($output,400);
        }
       
        //api id
        $api_id = Api::select('id')->where('product',"dmt")->where('status','enabled')->first();
        if(!$api_id)
        {
            $output['status']='failed';
            $output['message']='Api not found and not active';
            $output['apiremark']='Api not found and not active';
            $output['act']='RETRY';
            return response()->json($output,400);
        }
       
        if(!Session::get('lat')){
            $output['status']='failed';
            $output['message']='Cannot find device location';
            $output['apiremark']='Cannot find device location';
            $output['act']='RETRY';
            return response()->json($output,400);
        }
       
        if(!Session::get('lat')){
            $output['status']='failed';
            $output['message']='Cannot find device location';
            $output['apiremark']='Cannot find device location';
            $output['act']='RETRY';
            return response()->json($output,400);
        }
       
        if($request->tr_amount < 100 || $request->tr_amount > 50000){
            $output['status']='failed';
            $output['message']='Transfer amount should be between Rs. 100 - 50,000';
            $output['apiremark']='Transfer amount should be between Rs. 100 - 50,000';
            $output['act']='RETRY';
            return response()->json($output,400);
        }
       
        //Beneficiary bank id
        $bankid = Ekobanks2::select('bankid')->where('bankname',$request->b_bank)->first();
        if(!$bankid)
        {
            $output['status']='failed';
            $output['message']='Bank not mapped with us';
            $output['apiremark']='Bank not mapped with us';
            $output['act']='RETRY';
            return response()->json($output,400);
        }
       
        $totalamount = $request->tr_amount;
        // $charge = \MyHelper::getccfvalue($totalamount,1);
        // $balcheck=\MyHelper::myTransactionalBalance($user->id,'M');
       
        // if($balcheck < $totalamount+$charge){
        //     $output['status']='failed';
        //     $output['message']='Insufficient wallet balance!';
        //     $output['apiremark']='Insufficient wallet balance!';
        //     $output['act']='RETRY';
        //     return response()->json($output,400);
        // }
       
       
        //  if($user->origin=="ent"){
        //     $balcheckent=\MyHelper::myTransactionalBalance($user->ent_id,'M');
        //     if($balcheckent < $totalamount+$charge)
        //     {
        //         $output['status']='failed';
        //         $output['message']="Transaction Failed Kindly contact to Admin";
        //         $output['apiremark']="Transaction Failed Kindly contact to Admin";
        //         $output['act']='TERMINATE';
        //         return response()->json($output,400);
        //     }
        // }
       
         if($request->tr_mode == 1){
            $txnmode = "neft";
        }else{
            $txnmode = "imps";
        }

        $amount = $request->tr_amount;
        for ($i=1; $i < 6; $i++) {
            if(5000*($i-1) <= $amount  && $amount <= 5000*$i){
                if($amount == 5000*$i){
                    $n = $i;
                }else{
                    $n = $i-1;
                    $x = $amount - $n*5000;
                }
                break;
            }
        }

         $amounts = array_fill(0,$n,5000);
        // do {
        //     $request['groupid'] = rand(1111111111, 9999999999);
        // } while (DMTReport::where("groupid", "=", $request->groupid)->first() instanceof DMTReport);
       
        // $groupid = "";
        if($amount > 5000){
            $groupid = $request->groupid;
        }else{
            $groupid = NULL;
        }
       
        if(isset($x)){
            array_push($amounts , $x);
        }
        $grouptTxnArray = array();
        foreach ($amounts as $amount) {
           
                if ($totalamount < $amount) {
                    continue;
                }
                $request['txnid']=$this->transcode().rand(1111111111, 9999999999);
                // do {
                //     $request['txnid'] = $this->transcode().rand(1111111111, 9999999999);
                // } while (DMTReport::where("txnid", "=", $request->txnid)->first() instanceof DMTReport);
           
           
       
            // $request['charge'] = \MyHelper::getccfvalue($amount,1);
           //  $balcheck=\MyHelper::myTransactionalBalance($user->id,'M');
             /*------wallet balance check------*/
            //  if($balcheck < $amount + $request['charge'] ){
            //     $output['status']='failed';
            //     $output['message']='Insufficient wallet balance!';
            //     $output['apiremark']='Insufficient wallet balance!';
            //     $output['act']='RETRY';
            //     return response()->json($output,400);
            //  }
           
              //check ent balance
              if($user->origin=="ent"){
                    $balcheckent=\MyHelper::myTransactionalBalance($user->ent_id,'M');
                    if($balcheckent < $amount + $request['charge'])
                    {
                        $output['status']='failed';
                        $output['message']="Transaction Failed Kindly contact to Admin";
                        $output['apiremark']="Transaction Failed Kindly contact to Admin";
                        $output['act']='TERMINATE';
                        return response()->json($output);
                    }
           
              }
           
           
             /*----------Get Provider id------------*/
            // if($amount >= 1 && $amount <= 1000){
            //     $provider = Provider::where('slug1', 'dmt_eko2')->first();
            // }elseif($amount>1000 && $amount<=2000){
            //     $provider = Provider::where('slug1', 'dmt_eko3')->first();
            // }elseif($amount>2000 && $amount<=3000){
            //     $provider = Provider::where('slug1', 'dmt_eko4')->first();
            // }elseif($amount>3000 && $amount<=4000){
            //     $provider = Provider::where('slug1', 'dmt_eko5')->first();
            // }elseif($amount >= 4000){
            //     $provider = Provider::where('slug1', 'dmt_eko6')->first();
            // }
           
            // if(!$provider){
            //     $output['status']='failed';
            //     $output['message']='Provider not found!';
            //     $output['apiremark']='Provider not found!';
            //     $output['act']='RETRY';
            //     return response()->json($output,400);
            // }
            /*----------Get Provider id------------*/
           
       
        //    $gettxnalcommi=\DmtCommisionHelper::getCommission($amount,$provider->id,$user);
        //     if($gettxnalcommi['usercommission']==0 && $gettxnalcommi['rtcommission']==0 && $gettxnalcommi['dtcommission']==0 && $gettxnalcommi['mdcommission']==0)
        //     {
        //         $output['status']='failed';
        //         $output['message']='Commission not set';
        //         $output['apiremark']='Commission not set';
        //         $output['act']='TERMINATE';
        //         return response()->json($output,400);
        //     }
        //     $data['usercommission']=$gettxnalcommi['usercommission'];    
               
           
            /*----wallet debit condition ------*/
            $data["function"] = "sendmoney";
            $data['product']="dmt";
            $data['user_id']= $user->id;
            $data['type']='debit';
            $data['amount']=$amount;
            $data['mainwallet']=$user->mainwallet;
            $data['txnid']=$request->txnid;
            $data['refno']=NULL;
            $data['charge']= $request['charge'];
            $data['ledgerremark']="DMT_SEND";
            $data['wallet']="mainwallet";
           // $data['profit']=$gettxnalcommi['usercommission'];
           
           
            //user debit entry
        //    // $UserledgerEntry= \DBHandler::userLedgerEntry($data);
        //     if($UserledgerEntry["status"]=="success")
        //     {
        //         $debit = User::where('id', $user->id)->decrement('mainwallet', $amount + $request['charge']);
        //     }
           
           
            //ent debit
            if($user->origin == "ent"){
                try{
                   \DBHandler::entdebitledger($data,$user);
                }catch(\Exception $e){
                   \MyHelper::reportException($e, "ENTWALLET_ENTRY", "TRIGGER");
                }
            }
           
           
           
           // $users = \Myhelper::getParents($user->id);
            // $currentDateTime = Carbon::now();
            // $currentDate = $currentDateTime->format('Y-m-d H:i:s');


            $mockmode = false;
            //pending report entry
            $data['api']="ekoDMTTRansfer";
            $data["via"]="web";
            $data['sessionid']=Session::get('mysessionid');
            $data['lat']=Session::get('lat');
            $data['lon']=Session::get('lon');
            $data['txnid']=$request->txnid;
            $data["user_id"]=$user->id;
            $data["customer_mobile"]=$request->sen_mbl;
            $data['b_id']=$request->ben_id;
            $data["amount"]=$amount;
            $data["txnmode"]=$request->tr_mode;
            $data['transfer_mode'] = $txnmode;
            
           
            $report['api']="ekoDMTTRansfer";
            $report['mobile'] = $request->sen_mbl;
            $report['sender_name'] = $request->sen_name;
            $report['beneficiary_id'] = $request->ben_id;
            $report['beneficiary_name'] = $request->b_name;
            $report['beneficiary_account'] = $request->b_account;
            $report['beneficiary_ifsc'] = $request->b_ifsc_number;
            $report['transfer_mode'] = $txnmode;
            $report['api_id'] = $api_id->id;
            $report['beneficiary_bankid'] = $bankid->bankid;
            $report['txnid'] = $request->txnid;
           // $report['user_id'] = $users['user'];
            //$report['sender_kyc'] = "minkyc"; -- Commented as instructed by Jyoti Ma'am 28072023
            $report['lat']=Session::get('lat');
            $report['lon']=Session::get('lon');
            $report['amount']=$amount;
           // $report['provider_id'] = $provider->id;
            $report['ip']=$request->ip();
            $report['groupid']=$groupid;
            $report['charge'] = $request['charge'];
            $report['sessionid']=$data['sessionid'];
            $report['via']=$data['via'];
            //$report['operator']=$provider->id;
           // $report['usercommission']=$gettxnalcommi['usercommission'];
         
            $totalamount = $totalamount - $amount;
            $sender=Dmtsenders::where('mobile',$request->sen_mbl)->first();
            if($sender)
        {
           // dd($sender);
            $data['address'] = $sender->address;
            $data['pincode'] = $sender->pincode;
            $data['dob'] = $sender->dob;
            $data['gst_state'] = $sender->gst_state;
            $result = \DmtApiv4::DMTTransfer($data, $mockmode);
                    dd($result);
        }
             dd($sender);
            try {
                    //$report_entry = \DBHandler::create($report);
                    // dd($report_entry);
                    // if($report_entry['status']=='failed')
                    // {
                    //     $output['status']='failed';
                    //     $output['message']='Failed to create the entry';
                    //     $output['apiremark']='Failed to create the entry';
                    //     $output['act']='TERMINATE';
                    //      return response()->json($output);
                    // }
                   
                    
                   
                    if($report_entry['status']=='success')
                    {                    
                            if(1==2)
                            {
                            $result = \DMTApi::ekoDMTTRansfer($data, $mockmode);//------------------------------DMT API CALL
                            }else{
                               dd($data);
                           $result = \DmtApiv4::DMTTransfer($data, $mockmode);
         
                            }
                            if($result['status']=='failed')
                            {
                                DMTReport::where('id', $report_entry['reportid'])->update([
                                    'status'=> "failed",
                                    'tid' => $result['tid'],
                                    'remark' => $result['message'] ,
                                    'apiremark' => $result['apiremark']
                                ]);
                               
                                $output['status']='failed';
                                $output['message']='API Called Failed Invalid Response';
                                $output['apiremark']='API Call Failed Invalid Response';
                                $output['act']='TERMINATE';
                            }
                            if($result['refno'] == null){
                                    $txnrefno = "NA";
                            }
                           
                           
                        $txnrefno = $result['refno'];
                       
                        if($result['apistatus'] == 'TRANSFER_SUCCESSFUL'){
                             
                                $request['gst'] = $request->charge - floor($this->getGst($request->charge)*1000)/1000;
                                $grossprofit=$request->charge - $request->gst - $gettxnalcommi['usercommission'];
                                $report['usercommi'] = $gettxnalcommi['usercommission'];
                                $tdsamount = \MyHelper::gettdsvalue($grossprofit,5);
                               
                                DMTReport::where('id', $report_entry['reportid'])->update([
                                    'status'=> "success",
                                    'tid' => $result['tid'],
                                    'remark' => $result['message'] ,
                                    'apiremark' => $result['apiremark'],
                                    'refno' => $txnrefno,
                                    'gst' => $request['gst'],
                                    'profit' => $grossprofit,
                                    'tds' => $tdsamount
                                ]);
                               
                                $leg_data['id'] = $UserledgerEntry['reportid'];
                                $leg_data['refno'] = $txnrefno;
                                $leg_data['user_id']= $user->id;
                                $leg_data['profit']= $grossprofit;
                                $leg_data['tds'] = $tdsamount;    
                               
                                $report['refno']=$txnrefno;
                                $UpdateledgerEntry=  \DBHandler::updateLedgerEntry($leg_data);
                                \DmtCommisionHelper::updateparentcommission($amount,$provider->id,$user,$report_entry['reportid'],"dmt");
                                try{
                                     \DmtCommisionHelper::processparentcommission($report,$request->operator,$user,'dmt','M');
                                  }catch(\Exception $e){
                                     \MyHelper::reportException($e, "COMMI_ERRROR", "TRIGGER");
                                  }
                               
                                $array_data['amount'] = $amount;
                                $array_data['charge'] = $this->getCharge($amount);
                                $array_data['txnid'] = $request->txnid;
                                $array_data['refno'] = $txnrefno;
                                $array_data['sendername'] = $request->sen_mbl;
                                $array_data['sendermbl'] = $request->sen_name;
                                $array_data['beneficiary_name'] = $request->b_name;
                                $array_data['bankname'] = $request->b_bank;
                                $array_data['beneficiary_account'] = $request->b_account;
                                $array_data['beneficiary_ifsc'] = $request->b_ifsc_number;
                                $array_data['totalamount'] = $request->tr_amount;
                                $array_data['totalcharges'] = $charge;
                                $array_data['status'] = "success";
                                $array_data['txnmode'] = $txnmode;
                                $array_data['txnremark'] = $result['message'];
                                $array_data['orderid'] = $report_entry['reportid'];
                               
                                array_push($grouptTxnArray, $array_data);
       
                                $serviceID=\MyHelper::getServiceIDBySlug("dmt");
                                \MyHelper::updateBusinessStats($user->company_id, $user->id, $serviceID, $data["amount"], $user);
                               
                               
                                $output['status'] = $result['status'];
                                $output['apistatus']=$result['apistatus'];
                                $output['act'] = "CONTINUE";
                                $output['message']= $result['message'];
                                $output['tid']= $result['tid'];
                                $output['refno'] = $txnrefno;
                                $output['apiremark']= $result['apiremark'];
                                $output['date'] = $currentDate;
                                $output['txnarray']= $grouptTxnArray;
                            }
                        else if($result['apistatus'] == 'TRANSFER_FAILED'){
                            DMTReport::where('id', $report_entry['reportid'])->update([
                                'status'=> "failed",
                                'tid' => $result['tid'],
                                'refno' => $result['refno'],
                                'remark' => $result['message'] ,
                                'apiremark' => $result['apiremark']
                            ]);
                           
                            $leg_data['id'] = $UserledgerEntry['reportid'];
                            $leg_data['refno'] = $txnrefno;
                            $leg_data['user_id']= $user->id;
                            $leg_data['profit']= 0;
                            $UpdateledgerEntry= \DBHandler::updateLedgerEntry($leg_data);
                           
                            $array_data['amount'] = $amount;
                            $array_data['charge'] = $this->getCharge($amount);
                            $array_data['txnid'] = $request->txnid;
                            $array_data['refno'] = $txnrefno;
                            $array_data['sendername'] = $request->sen_mbl;
                            $array_data['sendermbl'] = $request->sen_name;
                            $array_data['beneficiary_name'] = $request->b_name;
                            $array_data['bankname'] = $request->b_bank;
                            $array_data['beneficiary_account'] = $request->b_account;
                            $array_data['beneficiary_ifsc'] = $request->b_ifsc_number;
                            $array_data['totalamount'] = $request->tr_amount;
                            $array_data['totalcharges'] = $charge;
                            $array_data['status'] = "failed";
                            $array_data['txnmode'] = $txnmode;
                            $array_data['txnremark'] = $result['message'];
                            $array_data['orderid'] = $report_entry['reportid'];
       
                            array_push($grouptTxnArray, $array_data);
                           
                            /*----wallet credit condition for failed txn------*/
                           
                            $data["product"] = "dmt";
                            $data['profit']=0;
                            $data['user_id']= $user->id;
                            $data['type']='refunded';
                            $data['amount']=$amount;
                            $data['txnid']=$request->txnid."R";
                            $data['refno']=$result['refno']."R";
                            $UserledgerEntry= \DBHandler::userLedgerEntry($data);
                           
                            if($UserledgerEntry["status"]=="success" && $debit==1)
                            {
                                $credit = User::where('id', $user->id)->increment('mainwallet', $amount + $request['charge']);
                            }
                           
                            if($user->origin=="ent")
                            {
                               
                                 try{
                                   \DBHandler::entdebitledger($data,$user);
                                }catch(\Exception $e){
                                   \MyHelper::reportException($e, "ENTWALLET_ENTRY", "TRIGGER");
                                }
                            }
                            /*----wallet credit condition for failed txn ------*/
                           
                            $output['status'] = $result['status'];
                            $output['apistatus']=$result['apistatus'];
                            $output['act']="RETRY";
                            $output['message']= $result['message'];
                            $output['refno']=$txnrefno;
                            $output['tid']=$result['tid'];
                            $output['apiremark']=$result['apiremark'];
                            $output['date'] = $currentDate;
                            $output['txnarray']= $grouptTxnArray;
                        }
                        else if($result['apistatus'] == 'TRANSFER_PENDING'){
                                $request['gst'] = $request->charge - floor($this->getGst($request->charge)*1000)/1000;
                                $grossprofit=$request->charge - $request->gst - $gettxnalcommi['usercommission'];
                                $report['usercommi'] = $gettxnalcommi['usercommission'];
                                $tdsamount = \MyHelper::gettdsvalue($grossprofit,5);
                            DMTReport::where('id', $report_entry['reportid'])->update([
                                'status'=> "pending",
                                'tid' => $result['tid'],
                                'refno' =>$txnrefno,
                                'remark' => $result['message'] ,
                                'apiremark' => $result['apiremark'],
                                'gst' => $request['gst'],
                                'profit' => $grossprofit,
                                'tds' => $tdsamount
                            ]);
                           
                            $leg_data['id'] = $UserledgerEntry['reportid'];
                            $leg_data['refno'] = $txnrefno;
                            $leg_data['user_id']= $user->id;
                            $leg_data['profit']= 0;
                            $UpdateledgerEntry= \DBHandler::updateLedgerEntry($leg_data);
                            \DmtCommisionHelper::updateparentcommission($amount,$provider->id,$user,$report_entry['reportid'],"dmt");
                           
                            $array_data['amount'] = $amount;
                            $array_data['charge'] = $this->getCharge($amount);
                            $array_data['txnid'] = $request->txnid;
                            $array_data['refno'] = $txnrefno;
                            $array_data['sendername'] = $request->sen_mbl;
                            $array_data['sendermbl'] = $request->sen_name;
                            $array_data['beneficiary_name'] = $request->b_name;
                            $array_data['bankname'] = $request->b_bank;
                            $array_data['beneficiary_account'] = $request->b_account;
                            $array_data['beneficiary_ifsc'] = $request->b_ifsc_number;
                            $array_data['totalamount'] = $request->tr_amount;
                            $array_data['totalcharges'] = $charge;
                            $array_data['status'] = "pending";
                            $array_data['txnmode'] = $txnmode;
                            $array_data['txnremark'] = $result['message'];
                            $array_data['orderid'] = $report_entry['reportid'];
                           
                            array_push($grouptTxnArray, $array_data);
                           
                            $output['status'] = $result['status'];
                            $output['apistatus']=$result['apistatus'];
                            $output['act']="TERMINATE";
                            $output['message']= $result['message'];
                            $output['refno']=$txnrefno;
                            $output['tid']=$result['tid'];
                            $output['apiremark']=$result['apiremark'];
                            $output['date'] = $currentDate;
                            $output['txnarray']= $grouptTxnArray;
                        }
                        else{
                            DMTReport::where('id', $report_entry['reportid'])->update([
                                'status'=> "pending",
                                'tid' => $result['tid'],
                                'remark' => $result['message'] ,
                                'apiremark' => $result['apiremark']
                            ]);
                            \DmtCommisionHelper::updateparentcommission($amount,$provider->id,$user,$report_entry['reportid'],"dmt");
                            $output['status'] = $result['status'];
                            $output['apistatus'] = $result['apistatus'];
                            $output['message'] = $result['message'];
                        }
                    }
                    else{
                        $output['status']='failed';
                        $output['message']='Failed to create the entry';
                        $output['apiremark']='Failed to create the entry';
                        $output['act']='TERMINATE';
                    }
            }catch(\Exception $e){
                $output["status"]="failed" ;
                $output["act"]="TERMINATE";
                $output["message"]="Unknown response received!";
                \MyHelper::reportException($e, "DMT", "TRIGGER");
                return response()->json($output,400);
            }
           
        }
        return response()->json($output);

    }
    public function transaction(Request $request)
    {
        dd($request->all());
        // exit();
        $data['api']="dmttransaction";
        $data["via"]="web";
        $data['sessionid']=Session::get('mysessionid');
        $data['lat']=Session::get('lat');
        $data['lon']=Session::get('lon');
        $data['mobile']=$request->mobile;
        $data['referenceid']=$request->referenceid;
        $data['pipe']=$request->pipe;
       $data['pincode']=$request->pincode;
       $data['address']=$request->address;
       $data['dob']=$request->dob;
       $data['gst_state']=$request->gst_state;
       $data['bene_id']=$request->bene_id;
       $data['txntype']=$request->txntype;
       $data['amount']=$request->amount;
       $newDate = date("Y-m-d", strtotime($data['dob']));  
        
        $mockmode = false;

        $dmtreport = new Dmtreports();        
        
           $dmtreport->mobile=$request->mobile;
           $dmtreport->referenceid = $request->referenceid;
           $dmtreport->pipe = $request->pipe;
           $dmtreport->pincode = $request->pincode;
           $dmtreport->address = $request->address;
           $dmtreport->dob = $newDate;
           $dmtreport->gst_state=$request->gst_state;
           $dmtreport->bene_id = $request->bene_id;
           $dmtreport->txntype = $request->txntype;
           $dmtreport->amount = $request->amount;
           $dmtreport->status = "pending";
           $dmtreport->save();
           $insertedId = $dmtreport->id;
 
         
        $result = \DmtApiv4::DMTTransfer($data, $mockmode);
       // dd($result['apistatus']);
       $updatedmtreport = Dmtreports::find($insertedId);
       
        if($result['apistatus']=="TRANSFER_SUCCESSFUL"){
            $updatedmtreport->status = "success";
        }else if($result['apistatus']=="TRANSFER_FAILED"){
            $updatedmtreport->status = "Failed";
        }else if($result['apistatus']=="TRANSFER_PENDING"){
            $updatedmtreport->status = "pending";
        }else{
            $updatedmtreport->status = "pending" ; //$result['status'];
        }
        $updatedmtreport->referenceid = isset($result['refno']) ? $result['refno'] : $request->referenceid;
        $updatedmtreport->apistatus = $result['apistatus'];
        $updatedmtreport->apiremark = $result['apiremark'];
        $updatedmtreport->ack = isset($result['refno2']) ? $result['refno2'] : "NA";
       // $updatedmtreport->apiremark = $result['apiremark'];
       
        $updatedmtreport->save();
        
        dd($result);
    
    }
    public function transactionStatus(Request $request)
    {
        // print_r($request->all());
        // exit();
        $data['api']="dmttransationstatus";
        $data["via"]="web";
        $data['sessionid']=Session::get('mysessionid');
        $data['lat']=Session::get('lat');
        $data['lon']=Session::get('lon');
        $data['referenceid']=$request->referenceid;
        $mockmode = false;
        $result = \DmtApiv4::DMTTrans_status($data, $mockmode);

      
        $reportcount = Dmtreports::where('referenceid',$request->referenceid)->first();
       // if($reportcount>0){
            if($result['refno']=='NA')
            {
                $refno=$request->referenceid;
            }else{
                $refno=$result['refno'];
            }
            if($result['refno2']=='NA')
            {
                $refno2="NA";
            }else{
                $refno2=$result['refno2'];
            }
        
            $transation_status=Dmtreports::where('id',$reportcount->id)
                        ->update(['ack'=>$refno2,
                        'referenceid'=>$refno,
                        'status' => $result['status'],
                        'apistatus' =>  $result['apistatus'],
                        'apiremark'=>$result['apiremark']
                    ]);
        
             //   }

       
        dd($result);
    
    }
    public function refundOtp(Request $request)
    {
        // print_r($request->all());
        // exit();
        $data['api']="dmtrefund_otps";
        $data["via"]="web";
        $data['sessionid']=Session::get('mysessionid');
        $data['lat']=Session::get('lat');
        $data['lon']=Session::get('lon');
        $data['referenceid']=$request->referenceid;
        $data['ackno']=$request->ackno;
       
        $mockmode = false;
        $result = \DmtApiv4::sendRefundOTP($data, $mockmode);
        dd($result);
    
    }
    public function claimRefund(Request $request)
    {
        // print_r($request->all());
        // exit();
        $data['api']="dmtrefundTransaction";
        $data["via"]="web";
        $data['sessionid']=Session::get('mysessionid');
        $data['lat']=Session::get('lat');
        $data['lon']=Session::get('lon');
        $data['referenceid']=$request->referenceid;
        $data['ackno']=$request->ackno;
        $data['otp']=$request->otp;
        $mockmode = false;
        $result = \DmtApiv4::refundTransaction($data, $mockmode);
        dd($result);
    
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
