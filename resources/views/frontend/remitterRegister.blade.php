@extends('frontend.layout.main')

@section('main-container')
<?php //print_r($data);

?>
<link href="{{url('frontend/dist/css/webToast.min.css')}}" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{url('frontend/dist/js/webToast.min.js')}}"></script>
<script src="{{url('frontend/dist/js/validetta.min.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
        <!--content start--->

          
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form class="card" id="dmtremitterreg" method="POST" action="{{ route('remitterRegistration')}}">
                @csrf
                <input type="hidden" class="form-control" id="operation" name="operation" value="REMITTER_REGISTRATION">
                <input type="hidden" class="form-control" id="otpReference" name="otpReference" value="b05483ba-9714-4a7c-b861-2790c0721fa6">
                <input type="hidden" class="form-control" id="idExpiryDate" name="idExpiryDate" value="">
                <input type="hidden" class="form-control" id="idIssuedPlace" name="idIssuedPlace" value="">
                <input type="hidden" class="form-control" id="mobileno" name="mobileno">

                <div class="card-body">
                    <h3 class="card-title">Add Remitter</h3>

                    <div class="row g-3">
                        <div class="col-md-14">
                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <div class="input-group">
                                    <input type="text" class="form-control field-disable" id="mobile" name="mobile" placeholder="Enter the Mobile number" data-validetta="number,required,minLength[10],maxLength[10]" value="{{ isset($data['remitterInfo']->mobile) ? $data['remitterInfo']->mobile : $data['mobile']}}" @if(!$data['isEditable']) disabled @endif>
                                    <button class="btn btn-primary" type="button" id="mobilebtn" name="mobilebtn" @if(!$data['isEditable']) disabled @endif>Go!</button>
                                </div>
                            </div>
                        </div>

                        @if($data['remitterInfo'])
                        <div class="row" id="remitterform" style="display:show"> 
                        @else
                        <div class="row" id="remitterform" style="display:none"> 
                        @endif
                        <!-- Column for OTP and Name -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Enter Otp</label>
                                <input type="text" class="form-control field-disable" id="otp" name="otp" data-validetta="required" class="form-control field-disable" data-vd-message-required="Please enter OTP" value="{{ isset($data['remitterInfo']->mobile) ? $data['remitterInfo']->mobile : ''}}" @if(!$data['isEditable']) disabled @endif>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control field-disable" id="name" name="name" placeholder="Username" autocomplete="off" data-validetta="required" value="{{ isset($data['remitterInfo']->mobile) ? $data['remitterInfo']->mobile : ''}}" @if(!$data['isEditable']) disabled @endif>
                            </div>
                        </div>
                        <!-- End OTP and Name column -->

                        <!-- Column for Gender and DOB -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select field-disable" id="gender" name="gender" @if(!$data['isEditable']) disabled @endif>
                                  <option value="" @if($data['remitterInfo']) {{!$data['remitterInfo']->remitterType ? 'selected' : '' }} @endif>Select Gender</option>
                              <option value="Male" @if($data['remitterInfo']){{$data['remitterInfo']->gender == 'Male' ? 'selected' : '' }}@endif>Male</option>
                              <option value="Female" @if($data['remitterInfo']){{$data['remitterInfo']->gender == 'Female' ? 'selected' : '' }}@endif>Female</option>
                              <option value="Other" @if($data['remitterInfo']){{$data['remitterInfo']->gender == 'Other' ? 'selected' : '' }} @endif>Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">DOB</label>
                                <input type="date" name="dob" class="form-control field-disable bs-validate" data-validetta="required" placeholder="Select a date" id="dob" data-vd-message-required="Please select a date" autofill="off" value="{{ isset($data['remitterInfo']->dob) ? $data['remitterInfo']->dob : ''}}" @if(!$data['isEditable']) disabled @endif>
                            </div>
                        </div>
                        <!-- End Gender and DOB column -->

                        <!-- Column for Nationality and Email -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nationality</label>
                                <select class="form-select field-disable" id="nationality" name="nationality" data-validetta="required" @if(!$data['isEditable']) disabled @endif>
                                <option value="" @if($data['remitterInfo']) {{ !$data['remitterInfo']->nationality ? 'selected' : '' }} @endif>Select Nationality</option>
                              <option value="Nepalese" @if($data['remitterInfo']){{ $data['remitterInfo']->nationality == 'Nepalese' ? 'selected' : '' }} @endif>Nepalese</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control field-disable" placeholder="Email Address" data-validetta="required,email" value="{{ isset($data['remitterInfo']->email) ? $data['remitterInfo']->email : ''}}" @if(!$data['isEditable']) disabled @endif >
                            </div>
                        </div>
                        <!-- End Nationality and Email column -->

                        <!-- Column for Address -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" id="address" name="address" class="form-control field-disable" placeholder="Home Address" data-validetta="required" value="{{ isset($data['remitterInfo']->address) ? $data['remitterInfo']->address : ''}}" @if(!$data['isEditable']) disabled @endif>
                            </div>
                        </div>
                        <!-- End Address column -->

                        <!-- Column for Employer -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Employer</label>
                                <input type="text" id="employer" name="employer" class="form-control field-disable" placeholder="Company Name" data-validetta="required" value="{{ isset($data['remitterInfo']->employer) ? $data['remitterInfo']->employer : ''}}" @if(!$data['isEditable']) disabled @endif>
                            </div>
                        </div>
                        <!-- End Employer column -->

                        <!-- Column for State, District, and City -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">State <i id="statespin" class="" style="font-size:24px,"></i></label>
                                
                                <select  class="form-select field-disable" id="state" name="state" data-validetta="required" @if(!$data['isEditable']) disabled @endif>
                                <option value="" @if($data['remitterInfo']){{ !$data['remitterInfo']->state ? 'selected' : '' }} @endif>Select State</option>
                            @foreach ($data['statedata'] as $statevalue)
                            <option value="{{$statevalue->stateCode}}" @if($data['remitterInfo']){{ $data['remitterInfo']->state == $statevalue->stateCode ? 'selected' : '' }} @endif>{{$statevalue->state}}</option>
                                    @endforeach
                                </select>
                               
                            </div>
                           
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">District  <i id="districtspin" class="" style="font-size:24px,"></i> </label>
                                <select class="form-select field-disable" id="district" name="district" data-validetta="required" @if(!$data['isEditable']) disabled @endif>
                                <option value="" @if($data['remitterInfo']) {{ !$data['remitterInfo']->district ? 'selected' : '' }} @endif>Select District</option>
                              @if($data['remitterInfo']) @if($data['remitterInfo']->district) @endif
                              <option value="{{$data['remitterInfo']->district}}" @if($data['remitterInfo']) {{ $data['remitterInfo']->district == $data['remitterInfo']->district ? 'selected' : '' }} @endif>{{$data['remitterInfo']->district}}</option>
                              @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">City <i id="cityspin" class="" style="font-size:24px,"></i></label>
                                <input type="test" class="form-control field-disable" id="city" name="city" placeholder="City" data-validetta="required" value="{{ isset($data['remitterInfo']->city) ? $data['remitterInfo']->city : ''}}" @if(!$data['isEditable']) disabled @endif>
                            </div>
                        </div>
                        <!-- End State, District, and City column -->

                        <!-- Column for ID Type and ID Number -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">ID Type</label>
                                <select class="form-select field-disable" id="idType" name="idType" data-validetta="required" @if(!$data['isEditable']) disabled @endif>
                                <option value="Aadhaar Card">Aadhaar Card</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">ID Number</label>
                                <input type="text" id="idNumber" name="idNumber" class="form-control field-disable" placeholder="Enter the Aadhar card Number" data-validetta="number,required,minLength[12],maxLength[12]" value="{{ isset($data['remitterInfo']->idNumber) ? $data['remitterInfo']->idNumber : ''}}" @if(!$data['isEditable']) disabled @endif>
                            </div>
                        </div>
                        <!-- End ID Type and ID Number column -->

                        <!-- Column for Remitter Type, Income Source, Income Source Type, and Annual Income -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Remitter Type</label>
                                <select class="form-select field-disable" id="remitterType" name="remitterType" data-validetta="required" @if(!$data['isEditable']) disabled @endif>
                                <option value=""  @if($data['remitterInfo']) {{ !$data['remitterInfo']->remitterType ? 'selected' : '' }} @endif>Select Remitter Type</option>
                            <option value="1"  @if($data['remitterInfo']) {{  $data['remitterInfo']->remitterType == '1' ? 'selected' : '' }} @endif>Salaried</option>
                            <option value="2"  @if($data['remitterInfo']) {{ $data['remitterInfo']->remitterType == '2' ? 'selected' : '' }} @endif>Self Employed including Professional</option>
                            <option value="3"  @if($data['remitterInfo']) {{ $data['remitterInfo']->remitterType == '3' ? 'selected' : '' }} @endif>Farmer</option>
                            <option value="4" @if($data['remitterInfo']) {{ $data['remitterInfo']->remitterType == '4' ? 'selected' : '' }}@endif >Housewife</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Income Source</label>
                                <select class="form-select field-disable" id="incomeSource" name="incomeSource" data-validetta="required" @if(!$data['isEditable']) disabled @endif>
                                <option value="" @if($data['remitterInfo']) {{ !$data['remitterInfo']->incomeSource ? 'selected' : '' }} @endif>Select Income Source</option>
                              <option value="Business" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSource == 'Business' ? 'selected' : '' }} @endif>Business</option>
                              <option value="Gift" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSource == 'Gift' ? 'selected' : '' }} @endif>Gift</option>
                              <option value="Lotery" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSource == 'Lotery' ? 'selected' : '' }} @endif>Lotery</option>
                              <option value="Salary" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSource == 'Salary' ? 'selected' : '' }} @endif>Salary</option>
                              <option value="Saving" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSource == 'Saving' ? 'selected' : '' }} @endif>Saving</option>
                              <option value="Other" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSource == 'Other' ? 'selected' : '' }} @endif>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Income Source Type</label>
                                <select class="form-select field-disable" id="incomeSourceType" name="incomeSourceType" data-validetta="required" @if(!$data['isEditable']) disabled @endif>
                                <option value="" @if($data['remitterInfo']) {{ !$data['remitterInfo']->incomeSourceType ? 'selected' : '' }} @endif>Select Income Source Type</option>
                              <option value="1" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSourceType == '1' ? 'selected' : '' }} @endif>Govt</option>
                              <option value="2" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSourceType == '2' ? 'selected' : '' }} @endif>Public sector</option>
                              <option value="3" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSourceType == '3' ? 'selected' : '' }} @endif>Private Sector</option>
                              <option value="4" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSourceType == '4' ? 'selected' : '' }} @endif>Business</option>
                              <option value="5" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSourceType == '5' ? 'selected' : '' }} @endif>Agriculture</option>
                              <option value="6" @if($data['remitterInfo']) {{ $data['remitterInfo']->incomeSourceType == '6' ? 'selected' : '' }} @endif>Dependent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Annual Income</label>
                                <select class="form-select field-disable" id="annualIncome" name="annualIncome" data-validetta="required" @if(!$data['isEditable']) disabled @endif>
                                <option value=""  @if($data['remitterInfo']) {{ !$data['remitterInfo']->annualIncome ? 'selected' : '' }} @endif>Select Annual Income</option>
                              <option value="1" @if($data['remitterInfo']) {{ $data['remitterInfo']->annualIncome=='1' ? 'selected' : '' }} @endif>Rs. 0.00 lacs to Rs. 2.00 Lacs</option>
                              <option value="2" @if($data['remitterInfo']) {{ $data['remitterInfo']->annualIncome=='2' ? 'selected' : '' }} @endif>Rs. 2.00 Lacs to Rs. 5 Lacs</option>
                              <option value="3" @if($data['remitterInfo']) {{ $data['remitterInfo']->annualIncome=='3' ? 'selected' : '' }} @endif>Rs. 5 Lacs to Rs. 10 Lacs</option>
                              <option value="4" @if($data['remitterInfo']) {{ $data['remitterInfo']->annualIncome=='4' ? 'selected' : '' }} @endif>More than Rs. 10 Lacs</option>
                                </select>
                            </div>
                        </div>
                        <!-- End Remitter Type, Income Source, Income Source Type, and Annual Income column -->

                    </div>
                </div>

                <div class="card-footer text-end" id="savediv" name="savediv">
                    <button type="submit" id="savebtn" name="savebtn" class="btn btn-primary" @if(!$data['isEditable']) disabled @endif>Save</button>
                </div>
            </form>
        </div>
    </div>


            <!--- Div Regarding regisration close-->
                       @if($data['remitterInfo'])
                       @if($data['remitterInfo']->status=='registered' || $data['remitterInfo']->status=='rbl_pending')
                       <div class="col-lg-4" style="display:show" id="initiateekycCard"> 
                        @else
                        <div class="col-lg-4" style="display:none" id="initiateekycCard"> 
                        @endif
                        
                <div class="card">
                  <div class="empty">
                    <div class="empty-img"><img src="{{url('./frontend/cardbottomimage.jpg')}}" height="128" alt="">
                    <input type="hidden" class="form-control" id="remitterId" name="remitterId" value="{{ isset($data['remitterInfo']->remitter_id ) ? $data['remitterInfo']->remitter_id  : ''}}">  
                    <input type="hidden" class="form-control" id="referencekey" name="referencekey" value="{{ isset($data['remitterInfo']->referenceKey ) ? $data['remitterInfo']->referenceKey  : ''}}" >  
                 
                  </div>
                    <p class="empty-title"> Hello! Here's how to complete your EKYC with us:</p>
                    <p class="empty-subtitle text-muted">
                       
                     <b>1. Start the Process:</b> By clicking the link below, you can initiate the EKYC process.</br>

                     <b>2. Verify Your Identity:</b> Follow the instructions to provide your Aadhaar number and complete the verification process using RBL UIDAI.</br>

                     <b>3. Confirmation:</b> Once you're done, we'll let you know if your verification was successful.</br>

                     <b>4. Status Update:</b> If everything checks out, your status will be updated to 'verified,' and you'll proceed to the biometric verification screen. If not, you'll need to click the button again and complete the RBL UIDAI verification. We'll then guide you on what to do next.</p>
                    <div class="empty-action">
                      
                    <button type="submit" class="btn btn-primary" id="initiate_ekyc_btn" name="initiate_ekyc_btn">
                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                        Do RBL EKYC
                        </button>

                        <div class="hr-text">or</div>
                        <div class="card-body">
                        <div class="row">
                          <div class="col"><button type="submit" id="check_rbl_ekyc_btn" name="check_rbl_ekyc_btn" class="btn w-100">
                              <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path></svg>
                              Check RBL Ekyc Status
                            </button>
                          </div>
                    
                  </div>
                </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              
                @if($data['remitterInfo'])
                       @if($data['remitterInfo']->status=='rbl_done' || $data['remitterInfo']->status=='ekyc_pending')
                       <div class="col-lg-4" style="display:show" id="servicepage"> 
                        @else
                        <div class="col-lg-4" style="display:none" id="servicepage">
                        @endif
                       <!--onboard and kyc approved page-->
            <!-- <div class="col-sm-12 col-md-8 col-lg-8" id="servicepage" style=""> -->
              <div class="card">

                <div class="card-status-start bg-primary"></div>

                <div class="card-body">
                       <form id="icaepskyc" method="post" action="">
                    @csrf
                    <p class="empty-title">Do Bio-Matric Ekyc</p>
                   
                     <br>
                    
                    <input type="hidden" name="mantra_rd_service" value="{{ $data['version_value'][0]->value  }}">
                    <input type="hidden" name="morpho_rd_service" value="{{ $data['version_value'][1]->value  }}">
                    <input type="hidden" name="startek_rd_service" value="{{ $data['version_value'][2]->value  }}">
                    <input type="hidden" name="mantra_rd_service_110" value="{{ $data['version_value'][3]->value  }}">  <!-- 26122023 NP-->
                    
                   <input type="hidden" name="bio_remId" id="bio_remId" value="{{ isset($data['remitterInfo']->remitter_id ) ? $data['remitterInfo']->remitter_id  : ''}}"/>
                     <input type="hidden" name="bio_referencekey" id="bio_referencekey" value="{{ isset($data['remitterInfo']->referenceKey ) ? $data['remitterInfo']->referenceKey  : ''}}" />
                    <!--<input type="hidden" name="otpPrimaryKeyID" id="otpPrimaryKeyID" />-->
                    <!--<input type="hidden" name="otpEncodeTxnID" id="otpEncodeTxnID" />-->
                    <input type="hidden" name="ready_status_count" id="ready_status_count" value="">
                    <input type="hidden" id="txtPidData" name="txtPidData" value="" class="form-control">
                   
                    <!--  kyc card -->
                    <div class="row">
                     
                      <div class="col-md-12 col-lg-12" id="step3" style="">
                        <div class="card">
                          <!--<div class="card-status-start bg-primary"></div>-->
                          <div class="card-body" style="height: 216px;">
                      
                               <div class="col-sm-12 col-md-6 col-lg-12">
                                  <label class="form-label required"><b>Select Device</b></label>
                                  <div class="row">
                                      <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="input-group mb-2" style="display: flex;">
                                       <div class="input-group-prepend w-100 d-flex" >
                                        <select class="form-select field-disable" style="color: #808080;" id="aepsDevice" name="aepsDevice" 

                                    autocomplete="off">
                                      <option value="" style="color:#0d0c0c1c;">Select Device</option>
                                       
                                    </select>

                                    <div class="col-xl-auto btn-square">
                                    <a class="btn btn-outline-info btn-icon" aria-label="Facebook"  role="button" id="devicelist" onclick="resetdevice()">
                                           <svg xmlns="http://www.w3.org/2000/svg" style="float: right;" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#3b8acb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  
                                   <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                   <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                </svg>
                                    </a>
                                  </div>
                                  </div>
                                       <span id="errordevicemsgselect" style="color:red;"></span>
                                       <!--<span id="errormsgselect" style="color:red;" ></span>-->
                                     </div>
                                         <span id="errormsgselectdevice" style="color:#cd2e26;display:none">Please select device</span>
                                      </div>
                                </div>
                          </div>

                            <div class="row" style="margin-top: 21px;">
                              <div class="col-6">

                              </div>
                              <div class="col-6 float-right">

                                <a id="twofabutton" class="btn btn-primary" type="submit" style="float:right;"
                                   onclick="proceedForKYC()">
                                  Scan & Submit
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end -->
                  </form>
                </div>
              </div>
            </div>
          </div>
            <!--end-->
              @endif

              <!--failed modal-->
              <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <div class="modal-status bg-danger"></div>
                            <div class="modal-body text-center py-4">
                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon mb-2 text-danger icon-lg" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 9v2m0 4v.01" />
                                    <path
                                        d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                                </svg>
                                <h3>Failed</h3>
                                <h2 id="failedmessage" class="text-muted">Due to some reason request is failed.
                                </h2>
                            </div>
                            <div class="modal-footer">
                                <div class="w-100">
                                    <div class="row">
                                        <div class="col"><a href="#" class="btn w-100"
                                                data-bs-dismiss="modal">
                                                Cancel
                                            </a></div>
                                         <div class="col"><a type="button"class="btn btn-danger w-100"
                                                                    data-bs-dismiss="modal" id="invoiceprints" onclick="invoice()">
                                                                    View invoice
                                                                </a></div>
                                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-->
            
             <!--modal1-->
             <div class="modal modal-blur fade show warning" id="modal-deviceconnectivity" tabindex="-1"
              style="display: none;" aria-modal="true" role="dialog">

              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="card-status-top bg-warning"></div>
                  <div class="modal-header">

                    <h5 class="modal-title">Note : </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h4 class=""> 1 : Please check selected device is connected to the system or not . </h4>
                    <h4 class=""> 2 : Check service status is running or not in task manager.</h4>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>-->
                  </div>
                </div>
              </div>
            </div>
            <!--end modal-->
            
                <!-- Content here -->


          </div>
        </div>
      </div>

  
<script>
    $(document).ready(function() {
      
        var hideButton = localStorage.getItem('hideInitiateEKYCBtn');
        if (hideButton === 'true') {
            $('#initiate_ekyc_btn').hide();
            localStorage.removeItem('hideInitiateEKYCBtn');
        }
    });
</script>
<script>
  $(document).ready(function($) {
    //$('#savebtn').hide();
    $('#savediv').hide();
    $.getScript("{{ asset('public/mytheme/comutils/js/darklightthemecolors.js') }}", function() {
                });
                
                 $('#aepsDevice').change(function() {
                    var selectedDevice = $(this).val();
                    
                    if (selectedDevice !== '') {
                        $('#errormsgselect').hide();
                    }else
                    {
                            $("#errormsgselect").show();
                            // $("#errormsgselect").append(`<span>Please select device </span>`);
                            $('#twofabutton').removeClass('btn-loading');
                    }
                    
                });

            $("#state").on('change', function() {
                var statecode = $(this).val();  
                $("#districtspin,#statespin,#cityspin").addClass('fa fa-circle-o-notch fa-spin');
                $('#state,#district,#city').hide();
                $.ajax({
                              url: "{{route('getDistrict')}}",
                              headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                              data: { 
                                    statecode:statecode,
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
                                        // webToast.Success({ status: 'Success', message: data.message, delay: 3000, align: 'bottomright' });
                                    }else{
                                        // webToast.Danger({ status: 'Failed', message: data.message, delay: 3000, align: 'bottomright' });
                                    }
                                   // $("#state").removeClass("btn-loading");
                                   $('#state,#district,#city').show();
                                    $("#districtspin,#statespin,#cityspin").removeClass('fa fa-circle-o-notch fa-spin');
                            })
                            .fail(function (jqXHR, textStatus) {
                                if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                                      var msg=jqXHR.responseJSON.message;
                                  }else{
                                      var msg="Something went wrong ("+ jqXHR.status +")";
                                  }
                                  webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                                  //$("#state").removeClass("btn-loading");
                                  $('#state,#district,#city').show();
                                  $("#districtspin,#statespin,#cityspin").removeClass('fa fa-circle-o-notch fa-spin');
                                })
                            
                            .always( function( result ){ 
                             // $("#state").removeClass("btn-loading");
                             $('#state,#district,#city').show();
                             $("#districtspin,#statespin,#cityspin").removeClass('fa fa-circle-o-notch fa-spin');
                          });

            });

          $("#mobilebtn").click(function(){
                  var mobile = document.getElementById("mobile").value;
                  var operation = document.getElementById("operation").value;
                // var transferAmount = document.getElementById("transferAmount").value;
                
                  $("#mobilebtn").addClass('btn-loading');
                    $.ajax({
                      type: 'POST', // The HTTP method to use
                      url: '{{ route('sendOtp') }}', // The URL of the controller action to call
                      data: {
                          mobile:mobile,
                          operation:operation  
                      },
                      headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                      success: function (data) {
                        if(data.act == "CONTINUE"){
                        // alert(mobile);
                            $("#mobilebtn").removeClass('btn-loading');
                            $('#remitterform').show();
                            $('#savediv').show();
                            $('#otpReference').val($.trim(data.data.otpReference));
                            $('#mobileno').val(mobile);
                            $("#mobile").attr("disabled", true);
                            $("#mobilebtn").attr("disabled", true);
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

        
            //Remitter  registered. 
        $('#dmtremitterreg').validetta({
              
                realTime: true,
                display: 'inline',
                errorTemplateClass: 'validetta-inline',
                onValid: function (event) {
                  $('#savebtn').addClass('btn-loading');
                  $('.field-disable-mbl').prop('readonly', true);
                  event.preventDefault();
                  $.ajax({
                    url: '{{ route('remitterRegistration') }}',
                    data: $("#dmtremitterreg").serialize(),
                    dataType: 'json',
                    method: 'post'
                  })
                  
                  .done(function (data) {
                      if(data.act == "CONTINUE"){
                          if(data.apistatus == "REGISTRATION_SUCCESSFUL"){
                           $('#remitterId').val($.trim(data.data.id));
                           
                           $('#dmtremitterreg input, #dmtremitterreg select').prop('disabled', true);
                           $('#savebtn').prop('disabled', true).text('Saved'); // Disable save button
                           $('#initiateekycCard').show();
                    
                            webToast.Success({ status: 'Success!', message: data.message, delay: 3000, align: 'bottomright' });
                            window.location.href = "{{ route('instantPayRemitterRegister') }}";
                           // window.location.reload();
                          }
                      }else if(data.act == "RETRY"){
                          webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                          $('#savebtn').removeClass('btn-loading');
                      }else {
                          webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                          $('#savebtn').removeClass('btn-loading');
                              $('.field-disable').removeAttr('readonly').val('');
                          
                      }
                  })
                  .fail(function (jqXHR, textStatus) {
                      if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                          var msg=jqXHR.responseJSON.message;
                      }else{
                          var msg="Something went wrong ("+ jqXHR.status +")";
                      }
                      webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                      $('#savebtn').removeClass('btn-loading');
                        $('.field-disable').removeAttr('readonly');
                  })
                  .always(function (result) {
                    $('#savebtn').removeClass('btn-loading');
                  });
                }
        });


        $("#initiate_ekyc_btn").click(function(){
           var remitterId = document.getElementById("remitterId").value;
            $("#initiate_ekyc_btn").addClass('btn-loading');
            $.ajax({
              type: 'POST', // The HTTP method to use
              url: '{{ route('remitterEkycInitiate') }}', // The URL of the controller action to call
              data: {
                  remitterId:remitterId,
              },
              headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
              success: function (data) {
                if(data.act == "CONTINUE"){
                  if(data.apistatus=='RIMITTER_INITIATE_SUCCESSFUL'){
                    var remitterId = $("#remId").val();
                    $('#referencekey').val($.trim(data.data.referenceKey));
                    $('#remId').val(remitterId);
                     $('#bio_referencekey').val($.trim(data.data.referenceKey));
                     $('#bio_remId').val(remitterId);
                    $('#initiateekycCard').hide();
                    $('#check_rbl_ekyc_btn').show();
                                       
                      webToast.Success({ status: 'Success', message: data.message, delay: 3000, align: 'bottomright' });
                      //window.location.href = "{{ route('instantPayRemitterRegister') }}";
                  if (data.data && data.data.url) {
                        window.open(data.data.url, '_blank');
                          }
                          $('#initiate_ekyc_btn').hide();
                    localStorage.setItem('hideInitiateEKYCBtn', 'true'); // Set flag to hide button
                    location.reload(); // Refresh the page
                    }
                  }else if(data.act == "RETRY"){
                    
                    $("#initiate_ekyc_btn").removeClass('btn-loading');
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
                $("#initiate_ekyc_btn").removeClass('btn-loading');
              }
          });
          
        });

        $("#check_rbl_ekyc_btn").click(function(){
          
            var remId = $("#remitterId").val(); 
            var referencekey = $("#referencekey").val();
            $("#check_rbl_ekyc_btn").addClass('btn-loading');
            $.ajax({
                type: 'POST',
                url: '{{ route('remitterEkycInitiateStatus') }}',
                data: {
                    remitterId: remId, 
                    referenceKey: referencekey
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data.act == "CONTINUE"){
                        //alert(data);
                        $('#rbl_ekyCard').hide();
                        $('#servicepage').show();
                        $("#check_rbl_ekyc_btn").removeClass('btn-loading');
                        webToast.Success({ status: 'Success', message: data.message, delay: 3000, align: 'bottomright' });
                        window.location.href = "{{ route('instantPayRemitterRegister') }}";
                    } else if(data.act == "RETRY"){
                      $('#initiate_ekyc_btn').show();
                        $("#check_rbl_ekyc_btn").removeClass('btn-loading');
                        webToast.Danger({ status: 'Failed', message: data.message, delay: 3000, align: 'bottomright' });
                    } else {
                      $('#initiate_ekyc_btn').show();
                        webToast.Danger({ status: 'Failed', message: data.message, delay: 3000, align: 'bottomright' });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    var msg = "Something went wrong (" + jqXHR.status + ")";
                    if(jqXHR.responseJSON.message != undefined && jqXHR.status == 400) {
                        msg = jqXHR.responseJSON.message;
                    }
                    webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                    $("#check_rbl_ekyc_btn").removeClass('btn-loading');
                }
            });
        });

    
});
      </script>
         <script>
        $(document).ready(refresh('aepsDevice'));
      
        function resetdevice()
        {
             var statuscount = document.getElementById("ready_status_count").value;
            //  alert(statuscount);
                        if(statuscount == '' )
                        {
                            webToast.Info({ status:'Oops !', message:'No devices found.', align:'bottomright' });
                            document.getElementById("ready_status_count").value = "";
                        }
                        else
                        {
                            webToast.Info({ status:'Wow !', message:'Active device fetched successfully.', align:'bottomright' });
                             document.getElementById("ready_status_count").value = "";
                        }
       
          var load =  webToast.loading({ status:'Loading...', message:'Please Wait a moment',timeout: 2000 ,align:'bottomright'});
           $("#devicelist").click(refresh('aepsDevice'));
           
            setTimeout(function() {
              load.remove();
            }, 2000);
        }
   
       function refresh(id) {
           
          var selectDropdown = document.getElementById(id);
         
          while (selectDropdown.options.length > 0) {
                  selectDropdown.remove(0);
                }
                           
            var urls = [ 
          "http://127.0.0.1:11100",
          "http://127.0.0.1:11101",
          "http://127.0.0.1:11102"
          ];
           
          for (var i = 0; i < urls.length; i++) {
              var url = urls[i];
              
          var statuscount =  performAjaxRequest(url);
           }
                        
          function performAjaxRequest(url) {
                  $.ajax({
                    type: "RDSERVICE",
                    async: true,
                    crossDomain: true,
                    url: url,
                    processData: false,
                    beforeSend: function() {
                      var port = url;
                      
                       var selectElement = document.getElementById("aepsDevice");
                                  var optionText = "Select Device";
                                  var existingOption = Array.from(selectElement.options).find(option => option.text === optionText);


                                  var defaultOption = document.createElement("option");
                                  if(!existingOption)
                                  {
                                       defaultOption.value = "";
                                       defaultOption.text = "Select Device";
                                 
                                       selectElement.appendChild(defaultOption);
                            
                                  }
                    },
                    success: function(data) {
                        
                      // Process the response data
                      var $doc = $.parseXML(data);
                      var CmbData1 = $($doc).find('RDService').attr('status');
                      var CmbData2 = $($doc).find('RDService').attr('info');
                
                      if (!CmbData1) {
                        CmbData1 = $(data).find('RDService').attr('status');
                        CmbData2 = $(data).find('RDService').attr('info');
                      }
                      
                         var readyCount = 0;
                     if(CmbData1 == "READY")    
                      {
                           readyCount++;
                          document.getElementById("ready_status_count").value = readyCount++;

                                  var selectElement = document.getElementById("aepsDevice");
                                  var optionText = "Select Device";
                                  var existingOption = Array.from(selectElement.options).find(option => option.text === optionText);

                                  var defaultOption = document.createElement("option");
                                  if(!existingOption)
                                  {
                                       defaultOption.value = ""; 
                                       defaultOption.text = "Select Device";
                                 
                                       selectElement.appendChild(defaultOption);
                            
                                  }
                                  
                          if(CmbData1 == "READY" && CmbData2 == "Mantra Authentication Vendor Device Manager" || CmbData2 == "Mantra MFS110 Authentication Vendor Device Manager")   //-- 26122023 NP
                          {
                                 var selectElement = document.getElementById("aepsDevice");
                                 var optionText = "MANTRA";
                                 var newOption = document.createElement("option");
                                
                                 var existingOption = Array.from(selectElement.options).find(option => option.text === optionText);
                                if (!existingOption) {
                                
                                  var newOption = document.createElement("option");
                                      newOption.value = "MANTRA_PROTOBUF"+url;
                                      newOption.text = "MANTRA";
                                
                                  selectElement.appendChild(newOption);
                                }
                          
                           }
                          
                           if(CmbData1 == "READY" && CmbData2 == "Morpho_RD_Service")
                          {
                            var selectElement = document.getElementById("aepsDevice");
                             var optionText = "MORPHO";
                            
                                var newOption = document.createElement("option");
                                var existingOption = Array.from(selectElement.options).find(option => option.text === optionText);
                                if (!existingOption) {
                                
                                  var newOption = document.createElement("option");
                                   newOption.value = "MORPHO_PROTOBUF"+url;
                                   newOption.text = "MORPHO";
                                 
                                  selectElement.appendChild(newOption);
                                }
                          }
                          
                            if(CmbData1 == "READY" && CmbData2 == "RD service for Startek FM220 provided by Access Computech")
                          {
                                 var selectElement = document.getElementById("aepsDevice");
                                 var optionText = "Startek";
                          
                                var newOption = document.createElement("option");
                                
                                 var existingOption = Array.from(selectElement.options).find(option => option.text === optionText);
                                if (!existingOption) {
                                
                                  var newOption = document.createElement("option");
                                   newOption.value = "Startek_PROTOBUF"+url;
                                   newOption.text = "Startek";
                                
                                  selectElement.appendChild(newOption);
                                }
                           }
                       }
                       
                          
                    },
                    error: function(jqXHR, ajaxOptions, thrownError) {
                                    // need to ask
                           if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                              var msg=jqXHR.responseJSON.message;
                          }else{
                              var msg="Something went wrong ("+ jqXHR.status +")";
                          }
                          webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                
                    },
                  });
          
                 
           }
       }
       
          // blocked port function
    function checkURLBlocked(url) {
      return fetch(url, { method: 'HEAD', mode: 'no-cors' })
        .then(response => {
          // XHR request was successful (not blocked)
          return false;
        })
        .catch(error => {
          // XHR request was blocked or encountered an error
          return true;
        });
    }
    //end
          
    </script>
    <!-- end -->
    
     <script>
    function proceedForKYC() {

      $('#twofabutton').addClass('btn-loading');
      var selectedDevice = $('#icaepskyc :selected').val();   
   
             if (selectedDevice == '' ) {
                $("#errormsgselect").empty();
                $("#errormsgselect").append(`<span>Please select device </span>`);
                $('#twofabutton').removeClass('btn-loading');
                // return;
              }
              else
              {
                $("#errormsgselect").hide();

              }
           
    webToast.Info({ status:'Wait !', message:'This action will take few moments.', align:'bottomright' });

      var device = $('#icaepskyc :selected').val(); //$( "#aepsTransactionForm" ).find('[name="device2"]:selected').val();
      var element =  $('#icaepskyc :selected').text();
       //MANTRA_PROTOBUFhttp://127.0.0.1:11102             MANTRA_PROTOBUFhttp://127.0.0.1:11102
       if(element === 'MANTRA')
        {
            var lastFiveDigits = device.substr(-5);
            var port = lastFiveDigits;
                //   var port = '11102';
                
                // alert(port);
        }
        
        if(element === 'MORPHO')
        {
             var lastFiveDigits = device.substr(-5);
              var port = lastFiveDigits;
            // var port = '11100';
          
        }
        
           if(element === 'Startek')
        {
             var lastFiveDigits = device.substr(-5);
              var port = lastFiveDigits;
            //   var port = '11101';
        }
        
        deviceinfo(element, port);
      
    }
    
    function deviceinfo(element, port)
    {
                //  alert(port)    ;     
            var selectedDevice = $('#icaepskyc :selected').val();   
             if (selectedDevice == '' ) {
                $("#errormsgselect").show();
                // $("#errormsgselect").append(`<span>Please select device </span>`);
                $('#twofabutton').removeClass('btn-loading');
              }
              else
              {
                $("#errormsgselect").hide();

              }
        
        
         var primaryUrl = "http://127.0.0.1:"+port;  
        //   alert(primaryUrl)    ;    
          if(port === '11100')
         {
              var url = primaryUrl+"/rd/info";
         }
          if(port === '11101')
         {
             var url = primaryUrl+"/rd/info";  
            //   var url = primaryUrl+"/getDeviceInfo";
         }
          if(port === '11102')
         {
              var url = primaryUrl+"/rd/info";
         }   
       
      $.ajax({
        type: "DEVICEINFO",
        async: true,
        crossDomain: true,
        url: url,
        processData: false,
        beforeSend: function () {
                  
        },
        success: function (data) {
            var $doc = $.parseXML(data);
            var devicever= $(data).find('DeviceInfo').attr('rdsVer');  
            
            var devicname= $(data).find('DeviceInfo').attr('rdsId');  //-- 26122023 NP
                // alert(data)    ;    
              if($doc)
              {
                  var devicever= $($doc).find('DeviceInfo').attr('rdsVer'); 
                  var devicname= $($doc).find('DeviceInfo').attr('rdsId');   //-- 26122023 NP
              }
          
            //   alert(devicname) ;  
                if(element === 'MANTRA')
                {
                    
                    if(devicname == "RENESAS.MANTRA.001")   //-- 26122023 NP
                    {
                           var mantraInput = document.getElementsByName('mantra_rd_service_110')[0];
                        //   alert("111");
                    }
                    else
                    {
                           var mantraInput = document.getElementsByName('mantra_rd_service')[0];
                            // alert("222");
                    }
                    
                       var mantraValue = mantraInput.value;
                          
                             if(mantraValue !=  devicever && mantraValue > devicever)
                             {
                                  webToast.Danger({ status:'Failed !', message:'Please update your device version or check is selected device is connected or not to the system.', delay: 50000, align:'bottomright' });
                                    $('#twofabutton').removeClass('btn-loading');
                                      return;
                             }
                }
                 
                if(element === 'MORPHO')  
                {
                         var morphoInput = document.getElementsByName('morpho_rd_service')[0];
                         var morphoValue = morphoInput.value;
                       
                         if (morphoValue != devicever && morphoValue > devicever)
                         {
                               webToast.Danger({ status:'Failed !', message:'Please update your device version or check is selected device is connected or not to the system.',delay: 50000, align:'bottomright' });
                               $('#twofabutton').removeClass('btn-loading');
                                return;
                         }
                         
                        //   if (morphoValue !== devicever && parseFloat(morphoValue) > parseFloat(morphoValue)) {
                        //         alert(morphoValue + " is greater than " + devicever + " and not equal to it.");
                        //         // console.log(valueToCheck + " is greater than " + version + " and not equal to it.");
                        //     } else {
                        //         alert(morphoValue + " is either less than or equal to " + devicever + " or equal to it.");
                        //         // console.log(valueToCheck + " is either less than or equal to " + version + " or equal to it.");
                        //     }
                         
                }
                    
                if(element === 'Startek_PROTOBUF')
                {
                     var startekInput = document.getElementsByName('startek_rd_service')[0];
                     var startekValue = startekInput.value;
                     if(startekValue !=  devicever && startekValue > devicever)
                     {
                          webToast.Danger({ status:'Failed !', message:'Please update your device version or check is selected device is connected or not to the system.',delay: 50000, align:'bottomright' });
                            $('#twofabutton').removeClass('btn-loading');
                              return;
                     }
                }
              
            rdservice(element, port);
         },
        error: function (jqXHR, ajaxOptions, thrownError) {
                  if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                      var msg=jqXHR.responseJSON.message;
                  }else{
                      var msg="Something went wrong ("+ jqXHR.status +")";
                  }
                  webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                  
                       },
      });
    }
      
     // added only for testing startek device
    function rdservice(element, port)
    {
       var primaryUrl = "http://127.0.0.1:"+port;

       $.ajax({
        type: "RDSERVICE",
        async: true,
        crossDomain: true,
        url: primaryUrl,
        processData: false,
        beforeSend: function () {
        },
        success: function (data) {
          var $doc = $.parseXML(data);
      
          var CmbData1 = $($doc).find('RDService').attr('status');
          var CmbData2 = $($doc).find('RDService').attr('info');

          if (!CmbData1) {
            var CmbData1 = $(data).find('RDService').attr('status');
            var CmbData2 = $(data).find('RDService').attr('info');
          }

          if (CmbData1 == "READY") {
            capture(element, port);
          } 
          else
          {
               $('#modal-deviceconnectivity').modal('show');
            //   webToast.Danger({ status: 'Failed !', message: "RD Service not found", delay: 50000, align: 'bottomright' });
                 $('#twofabutton').removeClass('btn-loading');
          }
      
        },
        error: function (jqXHR, ajaxOptions, thrownError) {
            // need to ask
                   if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                      var msg=jqXHR.responseJSON.message;
                  }else{
                      var msg="Something went wrong ("+ jqXHR.status +")";
                  }
                  webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                  
              
      
        },
      });
    }
    
    function capture(element, port)
    {
         var primaryUrl = "http://127.0.0.1:" + port;
         
         if(port === '11100')
         {
            //   var url = primaryUrl+"/capture";
               var url = primaryUrl+"/rd/capture";
         }
         
         if(port === '11101')
         {
              var url = primaryUrl+"/rd/capture";
         }
         
         if(port === '11102')
         {
              var url = primaryUrl+"/rd/capture";
         }
      
         if (element == "MANTRA") {
            var XML='<?php echo '<?xml version="1.0"?>'; ?> <PidOptions ver="1.0"> <Opts fCount="1" fType="2" iCount="0" pCount="0" format="0" pidVer="2.0" timeout="20000" posh="UNKNOWN" env="P" wadh=""/> <CustOpts><Param name="mantrakey" value="" /></CustOpts> </PidOptions>';
         }
         else if(element == "Startek"){
            var XML='<?php echo '<?xml version="1.0"?>'; ?> <PidOptions ver="1.0"> <Opts fCount="1" fType="2" iCount="0" pCount="0" format="0" pidVer="2.0" timeout="20000" posh="UNKNOWN" env="P" wadh=""/> ' + '</PidOptions>';
            }
             else {
            var XML = '<PidOptions ver=\"1.0\">' + '<Opts fCount=\"1\" fType=\"2\" iCount=\"\" iType=\"\" pCount=\"\" pType=\"\" format=\"0\" pidVer=\"2.0\" timeout=\"10000\" otp=\"\" wadh=\"\" posh=\"\"/>' + '</PidOptions>';
           }
   
       $.ajax({
        type: "CAPTURE",
        async: true,
        crossDomain: true,
        url: url,
        data: XML,
        contentType: "text/xml; charset=utf-8",
        processData: false,
        beforeSend: function () {
        },
        success: function (data) {
           // alert(data);
          if (element == "MANTRA") 
          {
            var $doc = $.parseXML(data);
             var errorInfo = $($doc).find('Resp').attr('errInfo');
             var mydata = $(data).find('PidData').html();
                console.log(mydata);
                if (errorInfo == 'Success' || errorInfo == 'Success.') {
                   webToast.Success({ status: 'Success !', message: "Fingerprint Captured Successfully", delay: 3000, align: 'bottomright' });
                       $("#txtPidData").empty();
                   $('[name="txtPidData"]').val(data);
                   callEKYCAPI();
                //   $('#twofabutton').submit();
                } else {
                  webToast.Danger({ status: 'Failed !', message: "Please check selected device is connected to the system or not", delay: 1000, align: 'bottomright' })
                  $('#twofabutton').removeClass('btn-loading');
                 }
          }else if(element == "Startek")
          {
                  var errorCode = $(data).find('Resp').attr('errCode');  
                  var mydata = $(data).find('PidData').html();
                if (errorCode == '0')
                {
                   webToast.Success({ status: 'Success !', message: "Fingerprint Captured Successfully", delay: 3000, align: 'bottomright' });
                    $("#txtPidData").empty();
                   $('[name="txtPidData"]').val("<PidData>" + mydata + "</PidData>");
                     callEKYCAPI();
                //   $('#twofabutton').submit();
                } else 
                {
                     webToast.Danger({ status: 'Failed !', message: "Please check selected device is connected to the system or not", delay: 1000, align: 'bottomright' })
                  $('#twofabutton').removeClass('btn-loading');
                }
          }
          else 
          {
            var errorInfo = $(data).find('Resp').attr('errInfo');
            var errorCode = $(data).find('Resp').attr('errCode');
            var mydata = $(data).find('PidData').html();
                if (errorCode == '0') 
                {
                  webToast.Success({ status: 'Success !', message: "Fingerprint Captured Successfully", delay: 3000, align: 'bottomright' });
                   $("#txtPidData").empty();
                  $('[name="txtPidData"]').val("<PidData>" + mydata + "</PidData>");
                //   $('#twofabutton').submit();
                    callEKYCAPI();
                    //  if(scannedFor=='EKYC_SCAN') {
                    //         callEKYCAPI();
                    //     } else {
                    //         $('#twofabutton').submit();
                    //     }
                } else {
                    webToast.Danger({ status: 'Failed !', message: "Please check selected device is connected to the system or not", delay: 1000, align: 'bottomright' })
                    $('#twofabutton').removeClass('btn-loading');
                }
          }
        },
        error: function (jqXHR, ajaxOptions, thrownError) {
           webToast.Danger({ status: 'Failed !', message: "[E1] Device not working correctly, please try again", delay: 50000, align: 'bottomright' })

          $("#twofabutton").html("Scan & Submit");
          $("#twofabutton").removeAttr('disabled');
        },
      });
       
       
    }

    // blocked port function
    function checkURLBlocked(url) {
      return fetch(url, { method: 'HEAD', mode: 'no-cors' })
        .then(response => {
          // XHR request was successful (not blocked)
          return false;
        })
        .catch(error => {
          // XHR request was blocked or encountered an error
          return true;
        });
    }
    //end
    
    
     function callEKYCAPI() {
      var scannedData = $("#txtPidData").val();
    
      var bio_remId = $("#bio_remId").val(); 
      var bio_referencekey = $("#bio_referencekey").val();  
      var servicename = $("#servicename").val();
      var selectedDevice = $('#icaepskyc :selected').val();

      $.ajax({
        type: "POST",
        url: '{{ route('remitterEkycProcess') }}',
        data: {  ekycdata: scannedData, _token: "{{ csrf_token() }}",device: selectedDevice ,servicename :servicename,remitterId: bio_remId,referenceKey: bio_referencekey},
        dataType: 'json',
        cache: false,
        success: function (data) {
          if (data.apistatus == "REMITTER_EKYC_SUCCESS") {
             $('#modal-success').modal('show'); 
             $('#twofabutton').removeClass('btn-loading');
             webToast.Success({ status: 'Success', message: data.message, delay: 3000, align: 'bottomright' });
                        window.location.href = "{{ route('instantPayDMT') }}";
           
          } else if(data.apistatus == "REMITTER_EKYC_UNDER_PROCESS"){
             
              webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright' });
                                $("#failedmessage").html(data.message);
                                $('#twofabutton').removeClass('btn-loading');
                                 $('#modal-danger').modal('show');  
                                 window.location.reload(); 
             
          }else if(data.apistatus == "REMITTER_EKYC_FAILED"){
             
             webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright' });
                               $("#failedmessage").html(data.message);
                               $('#twofabutton').removeClass('btn-loading');
                                $('#modal-danger').modal('show');   
                               // window.location.reload();
         }                   
          
          else
          {
            webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright' });
                               $("#failedmessage").html(data.message);
                               $('#twofabutton').removeClass('btn-loading');
                                $('#modal-danger').modal('show');   
                              //  window.location.reload();
          }
        },
        error: function (jqXHR, ajaxOptions, thrownError) {
                  if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                      var msg=jqXHR.responseJSON.message;
                  }else{
                      var msg="Something went wrong ("+ jqXHR.status +")";
                  }
                  webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
           },

      });
    }
    </script>
@endsection
