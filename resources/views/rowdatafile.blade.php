@extends('frontend.layout.main')

@section('main-container')
$("#state").on('change', function() {
                var state = $(this).val();  
                $.ajax({
                              url: "{{route('getNepalDistrict')}}",
                              headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                              data: { 
                                    state:state,
                                  },
                              dataType: "json",
                              method: 'post',
                      })
                            .done(function(data){
                                    if(data.status == "success"){
                                      var items = '';
                                        $.each(data.data,function(index,item) 
                                        {
                                        items+="<option value='"+item +"'>"+item +"</option>";
                                        });
                                        $("#district").html(items);
                                        
                                    }
                                
                            })
                            .fail(function (jqXHR, textStatus) {
                                if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                                      var msg=jqXHR.responseJSON.message;
                                  }else{
                                      var msg="Something went wrong ("+ jqXHR.status +")";
                                  }
                                  webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                            })
                            
                            .always( function( result ){ 
                              $("#state").removeClass("btn-loading");
                          });

            });
            $("#paymentMode").on('change', function() {
                var paymentMode = $(this).val();  
                var state = $("#state").val(); 
                var district = $("#district").val(); 
                $.ajax({
                              url: "{{route('paymentLocationList')}}",
                              headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                              data: { 
                                    state:state,
                                    paymentMode:paymentMode,
                                    district:district
                                  },
                              dataType: "json",
                              method: 'post',
                      })
                            .done(function(data){
                                    if(data.status == "success"){
                                      var items = '';
                                        $.each(data.data,function(index,item) 
                                        {
                                        items+="<option value='"+item.bankBranchId +"'>"+item.bankName +"</option>";
                                        });
                                        $("#bankName").html(items);
                                        
                                    }
                                
                            })
                            .fail(function (jqXHR, textStatus) {
                                if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                                      var msg=jqXHR.responseJSON.message;
                                  }else{
                                      var msg="Something went wrong ("+ jqXHR.status +")";
                                  }
                                  webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                            })
                            
                            .always( function( result ){ 
                              $("#state").removeClass("btn-loading");
                          });

            });
<link href="{{url('frontend/dist/css/webToast.min.css')}}" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">  
<script type="text/javascript" src="{{url('frontend/dist/js/webToast.min.js')}}"></script>

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
                                                    Sender
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 my-auto">
                                                        <div class="row ">
                                                            <div class="row img-fluid d-flex justify-content-center" >
                                                                <img class="w-50" src="{{asset('public/mytheme/img/payments/dmt-img.png')}}">
                                                            </div>
                                                            <div class="row my-auto text-center" >
                                                                <h5 class="page-title d-flex justify-content-center" id="user_name" >
                                                                    -
                                                                </h5>
                                                                <p id="sendrmobile" class="mb-0">-</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 border-left-custom">
                                                        <div class="form-group row mb-3">
                                                            <label class="form-label mb-0">Total Limit</label>
                                                            <div class="d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee my-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                                                   <path d="M7 9l11 0"></path>
                                                                </svg>
                                                                    <code id="total_limit">
                                                                    -
                                                                </code>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label class="form-label mb-0">Used Limit</label>
                                                            <div class="d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee my-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                                                   <path d="M7 9l11 0"></path>
                                                                </svg>
                                                                    <code id="used_limit">
                                                                   -
                                                                </code>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="form-label mb-0">Remaining Limit</label>
                                                            <div class="d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee my-auto" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                                                   <path d="M7 9l11 0"></path>
                                                                </svg>
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
                            <th>Sr No</th>
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
            <!-- Beneficiary Registration -->
            <div id="beneficiaryReg">
            <div class="container">
                <form id="add-beneficiary" method="post" action="#" enctype="multipart/form-data">   
                    <div id="firstdiv">
                        @csrf
                       <input id="cust_mobile" type="hidden" name="mobile" value=""> 
                       <input id="bankid" type="hidden" name="bankid" value=""> 
                       <div class="row">
                           <div class="form-group col-12">
                                <label class="form-label required text-muted">Mobile</label>
                                <input id="b_mobile" type="text"  name="b_mobile" autocomplete="off" data-validetta="number,required,minLength[10],maxLength[10]" class="form-control field-disable" onkeypress="return phonenumber(event, this.id)" data-vd-message-required="Please enter beneficiary mobile" data-vd-message-number="Please enter only number" data-vd-message-minlength="Please enter minimum 10 digit number">
                            </div>
                       </div>
                       <div class="row mt-3">
                           <div class="form-group col-6">
                              <div class="">
                                  <label class="form-label required text-muted">Bank Name</label>
                                  <select type="text"  name="bankname" id="bankname" class="form-select field-disable" data-validetta="required" data-vd-message-required="Please select bank">
                                   <option value="">Select Bank</option>
                                  
                                  </select>
                              </div>
                          </div>
                          <div class="form-group col-6">
                            <label class="form-label required text-muted">IFSC Code</label>
                            <input id="ifsc" type="text"  name="b_ifsc" autocomplete="off" data-validetta="required" class="form-control field-disable" onkeypress="return ifscvalidation(event,this.id)" data-vd-message-required="Please enter ifsc code" >
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
                                <button id="btnVerAccount" class="btn" type="button" disabled="" data-bs-toggle="modal" data-bs-target="#modal-success" disabled>Verify</button>
                                <div class="d-flex" id="verifynamecheck">
                                  <span id="nameverified" class="text-success" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path> </svg></span>
                                    <span id="nameNotVer" class="text-danger" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" fill="currentColor" stroke-width="0"></path> </svg></span>
                                    <span id="nameVerPending" class="text-warning" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" fill="currentColor" stroke-width="0"></path> </svg></span>
                                      <small ><span id="nameCheck"></span></small>
                                </div>
                              </div>
                        </div>
                       <div class="row mt-3 mb-3">
                           <div class="form-group col-12">
                                <label class="form-label required text-muted">Beneficiary Name</label>
                                <input id="b_name" type="text"  name="b_name" autocomplete="off" data-validetta="required" class="form-control field-disable" onkeypress="return accountholder(event, this.id)" data-vd-message-required="Please enter beneficiary name" readonly>
                            </div>
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
                  <button id="btn-getBenOtp" type="submit" class="btn btn-primary" onclick="getBenOtp();" disabled>Get OTP</button>
                </div>
                
                <div class="row d-none" id="submitotpblock">
                  <div class="form-group col-6 mb-3">
                    <label class="form-label required text-muted">Enter OTP</label>
                    <input id="submitotp" type="text"  name="submitotp" placeholder="Enter OTP" autocomplete="off" data-validetta="required" class="form-control field-disable" onkeypress="return setbankotpval(event, this.id)" data-vd-message-required="Please enter otp">
                  </div>
                    <div class="input-group-append">
                        <a class="mt-1 d-none" style="text-decoration: none;color: #3B71CA; font-weight: bold;cursor: pointer;" id="resendbenotp" onclick="getBenOtp()">Resend OTP</a>
                        <div class="spinner-border d-none text-primary" role="status" id="loadingIcon">
                        </div>
                    </div>
                  
                  <div class="text-end">
                      <a id="btnSubOtp" onclick="submitVerifyOtp()" class="btn btn-primary">Submit</a>
                    </div>
                </div>
            </div>
        </div>

        <!---Beneficiary Registration end-->

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
                            $("#user_name").text(data.name);
                            $("#sendrmobile").text(data.mobile);
                            
                            var rem_limit = data.totallimit - data.usedlimit;

                            $("#total_limit").text(data.totallimit);
                            $("#used_limit").text(data.usedlimit);
                            $("#rem_limit").text(rem_limit);

                            if(data.data.beneficiaries.apistatus == "LIST_EMPTY"){
                                $("#table_body").empty();
                            }else{
                                $("#table_body").html("");
                                var srno = 1;
                                $.each(data.data.beneficiaries.beneficiary, function(index, value) {
                                    $('#table_body').append(`<tr>
                                    <td>`+srno+`</td>
                                    <td>`+value.b_name+`</td>
                                    <td>`+value.b_bank+`</td>
                                    <td>`+value.b_account+`</td>
                                    <td>`+value.b_ifsc+`</td>  
                                    <td style="display:none">`+value.b_status+`</td>
                                    <td style="display:none">`+value.b_id+`</td>
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
                            }
                            
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
                              
                              // $('#offcanvasEndLabel').text("Member Registration");
                              
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
              
    });
              </script>
              
@endsection