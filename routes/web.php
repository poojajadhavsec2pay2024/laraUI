<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\DMTV4Controller;
use App\Http\Controllers\AEPSV2Controller;
use App\Http\Controllers\DMTV5Controller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/',[HomeController::class, 'index']);
Route::get('/',[LoginRegisterController::class, 'dashboard'])->name('dashboard');
Route::any('/store',[LoginRegisterController::class, 'store'])->name('store');
Route::get('/signIn',[LoginRegisterController::class, 'signIn'])->name('signIn');
Route::get('/signUp',[LoginRegisterController::class, 'signUp'])->name('signUp');
Route::any('/checkUser',[LoginRegisterController::class, 'checkUser'])->name('checkUser');
Route::any('/logout',[LoginRegisterController::class, 'logout'])->name('logout');
Route::get('/signInpage',[InterfaceController::class, 'signInpage']);
Route::get('/signUppage',[InterfaceController::class, 'signUppage']);
Route::get('/listUser',[UserController::class, 'index'])->name('listUser');
Route::get('/showUser',[UserController::class, 'showUser'])->name('showUser');
Route::post('/getuser',[UserController::class, 'getUser'])->name('getUser');
Route::post('/getUserRenderView',[UserController::class, 'getUserRenderView'])->name('getUserRenderView');
Route::any('/getCustomer',[InterfaceController::class, 'getCustomer'])->name('getCustomer')->middleware('auth');

Route::view('/layout-vertical', 'layout-vertical');

//routes regarding the remiiters
Route::post('/query-remitter',[DMTV4Controller::class, 'queryRemitter'])->name('query-remitter');
Route::post('/register-remitter',[DMTV4Controller::class, 'registerRemitter']);

//routes regarding the beneficiary
Route::post('/register-beneficiary',[DMTV4Controller::class, 'registerBeneficiary']);
Route::post('/fetch-beneficiary',[DMTV4Controller::class, 'fetchBeneficiary']);
Route::post('/delete-beneficiary',[DMTV4Controller::class, 'deleteBeneficiary']);

//routes regarding the Transactions
Route::post('/penny-drop',[DMTV4Controller::class, 'pennyDrop']);
Route::post('/transaction',[DMTV4Controller::class, 'transaction'])->name('transaction');
Route::post('/transaction-status',[DMTV4Controller::class, 'transactionStatus']);

//routes regarding the Refund
Route::post('/refund-otp',[DMTV4Controller::class, 'refundOtp']);
Route::post('/claim-refund',[DMTV4Controller::class, 'claimRefund']);
Route::post('/sendMoney',[DMTV4Controller::class, 'sendMoney'])->name('sendMoney');

//Route Regarding Instant pay API

Route::any('/getcustomerprofile',[InterfaceController::class, 'getCustomerProfile'])->name('getCustomerProfile');
// Route::any('/instantpaydmt',[DMTV5Controller::class, 'instantPayDMT'])->name('instantPayDMT');
// Route::any('/remitterregister',[DMTV5Controller::class, 'instantPayRemitterRegister'])->name('instantPayRemitterRegister');
// Route::post('/checkremitterstatus',[DMTV5Controller::class, 'checkRemitterStatus'])->name('checkRemitterStatus');

// Route::post('/getdistrict',[DMTV5Controller::class, 'getDistrict'])->name('getDistrict');
// Route::post('/getnepaldistrict',[DMTV5Controller::class, 'getNepalDistrict'])->name('getNepalDistrict');

// //****************************routes regarding InstantPay API*******************************
// Route::post('/getoutletdetails',[DMTV5Controller::class, 'getoutletdetails']);
// Route::post('/validateoutletdetails1',[DMTV5Controller::class, 'validateoutletdetails1']);
// Route::post('/getvalidateoutletdetails',[DMTV5Controller::class, 'getvalidateOutletDetails']);

// Route::get('/activationstatus',[DMTV5Controller::class, 'activationStatus'])->name('activationStatus');
// Route::get('/staticdata',[DMTV5Controller::class, 'staticData'])->name('staticData');
// Route::post('/paymentlocationList',[DMTV5Controller::class, 'paymentLocationList'])->name('paymentLocationList');
// Route::get('/statedistrict',[DMTV5Controller::class, 'stateDistrict'])->name('stateDistrict');
// Route::post('/remitterprofile',[DMTV5Controller::class, 'remitterProfile'])->name('remitterProfile');
// Route::post('/sendotp',[DMTV5Controller::class, 'sendOtp'])->name('sendOtp');
// Route::post('/remitterregistration',[DMTV5Controller::class, 'remitterRegistration'])->name('remitterRegistration');
// Route::post('/remitterekycinitiate',[DMTV5Controller::class, 'remitterEkycInitiate'])->name('remitterEkycInitiate');
// Route::post('/remitterekycinitiatestatus',[DMTV5Controller::class, 'remitterEkycInitiateStatus'])->name('remitterEkycInitiateStatus');
// Route::post('/remitterekycprocess',[DMTV5Controller::class, 'remitterEkycProcess'])->name('remitterEkycProcess');
// Route::post('/remitterupdate',[DMTV5Controller::class, 'remitterUpdate'])->name('remitterUpdate');
// Route::post('/beneficiaryregistration',[DMTV5Controller::class, 'beneficiaryRegistration'])->name('beneficiaryRegistration');
// Route::get('/servicecharge',[DMTV5Controller::class, 'serviceCharge'])->name('serviceCharge');
// Route::post('/fundtransfer',[DMTV5Controller::class, 'fundTransfer'])->name('fundTransfer');
// Route::get('/fetchtransactionstatus',[DMTV5Controller::class, 'fetchTransactionStatus'])->name('fetchTransactionStatus');
// Route::post('/addbeneficiaryotp',[DMTV5Controller::class, 'addBeneficiaryOtp'])->name('addBeneficiaryOtp');

Route::controller(DMTV5Controller::class)->group(function () {
Route::any('/instantpaydmt','instantPayDMT')->name('instantPayDMT');
Route::any('/remitterregister','instantPayRemitterRegister')->name('instantPayRemitterRegister');
Route::post('/checkremitterstatus','checkRemitterStatus')->name('checkRemitterStatus');
Route::post('/getdistrict','getDistrict')->name('getDistrict');
Route::post('/getnepaldistrict','getNepalDistrict')->name('getNepalDistrict');
//****************************routes regarding InstantPay API*******************************
Route::post('/getoutletdetails','getoutletdetails');
Route::post('/validateoutletdetails1','validateoutletdetails1');
Route::post('/getvalidateoutletdetails','getvalidateOutletDetails');
Route::get('/activationstatus','activationStatus')->name('activationStatus');
Route::get('/staticdata','staticData')->name('staticData');
Route::post('/paymentlocationList','paymentLocationList')->name('paymentLocationList');
Route::get('/statedistrict','stateDistrict')->name('stateDistrict');
Route::post('/remitterprofile','remitterProfile')->name('remitterProfile');
Route::post('/sendotp','sendOtp')->name('sendOtp');
Route::post('/remitterregistration','remitterRegistration')->name('remitterRegistration');
Route::post('/remitterekycinitiate','remitterEkycInitiate')->name('remitterEkycInitiate');
Route::post('/remitterekycinitiatestatus','remitterEkycInitiateStatus')->name('remitterEkycInitiateStatus');
Route::post('/remitterekycprocess','remitterEkycProcess')->name('remitterEkycProcess');
Route::post('/remitterupdate','remitterUpdate')->name('remitterUpdate');
Route::post('/beneficiaryregistration','beneficiaryRegistration')->name('beneficiaryRegistration');
Route::get('/servicecharge','serviceCharge')->name('serviceCharge');
Route::post('/fundtransfer','fundTransfer')->name('fundTransfer');
Route::get('/fetchtransactionstatus','fetchTransactionStatus')->name('fetchTransactionStatus');
Route::post('/addbeneficiaryotp','addBeneficiaryOtp')->name('addBeneficiaryOtp');
});

