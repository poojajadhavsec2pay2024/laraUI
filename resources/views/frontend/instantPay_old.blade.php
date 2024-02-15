@extends('frontend.layout.main')

@section('main-container')
<link href="{{url('frontend/dist/css/webToast.min.css')}}" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">  
<script type="text/javascript" src="{{url('frontend/dist/js/webToast.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script src="{{url('frontend/dist/js/customvalidation.js')}}" defer></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
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
                            <th>IFSC</th>
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
                       <input id="cust_mobile" type="hidden" name="mobile" value=""> 
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
                            <select class="form-select field-disable" id="bankName" name="bankName" data-validetta="required" style="width: 117%;" >
                              <option value="">Select Bank Name</option>
                              <option value=""></option>
                            </select>
                            
                          </div>
                       </div>
                       
                       <div class="row mt-3">
                            <div class="form-group col-12">
                                <label class="form-label required text-muted">Account No.</label>
                                <input id="accountno" type="text"  name="accountno" autocomplete="off" data-validetta="required,minLength[6],maxLength[20],number" class="form-control field-disable" onkeypress="return accountnumber(event,this.id)" data-vd-message-required="Please enter account number" data-vd-message-minLength="Please enter valid account number" data-vd-message-number="Please enter valid account number">
                            </div>
                       </div>
                       <div class="row mt-3">
                            <label class="form-label required text-muted">Confirm Acc No.</label>
                              <div class="input-group col-12">
                                <input id="conf_accountno" type="text"  name="conf_accountno" autocomplete="off" style="width: auto;" data-validetta="required,minLength[6],maxLength[20],number,equalTo[accountno]" class="form-control field-disable" onkeypress="return accountnumber(event,this.id)" data-vd-message-required="Please confirm account number" data-vd-message-minLength="Please enter valid account number" data-vd-message-number="Please enter valid account number" data-vd-message-equalTo="Confirm account do not match with account no.">
                               
                               
                              </div>
                        </div>
                       <div class="row mt-3 mb-3">
                           
                       </div>
                    </div>
                    <!--//first div            -->
                    
                    <div class="text-end">
                      <button id="btn-addBeneficiary" type="submit" class="btn btn-primary d-none"></button>
                    </div>
                </form>
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
            </div>
        </div>
        <div id="sendMoney" style="display: none;">
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
                                ben name
                            </h3>
                            <p id="ben_bank" style="text-align: left; margin: 0;">
                                BANK NAME
                            </p>
                            <div class="d-flex">
                                <code style="font-size: 12px;" id="benaccount">Ben Account</code>&nbsp;<code style="font-size: 12px;" id="benifsc">Ben IFSC</code>
                            </div>
                        </div>
                            
                        <div class="hr-text">
                            Transaction Details
                        </div>
                        <form id="send-money" method="post" action="#">   
                            @csrf

                            <input type="hidden" id="rec_name"  name="b_name" value="">
                            <input type="hidden" id="rec_bank" name="b_bank" value="">
                            <input type="hidden" id="rec_account" name="b_account" value="">
                            <input type="hidden" id="rec_ifsc_number" name="b_ifsc_number" value="">
                            <input type="hidden" id="sen_name" name="sen_name" value="">
                            <input type="hidden" id="sen_mbl" name="sen_mbl" value="">
                            <input type="hidden" id="ben_id" name="ben_id" value="">
                            <div class="row">
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
                                    <input id="tr_amount" type="text"  name="tr_amount" autocomplete="off" placeholder="Amount" data-validetta="required" onkeypress="return addAmount(event,this.id)" class="form-control field-disable" data-vd-message-required="Please enter amount">
                               </div>
                            </div>
                            
                            <div>
                               <div class="form-group col-12 mb-3 row">
                                   <label class="form-label required text-muted">Payment Mode</label>
                                   <label class="form-label col-lg-3 col-md-3 col-sm-6"><input type="radio" name="tr_mode" value="2" data-validetta="required" data-vd-message-required="Payment Mode Required" checked> IMPS</label>
                                   <label class="form-label col-lg-3 col-md-3 col-sm-6"><input type="radio" name="tr_mode" value="1" data-validetta="required" data-vd-message-required="Payment Mode Required"> NEFT</label>
                               </div>
                            </div>
                        
                            <div class="text-end">
                              <button id="btn-sendMoney" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                
            </div>
        </div>
      </div>
    </div>
    <!--OFFCANVAS END-->

            <!-- Content here -->
          </div>
        </div>
        
      </div>
      <script>
      //Check if mobile number is registered. 
      $(document).ready(function($) {
        //var mobileno = "1234567890";
            //Remitter  registered. 
        //Check if mobile number is registered. 
            //Color changes in dark/light themes. 
            
            $('#sender_details').hide();
            $('#beneficiary_details').show();
            
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
                                        <a id="btn-getSendDetails" onclick="btnSendmoney()" class='btn btn-outline-info rounded-pill' data-bs-toggle='offcanvas' href='#offcanvasEnd' role='button' aria-controls='offcanvasEnd'>
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
                           // alert(mobileno);
                              // $('#sender_details').hide();
                              // $('#beneficiary_details').hide();
                              // $('#sendMoney').hide();
                               //$('#offcanvasEndLabel').text("Member Registration");
                              // $('.field-disable').removeAttr('readonly').val('');
                              $('#btn-getDetails').removeClass('btn-loading');
                              // $('#cus_mobile').val(value).prop('readonly', true).css('background','#eaeaea');
                            // if($('body').hasClass('theme-dark')){
                            //       $('#cus_mobile').css('background','#716D6D');
                            // }
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

            $('.offcanvas').on('hidden.bs.offcanvas', function () {
              $('.validetta-inline').empty();
              $('.field-disable').val('');
              $('.field-disable').removeAttr('readonly');
              $('.field-disable').removeAttr('disabled');
              $("#sendMoney").hide();
             
              $("#btn-addBeneficiary").removeClass('btn-loading');
              $('.page').removeClass('disable-page-click'); //enable page click when offcanvas is closed. 
              
           
              $(".steps ").removeClass('steps-red').addClass('steps-green');
              
            //   var mobileno = $('#mobile_number').val();
            //   $("#mobile").val(mobileno);

            //   $('#cus_mobile').val("").removeAttr('readonly').css('background','none');
            //   $('#fname').val("").removeAttr('readonly').css('background','none');
            //   $('#lname').val("").removeAttr('readonly').css('background','none');
              
            //   Disable verify bank account button
                $("#btnVerAccount").attr('disabled', 'disabled')
                
                //Add Beneficiary send otp functionality
                $("#btn-getBenOtp").prop('disabled', true); //disabled get otp button
                $("#submitotpblock").addClass('d-none'); //submit otp block hide
                $("#resendbenotp").addClass('d-none'); //resend otp button hide
                $("#loadingIcon").addClass('d-none'); //resend otp loader hide
                $("#btn-getBenOtp").removeClass('d-none'); //show get opt button after closing offcanvas
                
            });
              
    });
</script>
            <!--Add Beneficiary OTP-->
    <script>

function handleInput() {
    var ben_name = $("#b_name").val();
    var ben_mobile = $("#b_mobile").val();
    var gender = $("#gender").val();
    var relationship = $("#relationship").val();
    var state = $("#state").val();
    var district = $("#district").val();
    var paymentMode = $("#paymentMode").val();
    var bankName = $("#bankName").val();
    var accountno = $("#accountno").val();
    var conf_accountno = $("#conf_accountno").val();
    
    var mbl_len = ben_mobile.length;
    var c_acc_len = conf_accountno.length;
    var acc_len = accountno.length;

    if (mbl_len > 9 && conf_accountno !== "" && accountno !== "" && bankName !== "" && paymentMode !== "" && district !== "" && state !== "" && relationship !== "" && gender !== "" && ben_mobile !== "" && ben_name !== "" && accountno === conf_accountno && acc_len > 3 && c_acc_len > 3) {
        $("#btn-getBenOtp").removeAttr('disabled');
    } else {
        $("#btn-getBenOtp").prop('disabled', true);
    }
}

$("#b_name, #b_mobile, #conf_accountno, #accountno, #bankName, #paymentMode,#district,#state,#relationship,#gender").on('input', handleInput);

function fetchPaymentLocationList() {
    var state = $("#state").val();
    var district = $("#district").val();
    var paymentMode = $("#paymentMode").val();

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
            $("#bankName").html(items);
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
       
        function getBenOtp(status){
          var mobile = $("#b_mobile").val();
           var name = $("#b_name").val();
           var checkOtpstatus = status;
           var submitotp =  $("#submitotp").val();
            $("#btn-getBenOtp").addClass('btn-loading');
           
            $.ajax({
              type: 'POST', // The HTTP method to use
              url: "{{route('addBeneficiaryOtp')}}", // The URL of the controller action to call
              data: {
                  _token: "{{ csrf_token() }}",
                  mobile:mobile,
                  name:name,
                  checkOtpstatus:checkOtpstatus,
                  submitotp:submitotp
              },
              success: function (data) {
                //alert(data.data);
                if (data.act == "CONTINUE") {
                        if (data.checkOtpstatus == "VERIFY_OTP") {
                            $("#btnGetSubmit").addClass("disable-button");
                            $("#add-beneficiary").submit();
                        } if (data.checkOtpstatus == "SEND_OTP") {
                            //$('#checkOtpstatus').val('verifyOtp');
                           
                            $("#btn-getBenOtp").addClass('d-none').removeClass('btn-loading');
                             $('#beneficiaryReg input, #beneficiaryReg select').prop('disabled', true);
                             $('#btn-getBenOtp').prop('disabled', true).text('Saved');
                            $("#submitotp").prop('disabled', false);
                            $("#submitotpblock").removeClass('d-none');
                            setTimeout(function() {
                                $("#resendbenotp").removeClass('d-none');
                            }, 5000);
                        }
                        webToast.Success({ status: 'Success', message: data.otp + data.message, delay: 5000, align: 'bottomright' });
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
        
        $("#resendbenotp").click(function(){
            $("#loadingIcon").removeClass("d-none");
        });
        

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
                    if(data.act == "CONTINUE" && data.apistatus == "BENEFICIARY_REGSUCCESS"){
                        webToast.Success({ status: 'Success !', message: data.message, delay: 3000, align: 'bottomright' });
                      $('#btn-addBeneficiary').removeClass('btn-loading');
                      $('.field-disable').removeAttr('readonly').val('');
                      $('#offcanvasEnd .closeOffCanvas').click();
                    //   $("#dmtmobile").submit();
                      dmtsearch();
                        
                    }else if(data.act == "RETRY"){
                        if(data.apistatus == "BENEFICIARY_ALREADYEXISTS"){
                            webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                            $('#btn-addBeneficiary').removeClass('btn-loading');
                        }else if(data.apistatus == "BENEFICIARY_REGFAILED"){
                            webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                            $('#btn-addBeneficiary').removeClass('btn-loading');
                        }
                        
                        //Add Beneficiary send otp functionality
                        $("#btn-getBenOtp").prop('disabled', true); //disabled get otp button
                        $("#submitotpblock").addClass('d-none'); //submit otp block hide
                        $("#resendbenotp").addClass('d-none'); //resend otp button hide
                        $("#loadingIcon").addClass('d-none'); //resend otp loader hide
                        $("#btn-getBenOtp").removeClass('d-none'); //show get opt button after closing offcanvas
                        
                        $("#nameverified").hide(); //show get opt button after closing offcanvas
                        $("#nameNotVer").hide(); //show get opt button after closing offcanvas
                        $("#nameVerPending").hide(); //show get opt button after closing offcanvas
                        
                        $("#submitotp").val('');

                    }else if(data.act == "TERMINATE" && $result['apistatus'] == 'BENEFICIARY_REGSUCCESS'){
                        webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                        $('#btn-addBeneficiary').removeClass('btn-loading');
                        $('.field-disable').removeAttr('readonly').val('');
                        $('#offcanvasEnd .closeOffCanvas').click();
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
        
        </script>
@endsection