<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\ReportDmt;
use Carbon\Carbon;
use Crypt;
use DB;
class TransactionHistoryController extends Controller
{
    public function index(Request $request,$id=0)
    {
        $type='indonepal';
        $user = Auth::user();
        $reportData = [];
        //$reports = ReportDmt::orderBy('id','desc')->paginate(50);
       // $columns = DB::getSchemaBuilder()->getColumnListing('report_dmt');
       // $columns = Schema::getColumnListing('report_dmt');
       //$reportData = DB::table('report_dmt')->get();
       // $reportData = DB::table('reports')->pluck($columns); 
    //    $originalColumns = DB::getSchemaBuilder()->getColumnListing('report_dmt');
    //    $customColumnNames = [
    //     'sender_name' => 'Sender Name',
    //     'beneficiary_name' => 'Beneficiary Name',
    //     'transaction_date' => 'Transaction Date',
    //     'beneficiary_id' => 'Beneficiary Id',
        
        
    // ];
    //    $columns = [];
    //    foreach ($originalColumns as $column) {
           
    //        $columns[$column] = $customColumnNames[$column] ?? $column;
    //    }
   
    //    $reportData = DB::table('report_dmt')->get();
       
    //     return view('frontend.viewhistory', compact('columns', 'reportData'));
    $customColumnNames=[];
      // dd($user->id);
       $customColumnNames+= [
        'id' => 'SR No',
        'mobile' => 'Mobile',
        'txnid'=> 'Transaction ID',
        'sender_name' => 'Sender Name',
        'beneficiary_name' => 'Beneficiary Name',
        'beneficiary_account'=> 'Beneficiary Account',
        'amount'=> 'Amount',
        'status'=> 'Status',
        'refno2'=> 'Order ID',
         
    ];
       if($user->role_id==13)
       {
            $customColumnNames += [
                'transfer_mode' => 'Transfer Mode',
                'refno' => 'Ref No',
                'dt_com' => 'Distributer Commisions',
            ];
        }
        else if($user->role_id==12)
       {
            $customColumnNames += [
               
                'dt_com' => 'Distributer Commisions',
                'md_com' => 'Master Distributer Commisions',
            ];
        }
        else{
            // $customColumnNames += [
            //     'remark' => 'Remark ',
            // ];
        }
    
    // Example of selecting specific columns from the report data
    $selectedColumns = array_keys($customColumnNames);
    
    // Fetching report data from the database
    if($user->role_id==13)
       {
    $reportData = DB::table('report_dmt')->select($selectedColumns)->where('dt_id',$user->id)->get();
       }elseif($user->role_id==12)
       {
        $reportData = DB::table('report_dmt')->select($selectedColumns)->where('md_id',$user->id)->get();
       }elseif($user->role_id==11){
        $reportData = DB::table('report_dmt')->select($selectedColumns)->where('wl_id',$user->id)->get();
       }else{
        $reportData = DB::table('report_dmt')->select($selectedColumns)->get();
       }
    //dd($reportData);
    // Passing $customColumnNames, $selectedColumns, and $reportData to the view
    return view('frontend.viewhistory', compact('customColumnNames', 'selectedColumns', 'reportData'));
      
    }
    public function history(Request $request)
    {
        return view('frontend.viewhistory');
    }
    
}
