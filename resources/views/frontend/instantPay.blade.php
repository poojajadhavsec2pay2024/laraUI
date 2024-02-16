@extends('frontend.layout.main')

@section('main-container')
<link href="{{url('frontend/dist/css/webToast.min.css')}}" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet"> 
<link href="{{url('frontend/dist/css/validetta.min.css')}}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script src="{{url('frontend/dist/js/validetta.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/dist/js/webToast.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

<script src="{{url('frontend/dist/js/loadingoverlay.min.js')}}"></script>
<script src="{{url('frontend/dist/js/customvalidation.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
        .border-left-custom{
            border-left: 1px solid #dee2e6;
        } 
        
        code{
            font-size: 16px;
            background: none;
        }
        
        @media print {
          .page  {
            display: none;
          }
          #contentToPrint{
            display: block;
          }
        }
        
        #contentToPrint{
            display: none;
        }
        .
        {
          pointer-events: none !important;
        }
        
        .disable-page-click {
          pointer-events: none !important;
        }
        
        .ts-control{
            border: none;
            padding: 0;
        }
        
        .page{
            background: transparent;
        }
        .form-label.required::after {
          content: "";
          margin-left: .25rem;
          color: #d63939;

        }
        .form-select {
          width: 108%;
        }

    </style>
   
<div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Empty page
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
               <div class="row row-deck row-cards">
                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                        <div class="card ">
                                            <div class="card-status-start bg-primary"></div>
                                            <!--<div class="ribbon bg-red">Wallet Load</div>-->
                                            <div class="card-body">
                                                <form id="dmtmobile" method="post" action="{{ route('remitterProfile') }}">
                                                    @csrf
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label text-muted">Enter mobile number to get sender account details</label>
                                                                <input id="mobile" type="text"  name="mobile" autocomplete="off" data-validetta="number,required,minLength[10],maxLength[10]" class="form-control" data-vd-message-required="Please enter mobile number" placeholder="Enter Mobile Number" onkeypress="return phonenumber(event,this.id)" data-vd-message-number="Please enter only number" data-vd-message-minlength="Please enter minimum 10 digit number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <button id="btn-getDetails" type="submit" class="btn btn-primary">
                                                            Get Details
                                                        </button>
                                                    </div>
                                                    <div class="mt-3">
                                                    <div class="img-responsive img-responsive-21x9 card-img-bottom" style="background-image: url(./frontend/cardbottomimage.jpg)"></div>

                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end-->
                                    
                                    <div id="sender_details" class="col-sm-12 col-md-7 col-lg-7" >
                                        <div class="card ">
                                            <div class="card-status-start bg-primary"></div>
                                            <div class="card-header">
                                                <h4 class="d-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                       <path d="M12 5l0 14"></path>
                                                       <path d="M16 9l-4 -4"></path>
                                                       <path d="M8 9l4 -4"></path>
                                                    </svg>
                                                    Sender Transaction Count
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 my-auto">
                                                        <div class="row ">
                                                            <div class="row img-fluid d-flex justify-content-center" >
                                                                <img class="w-50" src="{{asset('./frontend/dmt-img.png')}}">
                                                            </div>
                                                            <div class="row my-auto text-center" >
                                                                <h5 class="page-title d-flex justify-content-center" id="user_name" >
                                                                    -
                                                                </h5>
                                                                <p id="sendermobile" class="mb-0">-</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 border-left-custom">
                                                        <div class="form-group row mb-3">
                                                            <label class="form-label mb-0">Daily Transaction Count </label>
                                                            <div class="d-flex">
                                                                
                                                                    <code id="total_limit">
                                                                    -
                                                                </code>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label class="form-label mb-0">Monthly Transaction Count</label>
                                                            <div class="d-flex">
                                                                
                                                                    <code id="used_limit">
                                                                   -
                                                                </code>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="form-label mb-0">Yearly Transaction Count</label>
                                                            <div class="d-flex">
                                                                
                                                                    <code id="rem_limit">
                                                                     -
                                                                </code>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end-->
                            </div>


                        <!--Datatable-->
                        <div class="page-body" id="beneficiary_details">
              <div class="container-xl">
                <div class="row row-deck row-cards">
                  <div class="col-12">
                  <div class="card">
                      <div class="container">
                          <div class="row my-3">
                              <div class="text-start col-6">
                                  <h2>Beneficiary List</h2>
                              </div>
                              <div class="text-end col-6">
                                    <button id="btn-add-ben" class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd">New Beneficiary</button>
                              </div>
                              <div></div>
                          </div>
                      </div>
                    <div class="table-responsive">
                      <table id="data_table" class="table card-table table-vcenter text-nowrap datatable w-100">
                        <thead>
                          <tr>
                            <th>Sr No</th>
                            <th>Beneficiary Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Relationship</th>
                            <th>Mobile</th>
                            <th>Payment Mode</th> 
                            <th>Bank</th>
                            <th>Account</th>
                            <th>Bank Branch ID</th>
                            <th>Action</th>
                            <th style="display:none">Beneficiary Id</th>
                          </tr>
                        </thead>
                        <tbody id="table_body">
                            
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
                </div>
              </div>
            </div>
            <!--Datatable end-->

           

        <!-- OFFCANVAS STARTS -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
      <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">
            Beneficiary Registration
            </h2>
        <button type="button" class="btn-close text-reset closeOffCanvas" id="closeEndOffcanvas" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
          <input type="hidden" id="mobile_number">
        
        <div id="beneficiaryReg">
            <div class="container">
                <form id="add-beneficiary" method="post" action="{{route('beneficiaryRegistration')}}">   
                    <div id="firstdiv">
                        @csrf
                       <input id="cust_mobile" type="hidden" name="remitterMobile" value=""> 
                       <input id="bankid" type="hidden" name="bankid" value=""> 
                       <div class="row">
                           <div class="form-group col-6">
                                <label class="form-label required text-muted">Mobile</label>
                                <input id="b_mobile" type="text"  name="b_mobile" autocomplete="off" data-validetta="number,required,minLength[10],maxLength[10]" class="form-control field-disable" onkeypress="return phonenumber(event, this.id)" data-vd-message-required="Please enter beneficiary mobile" data-vd-message-number="Please enter only number" data-vd-message-minlength="Please enter minimum 10 digit number">
                            </div>
                            
                           <div class="form-group col-6">
                                <label class="form-label required text-muted">Beneficiary Name</label>
                                <input id="b_name" type="text"  name="b_name" autocomplete="off" data-validetta="required" class="form-control field-disable"  data-vd-message-required="Please enter beneficiary name">
                            </div>
                       
                       </div>
                       <div class="row mt-3">
                           <div class="form-group col-6">
                              <div class="">
                              <label class="form-label required text-muted">Gender</label>
                            <select class="form-select field-disable" id="gender" name="gender">
                              <option value="">Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                            </select>
                              </div>
                          </div>
                          <div class="form-group col-6">
                          <label class="form-label required text-muted">Relationship</label>
                                  <select type="text"  name="relationship" id="relationship" class="form-select field-disable" data-validetta="required" data-vd-message-required="Please select relationship">
                                  <option value="">Select Relationship</option>
                                  <option value="Aunti">Aunti</option>
                                  <option value="Boy Friend">Boy Friend</option>
                                  <option value="Brother">Brother</option>
                                  <option value="Brother in Law">Brother in Law</option>
                                  <option value="Cousin">Cousin</option>
                                  <option value="Daughter">Daughter</option>
                                  <option value="Father">Father</option>
                                  <option value="Father in Law">Father in Law</option>
                                  <option value="Friend">Friend</option>
                                  <option value="Girl Friend">Girl Friend</option>
                                  <option value="Grand Father">Grand Father</option>
                                  <option value="Grand Mother">Grand Mother</option>
                                  <option value="Husband">Husband</option>
                                  <option value="Mother">Mother</option>
                                  <option value="Mother in Law">Mother in Law</option>
                                  <option value="Nephew">Nephew</option>
                                  <option value="Niece">Niece</option>
                                  <option value="Other">Other</option>
                                  <option value="Self">Self</option>
                                  <option value="Sister">Sister</option>
                                  <option value="Sister in Law">Sister in Law</option>
                                  <option value="Son">Son</option>
                                  <option value="Uncle">Uncle</option>
                                  <option value="Wife">Wife</option>
                                  </select>
                       </div>
                       <div class="row mt-3">
                           <div class="form-group col-6">
                              <div class="">
                              <label class="form-label required text-muted">State</label>
                              <select class="form-select field-disable" id="state" name="state" data-validetta="required" >
                            <option value="">Select State</option>
                            @foreach ($data['statedata'] as $statevalue)
                            <option value="{{$statevalue->state}}">{{$statevalue->state}}</option>
                                    @endforeach
                            </select>
                              </div>
                          </div>
                          <div class="form-group col-6">
                          <label class="form-label required text-muted">District</label>
                            <select class="form-select field-disable" id="district" name="district" data-validetta="required"  >
                              <option value="">Select District</option>
                              <option value=""></option>
                            </select>
                       </div>
                       <div class="row mt-3">
                           <div class="form-group col-6">
                              <div class="">
                              <label class="form-label required text-muted">Payment Mode</label>
                            <select class="form-select field-disable" id="paymentMode" name="paymentMode" style="width: 110%;" data-validetta="required">
                              <option value="">Select Payment Mode</option>
                              <option value="Cash Payment">Cash Payment</option>
                              <option value="Account Deposit">Account Deposit</option>
                            </select>
                              <!-- <label class="form-label required text-muted">Address</label>
                            <textarea  type="text" id="address" name="address" class="form-control field-disable" placeholder="Home Address" data-validetta="required" style="height: 17px;"> </textarea> -->
                              </div>
                          </div>
                          <div class="form-group col-6">
                            
                            <label class="form-label required text-muted">Bank Name</label>
                            <select class="form-select field-disable" id="bankBranchId" name="bankBranchId" data-validetta="required" style="width: 117%;" >
                              <option value="">Select Bank Name</option>
                              <option value=""></option>
                            </select>
                            
                          </div>
                       </div>
                       <div class="row mt-3">
                            <div class="form-group col-12">
                               <label class="form-label required text-muted">Address</label>
                            <textarea  type="text" id="address" name="address" class="form-control field-disable" placeholder="Home Address" data-validetta="required" style="height: 17px;"> </textarea> 
                             </div>
                       </div>
                       <div class="row mt-3"  id="accountnodiv" style="display:none">
                            <div class="form-group col-12">
                                <label class="form-label required text-muted">Account No.</label>
                                <input id="accountno" type="text"  name="accountno" autocomplete="off" data-validetta="minLength[6],maxLength[20],number" class="form-control field-disable" onkeypress="return accountnumber(event,this.id)" data-vd-message-required="Please enter account number" data-vd-message-minLength="Please enter valid account number" data-vd-message-number="Please enter valid account number">
                            </div>
                       </div>
                       <div class="row mt-3" id="conf_accountnodiv" style="display:none">
                            <label class="form-label required text-muted">Confirm Acc No.</label>
                              <div class="input-group col-12">
                                <input id="conf_accountno" type="text"  name="conf_accountno" autocomplete="off" style="width: auto;" data-validetta="minLength[6],maxLength[20],number,equalTo[accountno]" class="form-control field-disable" onkeypress="return accountnumber(event,this.id)" data-vd-message-required="Please confirm account number" data-vd-message-minLength="Please enter valid account number" data-vd-message-number="Please enter valid account number" data-vd-message-equalTo="Confirm account do not match with account no.">
                               
                               
                              </div>
                        </div>
                       <div class="row mt-3 mb-3">
                           
                       </div>
                    </div>
                    <!--//first div            -->
                    
                    <div class="text-end">
                      <button id="btn-addBeneficiary" type="submit" class="btn btn-primary d-none"></button>
                    </div>
                    <!-- </form> -->
                    <div class="text-end">
                        <input type='hidden' id="usernumber" value="">
                        <input type='hidden' id="username" value="">
                        <!-- <input type='hidden' id="checkOtpstatus" value="SendOtp"> -->
                    <a id="btn-getBenOtp" class="btn btn-primary" onclick="getBenOtp('SEND_OTP');" disabled>Get OTP</a>
                    </div>
                
                    <div class="row d-none" id="submitotpblock">
                    <div class="form-group col-6 mb-3">
                        <label class="form-label required text-muted">Enter OTP</label>
                        <input id="submitotp" type="text"  name="submitotp" placeholder="Enter OTP" autocomplete="off" data-validetta="required" class="form-control field-disable" onkeypress="return setbankotpval(event, this.id)" data-vd-message-required="Please enter otp">
                    </div>
                        <div class="input-group-append">
                            <a class="mt-1 d-none" style="text-decoration: none;color: #3B71CA; font-weight: bold;cursor: pointer;" id="resendbenotp" onclick="getBenOtp('SEND_OTP')">Resend OTP</a>
                            <div class="spinner-border d-none text-primary" role="status" id="loadingIcon">
                            </div>
                        </div>
                    
                    <div class="text-end">
                    
                        <a id="btnSubOtp" onclick="getBenOtp('VERIFY_OTP')" class="btn btn-primary">Submit</a>
                        </div>
                    </div>
              </form>
            </div>
        </div>
        </div>
        </div>
        <div id="sendMoney" style="display:none;">
            <div class="container">
                       <div class="row mb-3"> 
                            <div class="d-flex p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="color: #7a85dc;">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 5l0 14"></path>
                                   <path d="M16 9l-4 -4"></path>
                                   <path d="M8 9l4 -4"></path>
                                </svg>
                                <p class="pretitle" style="color: #7a85dc; margin: 0; font-weight: 600">
                                    Sender
                                </p>
                            </div>
                            <h3 id="sender_name"  style="margin: 0">
                                sender name
                            </h3>
                            <div class="pretitle" id="sender_mobile" style="text-align: left;">
                                sender mobile
                            </div>
                        </div>
                        
                        <div class="row mb-3"> 
                            <div class="d-flex p-0">
                                <svg style="color: #7a85dc;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 5l0 14"></path>
                                   <path d="M16 15l-4 4"></path>
                                   <path d="M8 15l4 4"></path>
                                </svg>
                                <p class="pretitle" style="color: #7a85dc; margin: 0; font-weight: 600">
                                    Beneficiary
                                </p>
                            </div>
                            
                            <h3 id="ben_name"  style="margin: 0">
                               Beneficiary Name
                            </h3>
                            <p id="ben_mobile" style="text-align: left; margin: 0;">
                                Beneficiary Mobile
                            </p>
                            <div class="d-flex">
                                <code style="font-size: 18px;" id="benaccount">Ben Account</code>&nbsp;<code style="font-size: 18px;" id="bene_paymentMode">Ben IFSC</code>
                            </div>
                        </div>
                            
                        <div class="hr-text">
                            Transaction Details
                        </div>
                        <form id="send-money" method="post" action="{{ route('fundTransfer')}}">   
                            @csrf
                            <input type="hidden" class="form-control" id="operation" name="operation" value="FUND_TRANSFER">
                            <input type="hidden" id="rec_name"  name="b_name" value="">
                            <input type="hidden" id="rec_bankBranchId" name="rec_bankBranchId" value="">
                            <input type="hidden" id="rec_account" name="rec_account" value="">
                            <input type="hidden" id="receiver_mobile" name="receiver_mobile" value="">
                            <input type="hidden" id="receiver_paymentMode" name="receiver_paymentMode" value="">
                            <input type="hidden" id="sen_name" name="sen_name" value="">
                            <input type="hidden" id="remitterMobile" name="remitterMobile" value="">
                            <input type="hidden" id="beneficiaryId" name="beneficiaryId" value="">
                            <div class="row">
                            <div>
                               <div class="form-group col-12 mb-3 row">
                               <label class="form-label required text-muted">Relationship</label>
                                  <select type="text"  name="remittanceReason" id="remittanceReason" class="form-select field-disable" data-validetta="required" data-vd-message-required="Please select remittanceReason">
                                  <option value="">Select Remittance Reason</option>
                                  <option value="Educational Expenses">Educational Expenses</option>
                                  <option value="EMI Payments">EMI Payments</option>
                                  <option value="Family Maintenance">Family Maintenance</option>
                                  <option value="Medical Expenses">Medical Expenses</option>
                                  <option value="Repayment of Loans">Repayment of Loans</option>
                                  <option value="Saving Purpose">Saving Purpose</option>
                                  <option value="Utility Payment">Utility Payment</option>
                                  </select>                            
                                </div>
                                <label class="form-label required text-muted">Enter Amount to transfer</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                       <path d="M15 8h-6h1a3 3 0 0 1 0 6h-1l3 3"></path>
                                       <path d="M9 11h6"></path>
                                    </svg>                               
                                    </span>
                                    <input id="transferAmount" type="text"  name="transferAmount" autocomplete="off" placeholder="Amount" data-validetta="required" onkeypress="return addAmount(event,this.id)" class="form-control field-disable" data-vd-message-required="Please enter amount">
                               </div>
                            </div class="text-end">
                            <button class="btn btn-primary" type="button" id="mobilebtn" name="mobilebtn">Get OTP</button>
                            </div>
                            <div class="row" id="submitotpblock_fundtransfer" style="display:none">
                                <div class="form-group col-6 mb-3">
                                    <label class="form-label required text-muted">Enter OTP</label>
                                    <input type="text" class="form-control field-disable"  id="otp" name="otp" data-validetta="required" class="form-control field-disable" data-vd-message-required="Please enter OTP">   
                                    <input type="hidden" class="form-control" id="otpReference" name="otpReference" >
                                </div>
                                <div class="text-end">
                                <button id="btn-sendMoney" type="submit" class="btn btn-primary" style="display:none">Submit</button>
                                </div>
                            </div>
                        </form>
                
            </div>
        </div>
      </div>
    </div>
    <!--OFFCANVAS END-->
<!--Modal for charges confirmation-->
<div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-success"></div>
          <div class="modal-body text-center py-4">
                <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v2m0 4v.01"></path>
                        <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75">
                        </path>
                    </svg>
                </div>
            <h3>Process Charges</h3>
            <div class="text-muted">Name verification is paid Process. <br>Please click on Agree if you wish to continue.</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a id="btnProcessCancel" class="btn w-100 btn-danger" data-bs-dismiss="modal">
                    Cancel
                  </a></div>
                <div class="col"><a id="btnProcessSubmit"  class="btn btn-success w-100" data-bs-dismiss="modal">
                    Continue
                  </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--Send money confirmation-->
    <div class="modal modal-blur fade" id="modal-send-money" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-success"></div>
          <div class="modal-body text-center py-4">
                <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v2m0 4v.01"></path>
                        <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75">
                        </path>
                    </svg>
                </div>
            <h3>Process Charges</h3>
            <div class="text-muted">Name verification is paid Process, this will charge you Rs.100. <br>Please click on Agree if you wish to continue.</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a id="btnCancelPayment" class="btn w-100 btn-danger" data-bs-dismiss="modal">
                    Cancel
                  </a></div>
                <div class="col"><a id="btnProcessPayment"  class="btn btn-success w-100" data-bs-dismiss="modal">
                    Continue
                  </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--Payment Success Modal-->
    <div class="modal modal-blur fade" id="payment-success" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" id="payment-success-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-success"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
            <h3 id="txn-heading">Payment succedeed</h3>
            <div class="text-muted">Your payment of <span style="font-weight: bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee my-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                   <path d="M7 9l11 0"></path>
                </svg>
                <span id="modalValue"></span>
            </span>
             <span ="payment-msg">has been successfully submitted.</span> </div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
                <div class="row">
                    <div class="col">
                        <button href="#" class="btn w-100" data-bs-dismiss="modal">
                            OK
                        </button>
                    </div>
                    <div class="col">
                        <button type="button"  id="printpaymentreceipt" class="btn btn-primary w-100" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#modal-invoice">
                            View invoice
                        </button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--Payment Unsuccessful Modal-->
    <div class="modal modal-blur fade" id="payment-failed" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-danger"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
            <h3>Transaction Failed</h3>
            <div class="text-muted">Your payment of <span style="font-weight: bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee my-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                   <path d="M7 9l11 0"></path>
                </svg>
                <span id="txnfailedValue"></span>
            </span>
             <span ="payment-msg">was failed. Please try again!</span> </div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                    Cancel
                  </a>
                </div>
                <div class="col">
                    <button type="button"  class="btn btn-primary w-100" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#modal-invoice">
                      View invoice
                    </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--Txn pending modal-->
    <div class="modal modal-blur fade" id="payment-pending" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-warning"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
            <h3>Transaction Pending</h3>
            <div class="text-muted">Your payment of <span style="font-weight: bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee my-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                   <path d="M7 9l11 0"></path>
                </svg>
                <span id="txnpendingValue"></span>
            </span>
             <span ="payment-msg">is pending. Please check later!</span> </div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                    Cancel
                  </a>
                </div>
                <div class="col">
                    <button type="button"  class="btn btn-primary w-100" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#modal-invoice">
                      View invoice
                    </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--TXN receipt modal-->
    <div id="modal-invoice" class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" >
            
          
          <div class="modal-body px-2" id="receiptprintcontent">
              <div class="container">
                  <div class="row py-2">
                    <div class="col-4">
                      <!--<img src="https://csp.sec2pay.in//assets/loginassets/img/sec2paylogo.svg" style="width:150px;"/>-->
                        </div>
                          <div class="col-8" style="text-align:right">
                              <p class="h5 mb-0 mt-2">{{isset(Auth::user()->shops->shop_name) ? Auth::user()->shops->shop_name: "NA"}}</p>
                              <small><span id="retails_name">{{Auth::user()->name}}</span> | <span id="retailer_mbl">{{Auth::user()->mobile}}</span></small><br>
                              
                              <small>{{isset(Auth::user()->shops->shop_address) ? Auth::user()->shops->shop_address: "NA"}}</small><br>
                          </div>      
                    </div>
              </div>
            <div class="hr-text">DMT TRANSACTION</div>
              <div class="container">
                  <div class="row">
                      <div class="col-6">
                          <p class="h5 mb-0 mt-2">Sender</p>
                          <small><span id="sender_name_invoice"></span> | <span id="sender_mbl"></span></small><br>
                          <small>{{isset(Auth::user()->shops->shop_address) ? Auth::user()->shops->shop_address: "NA"}}</small><br>
                      </div>
                      <div class="col-6 text-end">
                          <p class="h5 mb-0 mt-2">Beneficiary</p>
                          <small><span id="invc_ben_name"></span></small><br>
                          <small><span id="invc_ben_bank"></span></small><br>
                          <small><span id="invc_ben_acc"></span> | <span id="invc_ben_ifsc"></span></small><br>
                      </div>
                  </div>
                  
                  <div class="row mt-3">
                      <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                              <thead>
                                <tr>
                                  <th>ORDER #</th>
                                  <th>TXN ID</th>
                                  <th>REF NO</th>
                                  <th>TXN MODE</th>
                                  <th>STATUS</th>
                                  <th>AMOUNT</th>
                                </tr>
                              </thead>
                              <tbody id="invoice-table-details">
                            </tbody>
                         </table>
                        </div>
                  </div>
                  
                  <div class="row m-0">
                        <div class="container d-flex">
                            <div class="my-3 col-6">
                                <b>Remark: </b><span id="txn_remark"></span><br>
                            </div>
                            <div class="text-end my-3 col-6">
                                <div class="d-flex" style="float: right"><b>Total Amount: </b><svg xmlns="http://www.w3.org/2000/svg" style="--tblr-icon-size: 1rem;margin-top: 3px;" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                           <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                           <path d="M7 9l11 0"></path>
                                        </svg>
                                        <span id="inv_total_amount"></span></div><br>
                                <div class="d-flex" style="float: right"><b>Total CCF Charges: </b><svg xmlns="http://www.w3.org/2000/svg" style="--tblr-icon-size: 1rem;margin-top: 3px;" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                           <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                           <path d="M7 9l11 0"></path>
                                        </svg>
                                        <span id="inv_total_charges"></span></div>
                            </div>
                        </div>
                        
                        <small class="text-muted ml-3 " style="margin-left: 20px; margin-top:10px;">This is a computer generated receipt</small><br>
                        <small class="text-muted ml-3 " style="margin-left: 20px; margin-top:10px;" id="created_date"></small>
                    </div>
              </div>

            
            
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-print-invoice">PRINT</button>
          </div>
        </div>
      </div>
    </div>
    
    <div id="printmaterial"></div>
    
            <!-- Content here -->
          </div>
        </div>
        
      </div>
      <script>
      //Check if mobile number is registered. 
      $(document).ready(function($) {    
            $('#sender_details').hide();
            $('#beneficiary_details').hide();
            
            //Check if mobile number is registered. 
            $('#dmtmobile').validetta({
                realTime: true,
                display: 'inline',
                errorTemplateClass: 'validetta-inline',
                onValid: function (event) {
                var value = $('#mobile').val();
                  $('#btn-getDetails').addClass('btn-loading');
                  $('.field-disable-mbl').prop('readonly', true);
                  event.preventDefault();
                  $.ajax({
                    url: '{{ route('remitterProfile') }}',
                    data: $("#dmtmobile").serialize(),
                    dataType: 'json',
                    method: 'post'
                  })
                  
                  .done(function (data) {
                      var mobileno = $("#mobile").val();
                      $("#mobile_number").val(mobileno);
                      $("#sendermobile").val(mobileno);
                      if(data.act == "CONTINUE"){
                        
                          if(data.apistatus == "REGISTERED"){
                            if(data.message == "Unable to fetch beneficiaries, please try again"){
                                webToast.Info({ status: 'Error !', message: data.message, delay: 3000, align: 'bottomright' });
                            }else{
                                webToast.Success({ status: 'Success!', message: data.message, delay: 3000, align: 'bottomright' });
                            }
                              
                            
                            $('#btn-getDetails').removeClass('btn-loading');
                            $('.field-disable-mbl').removeAttr('readonly');
                            
                            $('#sender_details').show();
                            $('#beneficiary_details').show();
                            
                            //sender details and limits
                            $("#user_name").text(data.data.firstName);
                            $("#sendermobile").text(data.data.mobile);
                            $("#total_limit").text(data.data.transactionCount.day);
                            $("#used_limit").text(data.data.transactionCount.month);
                            $("#rem_limit").text(data.data.transactionCount.year);

                                $("#table_body").html("");
                                var srno = 1;
                                $.each(data.data.beneficiaries, function(index, value) {
                                    if(value.bankBranchId)
                                    {
                                        var branchId=value.bankBranchId;
                                    }
                                    else{
                                        var branchId='';
                                    }
                                    $('#table_body').append(`<tr>
                                    <td>`+srno+`</td>
                                    <td>`+value.name+`</td>
                                    <td>`+value.gender+`</td>
                                    <td>`+value.address+`</td>
                                    <td>`+value.relationship+`</td>  
                                    <td>`+value.mobile+`</td>
                                    <td>`+value.paymentMode+`</td>
                                    <td>`+value.bankBranchName+`</td>
                                    <td>`+value.acNumber+`</td> 
                                    <td>`+value.bankBranchId+`</td> 
                                    <td style="display:none">`+value.id+`</td>
                                    <td>
                                        <a id="btn-getSendDetails" onclick="btnSendmoney('`+data.data.firstName+`','`+data.data.mobile+`','`+value.id+`','`+ value.name +`','`+value.mobile+`','`+value.acNumber+`','`+value.paymentMode+`','`+branchId+`')" class='btn btn-outline-info rounded-pill' data-bs-toggle='offcanvas' href='#offcanvasEnd' role='button' aria-controls='offcanvasEnd'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                               <path d="M10 14l11 -11"></path>
                                               <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                                            </svg>
                                            `+'Send'+`
                                        </a>
                                    </td>    </tr>`);
                                    srno ++
                                });
                            
                            
                            $('.field-disable').removeAttr('readonly');
                            var table;
                            
                            if ($.fn.DataTable.isDataTable('#data_table')) {
                              table.destroy(); // Destroy existing DataTable
                            }
                            
                            table = $('#data_table').DataTable({
                                "bLengthChange": true,
                                "ordering": false,
                            });
                            
                            var element = document.querySelector('.table');
                            element.classList.remove('no-footer');
                            
                          }else if(data.apistatus == "NOT_REGISTERED"){
                            var mobileno = $("#mobile").val();
                              $('#btn-getDetails').removeClass('btn-loading');
                                webToast.Info({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                                var form = $('<form>', {
                                    'method': 'POST',
                                    'action': '{{ route('instantPayRemitterRegister')}}'
                                });

                                // Add CSRF token field
                                form.append($('<input>', {
                                    'type': 'hidden',
                                    'name': '_token',
                                    'value': '{{ csrf_token() }}'
                                }));
                                form.append($('<input>', {
                                    'type': 'hidden',
                                    'name': 'mobile',
                                    'value': mobileno
                                }));

                                // Append form to body and submit
                                $('body').append(form);
                                form.submit();
                              
                          }else if(data.apistatus == "REGISTRATION_PENDING"){
                              $('#sender_details').hide();
                              $('#beneficiary_details').hide();
                              
                              $('#btn-getDetails').removeClass('btn-loading');
                              $('#cus_mobile').val(data.mobile).attr('readonly', 'readonly').css('background','#eaeaea');
                              $('#fname').val(data.fname).attr('readonly', 'readonly').css('background','#eaeaea');
                              $('#lname').val(data.lname).attr('readonly', 'readonly').css('background','#eaeaea');
                              
                              if($('body').hasClass('theme-dark')){
                                  $('#cus_mobile').css('background','#716D6D');
                                  $('#fname').css('background','#716D6D');
                                  $('#lname').css('background','#716D6D');
                                //   $('#dob').css('background','#716D6D');
                              }
                              
                              $('#offcanvasEnd').offcanvas('show');
                          }
                      }else if(data.act == "RETRY"){
                          webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                          $('#btn-getDetails').removeClass('btn-loading');
                      }else {
                          webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                          $('#btn-getDetails').removeClass('btn-loading');
                              $('.field-disable').removeAttr('readonly').val('');
                          $('#offcanvasEnd .closeOffCanvas').click();
                      }
                  })
                  .fail(function (jqXHR, textStatus) {
                      if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                          var msg=jqXHR.responseJSON.message;
                      }else{
                          var msg="Something went wrong ("+ jqXHR.status +")";
                      }
                      webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                      $('#btn-getDetails').removeClass('btn-loading');
                        $('.field-disable').removeAttr('readonly');
                  })
                  .always(function (result) {
                    $('#btn-getDetails').removeClass('btn-loading');
                  });
                }
              });

              $("#btn-getDetails").click(function(){
                var mobileno = $('#mobile').val();
                
                $("#offcanvasEndLabel").text("Beneficiary Registration");
              
                $("#beneficiaryReg").show();
                $("#sendMoney").hide();
                $(".hiddemobile").val(mobileno);
            });

            
            //offcanvas show and hide
            $('.offcanvas').on('hidden.bs.offcanvas', function () {
              $('.validetta-inline').empty();
              $('.field-disable').val('');
              $('.field-disable').removeAttr('readonly');
              $('.field-disable').removeAttr('disabled');
              $("#sendMoney").hide();
             
              $("#btn-addBeneficiary").removeClass('btn-loading');
              $('.page').removeClass('disable-page-click'); //enable page click when offcanvas is closed. 
              
           
              $(".steps ").removeClass('steps-red').addClass('steps-green');
              
                $("#btnVerAccount").attr('disabled', 'disabled')
                
                //Add Beneficiary send otp functionality
                $("#btn-getBenOtp").prop('disabled', true); //disabled get otp button
                $("#submitotpblock").addClass('d-none'); //submit otp block hide
                $("#resendbenotp").addClass('d-none'); //resend otp button hide
                $("#loadingIcon").addClass('d-none'); //resend otp loader hide
                $("#btn-getBenOtp").removeClass('d-none'); //show get opt button after closing offcanvas
                
            });
            //search the first remitter register or not
            $("#mobile").on('input', function() {
                var inputLength = $(this).val().length;
                if (inputLength === 10) {
                    $('.field-disable').prop('readonly', true);
                    $( "#dmtmobile" ).submit();
                    $("#beneficiaryReg").hide();
                    this.value = this.value.substr(0, 10);
                }
            });
              
    });
</script>
            <!--Add Beneficiary OTP-->
    <script>
        //get otp button unable after the all data is filled
        function handleInput() {
            var ben_name = $("#b_name").val();
            var ben_mobile = $("#b_mobile").val();
            var gender = $("#gender").val();
            var relationship = $("#relationship").val();
            var state = $("#state").val();
            var district = $("#district").val();
            var paymentMode = $("#paymentMode").val();
            var bankBranchId = $("#bankBranchId").val();
            var accountno = $("#accountno").val();
            var conf_accountno = $("#conf_accountno").val();
           
            
            var mbl_len = ben_mobile.length;
            var c_acc_len = conf_accountno.length;
            var acc_len = accountno.length;
            if(accountno)
            {
                if (mbl_len > 9 && conf_accountno !== "" && accountno !== "" && bankBranchId !== "" && paymentMode !== "" && district !== "" && state !== "" && relationship !== "" && gender !== "" && ben_mobile !== "" && ben_name !== "" && accountno === conf_accountno && acc_len > 3 && c_acc_len > 3) {
                        $("#btn-getBenOtp").removeAttr('disabled');
                    } else {
                        $("#btn-getBenOtp").prop('disabled', true);
                    }
            }
            else{
                    if (mbl_len > 9 && bankBranchId !== "" && paymentMode !== "" && district !== "" && state !== "" && relationship !== "" && gender !== "" && ben_mobile !== "" && ben_name !== "") {
                        $("#btn-getBenOtp").removeAttr('disabled');
                    } else {
                        $("#btn-getBenOtp").prop('disabled', true);
                    }
            }
        }

        $("#b_name, #b_mobile,#conf_accountno, #accountno, #bankBranchId, #paymentMode,#district,#state,#relationship,#gender").on('input', handleInput);

        //state,District,payment mode select option change
        function fetchPaymentLocationList() {
                var state = $("#state").val();
                var district = $("#district").val();
                var paymentMode = $("#paymentMode").val();
                if(paymentMode=='Cash Payment'){
                        $("#conf_accountnodiv").hide();
                        $("#accountnodiv").hide();
                        } else{
                        $("#conf_accountnodiv").show();
                        $("#accountnodiv").show();
                        }
                $.ajax({
                    url: "{{route('paymentLocationList')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        state: state,
                        district: district,
                        paymentMode: paymentMode
                    },
                    dataType: "json",
                    method: 'post',
                })
                .done(function(data) {
                    if (data.status == "success") {
                        var items = '';
                        $.each(data.data, function(index, item) {
                            items += "<option value='" + item.bankBranchId + "'>" + item.bankName +', '+ item.address +', '+ item.city +', '+ item.district + "</option>";
                        });
                        $("#bankBranchId").html(items);
                       
                    }
                })
                .fail(function(jqXHR, textStatus) {
                    var msg = (jqXHR.responseJSON.message != undefined && jqXHR.status == 400) ? jqXHR.responseJSON.message : "Something went wrong (" + jqXHR.status + ")";
                    //webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                })
                .always(function(result) {
                    $("#state").removeClass("btn-loading");
                });
        }
       
        $("#state").on('change', function() {
                var state = $(this).val();
                $.ajax({
                    url: "{{route('getNepalDistrict')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        state: state,
                    },
                    dataType: "json",
                    method: 'post',
                })
                .done(function(data) {
                    if (data.status == "success") {
                        var items = '';
                        $.each(data.data, function(index, item) {
                            items += "<option value='" + item + "'>" + item + "</option>";
                        });
                        $("#district").html(items);
                        fetchPaymentLocationList(); // Call fetchPaymentLocationList after district is populated
                    }
                })
                .fail(function(jqXHR, textStatus) {
                    var msg = (jqXHR.responseJSON.message != undefined && jqXHR.status == 400) ? jqXHR.responseJSON.message : "Something went wrong (" + jqXHR.status + ")";
                    webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                })
                .always(function(result) {
                    $("#state").removeClass("btn-loading");
                });
        });

        $("#paymentMode").on('change', function() {
            fetchPaymentLocationList(); // Call fetchPaymentLocationList whenever payment mode changes
        });
        $("#district").on('change', function() {
            fetchPaymentLocationList(); // Call fetchPaymentLocationList whenever district changes
        });
        
            // Send Otp and verify otp code
        function getBenOtp(status){
                var mobile = $("#b_mobile").val();
                var name = $("#b_name").val();
                var action = status;
                var submitotp =  $("#submitotp").val();
                    $("#btn-getBenOtp").addClass('btn-loading');
                
                    $.ajax({
                    type: 'POST', // The HTTP method to use
                    url: "{{route('addBeneficiaryOtp')}}",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, // The URL of the controller action to call
                    data: {
                        mobile:mobile,
                        name:name,
                        action:action,
                        submitotp:submitotp
                    },
                    success: function (data) {
                        //alert(data.data);
                        if (data.act == "CONTINUE") {
                                if (data.apistatus == "OTP_VERIFIED") {
                                    $("#btnGetSubmit").addClass("disable-button");
                                    $("#add-beneficiary").submit();
                                } if (data.apistatus == "OTP_SEND") {
                                    //$('#checkOtpstatus').val('verifyOtp');
                                
                                    $("#btn-getBenOtp").addClass('d-none').removeClass('btn-loading');
                                    
                                    $('#beneficiaryReg input, #beneficiaryReg select').prop('readonly', true);

                                    $('#btn-getBenOtp').prop('disabled', true).text('Saved');

                                    $("#submitotp").prop('readonly', false);
                                    $("#submitotpblock").removeClass('d-none');
                                    setTimeout(function() {
                                        $("#resendbenotp").removeClass('d-none');
                                    }, 5000);
                                    webToast.Success({ status: 'Success', message: data.otp + data.message, delay: 8000, align: 'bottomright' });
                                }
                            
                        }else if(data.act == "TERMINATE"){
                            webToast.Danger({ status: 'Failed', message: data.message, delay: 3000, align: 'bottomright' });
                        }else{
                            webToast.Danger({ status: 'Failed', message: data.message, delay: 3000, align: 'bottomright' });
                        }
                        $("#btnGetSubmit").removeClass("disable-button");
                        $("#loadingIcon").addClass("d-none");
                        $("#btn-getBenOtp").removeClass('btn-loading');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                            var msg=jqXHR.responseJSON.message;
                        }else{
                            var msg="Something went wrong ("+ jqXHR.status +")";
                        }
                        webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                        $("#loadingIcon").addClass("d-none");
                        $("#btn-getBenOtp").removeClass('btn-loading');
                    }
                });
        }
        //Resend Otp button click 
        $("#resendbenotp").click(function(){
            $("#loadingIcon").removeClass("d-none");
        });
        //Add beneficiary button click over the data table
        $("#btn-add-ben").click(function(){
                var mobileno = $('#mobile').val();
                var sendername = $('#user_name').text();
                $("#offcanvasEndLabel").text("Add Beneficiary");
                $("#sendMoney").hide();
                $("#beneficiaryReg").show();
                $(".hiddemobile").val(mobileno);
                $("#cust_mobile").val(mobileno);
                $("#usernumber").val(mobileno);
                $("#username").val(sendername);
        });
            //Add beneficiary form submit
        $('#add-beneficiary').validetta({
              realTime: true,
              display: 'inline',
              errorTemplateClass: 'validetta-inline',
              onValid: function (event) {
                $('#btn-addBeneficiary').addClass('btn-loading');
                $('.field-disable').prop('readonly', true);
                event.preventDefault();
                $.ajax({
                  url: '{{ route('beneficiaryRegistration') }}',
                  data: $("#add-beneficiary").serialize(),
                  dataType: 'json',
                  method: 'post'
                })
                
                .done(function (data) {
                    if(data.act == "CONTINUE" && data.apistatus == "BENEFICIARY_REGISTER_SUCCESSFULLY"){
                        webToast.Success({ status: 'Success !', message: data.message, delay: 3000, align: 'bottomright' });
                      $('#btn-addBeneficiary').removeClass('btn-loading');
                      $('.field-disable').removeAttr('readonly').val('');
                      $('#offcanvasEnd .closeOffCanvas').click();
                    //   $("#dmtmobile").submit();
                      dmtsearch();
                        
                    }else if(data.act == "RETRY"){
                        if(data.apistatus == "BENEFICIARY_REGISTER_FAILED"){
                            webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                            $('#btn-addBeneficiary').removeClass('btn-loading');
                        }else {
                            webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                            $('#btn-addBeneficiary').removeClass('btn-loading');
                        }
                        
                        //Add Beneficiary send otp functionality
                        $("#btn-getBenOtp").prop('disabled', true); //disabled get otp button
                        $("#submitotpblock").addClass('d-none'); //submit otp block hide
                        $("#resendbenotp").addClass('d-none'); //resend otp button hide
                        $("#loadingIcon").addClass('d-none'); //resend otp loader hide
                        $("#btn-getBenOtp").removeClass('d-none'); //show get opt button after closing offcanvas
                        $("#submitotp").val('');

                    }else {
                        webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                        $('#btn-addBeneficiary').removeClass('btn-loading');
                        $('.field-disable').removeAttr('readonly').val('');
                        $('#offcanvasEnd .closeOffCanvas').click();
                    }
                })
                .fail(function (jqXHR, textStatus) {
                      if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                          var msg=jqXHR.responseJSON.message;
                      }else{
                          var msg="Something went wrong ("+ jqXHR.status +")";
                      }
                      webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                  $('#btn-addBeneficiary').removeClass('btn-loading');
                  $('.field-disable').removeAttr('readonly');
                  })
                .always(function (result) {
                  $('#btn-addBeneficiary').removeClass('btn-loading');
                  $('.field-disable').removeAttr('readonly');
                });
              }
            });
            function dmtsearch(){
            $("#dmtmobile").submit();
        }
        function btnSendmoney(sendname,sendmobile,bene_id,bene_name,bene_mobile,bene_account,bene_paymentMode,bankBranchId)
            {
             alert(sendname+sendmobile+bene_id+bene_name+bene_mobile+bene_account+bene_paymentMode+bankBranchId);
                    var mobileno = $('#mobile').val();
                            
                            $("#offcanvasEndLabel").text("Send Money");
                            $("#beneficiaryReg").hide();
                            
                            $("#sendMoney").show();
                            
                            $(".hiddemobile").val(mobileno);
                            
                        var sender_name = $('#user_name').text();
                        var sender_mobile =  $('#sendermobile').text();

                        $("#sender_name").text(sender_name);
                        $("#sender_mobile").text(sender_mobile);
                       
                        $('#ben_name').text($.trim(bene_name));
                        $('#ben_mobile').text($.trim(bene_mobile));
                        
                        $('#benaccount').text($.trim(bene_account));
                        $('#bene_paymentMode').text($.trim(bene_paymentMode));
                        
                        $('#beneficiaryId').val($.trim(bene_id));
                        $('#rec_name').val($.trim(bene_name));
                        $('#receiver_mobile').val($.trim(bene_mobile));
                        $('#rec_bankBranchId').val(bankBranchId);
                        
                        $('#rec_account').val($.trim(bene_account));
                        $('#receiver_paymentMode').val($.trim(bene_paymentMode));
                        
                        $("#sen_name").val($.trim(sender_name));
                        $("#remitterMobile").val($.trim(sender_mobile));
                        
                        
            
            }
            $("#mobilebtn").click(function(){
                var mobile = $('#mobile').val();
                var operation = $('#operation').val();
                var beneficiaryId = $('#beneficiaryId').val();
                var receiver_paymentMode = $('#receiver_paymentMode').val();
                var rec_bankBranchId = $('#rec_bankBranchId').val();
                var rec_account = $('#rec_account').val();
                var transferAmount = $('#transferAmount').val();
                  $("#mobilebtn").addClass('btn-loading');
                    $.ajax({
                      type: 'POST', // The HTTP method to use
                      url: '{{ route('sendOtp') }}', // The URL of the controller action to call
                      data: {
                          mobile:mobile,
                          operation:operation,
                          paymentMode:receiver_paymentMode,
                          bankBranchId:rec_bankBranchId,
                          accountNumber:rec_account,
                          beneficiaryId:beneficiaryId,
                          transferAmount:transferAmount
                      },
                      headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                      success: function (data) {
                        if(data.act == "CONTINUE"){
                         //alert(mobile);
                            $("#mobilebtn").removeClass('btn-loading');
                            $('#mobilebtn').hide();
                            $('#submitotpblock_fundtransfer').show();
                            $('#btn-sendMoney').show();
                            $('#otpReference').val($.trim(data.data.otpReference));
                            $('#mobileno').val(mobile);
                              webToast.Success({ status: 'Success', message: data.message, delay: 3000, align: 'bottomright' });
                          }else if(data.act == "RETRY"){
                            
                            $("#mobilebtn").removeClass('btn-loading');
                              webToast.Danger({ status: 'Failed', message: data.message, delay: 3000, align: 'bottomright' });
                          }else{
                              webToast.Danger({ status: 'Failed', message: data.message, delay: 3000, align: 'bottomright' });
                          }
                      },
                      error: function (jqXHR, textStatus, errorThrown) {
                          if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                            var msg=jqXHR.responseJSON.message;
                        }else{
                            var msg="Something went wrong ("+ jqXHR.status +")";
                        }
                        webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                        $("#mobilebtn").removeClass('btn-loading');
                      }
                    });
          });

       
            //datatable send money  button click
            $('#send-money').validetta({
              realTime: true,
              display: 'inline',
              errorTemplateClass: 'validetta-inline w-100',
              onValid: function (event) {
                     $('#btn-sendMoney').addClass('btn-loading');
                     if($('body').hasClass('theme-dark')){
                         $.LoadingOverlaySetup({
                            background      : "rgba(0, 0, 0, 0.5)",
                            size : "50px",
                            imageColor      : "#ffcc00"
                        });
                     }else{
                         $.LoadingOverlaySetup({
                            background      : "rgba(0, 0, 0, 0.5)",
                            size : "50px",
                            imageColor      : "#000"
                        });
                     }
                     // Show full page LoadingOverlay
                    $.LoadingOverlay("show");

                    $('.field-disable').prop('readonly', true);
                    var trans_amount = $("#transferAmount").val(); // Get the value from the input field
                    event.preventDefault();
                    $.ajax({
                      url: '{{ route('fundTransfer') }}',
                      data: $("#send-money").serialize(),
                      dataType: 'json',
                      method: 'post'
                    })
                    
                    .done(function (data) {
                        if(data.act == "CONTINUE" && data.apistatus == "TRANSFER_SUCCESSFUL"){
                          $('#btn-sendMoney').removeClass('btn-loading');
                          $('.field-disable').removeAttr('readonly').val('');
                         // $('#verifynamecheck').empty();
                          $('#offcanvasEnd .closeOffCanvas').click();
                          
                          $.LoadingOverlay("hide");

                            $("#modalValue").text(trans_amount); // Set the value in the modal
                          $("#payment-success").modal('show');
                        }else if(data.act == "RETRY" && data.apistatus == "TRANSFER_FAILED"){
                            webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                            $('#btn-sendMoney').removeClass('btn-loading');
                            $("#payment-failed").modal('show');
                            $('#offcanvasEnd .closeOffCanvas').click();
                            
                            $.LoadingOverlay("hide");
                            
                            $("#txnfailedValue").text(trans_amount); // Set the value in the modal
                          //$("#payment-failed").modal('show');
                        }else if(data.act == "TERMINATE" && data.apistatus == "TRANSFER_PENDING"){
                            webToast.Info({ status: 'Pending !', message: data.message, delay: 3000, align: 'bottomright'  });
                            $('#btn-sendMoney').removeClass('btn-loading');
                            $('.field-disable').removeAttr('readonly').val('');
                            $('#offcanvasEnd .closeOffCanvas').click();
                            
                            
                            $.LoadingOverlay("hide");
                            $("#txnpendingValue").text(trans_amount); // Set the value in the modal
                            $("#payment-pending").modal('show');
                        }else {
                            webToast.Danger({ status: 'Pending !', message: data.message, delay: 3000, align: 'bottomright'  });
                            $('#btn-sendMoney').removeClass('btn-loading');
                            $('.field-disable').removeAttr('readonly').val('');
                            $('#offcanvasEnd .closeOffCanvas').click();
                        }
                        
                        $("#gettabledata").html("");
                        $("#invoice-table-details").html("");
                        
                        /*Invoice receipt details*/
                        //$.each(data.data, function(index, value) {
                            var badgeforstatus;
                            var badgeforstatus2 = data.status;
                            
                            if(data.status == "success"){
                                
                                badgeforstatus = `<span class="d-flex"><i class="badge bg-success mt-2"></i>&nbsp;`+  badgeforstatus2 +`</span>`;
                            }else if(data.status == "failed"){
                               badgeforstatus = `<span class="d-flex"><i class="badge bg-danger mt-2"></i>&nbsp;`+  badgeforstatus2 +`</span>`;
                            }else if(data.status == "pending"){
                               badgeforstatus = `<span class="d-flex"><i class="badge bg-warning mt-2"></i>&nbsp;`+  badgeforstatus2 +`</span>`;
                            }
                            
                            // return badgeforstatus;
                            
                            $('#gettabledata').append(`<tr>
                            <td>`+data.data.externalRef+`</td>
                            <td>`+data.data.txnReferenceId+`</td>
                            <td>`+data.data.poolReferenceId+`</td>
                            <td><svg style="--tblr-icon-size: 1rem; margin: 2px" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                   <path d="M7 9l11 0"></path>
                                </svg>
                                `+data.data.txnValue+`
                            </td>
                            <td>`+badgeforstatus+`</td></tr>`);
                            
                            $('#invoice-table-details').append(`<tr>
                            <td>`+data.data.externalRef+`</td>
                            <td>`+data.data.txnReferenceId+`</td>
                            <td>`+data.data.poolReferenceId+`</td>
                            <td>`+data.data.paymentMode.toUpperCase()+`</td>
                            <td>`+badgeforstatus+`</td>
                            <td><div class="d-flex"><svg xmlns="http://www.w3.org/2000/svg" style="--tblr-icon-size: 1rem;margin-top: 3px;" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                   <path d="M7 9l11 0"></path>
                                </svg>
                                `+data.data.txnValue+`</div>
                            </td></tr>`);
                            
                            //sender details
                            $("#sender_name_invoice").text(data.data.remitterName);
                            $("#sender_mbl").text(data.data.remitterMobile);
                            
                            //beneficiary details
                            $("#invc_ben_name").text(data.data.beneficiaryName);
                            $("#invc_ben_bank").text(data.data.beneficiaryBankName);
                            $("#invc_ben_acc").text(data.data.beneficiaryAccount);
                            $("#invc_ben_ifsc").text(data.data.beneficiaryBranchId);
                            
                            var totalamount = parseInt(data.data.pool.openingBal, 10); 
                            var totalcharges = parseInt(data.data.exchangeRate, 10);
                                var txnamount = parseFloat(data.data.pool.openingBal);
                            
                            $("#inv_total_amount").text(txnamount);
                            $("#inv_total_charges").text(data.data.totalcharges);
                            $("#txn_remark").text(data.data.txnremark);
                            
                       // });
                        $("#created_date").text(data.date);
                        /*Invoice receipt details*/
                    })
                    .fail(function (jqXHR, textStatus) {
                        if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                            var msg=jqXHR.responseJSON.message;
                        }else{
                            var msg="Something went wrong ("+ jqXHR.status +")";
                        }
                        webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                        $('#btn-sendMoney').removeClass('btn-loading');
                        $('.field-disable').removeAttr('readonly');
                        // $("#payment-failed").modal('show');
                        
                        $.LoadingOverlay("hide");
                    })
                    .always(function (result) {
                      $('#btn-sendMoney').removeClass('btn-loading');
                      $('.field-disable').removeAttr('readonly');
                      
                      $.LoadingOverlay("hide");
                    });
              }
            });
        </script>
@endsection