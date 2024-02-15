<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DMTV4Controller;
use App\Http\Controllers\AEPSV2Controller;
use App\Http\Controllers\DMTV5Controller;
use App\Http\Middleware\Authenticate;

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