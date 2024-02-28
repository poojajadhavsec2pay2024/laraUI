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
Route::prefix('indonepaldmt')->group(function () {
    Route::post('getoutletdetails', [IndoNepalApiDmtController::class, 'getOutletDetails']);
    Route::post('validateoutletdetails1', [IndoNepalApiDmtController::class, 'validateOutletDetails1']);
    Route::post('getvalidateoutletdetails', [IndoNepalApiDmtController::class, 'getValidateOutletDetails']);
    Route::get('activationstatus', [IndoNepalApiDmtController::class, 'activationStatus'])->name('activationStatus');
    Route::get('staticdata', [IndoNepalApiDmtController::class, 'staticData'])->name('staticData');
    Route::post('paymentlocationList', [IndoNepalApiDmtController::class, 'paymentLocationList'])->name('paymentLocationList');
    Route::get('statedistrict', [IndoNepalApiDmtController::class, 'stateDistrict'])->name('stateDistrict');
    Route::post('remitter/profile', [IndoNepalApiDmtController::class, 'remitterProfile'])->name('remitterProfile');
    Route::post('sendotp', [IndoNepalApiDmtController::class, 'sendOtp'])->name('sendOtp');
    Route::post('remitter/registration', [IndoNepalApiDmtController::class, 'remitterRegistration'])->name('remitterRegistration');
    Route::post('remitter/ekycinitiate', [IndoNepalApiDmtController::class, 'remitterEkycInitiate'])->name('remitterEkycInitiate');
    Route::post('remitter/ekycinitiatestatus', [IndoNepalApiDmtController::class, 'remitterEkycInitiateStatus'])->name('remitterEkycInitiateStatus');
    Route::post('remitter/ekycprocess', [IndoNepalApiDmtController::class, 'remitterEkycProcess'])->name('remitterEkycProcess');
    Route::post('remitter/update', [IndoNepalApiDmtController::class, 'remitterUpdate'])->name('remitterUpdate');
    Route::post('beneficiary/add', [IndoNepalApiDmtController::class, 'beneficiaryRegistration'])->name('beneficiaryRegistration');
    Route::get('servicecharge', [IndoNepalApiDmtController::class, 'serviceCharge'])->name('serviceCharge');
    Route::post('fundtransfer', [IndoNepalApiDmtController::class, 'fundTransfer'])->name('fundTransfer');
    Route::get('fetchtransactionstatus', [IndoNepalApiDmtController::class, 'fetchTransactionStatus'])->name('fetchTransactionStatus');
    Route::post('addbeneficiaryotp', [IndoNepalApiDmtController::class, 'addBeneficiaryOtp'])->name('addBeneficiaryOtp');
});