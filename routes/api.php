<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DMTV4Controller;
use App\Http\Controllers\AEPSV2Controller;
use App\Http\Controllers\DMTV5Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\API\IndoNepalApiDmtController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//****************************routes regarding DMT API*******************************

//routes regarding the remiiters
Route::post('/query-remitter',[DMTV4Controller::class, 'queryRemitter']);
Route::post('/register-remitter',[DMTV4Controller::class, 'registerRemitter']);

//routes regarding the beneficiary
Route::post('/register-beneficiary',[DMTV4Controller::class, 'registerBeneficiary']);
Route::post('/fetch-beneficiary',[DMTV4Controller::class, 'fetchBeneficiary']);
Route::post('/delete-beneficiary',[DMTV4Controller::class, 'deleteBeneficiary']);

//routes regarding the Transactions
Route::post('/penny-drop',[DMTV4Controller::class, 'pennyDrop']);
Route::post('/transaction',[DMTV4Controller::class, 'transaction']);
Route::post('/transaction-status',[DMTV4Controller::class, 'transactionStatus']);

//routes regarding the Refund
Route::post('/refund-otp',[DMTV4Controller::class, 'refundOtp']);
Route::post('/claim-refund',[DMTV4Controller::class, 'claimRefund']);

//****************************routes regarding Indo Nepal DMT *******************************
Route::post('indonepaldmt/getoutletdetails',[DMTV5Controller::class, 'getoutletdetails']);
Route::post('indonepaldmt/validateoutletdetails1',[DMTV5Controller::class, 'validateoutletdetails1']);
Route::post('indonepaldmt/getvalidateoutletdetails',[DMTV5Controller::class, 'getvalidateOutletDetails']);

Route::get('indonepaldmt/activationstatus',[DMTV5Controller::class, 'activationStatus'])->name('activationStatus');
Route::get('indonepaldmt/staticdata',[DMTV5Controller::class, 'staticData'])->name('staticData');
Route::post('indonepaldmt/paymentlocationList',[DMTV5Controller::class, 'paymentLocationList'])->name('paymentLocationList');
Route::get('indonepaldmt/statedistrict',[DMTV5Controller::class, 'stateDistrict'])->name('stateDistrict');
Route::post('indonepaldmt/remitter/profile',[DMTV5Controller::class, 'remitterProfile'])->name('remitterProfile');
Route::post('indonepaldmt/sendotp',[DMTV5Controller::class, 'sendOtp'])->name('sendOtp');
Route::post('indonepaldmt/remitter/registration',[DMTV5Controller::class, 'remitterRegistration'])->name('remitterRegistration');
Route::post('indonepaldmt/remitter/ekycinitiate',[DMTV5Controller::class, 'remitterEkycInitiate'])->name('remitterEkycInitiate');
Route::post('indonepaldmt/remitter/ekycinitiatestatus',[DMTV5Controller::class, 'remitterEkycInitiateStatus'])->name('remitterEkycInitiateStatus');
Route::post('indonepaldmt/remitter/ekycprocess',[DMTV5Controller::class, 'remitterEkycProcess'])->name('remitterEkycProcess');
Route::post('indonepaldmt/remitter/update',[DMTV5Controller::class, 'remitterUpdate'])->name('remitterUpdate');
Route::post('indonepaldmt/beneficiary/add',[DMTV5Controller::class, 'beneficiaryRegistration'])->name('beneficiaryRegistration');
Route::get('indonepaldmt/servicecharge',[DMTV5Controller::class, 'serviceCharge'])->name('serviceCharge');
Route::post('indonepaldmt/fundtransfer',[DMTV5Controller::class, 'fundTransfer'])->name('fundTransfer');
Route::get('indonepaldmt/fetchtransactionstatus',[DMTV5Controller::class, 'fetchTransactionStatus'])->name('fetchTransactionStatus');
Route::post('indonepaldmt/addbeneficiaryotp',[DMTV5Controller::class, 'addBeneficiaryOtp'])->name('addBeneficiaryOtp');
