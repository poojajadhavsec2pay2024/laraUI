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
       
    $customColumnNames = [
        'sender_name' => 'Sender Name',
        'beneficiary_name' => 'Beneficiary Name',
        'txnid'=> 'Transaction ID',
    ];
    
    // Example of selecting specific columns from the report data
    $selectedColumns = array_keys($customColumnNames);
    
    // Fetching report data from the database
    $reportData = DB::table('report_dmt')->select($selectedColumns)->get();
    
    // Passing $customColumnNames, $selectedColumns, and $reportData to the view
    return view('frontend.viewhistory', compact('customColumnNames', 'selectedColumns', 'reportData'));
      
    }
    public function history(Request $request)
    {
        return view('frontend.viewhistory');
    }
    
}
