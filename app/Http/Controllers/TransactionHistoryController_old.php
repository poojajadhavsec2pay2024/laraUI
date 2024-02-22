<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Crypt;
class TransactionHistoryController extends Controller
{
    public function index(Request $request,$id=0)
    {
        $type='indonepal';
        $user = Auth::user();
        if($type!='indonepal'){

       
   

                    $user = Auth::user();
                   // dd($user);
                    ini_set('memory_limit', '-1');

                    // Set $userid based on $id
                    if ($id != 0) {
                        $userid = $id;
                    } else {
                        $userid = $user->id;
                    }

                    // Fetch user data
                    $data['user'] = User::where('id', $userid)
                        ->first(["name", "id", "role_id", "scheme_id", "wl_id", "ent_id", "dt_id", "md_id"]);

                    // Restrict statements parent-wise for clients
                    if ($data['user']->user_type == "client" && $id != 0) {
                        switch ($user->role_id) {
                            case 11:
                                $field = 'wl_id';
                                break;
                            case 10:
                                $field = 'ent_id';
                                break;
                            case 12:
                                $field = 'md_id';
                                break;
                            case 13:
                                $field = 'dt_id';
                                break;
                            case 14:
                                abort(503);
                                break;
                            default:
                            abort(503);
                                break;
                        }
                        $parentCheck = User::where('id', $userid)->where($field, $data['user']->$field)->first(["name", "id", "role_id","scheme_id", "wl_id"]);
                        if (!$parentCheck) {
                            abort(503);
                        }
                    }

                    $data['type'] = $type;
                        //$typeSpecificQuery = null;

                        switch ($type) {
                            case 'walletstatement':
                                switch ($data['user']->role_id) {
                                    case 4:
                                        $data = FinanceLedgers::where('user_id', $userid)
                                            ->where(function ($query) {
                                                $query->where('product', 'fund_request')
                                                    ->orWhere('product', 'accountop');
                                            })
                                            ->where('wallet', 'mainwallet')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 11:
                                        $data = WLLedger::where('user_id', $userid)
                                            ->where('wallet', 'mainwallet')
                                            ->where('status', 'show')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 12:
                                        $data = MDLedger::where('user_id', $userid)
                                            ->where('wallet', 'mainwallet')
                                            ->where('status', 'show')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 13:
                                        $data = DTLedger::where('user_id', $userid)
                                            ->where('wallet', 'mainwallet')
                                            ->where('status', 'show')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 10:
                                        $data = ENTLedger::where('user_id', $userid)
                                            ->where('wallet', 'mainwallet')
                                            ->where('status', 'show')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 14:
                                        $data = RTLedger::where('user_id', $userid)
                                            ->where('wallet', 'mainwallet')
                                            ->where('status', 'show')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 15:
                                        $data = WLADMINLedger::where('user_id', $userid)
                                            ->where('wallet', 'mainwallet')
                                            ->where('status', 'show')
                                            ->orderBy('id', 'desc');
                                        break;
                                   

                                        $currentDate = Carbon::now()->format('Y-m-d');

                                        $fromDate = isset($request->fromdate) && !empty($request->fromdate) ? $request->fromdate : $currentDate;
                                        $toDate = isset($request->todate) && !empty($request->todate) ? $request->todate : $currentDate;
                                        $status = isset($request->status) ? $request->status : '';

                                        $newToDate = date('Y-m-d', strtotime($toDate . " +1 days"));

                                        if ($status) {
                                            $walletData = $fromDate == $toDate ?
                                                $data->where('status', $status)->whereDate('created_at', $fromDate)->get() :
                                                $data->where('status', $status)->whereBetween('created_at', [$fromDate, $newToDate])->get();
                                        } 
                                        else
                                        { 
                                            if ($fromDate == $toDate) {
                                            $walletData = $data->whereDate('created_at', $fromDate)->get();
                                            }else {
                                                $walletData = $data->whereBetween('created_at', [$fromDate, $newToDate])->get();
                                            }
                                        }
                                        
                                        $finalArray = [
                                            "walletdata" => $walletData,
                                            "from_date" => $fromDate,
                                            "to_date" => $toDate,
                                            "status" => $status ?? '',
                                        ];

                                        return view('statement.walletstatement')->with($finalArray);
                                }
                                break;
                            case 'aepswalletstatement':
                                switch ($data['user']->role_id) {
                                    case 4:
                                        $data = FinanceLedgers::where('user_id', $userid)
                                            ->where(function ($query) {
                                                $query->where('product', 'fund_request')
                                                    ->orWhere('product', 'accountop');
                                            })
                                            ->where('wallet', 'aepswallet')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 11:
                                        $data = WLLedger::where('user_id', $userid)
                                            ->where('wallet', 'aepswallet')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 12:
                                        $data = MDLedger::where('user_id', $userid)
                                            ->where('wallet', 'aepswallet')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 13:
                                        $data = DTLedger::where('user_id', $userid)
                                            ->where('wallet', 'aepswallet')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 10:
                                        $data = ENTLedger::where('user_id', $userid)
                                            ->where('wallet', 'aepswallet')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 14:
                                        $data = RTLedger::where('user_id', $userid)
                                            ->where('wallet', 'aepswallet')
                                            ->orderBy('id', 'desc');
                                        break;
                                    case 15:
                                        $data = WLADMINLedger::where('user_id', $userid)
                                            ->where('wallet', 'aepswallet')
                                            ->orderBy('id', 'desc');
                                        break;
                                    
                                    $currentDate = Carbon::now()->format('Y-m-d');
                                    if((isset($request->fromdate) && !empty($request->fromdate) && empty($request->status)) 
                                        && (isset($request->todate) && !empty($request->todate && empty($request->status)))){
                                             $newtodate = date('Y-m-d', strtotime($request->todate . " +1 days"));
                                        if($request->fromdate == $request->todate){
                                             $finalaray['walletdata']=$data->whereDate('created_at',$request->fromdate)->get();
                                        }else{
                                           
                                            $finalaray['walletdata']=$data->whereBetween('created_at', [$request->fromdate, $newtodate])->get();
                                        }
                                     }else if((isset($request->fromdate) && !empty($request->fromdate) && !empty($request->status)) 
                                        && (isset($request->todate) && !empty($request->todate && !empty($request->status)))){
                                            $newtodate = date('Y-m-d', strtotime($request->todate . " +1 days"));
                                        if($request->fromdate == $request->todate){
                                           
                                             $finalaray['walletdata']=$data->where('status',$request->status)->whereDate('created_at',$request->fromdate)->get();
                                        }else{
                                            
                                            $finalaray['walletdata']=$data->where('status',$request->status)->whereBetween('created_at', [$request->fromdate, $newtodate])->get();
                                        }
                                     }else{
                                         
                                          $finalaray['walletdata']=$data->whereDate('created_at',$currentDate)->get();
                                         
                                     }
                                        if((isset($request->fromdate) && !empty($request->fromdate)) 
                                        && (isset($request->todate) && !empty($request->todate))){
                                        $finalaray["from_date"] =  $request->fromdate;
                                        $finalaray["to_date"] =  $request->todate;
                                            $finalaray["status"] =  $request->status;
                                        }else{
                                        $finalaray["from_date"] =  $currentDate;
                                        $finalaray["to_date"] =  $currentDate;
                                            $finalaray["status"] =  '';
                                        }

                                    return view('statement.aepswalletstatement')->with($finalaray);
                                }
                                
                                break;
                            case 'umangwalletstatement':
                                switch ($data['user']->role_id) {
                                    case 4:
                                       $data['walletdata'] = FinanceLedgers::where('user_id',\Auth::id())->where('product','fund_request')->where('wallet','umangwallet')->orderBy('id','desc')->get();
                                        break;
                                    case 11:
                                       $data['walletdata'] = WLLedger::where('user_id',\Auth::id())->where('wallet','umangwallet')->orderBy('id','desc')->get(); 
                                        break;
                                    case 12:
                                       $data['walletdata'] = MDLedger::where('user_id',\Auth::id())->where('wallet','umangwallet')->orderBy('id','desc')->get();
                                        break;
                                    case 13:
                                       $data['walletdata'] = DTLedger::where('user_id',\Auth::id())->where('wallet','umangwallet')->orderBy('id','desc')->get(); 
                                        break;
                                    case 10:
                                       $data['walletdata'] = ENTLedger::where('user_id',\Auth::id())->where('wallet','umangwallet')->orderBy('id','desc')->get();
                                        break;
                                    case 14:
                                       $data['walletdata'] = RTLedger::where('user_id',\Auth::id())->where('wallet','umangwallet')->orderBy('id','desc')->get();
                                        break;
                                        return view('statement.umangwalletstatement')->with($data);
                                }
                                break;
                            
                                case 'nsdlpan':
                                    $model_name = 'App\Models\ReportNSDL';
                                    break;
                                case 'fastag':
                                    $model_name = 'App\Models\Fastag';
                                    break;
                                case 'lic':
                                    $model_name = 'App\Models\Lic';
                                    break;
                                case 'bbps':
                                    $model_name = 'App\Models\ReportBbps';
                                    break;
                                case 'dmt':
                                    $model_name = 'App\Models\DMTReport';
                                    break;
                                case 'credit_card':
                                    $model_name = 'App\Models\CCReports';
                                    break;
                                case 'recharge':
                                    $model_name = 'App\Models\Recharge';
                                    break;
                                case 'utipan':
                                    $model_name = 'App\Models\UtiidReport';
                                    break;
                                case 'insurance':
                                    $model_name = 'App\Models\ReportsBima';
                                    break;
                                case 'gibl':
                                    $model_name = 'App\Models\ReportsGIBL';
                                    break;
                                case 'aeps':
                                    $model_name = 'App\Models\ReportAEPS';
                                    break;
                                case 'cms':
                                    $model_name = 'App\Models\ReportCMS';
                                    break;
                                case 'aadharpay':
                                    $model_name = 'App\Models\ReportAEPS';
                                    break;
                                case 'umang':
                                    $model_name = 'App\Models\ReportUMANG';
                                    break;
                                case 'mp63matm':
                                    $model_name = 'App\Models\ReportMATM';
                                    break;
                        }
                    }
                    else{
                        $thdata = [
                            'id' => 'ID',
                            'srno' => 'Sr.no',
                            'Date' => 'Date',
                            'txnid' => 'Transaction Id',
                            'providename' => 'Provider',
                            'user' => 'User',
                            'amount' => 'Amount',
                            'commission' => 'Profit',
                            'user_tds' => 'User Tds',
                            'refno' => 'Reference. no',
                            'status' => 'Status',
                            'userid' => 'User Id',
                            'name' => 'Member Details',
                            'parentname' => 'Parent Details',
                            'remark' => 'Remark',
                            'statuss' => 'Status',
                            'role' => 'User Role',
                        ];
                        
                        if ($type != "credit_card") {
                            $thdata += [
                                'customermobile' => 'Mobile Number',
                                'parent' => 'Parent',
                                'mobilenumber' => 'Mobile Number',
                            ];
                        }
                        
                        if ($type == "aadharpay") {
                            $thdata += [
                                'txndetails' => 'Bank Details',
                                'bankname' => 'Bank Name',
                                'shopname' => 'Shop Name',
                                'shopaddress' => 'Shop Address',
                                'retails_name' => 'Bank Name',
                                'retailer_mbl' => 'Bank Name',
                                'customerid' => 'Bank Name',
                            ];
                        } else {
                            $thdata += ['txndetails' => 'Transaction Details'];
                        }
                        
                        if ($type == "lic") {
                            $thdata += [
                                "policynumber" => 'Policy Number',
                                "email" => 'Email',
                                "providername" => 'Provide Name',
                            ];
                        }
                        
                        if ($type != "cms") {
                            $thdata += ['transactiondetails' => 'Reference Details'];
                        }
                        
                        $thdata += [
                            'role' => 'User Role',
                            'action' => 'Action',
                            'dt_id' => 'Distributer ID',
                            'dt_details' => 'Distributer Details',
                            'dt_comm' => 'DT Profit',
                            'dt_tds' => 'DT Tds',
                            'dt_status' => 'DT Status',
                            'md_id' => 'MD ID',
                            'md_details' => 'MD Details',
                            'md_comm' => 'MD Profit',
                            'md_tds' => 'MD Tds',
                            'md_status' => 'MD Status',
                            'wl_id' => 'WL ID',
                            'wl_details' => 'WL Details',
                            'WL_comm' => 'WL Profit',
                            'wl_tds' => 'WL Tds',
                            'wl_status' => 'WL Status',
                        ];
                        
                        if (in_array($user->role_id, ["8", "7", "6", "5", "4", "2", "1"])) {
                            $thdata += [
                                'sales_id' => 'Sales Id',
                                'apiname' => 'Api Name',
                                'ent_id' => 'ENT ID',
                                'ent_details' => 'ENT Details',
                                'ent_profit' => 'ENT Profit',
                                'ent_tds' => 'ENT TDS',
                                'apiremark' => 'API Remark',
                            ];
                        }
                        
                        // Custom field headings required service wise
                        switch ($type) {
                            case "cms":
                                $thdata += [
                                    'deositorno' => 'Depositor Number',
                                    'billername' => 'Biller Name',
                                    'billerid' => 'Biller Id',
                                    'assistcustid' => 'Assistcustid',
                                    'depositortype' => 'Depositortype',
                                ];
                                break;
                            case "nsdlpan":
                                $thdata += ['type' => 'Type'];
                                break;
                            case "aeps":
                                $thdata += [
                                    'bankname' => 'Bankname',
                                    'shopname' => 'Shop Name',
                                    'shopaddress' => 'Shop Address',
                                    'usermobile' => 'User Mobile',
                                    'username' => 'User Name',
                                    'customerid' => 'Aadhar No',
                                    'twofatime' => 'Two FA Time',
                                ];
                                break;
                            case "utipan":
                                $thdata += [
                                    'type' => 'Type',
                                    'tokens' => 'Tokens',
                                    'vleid' => 'VLE Id',
                                    'usermbl' => 'Mobile',
                                    'shopname' => 'Shop Name',
                                    'shopaddress' => 'Shop Address',
                                    'usermobile' => 'User Mobile',
                                    'username' => 'User Name',
                                ];
                                break;
                            // Add more cases as needed
                        }
                        
                        // Role-based user ID
                        switch ($user->role_id) {
                            case 14: // Retailer
                                $userid = 'user_id';
                                break;
                            case 13: // Distributor
                                $userid = 'dt_id';
                                break;
                            case 12: // Master Distributor
                                $userid = 'md_id';
                                break;
                            case 11: // White Label
                                $userid = 'wl_id';
                                break;
                            case 15: // White Label Admin
                                $userid = 'wladmin_id';
                                break;
                            case 10: case 17: case 18: // Enterprise Admin, Employees, WL Employee
                                $userid = 'ent_id';
                                break;
                            case 2: // Sales
                                $userid = 'sales_id';
                                break;
                            default:
                                $userid = '';
                        }
                  
                        // Column configurations

                        // Print or return $thdata array
                        print_r($thdata);

                    
                        $currentDate = Carbon::now()->format('Y-m-d');
                        $user = Auth::user();
                        $tddata=array();
                       // $thdata=array();
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
                         $complaintCategories = [];//ComplaintCategory::all(); 
                         $encryptedData["complaintCategories"] =  $complaintCategories;  
                         $encryptedData["service"] =  $type; 
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
                return view('frontend.viewhistory')->with($encryptedData);
                        }
         //return view('frontend.viewhistory');
    }
    public function history(Request $request)
    {
        return view('frontend.viewhistory');
    }
    
}
