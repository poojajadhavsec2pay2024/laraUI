<!DOCTYPE html>
<html lang="en">
@php
$product="dmt";
$pageTitle="DMT(EK)";
$datefilter="true";
$statusfilter="true";
$agentidfilter="false";
$searchtextfilter="false";
$table="reports_dmt";
@endphp

  <head>
   
   @php
	   $userrole=\Auth::user()->role_id;
	   
	   @endphp       
 <meta name="csrf-token" content="{{ csrf_token() }}">       
<link href="{{ asset('public/mytheme/css/tabler.min.css?1674944402') }}" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<link href="{{asset('public/mytheme/plugins/css/validetta.min.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('public/mytheme/plugins/css/webToast.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/mytheme/comutils/css/dataTableStyle.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">   <!--for togglepassword-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

  
  </head>
  
     <style>
        
        .form-elements{
            font-weight: 600;
        }
        
        code{
            background: none;
            font-size: 16px;
        }
        
        .codearea{
            font-weight: 500;
            margin-bottom: 0;
        }
        
        .user-icon{
            border-radius: 50%;
            background: #e1ebee;
        }
        
        .operator-icon{
            border-radius: 50%;
        }
        
        .btn-square{
            margin-left: 5px;
        }
        
        .icon-tabler-currency-rupee{
            margin-top: 4px;
        }
        	.dt-buttons {
           margin-top:12px;
		   margin-left: 12px;
        }
        /*<table id="table_data" class="table table-responsive  w-100 small-font-size" style="font-size: smaller;">*/
        /*            <tr class="small-font-size custom-text" style="text-transform: uppercase;color:var(--tblr-muted);font-size: smaller;">*/
                    
        .txntype{
             text-transform: uppercase;
        }
        
   </style>
  <body class="{{Session::get('theme')}}">
    <!--<script src="./dist/js/demo-theme.min.js?1674944402"></script>-->
    <div class="page">
      <!-- Navbar -->
      

      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col-6">
                <!--<div class="pretitle">
                  Transactions
                </div>-->
                <h2 class="page-title">
                  DMT(EK) Transactions
                </h2>
              </div>
              <div class="col-6 text-end">
                    <!--<button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6"></path>
                           <path d="M11 13l9 -9"></path>
                           <path d="M15 4h5v5"></path>
                        </svg>
                        View All
                    </button>-->
                </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            
            <div class="col-12">
                          <div class="card" id="loader">
                               
                           <div id="data_table_wrapper" class="dataTables_wrapper no-footer">
                            <div class="table-responsive">
                              <table class="table table-vcenter card-table table-striped" id="data_table">
                                <thead>
                                <tr>
                                  @foreach ($thdata as $key => $data)
                                          @if(in_array($key, ['id','sales_id','user_role','apiremark','ent_id','user_tds','ent_details','ent_profit','ent_tds','parent','WL_comm','userid','dt_id','dt_comm','dt_details','dt_tds','dt_status','md_details','md_tds','wl_details','wl_tds','mobilenumber','md_status','wl_status','refno','apiname','Date','name','providename','remark','parentname','commission',"customermobile",'statuss','role','md_id','md_comm','wl_id','wl_comm','txnid','send_mob_no','send_name','ben_name','ben_ifsc','txnccf','txnprofit','txngst','txntds','txntype','dmtstatus']))
                                          <th style="display:none;">{{$data}}</th>
                                          @else
                                          <th>{{$data}}</th>
                                          @endif
                                  @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tddata as $key => $value)
                                <tr>
                                 @foreach($value as $key => $valuee)
                                     @if(in_array($key, ['srno','usertds','role','sales_id','entid','entdetails','entprofit','enttds','parentid','dtid','dtdetails','dtcom','dttds','dt_status','mdid','mddetails','mdcom','mdtds','md_status','userid','wlid','wldetails','wltds','wl_status','refrenceno','apiname','created_at','userrole','txntxnid','username','operatorname','reportremark',"apiremark","txnparentname",'customermobile','mob','wlid','wlcom','statusdata','role','commission','send_mob_no','send_name','ben_name','ben_ifsc','txnccf','txnprofit','txngst','txntds','txntype','dmtstatus']))
                					 <td style="display:none;" class="{{$key}}">{{$valuee}}</td>
                					 @else
            					
            					  @php if(strstr($valuee, '#' )) 
            					  {
            					 
            					   $explode = explode("#",$valuee);@endphp
            					   @if (isset($explode[2]))
            					   <td class="{{$key}}">{{$explode[0]}}<br>{{$explode[1]}}<br>{{$explode[2]}}</td>
            					   @else
            					   <td class="{{$key}}">{{$explode[0]}}<br>{{$explode[1]}}</td>
            					   @endif
                                     @php }else{ @endphp
                                       @if($valuee == 'failed')
                                           <td class="{{$key}}" style="text-align:center;"><span  class="txnstatus m-1 onbstatus" ><span class="badge bg-red text-red-fg"> {{ucfirst($valuee)}}</span></td>
                                           @elseif($valuee == 'success')
                                           <td class="{{$key}}" style="text-align:center;"><span  class="txnstatus m-1 onbstatus" ><span class="badge bg-green text-green-fg"> {{ucfirst($valuee)}}</span></td>
                                           @elseif($valuee == 'pending')
                                           <td class="{{$key}}" style="text-align:center;"><span  class="txnstatus m-1 onbstatus" ><span class="badge bg-orange text-orange-fg"> {{ucfirst($valuee)}}</span></td>
                                           @elseif($valuee == 'reversed')
                                           <td class="{{$key}}" style="text-align:center;"><span  class="txnstatus m-1 onbstatus" ><span class="badge bg-blue text-green-fg">{{ucfirst($valuee)}}</span></td>
                                           @else
                                           @if($key == 'txnamount')
                                           <td class="{{$key}}"><svg xmlns="http://www.w3.org/2000/svg" style="margin-bottom: -2px;" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path> <path d="M7 9l11 0"></path> </svg> {{$valuee}}</td>
                                           @else
                                           <td class="{{$key}}">{{$valuee}}</td>
                                           @endif
                                       @endif
                                      
                                     @php } @endphp
                                     @endif
                                    
                                      
                                  @endforeach
                                 <td>
                                      <a id="btn-roleinfo" class="btn btn-outline-info rounded-pill" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd">info</a>
                                 </td>
                                </tr>
                                @endforeach
                                </tbody>
                          </table>
                          </div>
                          </div>
                        </div>
                       
                       </div>
            </div>
          </div>
        </div>
        @include('./utilities.footer')
      </div>
    </div>
    
    <!-- OFFCANVAS STARTS -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
      <div class="offcanvas-header">
        <div class="col-5">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
               <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
               <path d="M9 17h6"></path>
               <path d="M9 13h6"></path>
            </svg>
            Details
            </h2>
        </div>
        <div class="d-flex col-6" style="justify-content: end;">
            @if(Auth::user()->role->slug=="finance" || Auth::user()->role->slug=="support")
            <div class="col-xl-auto btn-square" id="btn-refund-square">
              <a id="btnRefund" class="btn btn-outline-light btn-icon" type="button" data-bs-toggle="collapse" data-bs-target="#dmt-refund" aria-expanded="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-refund" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
                   <path d="M15 14v-2a2 2 0 0 0 -2 -2h-4l2 -2m0 4l-2 -2"></path>
                </svg>
              </a>
            </div>
            <div class="col-xl-auto btn-square" id="btn-edit-square">
              <a class="btn btn-outline-light btn-icon" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                   <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                   <path d="M16 5l3 3"></path>
                </svg>
              </a>
            </div>
            <div class="col-xl-auto btn-square" id="btn-refres-square">
              <a id="btnRefresh" class="btn btn-outline-light btn-icon" aria-label="Facebook" role="button" aria-controls="schemeCanvas">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                   <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                </svg>
              </a>
            </div>
            @endif
            
            <div class="col-xl-auto btn-square">
                <a class="btn btn-outline-light btn-icon" id="printpaymentreceipt" aria-label="Facebook" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                        <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"></path>
                    </svg>
                </a>
            </div>
            
            <div class="col-xl-auto btn-square">
              <a class="btn btn-outline-light btn-icon" aria-label="Facebook" data-bs-toggle="offcanvas" href="#statusCanvas" role="button" aria-controls="statusCanvas">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-hexagon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"></path>
                   <path d="M12 16v.01"></path>
                   <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
                </svg>
              </a>
            </div>
        </div>
        <button type="button" class="btn-close text-reset closeOffCanvas" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="container">
            <label class="d-none" id="getId"></label>
            <form id="txncheckstatus" class="d-none" method="post" action="{{ route('dmtcheckstatus') }}">
                @csrf
                <input type="hidden" id="txn_id" name="id" data-validetta="required">
                <input type="hidden" id="gettxnid" name="txnid">
                <input type="hidden" id="txn_refno" name="refno">
                <input type="hidden" id="txnamount" name="amount">
                <input type="hidden" id="txntid" name="tid">
                <input class="d-none" type="submit">
            </form>
            @if(Auth::user()->role->slug=="finance" || Auth::user()->role->slug=="support")
            <div id="collapse-1" class="accordion-collapse collapse mb-3" data-bs-parent="#accordion-example">
                <div class="accordion-body pt-0">
                    <form id="txndmtstatusupdate" method="post" action="{{ route('edittransactions') }}">
                       @csrf
                       <!--<input id="id" type="hidden" name="id" value=""> -->
                       <!--<input type="hidden" id="editxnamount" name="amount">-->
                       <!-- <input type="hidden" id="txtxnid" name="txnid">-->
                        
                        <input id="id" type="hidden" name="edittxnid" value=""> 
                       <input class="pri_id" type="hidden" name="pri_id" value="">
                       <input type="hidden" name="type" value="dmttransactionedit">
                        
                        <label  id="lbl_refno"></label>
                        <div class="row mt-3">
                            <div class="form-group col-12">
                                <label class="form-label">Status</label></label>
                                <select name="status" id="status" class="form-select field-disable" data-validetta="required" data-vd-message-required="Please select status">
                                     <option value="" selected>Select Status</option>
                                     <option value="success">Success</option>
                                   <!--  <option value="failed">Failed</option>-->
                                     <option value="reversed">Reversed</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-12 mt-3">
                                <label class="form-label">Ref No.</label></label>
                                <input type="text" class="form-control field-disable" id="edittnxrefno" name="refno" data-validetta="required" data-vd-message-required="Please enter reference no.">
                            </div>
                            
                            <div class="from-group col-12 mt-3">
                                <label class="form-label">Remark</label>
                                <textarea name="remark" id="remark" class="form-control field-disable" placeholder="Add remarks here"
                                        data-validetta="required" data-vd-message-required="Please enter remark"></textarea>
                            </div>
                        </div>
              
                        <div class="text-end mt-3">
                          <button id="btnSubmit" class="btn btn-primary" >Submit</button>
                        </div>
                    </form>
                </div>
                <div class="hr-text">XX</div>
            </div>
            
            <div id="dmt-refund" class="accordion-collapse collapse mb-3" data-bs-parent="#accordion-example">
                <div id="send-refund-otp">
                    <input type="hidden" id="getsendermobile" name="getsendermobile">
                    <input type="hidden" id="gettxntid" name="gettxntid">
                    <input type="hidden" id="user_id" name="user_id">
                    
                    <div><lable class="text-muted">Please get otp in order to proceed wit refund transaction amount</lable></div>
                    <div class="text-end">
                        <button class="btn btn-info" id="getRefundOtp">Get Refund Otp</button>
                    </div>
                </div>
                <div style="display:none" id="enter-refund-otp">
                    <form id="txnrefund" method="post" action="{{ route('dmttxnrefund') }}">
                        @csrf
                        <label for="otpverify">Enter OTP received on mobile number</label>
                        <input type="hidden" id="reftxntid" name="tid">
                        <div class="form-group col-6 mt-1">
                            <input id="refundotp" type="text" name="otp" autocomplete="off" data-validetta="required" class="form-control field-disable" onkeypress="return otpval(event, this.id)" data-vd-message-required="Please enter OTP">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary" id="btnrefundtxn">Submit</button>
                        </div>
                    </form>
                </div>
                
                <div id="refund-verified" style="display: none">
                    <div class=d-flex><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
                       <path d="M9 12l2 2l4 -4"></path>
                    </svg><span> OTP Verified</span></div>
                </div>
                
                <div id="refund-ver-failed" style="display: none">
                    <div class=d-flex><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-6.489 5.8a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" stroke-width="0" fill="currentColor"></path>
                    </svg><span> OTP verification failed</span></div>
                </div>
                
                <div class="hr-text">XX</div>
            </div>
            @endif
            
            
            <div class="row text-center">
                <div class="col-3 p-1 user-icon" style="height:70px; width: 70px">
                    <svg style="--tblr-icon-size: 2.25rem; margin: 13px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                   <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                </svg>
                </div>
                <div class="col-9">
                    <div class="pretitle" id="parentname" style="text-align: left;">
                        -
                    </div>
                    <h4 class="page-title" id="user_name" style="text-align: left;">
                        -
                    </h4>
                    <p style="text-align: left;" id="role">-</p>
                </div>
            </div>
            <div class="row"><code id="date">- </code></div>
            <div class=" row card mb-3">
                <div id="bottomline" class="card-status-bottom bg-success"></div>
                <div class="card-stamp">
                    <div class="card-stamp-icon bg-yellow">
                      <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                      <img src="{{asset('public/mytheme/img/payments/bank.png')}}">
                    </div>
                  </div>
                <div class="card-body">
                    <div class="d-flex" style="justify-content: end;margin: -8px -15px;">
                        <div class="d-flex">
                            <label id="statusbadge" class="badge">Success</label>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <div class="row text-center mb-3">
                            <div class="col-2 p-1 operator-icon" >
                                <img src="{{asset('public/mytheme/img/payments/AEPS-Top-Imageegqe.png')}}">
                            </div>
                            <div class="col-10">
                                <div class="pretitle" id="operatorname" style="text-align: left;">
                                    DMT(EK)
                                </div>
                                <h4 class="page-title" id="send_mob_no"  style="text-align: left;" data-toggle="tooltip" data-bs-toggle="tooltip" title="Mobile Number">
                                    -
                                </h4>
                            </div>
                        </div>
                        
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
                            <div class="pretitle" id="sendermobile" style="text-align: left;">
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
                            </h3>
                            <p id="ben_bank" style="text-align: left; margin: 0;">
                            </p>
                            <div class="d-flex">
                                <code style="font-size: 12px;" id="benaccount">Ben Account</code>&nbsp;<code style="font-size: 12px;" id="benifsc">Ben IFSC</code>
                            </div>
                        </div>
                            
                        <div class="hr-text">
                            Transaction Details
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6 grouptxn">
                                <label class="form-label mb-0">ORDER ID</label>
                                <div class="d-flex">
                                    <label id="orderid" class="form-label" style="font-size: 16px">
                                        Order ID
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group col-6 mb-3">
                                <label class="form-label mb-0">Amount</label>
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                       <path d="M7 9l11 0"></path>
                                    </svg>
                                        <code id="amount">
                                    </code>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <label class="form-label mb-0">CCF</label>
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                       <path d="M7 9l11 0"></path>
                                    </svg>
                                    <code id="charges">
                                        
                                    </code>
                                </div>
                            </div>
                            
                            <div class="form-group col-6 mb-3">
                                <label class="form-label mb-0">Profit</label>
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                       <path d="M7 9l11 0"></path>
                                    </svg>
                                        <code id="profit">
                                        
                                    </code>
                                </div>
                            </div>
                            
                            <!--<div class="form-group col-6 mb-3">-->
                            <!--    <label class="form-label mb-0">CHARGES</label>-->
                            <!--    <div class="d-flex">-->
                            <!--        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">-->
                            <!--           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>-->
                            <!--           <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>-->
                            <!--           <path d="M7 9l11 0"></path>-->
                            <!--        </svg>-->
                            <!--        <code id="charges">-->
                                        
                            <!--        </code>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <label class="form-label mb-0">GST</label>
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                       <path d="M7 9l11 0"></path>
                                    </svg>
                                        <code id="gst">
                                    </code>
                                </div>
                            </div>
                            
                            <div class="form-group col-6 mb-3">
                                <label class="form-label mb-0">TDS</label>
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                       <path d="M7 9l11 0"></path>
                                    </svg>
                                    <code id="tds">
                                    </code>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-6 mb-3 grouptxn">
                                <label class="form-label mb-0">TXN ID</label>
                                <div class="d-flex">
                                    <label id="txnid" class="form-label" style="font-size: 16px">
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">    
                            <div class="form-group col-6 mb-3 grouptxn">
                                <label class="form-label mb-0">REF NO</label>
                                <div class="d-flex">
                                    <label id="refno" class="form-label" style="font-size: 16px">
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group col-6 mb-3 grouptxn">
                                <label class="form-label mb-0">TXN Type</label>
                                <div class="d-flex">
                                    <label id="txntype" class="form-label" style="font-size: 16px">
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label class="form-label mb-0">REMARK</label>
                                    <label id="remarktxn"  class="" style="font-size: 16px"></label>
                                </div>
                            </div>
                             @if(Auth::user()->user_type=='internal')
                             <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label class="form-label mb-0">API REMARK</label>
                                    <label id="apiremark"  class="" style="font-size: 16px"></label>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div id="txngrouptable" class="row">
                <div class="hr-text">
                    Transaction Breakup
                </div>
               
                <div class="table-responsive">
                    <table id="table_data" class="table table-responsive  w-100 small-font-size" style="font-size: smaller;">
                        <tr class="small-font-size custom-text" style="text-transform: uppercase;color:var(--tblr-muted);font-size: smaller;">
                            <th>Txn Id</th>
                            <th>RRN</th>
                            <th>TXN MODE</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                        <tbody id="gettabledata">
                            
                        </tbody>
                    </table>
                </div>
                 <div class="text-end my-3">
                    <b>Total Amount: </b><span id="oc_total_amount"></span><br>
                    <b>Total CCF Charges: </b><span id="oc__total_charges"></span>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="txngrouptable" class="row">
                @if(in_array($userrole, [1,2,3,4,5,6,7,8,9,10,11,12,13,15,17,18]))
                <div class="hr-text">
                    Commission Details
                </div>
               
              
						
						<div class="table-responsive">
                    <table id="table_data" class="table table-responsive  w-100 small-font-size" style="font-size: smaller;">
                       <tr class="small-font-size custom-text" style="text-transform: uppercase;color:var(--tblr-muted);font-size: smaller;">
                            <th style="text-align:center;">User</th>
                            <th style="text-align:center;">Id</th>
                            <th style="text-align:center;">Commission</th>
                            <th style="text-align:center;">Status</th>
                           
                        </tr>
                       @if(in_array($userrole, [1,2,3,4,5,6,7,8,9,10,11,15,17,18]))
						<tbody>
						   <tr>
						   <td style="text-align:center;">DT</td> 
					       <td id="dt_id" style="text-align:center;"></td> 
						   <td id="dt_com" style="text-align:center;"></td> 
						   <td style="text-align:center;"><span id="dt_status" class="badge badge-success"></span></td> 
						   </tr>
						   <tr>
						    <td style="text-align:center;">MD</td> 
					        <td id="md_id" style="text-align:center;"></td> 
						   <td id="md_com" style="text-align:center;"></td> 
						   <td style="text-align:center;"><span id="md_status" class="badge badge-success"></td> 
						   </tr>
						   <tr>
						    <td style="text-align:center;">WL</td> 
					       <td id="wl_id" style="text-align:center;"></td> 
						   <td id="wl_com" style="text-align:center;"></td> 
						   <td style="text-align:center;"><span id="wl_status" class="badge badge-success"></td> 
						   </tr>
						</tbody>@endif
						@if($userrole == 12)
						<tbody>
						  
						   <tr>
						    <td style="text-align:center;">MD</td> 
					        <td id="md_id" style="text-align:center;"></td> 
						   <td id="md_com" style="text-align:center;"></td> 
						   <td style="text-align:center;"><span id="md_status" class="badge badge-success"></td> 
						   </tr>
						   
						</tbody>@endif
						@if($userrole == 13)
						<tbody>
						   <tr>
						   <td style="text-align:center;">DT</td> 
					       <td id="dt_id" style="text-align:center;"></td> 
						   <td id="dt_com" style="text-align:center;"></td> 
						   <td style="text-align:center;"><span id="dt_status" class="badge badge-success"></td>  
						   </tr>
						 </tbody>@endif
                    </table>
                </div>
						@endif
            </div>
        </div>    
      </div>
    </div>
    <!--OFFCANVAS END-->
    
    <!--Txn check status-->
    <div class="modal modal-blur fade" id="modal-txn-status" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div id="txn-bgstatus" class="modal-status bg-success"></div>
          <div class="modal-body text-center py-4">
            <h3 id="txn-heading"></h3>
            <div class="text-muted">Transaction of <b>Rs. <span id="txn-amount"></span></b><span id="txn-msg"></span></div>
            <div class="text-muted">(Ref No -<span id="txn-ref-no"></span>)</div>
          </div>
          <div class="modal-footer">
            <div class="mx-auto">
                <a id="btntxnstatusmodal" class="btn btn-info" data-bs-dismiss="modal">
                    Okay
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Txn check status-->
    
    <!--TXN receipt modal-->
    <div id="print-modal" class="modal modal-blur fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" >
            
          
          <div class="modal-body px-2" id="receiptprintcontent">
              <div class="container">
                  <div class="row py-3">
                        <div class="col-4">
                      <!--<img src="https://csp.sec2pay.in//assets/loginassets/img/sec2paylogo.svg" style="width:150px;"/>-->
                    <img class="va-middle" src="{{ asset('uploads/companyimages')}}/{{\MyHelper::getMyCompanyLogo($_SERVER['HTTP_HOST'])}}" width="100" height="70" alt="" style="line-height: 100%; outline: none; text-decoration: none; vertical-align: baseline; font-size: 0; border: 0 none;float:right;padding-top:15px;margin-right: 50px;margin-top: -10px;" />

                          </div>
                          <div class="col-8" style="text-align:right">
                              <p class="h5 mb-0 mt-2" id="shop_name">Shop name</p>
                              <small><span id="retails_name"></span> | <span id="retailer_mbl"></span></small><br>
                              <small id="shopaddress">Shop address, shop number, shop city</small><br>
                          </div>      
                    </div>
              </div>
            <div class="hr-text">DMT TRANSACTION</div>
              <div class="container">
                  <div class="row">
                      <div class="col-6">
                          <p class="h5 mb-0 mt-2">Sender</p>
                          <small><span id="sender_name_invoice"></span> | <span id="sender_mbl"></span></small><br>
                          <small id="shopaddresss">Shop address, shop number, shop city</small><br>
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
                                  <th>TXN Type</th>
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
                                        <span id="inv_total_amount"></span>
                                </div><br>
                                <div class="d-flex" style="float: right"><b>Total Charges: </b><svg xmlns="http://www.w3.org/2000/svg" style="--tblr-icon-size: 1rem;margin-top: 3px;" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                           <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                           <path d="M7 9l11 0"></path>
                                        </svg>
                                        <span id="inv_total_charges"></span>
                                </div>
                            </div>
                        </div>
                        
                        <small class="text-muted mt-5">This is a computer generated receipt</small><br>
                        <small class="text-muted mt-1" id="created_date"></small>
                    </div>
              </div>

            
            <!--<div class="text-end my-3 mx-4">-->
            <!--    <b>Total Amount: </b><span id="inv_total_amount"></span><br>-->
            <!--    <b>Charges: </b><span id="inv_total_charges"></span>-->
            <!--</div>-->
            
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-print-invoice">PRINT</button>
          </div>
        </div>
      </div>
    </div>
    
    <div id="printmaterial"></div>
    <!--TXN receipt modal-->

    <script src="{{ asset('public/mytheme/plugins/js/jquery-3.6.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/mytheme/plugins/js/validetta.min.js') }}" ></script>
    <script src="{{ asset('public/mytheme/plugins/js/webToast.min.js') }}" ></script>
    <script src="{{ asset('public/mytheme/plugins/js/datatables.min.js') }}" ></script>
    <script src="{{ asset('public/mytheme/plugins/js/loadingoverlay.min.js') }}" ></script> 
    <script src="{{ asset('public/mytheme/comutils/js/customvalidation.js') }}" ></script>
    
    
    <!-- Tabler Core -->
    <script src="{{ asset('public/mytheme/js/tabler.min.js') }}" ></script>
    <script src="{{ asset('public/mytheme/js/demo.min.js?16749444v02') }}" ></script>
    
    	<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>
	<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
 <script src="{{ asset('public/mytheme/plugins/js/validetta.min.js') }}" defer></script>
	<script src="{{ asset('public/mytheme/plugins/js/loadingoverlay.min.js') }}" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js" ></script>
	<!--<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js" defer></script>-->
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      
          
      });
      // @formatter:on
    </script>
    
    <script>
    $(document).ready(function () {
        
      // Datatable attribute to the table
     $('#data_table').DataTable({
             bLengthChange: true,
            searching: true,
			ordering: false,
			select: true,
    		dom: 'Bfrtip',
    	    dom: '<"float-left"B><"float-right"f>rt<"row"<"col-sm-2"l><"col-sm-3"i><"col-sm-7"p>>',
            drawCallback: function(){
              $('.paginate_button.next:not(.disabled)', this.api().table().container())          
                 .on('click', function(){
                   // alert('next') ;
                 });       
           }
            
        });
          $('.dt-button').addClass('btn btn-primary');
          $('.dt-button').removeClass('dt-button');
          
        //   $("#datatables_buttons_info").removeAttr('style');
        //   $("#datatables_buttons_info").addClass('bg-primary');

      $("#data_table").removeClass("d-none");
      
      var element = document.querySelector('.table');
        element.classList.remove('no-footer');
        
      $.getScript("{{ asset('public/mytheme/comutils/js/darklightthemecolors.js') }}", function() {
        // Code to be executed after the script is loaded and executed
        // This can include invoking functions, manipulating elements, etc.
      });


      $('#txndmtstatusupdate').validetta({
        realTime: true,
        display: 'inline',
        errorTemplateClass: 'validetta-inline',
        onValid: function (event) {
          $('#btnSubmit').addClass('btn-loading');
          $('.field-disable').prop('readonly', true);
          
          var tab_refno = "#ref" + $("#id").val();
          var updaterefno = $("#edittnxrefno").val();

          event.preventDefault();
          $.ajax({
            url: '{{ route('edittransactions') }}',
            data: $("#txndmtstatusupdate").serialize(),
            dataType: 'json',
            method: 'post'
          })
          
          
          .done(function (data) {
                var get_id = $('.pri_id').val();
                var getstatus = $('#status').val();
                   
                    
                if(data.status=='success')
                {
                 $(".onbstatus"+get_id).html("");
                 if(getstatus == "success"){
                     $(".onbstatus"+get_id).append(`<span class="m-1"><i class="badge bg-success mr-1"></i>&nbsp;&nbsp;`+  getstatus +`</span>`);
                   }else {
                         $(".onbstatus"+get_id).append(`<span class="m-1" ><i class="badge bg-danger mr-1"></i>&nbsp;&nbsp;`+  getstatus +`</span>`  );
                   }
                 $("#offcanvasEnd").offcanvas('hide');
                  $.LoadingOverlay("hide");
                 webToast.Success({ status: 'Success !', message: data.message, delay: 50000, align: 'bottomright' })
                 location.reload();
                }
                else
                {
                 $("#offcanvasEnd").offcanvas('hide');
                  $.LoadingOverlay("hide");
                 webToast.Success({ status: 'Failed !', message: data.message, delay: 50000, align: 'bottomright' })
                
                }
                 
              })

            .fail(function (jqXHR, textStatus) {
                $.LoadingOverlay("hide");
                if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                    var msg=jqXHR.responseJSON.message;
                }else{
                    var msg="Something went wrong ("+ jqXHR.status +")";
                }
                webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
            })

            .always(function (result) {
                $("#errormsg").empty();
                $.LoadingOverlay("hide");
            });
        }
      });
      
      //Check transaction status
      $('#txncheckstatus').validetta({
        realTime: true,
        display: 'inline',
        errorTemplateClass: 'validetta-inline',
        onValid: function (event) {
            
            $('#btnRefresh').addClass('btn-loading');
            var tab_refno = "#ref" + $("#id").val();
            $.LoadingOverlay("show");
                     
          event.preventDefault();
          $.ajax({
            url: '{{ route('dmtcheckstatus') }}',
            data: $("#txncheckstatus").serialize(),
            dataType: 'json',
            method: 'post'
          })
          
          .done(function (data) {
              $.LoadingOverlay("hide");
              $('#btnRefresh').removeClass('btn-loading');
              
             
              $("#txn-amount").text(data.amount);
              $("#txn-ref-no").text(data.refno);
              $("#txn-bgstatus").removeClass();
              $("#btntxnstatusmodal").removeClass();
              
              $("#txn-amount").text(data.amount);
              
              
              if(data.apistatus == "TRANSACTION_PENDING"){
                  $("#statusbadge").text('Pending').removeClass('bg-success bg-danger').addClass('bg-warning');
                    $("#bottomline").removeClass('bg-success bg-danger').addClass('bg-warning');
              }else if(data.apistatus == "TRANSACTION_SUCCESSFUL"){
                  $("#statusbadge").text('Success').removeClass('bg-warning bg-danger').addClass('bg-success');
                    $("#bottomline").removeClass('bg-success bg-danger').addClass('bg-warning');
              }else if(data.apistatus == "TRANSACTION_FAILED"){
                  $("#statusbadge").text('Failed').removeClass('bg-warning bg-success').addClass('bg-danger');
                    $("#bottomline").removeClass('bg-warning bg-success').addClass('bg-danger');
              }

              if(data.act == "CONTINUE"){
                  if(data.apistatus == "TRANSACTION_SUCCESSFUL"){
                      $("#modal-txn-status").modal('show');
                      $("#txn-heading").text("Transaction Successful");
                      $("#txn-msg").text(" was successful!");
                      $("#txn-bgstatus").addClass('modal-status bg-success');
                      $("#btntxnstatusmodal").addClass('btn btn-success');
                      
                      $("#btn-refres-square").addClass("d-none");
                    $("#btn-edit-square").addClass("d-none");
                    $(".field-disable").val("");
                  }
                  else if(data.apistatus == "TRANSACTION_REFUNDED"){
                      $("#modal-txn-status").modal('show');
                      $("#txn-heading").text("Transaction Refunded");
                      $("#txn-msg").text(" is refunded!");
                      $("#txn-bgstatus").addClass('modal-status bg-info');
                      $("#btntxnstatusmodal").addClass('btn btn-info');
                      
                      $("#btn-refres-square").addClass("d-none");
                        $("#btn-edit-square").addClass("d-none");
                  }else{
                      webToast.Danger({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' })
                  }
              }else if(data.act == "RETRY"){
                  if(data.apistatus == "TRANSACTION_FAILED"){
                      $("#modal-txn-status").modal('show');
                      $("#txn-heading").text("Transaction Failed");
                      $("#txn-msg").text(" was failed!");
                      $("#txn-bgstatus").addClass('modal-status bg-danger');
                      $("#btntxnstatusmodal").addClass('btn btn-danger');
                      
                      $("#btn-refres-square").addClass("d-none");
                      $("#btn-edit-square").addClass("d-none");
                  }else{
                      webToast.Danger({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' })
                  }
              }else if(data.act == "TERMINATE") {
                  if(data.apistatus == "TRANSACTION_PENDING"){
                      $("#modal-txn-status").modal('show');
                      $("#txn-heading").text("Transaction Pending");
                      $("#txn-msg").text(" is pending!");
                      $("#txn-bgstatus").addClass('modal-status bg-warning');
                      $("#btntxnstatusmodal").addClass('btn btn-warning');

                  }
                  else if(data.apistatus == "API_CALLFAILED"){
                      $("#modal-txn-status").modal('show');
                      $("#txn-heading").text("No Response Found");
                      $("#txn-msg").text(" is unknown!");
                      $("#txn-bgstatus").addClass('modal-status bg-danger');
                      $("#btntxnstatusmodal").addClass('btn btn-danger');
                  }else{
                      webToast.Danger({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' })
                  }
                  $(".closeOffCanvas").click();
              }else{
                  webToast.Danger({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' })
              }
              
              $(tab_refno).text(data.refno)
          })
          .fail(function (jqXHR, textStatus) {
            $.LoadingOverlay("hide");
            $('#btnRefresh').removeClass('btn-loading');
            $('#btnSubmit').removeClass('btn-loading');
            $('.field-disable').removeAttr('readonly');
            if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                var msg=jqXHR.responseJSON.message;
            }else{
                var msg="Something went wrong ("+ jqXHR.status +")";
            }
            webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
            
          })
          .always(function (result) {
              $.LoadingOverlay("hide");
              $('#btnRefresh').removeClass('btn-loading');
          });
        }
      });

      // Empty validation error when offcanvas closes
      $('#offcanvasEnd').on('hidden.bs.offcanvas', function () {
        $('.validetta-inline').empty();
        $('.field-disable').val('');
        $('.field-disable').removeAttr('readonly');
        $('.field-disable').removeAttr('disabled');
        
        $("#dmt-refund").removeClass("show");
        $("#send-refund-otp").show();
        $("#enter-refund-otp").hide();    
        
  
        $("#refund-verified").hide();
        $("#refund-ver-failed").hide();
        
       // $("#collapse-1").removeClass("show");
        $("#dmt-refund").removeClass("show");
      });

       //Get table data to offcanvas
      $('#data_table').on('click', 'tr', function(){
        var user_name = $(this).find('.userdetails').text();
        var parentname = $(this).find('.txnparentname').text();
        var role = $(this).find('.role').text();
        var date = $(this).find('.created_at').text();
        var sender_name = $(this).find('.send_name').text();
        var sendermobile = $(this).find('.send_mob_no').text();
        var ben_name = $(this).find('.ben_name').text();
        var ben_bank = $(this).find('td:nth-child(14)').text();
        var benaccount = $(this).find('.ben_account').text();
        var benifsc = $(this).find('.ben_ifsc').text();
        var amount = $(this).find('.txnamount').text();
        var ccf = $(this).find('.txnccf').text();
        var profit = $(this).find('.txnprofit').text();
        var charges = $(this).find('.txnccf').text();
        var gst = $(this).find('.txngst').text();
        var tds = $(this).find('.txntds').text();
        var refno = $(this).find('.refrenceno').text();
        var orderid = $(this).find('.srno').text();
        var txnid = $(this).find('.txntxnid').text();
        var remark = $(this).find('.reportremark').text();
        var txnmode = $(this).find('.txntype').text();
       // alert(remark);
        var id = $(this).find('.srno').text();
        var tid = $(this).find('.tid').text();
        var grpid = $(this).find('.groupid').text();
        var user_id = $(this).find('.userid').text();
        var retailer_name = $(this).find('.userdetails').text();
        var retailer_mbl = $(this).find('.mob').text();
        var shopname = $(this).find('td:nth-child(35)').text();
        var shopaddress = $(this).find('td:nth-child(36)').text();
        
        var dt_id = $(this).find('.dtid').text();
        var md_id = $(this).find('.mdid').text();
		var wl_id = $(this).find('.wlid').text();
		var dt_com = $(this).find('.dtcom').text();
		var md_com = $(this).find('.mdcom').text();
		var wl_com = $(this).find('.wlcom').text();
		var status = $(this).find('.status').text();
		var apiremark = $(this).find('.apiremark').text();
        
        var statusbadge = $.trim($(this).find('.dmtstatus').text());
        if(statusbadge == "pending"){
            $("#statusbadge").text('Pending').removeClass('bg-success bg-danger').addClass('bg-warning');
            $("#dt_status").text('Pending').removeAttr('class').addClass('badge bg-warning');
            $("#md_status").text('Pending').removeAttr('class').addClass('badge bg-warning');
            $("#wl_status").text('Pending').removeAttr('class').addClass('badge bg-warning');
            $("#bottomline").removeClass('bg-success bg-danger').addClass('bg-warning');
            $("#btn-refres-square").removeClass("d-none");
            $("#btn-edit-square").removeClass("d-none");
            $("#tablebadge").addClass('bg-warning');
        }else if(statusbadge == "failed"){
            $("#statusbadge").text('Failed').removeClass('bg-warning bg-danger').addClass('bg-danger');
            $("#bottomline").removeClass('bg-warning bg-danger').addClass('bg-danger');
             $("#btn-refres-square").addClass("d-none");
             $("#btn-edit-square").addClass("d-none");
        }else if(statusbadge == "success"){
            $("#statusbadge").text('Success').removeClass('bg-warning bg-danger').addClass('bg-success');
            $("#bottomline").removeClass('bg-warning bg-danger').addClass('bg-success');
            $("#btn-refres-square").addClass("d-none");
            $("#btn-edit-square").removeClass("d-none");
            $("#dt_status").text('Success').removeAttr('class').addClass('badge bg-success');
            $("#md_status").text('Success').removeAttr('class').addClass('badge bg-success');
            $("#wl_status").text('Success').removeAttr('class').addClass('badge bg-success');
        }else if(statusbadge == "reversed"){
             $("#statusbadge").text('Reversed').removeClass('bg-warning bg-blue').addClass('bg-blue');
             $("#bottomline").removeClass('bg-warning bg-blue').addClass('bg-blue');
             $("#btn-refres-square").addClass("d-none");
             $("#btn-edit-square").addClass("d-none");
             $("#dt_status").text('Reversed').removeAttr('class').addClass('badge bg-info');
             $("#md_status").text('Reversed').removeAttr('class').addClass('badge bg-info');
             $("#wl_status").text('Reversed').removeAttr('class').addClass('badge bg-info');
        }
        
        
        var delimiter = "(";
        var substring_array = user_name.split(delimiter);
        var name = substring_array[0];
        
        $('#user_name').text($.trim(user_name));
        $('#parentname').text($.trim(parentname));
        $('#role').text($.trim(role));
        $('#date').text($.trim(date));
        $('#sender_name').text($.trim(sender_name));
        $('#sendermobile').text($.trim(sendermobile));
        $('#ben_name').text($.trim(ben_name));
        $('#ben_bank').text($.trim(ben_bank));
        $('#benaccount').text($.trim(benaccount));
        $('#benifsc').text($.trim(benifsc));
        console.log(ccf);
        $('#charges').text($.trim(ccf));
        $('#profit').text($.trim(profit));
        
        $('#gst').text($.trim(gst));
        $('#tds').text($.trim(tds));
        $('#refno').text($.trim(refno));
        $('#orderid').text($.trim(orderid));
        $('#txnid').text($.trim(txnid));
        $('#remarktxn').text($.trim(remark));
        $('#apiremark').text($.trim(apiremark));
        $('#send_mob_no').text($.trim(sendermobile));
        $('#gettxnid').val($.trim(txnid));
        $('#gettid').val($.trim(tid));
        $('#id').val($.trim(id));
        $('#getId').text($.trim(id));
        $('#txnamount').val($.trim(amount));
        $('#editxnamount').val($.trim(amount));
        $('#txn_id').val($.trim(id));
        $('#txtxnid').val($.trim(txnid));
        $('#txn_refno').val($.trim(refno));
        $('#getsendermobile').val($.trim(sendermobile));
        $('#gettxntid').val($.trim(tid));
        $('#reftxntid').val($.trim(tid));
        $('#user_id').val($.trim(user_id));
        $('#txntid').val($.trim(tid));
        $("#amount").text($.trim(amount));
        // $("#charges").text($.trim(charges));
        $("#txntype").text($.trim(txnmode.toUpperCase()));
        $('#dt_id').text($.trim(dt_id));
		$('#md_id').text($.trim(md_id));
		$('#wl_id').text($.trim(wl_id));
		$('#dt_com').text($.trim(dt_com));
		$('#md_com').text($.trim(md_com));
		$('#wl_com').text($.trim(wl_com));
	   /* $('#dt_status').text(status);
		$('#md_status').text($.trim(status));
		$('#wl_status').text($.trim(status));*/
        $("#gettabledata").empty(); 
        
        
        $("#edittnxrefno").val($.trim(refno));
        
        //sender details
        $("#sender_name_invoice").text(sender_name);
        $("#sender_mbl").text(sendermobile);
        $("#retails_name").text(retailer_name);
        $("#retailer_mbl").text(retailer_mbl);
        
        //beneficiary details
        $("#invc_ben_name").text(ben_name);
        $("#invc_ben_bank").text(ben_bank);
        $("#invc_ben_acc").text(benaccount);
        $("#invc_ben_ifsc").text(benifsc);
        $("#created_date").text(date);
        $("#created_date").text(date);
        /*Invoice details*/
        
        
        //Shop details
        $("#shop_name").text(shopname);
        $("#shopaddress").text(shopaddress);
        $("#shopaddresss").text(shopaddress);
        $("#txn_remark").text(remark);
        
        
        if(grpid == 'null' || grpid == ''){
            $("#txngrouptable").hide();
            $('#amount').text($.trim(amount));
            $('#charges').text($.trim(charges));
            $("#invoice-table-details").html("");
            
            $.ajax({
                type: 'POST', // The HTTP method to use
                url: '{{ route('groupdmrtxn') }}', // The URL of the controller action to call
                data: {
                    _token: "{{ csrf_token() }}",
                    grpid,txnid
                },
                success: function (data) {
                    if(data.data.status == "Success"){
                        $("#invoice-table-details").html("");
                            var totalamount = parseInt(data.data.totalamount, 10); 
                            var totalcharges = parseInt(data.data.totalcharges, 10);
                            var txnamount = parseFloat(totalamount+totalcharges);
                            $("#inv_total_amount").text(txnamount);
                            $("#inv_total_charges").text(data.data.totalcharges);
                            $("#txn_remark").text(data.data.remark);
                            
                            $("#oc_inv_total_amount").text(data.data.totalamount + data.data.totalcharges);
                            $("#oc_inv_total_charges").text(data.data.totalcharges);
                            
                            var badgeforstatus;
                            var badgeforstatus2 = ucfirst(data.data.entries.status);
                            
                            if(data.data.entries.status == "success"){
                                
                                badgeforstatus = `<span class="d-flex"><i class="badge bg-success mt-1"></i>&nbsp;&nbsp;`+  badgeforstatus2 +`</span>`;
                            }else if(data.data.entries.status == "failed"){
                               badgeforstatus = `<span class="d-flex"><i class="badge bg-danger mt-1"></i>&nbsp;&nbsp;`+  badgeforstatus2 +`</span>`;
                            }else if(data.data.entries.status == "pending"){
                               badgeforstatus = `<span class="d-flex"><i class="badge bg-warning mt-1"></i>&nbsp;&nbsp;`+  badgeforstatus2 +`</span>`;
                            }
                            
                            if(data.data.entries.transfer_mode == null){
                                data.data.entries.transfer_mode = "NA";
                            }
                            
                            $('#invoice-table-details').append(`<tr>
                            <td>`+data.data.entries.id+`</td>
                            <td>`+data.data.entries.txnid+`</td>
                            <td>`+data.data.entries.refno+`</td>
                            <td>`+data.data.entries.transfer_mode.toUpperCase()+`</td>
                            <td>`+badgeforstatus+`</td>
                            <td>
                                <div class="d-flex">
                                    <svg style="--tblr-icon-size: 1rem; margin: 0" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                       <path d="M7 9l11 0"></path>
                                    </svg>
                                    <span>`+data.data.entries.amount+`</span>
                                </div>
                            </td></tr>`);
                    }else{
                        webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                    }
                    $("#gettabledata").LoadingOverlay("hide");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#gettabledata").LoadingOverlay("hide");
                }
            });
            
        }else{
            $("#txngrouptable").show();
            // $(".grouptxn").hide();
            
            /*if($('body').hasClass('theme-dark')){
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
             }*/
             
             // Show full page LoadingOverlay
            $("#gettabledata").LoadingOverlay("show");
                    
            $.ajax({
                type: 'POST', // The HTTP method to use
                url: '{{ route('groupdmrtxn') }}', // The URL of the controller action to call
                data: {
                    _token: "{{ csrf_token() }}",
                    grpid,txnid
                },
                success: function (data) {
                    if(data.data.status == "Success"){
                        // $("#amount").text(data.data.totalamount);
                        // $("#charges").text(data.data.totalcharges);
                        
                        $("#gettabledata").html("");
                        $("#invoice-table-details").html("");
                        
                        var totalamount = parseInt(data.data.totalamount, 10); 
                        var totalcharges = parseInt(data.data.totalcharges, 10);
                        var txnamount = parseFloat(totalamount+totalcharges);
                            
                        $("#inv_total_amount").text(txnamount);
                        $("#inv_total_charges").text(data.data.totalcharges);
                        $("#txn_remark").text(data.data.remark);
                        
                        $("#oc_total_amount").text(txnamount);
                        $("#oc__total_charges").text(data.data.totalcharges);
                        
                        $("#oc_inv_total_amount").text(data.data.totalamount);
                            $("#oc_inv_total_charges").text(data.data.totalcharges);
                        // var invoice_total = data.data.totalamount;
                        $.each(data.data.entries, function(index, value) {
                            var badgeforstatus;
                            var badgeforstatus2 = ucfirst(value.status);
                            
                            if(value.status == "success"){
                                
                                badgeforstatus = `<span class="d-flex"><i class="badge bg-success mt-1"></i>&nbsp;&nbsp;`+  badgeforstatus2 +`</span>`;
                            }else if(value.status == "failed"){
                               badgeforstatus = `<span class="d-flex"><i class="badge bg-danger mt-1"></i>&nbsp;&nbsp;`+  badgeforstatus2 +`</span>`;
                            }else if(value.status == "pending"){
                               badgeforstatus = `<span class="d-flex"><i class="badge bg-warning mt-1"></i>&nbsp;&nbsp;`+  badgeforstatus2 +`</span>`;
                            }
                            
                            // return badgeforstatus;
                            
                            $('#gettabledata').append(`<tr>
                            <td>`+value.txnid+`</td>
                            <td>`+value.refno+`</td>
                            <td>`+value.transfer_mode.toUpperCase()+`</td>
                            <td><div class="d-flex">
                                    <svg style="--tblr-icon-size: 1rem; margin: 0" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                       <path d="M7 9l11 0"></path>
                                    </svg>
                                    <span>`+value.amount+`</span>
                                </div>
                            </td>
                            <td>`+badgeforstatus+`</td></tr>`);
                            
                            $('#invoice-table-details').append(`<tr>
                            <td>`+value.id+`</td>
                            <td>`+value.txnid+`</td>
                            <td>`+value.tid+`</td>
                            <td>`+value.transfer_mode.toUpperCase()+`</td>
                            <td>`+badgeforstatus+`</td>
                            <td><div class="d-flex">
                                <svg style="--tblr-icon-size: 1rem; margin: 0" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                   <path d="M7 9l11 0"></path>
                                </svg>
                                <span>`+value.amount+`</span>
                            </div>
                            </td></tr>`);
                        });
                        
                    }else{
                        webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright'  });
                    }
                    $("#gettabledata").LoadingOverlay("hide");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#gettabledata").LoadingOverlay("hide");
                }
            });
        }
        
        $("#refund-verified").hide();
        $("#refund-ver-failed").hide();
      });
      
      if($('body').hasClass('theme-dark')){
          var cssFileUrl = "{{asset('public/mytheme/comutils/css/darktheme.css')}}";
            $('head').append('<link rel="stylesheet" type="text/css" href="' + cssFileUrl + '">');
          
          $(".dataTables_length").addClass('colorWhite');
          $(".dataTables_length").addClass('colorWhite');
          $(".dataTables_filter").addClass('colorWhite');
          $(".dataTables_info").addClass('colorWhite');
          $(".paginate_button ").addClass('colorWhite');
          $(".dataTables_next").addClass('colorWhite');
          
          $("input").addClass('colorWhite');
          $(".dataTables_paginate").addClass('colorWhite');
          $("current").addClass('colorWhite');
          
          $("select[name='data_table_length'] option").css({
            background: "#1d273b"
          });
           $("#accordian").css({
                background: "#1d273b"
        });
      }
      
      $("#btnRefresh").click(function(){
          $("#txncheckstatus").submit();
      });
      
      $("#printpaymentreceipt").click(function(){
          $("#print-modal").modal("show");
      })
      
      $("#btn-print-invoice").click(function(){
        
        var modalContent = $("#receiptprintcontent").html();
         $(".page").css("display", "none");
          var printContainer = $("<div id='printContainer'></div>").appendTo("#printmaterial").css("display", "none");
          printContainer.html(modalContent);
          printContainer.show();
          window.print();
          setTimeout(function() {
              $(".page").css("display", "block");
          }, 100);
          printContainer.remove();
          
      });

      var groupSums = {}; // Object to store amounts by GroupID
      var groups = {};
      var table = $('#data_table').DataTable();
    
    
      table.rows().every(function() {
          
        var groupId = $(this.node()).find('.classgroupid').text();
        var amount = parseFloat($(this.node()).find('.amount').text());
        if($('body').hasClass('theme-dark')){
            if (!groups[groupId]) {
              groups[groupId] = getDarkRandomDarkColor(); // Generate a random color or set a specific color
            }
        }
        
        if($('body').hasClass('theme-light')){
            if (!groups[groupId]) {
              groups[groupId] = getRandomColor(); // Generate a random color or set a specific color
            }
        }

        // if (groupSums[groupId]) {
        //   groupSums[groupId] += amount;
        // } else {
        //   groupSums[groupId] = amount;
        // }

        if(groupId == ""){
            $(this.node()).find('.ben_account').css('background-color', 'transparent');
        }else{
            $(this.node()).find('.ben_account').css('background-color', groups[groupId]);
        }
        
        
      });
        
    
        //show get otp button on get refund button
        $("#btn-refund-square").click(function(){
            $("#send-refund-otp").show();
            $("#dmt-refund").show();
        });
        
        //Get refund Otp
        $("#getRefundOtp").click(function(){
            var mobile = $('#getsendermobile').val();
            var tid = $('#gettxntid').val();
           $.ajax({
                type: 'POST', // The HTTP method to use
                url: '{{ route('dmtrefundtxnotp') }}', // The URL of the controller action to call
                data: {
                    _token: "{{ csrf_token() }}",
                    mobile,tid
                },
                success: function (data) {
                    if(data.apistatus == "REQUEST_SUCCESS" && data.act == "CONTINUE"){
                        $("#send-refund-otp").slideUp(1000);
                        $("#enter-refund-otp").show();
                        webToast.Success({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' });
                    }else if(data.apistatus == "REQUEST_FAILED" && data.act == "RETRY"){
                        webToast.Danger({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' });
                    }else{
                        webToast.Danger({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                        var msg=jqXHR.responseJSON.message;
                    }else{
                        var msg="Something went wrong ("+ jqXHR.status +")";
                    }
                    webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                }
            });
        });
        
        //Initiate refund
        $('#txnrefund').validetta({
        realTime: true,
        display: 'inline',
        errorTemplateClass: 'validetta-inline',
        onValid: function (event) {
            
            $('#btnrefundtxn').addClass('btn-loading');

          event.preventDefault();
          $.ajax({
            url: '{{ route('dmttxnrefund') }}',
            data: $("#txnrefund").serialize(),
            dataType: 'json',
            method: 'post'
          })
          
          .done(function (data) {
              if(data.apistatus == "REFUND_SUCCESS" && data.act == "CONTINUE"){
                  $("#enter-refund-otp").slideUp(1000);
                  $("#refund-verified").show();
                  $('#btnrefundtxn').removeClass('btn-loading');
                  
                  setTimeout(function() {
                    $("#dmt-refund").slideUp()
                  }, 4000); 
                  
                  setTimeout(function() {
                    $("#dmt-refund").removeClass('show');
                    $("#refund-verified").hide();
                  }, 5000); 
                  webToast.Success({ status: 'Success', message:data.message, delay: 3000, align: 'bottomright' });
              }else if(data.apistatus == "REFUND_FAILED" && data.act == "RETRY"){
                  $("#enter-refund-otp").slideUp(1000);
                  $("#refund-ver-failed").show();
                  $('#btnrefundtxn').removeClass('btn-loading');
                  
                  setTimeout(function() {
                    $("#dmt-refund").slideUp()
                  }, 4000); 
                  
                  setTimeout(function() {
                    $("#dmt-refund").removeClass('show');
                    $("#refund-ver-failed").hide();
                  }, 5000);
                  webToast.Danger({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' });
              }else{
                  webToast.Danger({ status: 'Failed', message:data.message, delay: 3000, align: 'bottomright' });
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
          .always(function (result) {
              $('#btnrefundtxn').removeClass('btn-loading');
          });
        }
      });
    });
  </script>
  
  <script>
        function ucfirst(str) {
                  if (typeof str !== 'string' || str.length === 0) {
                    return '';
                  }
                  return str[0].toUpperCase() + str.slice(1);
                }

        
        function getRandomColor() {
          // Generate a random HSL color with lower saturation and brightness values
          var hue = Math.floor(Math.random() * 360);
          var saturation = Math.floor(Math.random() * 50) + 50; // Lower saturation value (50-99)
          var lightness = Math.floor(Math.random() * 30) + 70; // Higher lightness value (70-99)
        
          return 'hsl(' + hue + ', ' + saturation + '%, ' + lightness + '%)';
        }
        
        function getDarkRandomDarkColor() {
          // Generate a random HSL color with lower saturation and brightness values
          var hue = Math.floor(Math.random() * 360);
          var saturation = Math.floor(Math.random() * 50) + 50; // Lower saturation value (50-99)
          var lightness = Math.floor(Math.random() * 30) + 20; // Lower lightness value (20-49)
        
          return 'hsl(' + hue + ', ' + saturation + '%, ' + lightness + '%)';
        }
        
  </script>
  
   <script>
     document.getElementById("btnSearch").onclick = validateBarForm;
	function validateBarForm() 
	{
		
      
	  
	   var from_date = $('#from_date').val();
       var to_date = $('#to_date').val();
       var status = $('#status :selected').val();
       
	   if(from_date == '' && to_date == '')
       {
	     webToast.Danger({ status: 'Failed', message: 'Please select the date', delay: 3000, align: 'bottomright' })	
       }else{
       $("#loader").LoadingOverlay("show", {
                           background : "rgba(164, 165, 166, 0.44)",
                            size : "50px",
                            imageColor : "rgb(5, 42, 245)"
         });
	  
		$("#loader").LoadingOverlay("show");
	   $.ajax({
		  type: "POST",
		  url: "{{route('filterdata')}}",
		  data: {type: 'dmt',_token: "{{ csrf_token() }}", from_date:from_date, to_date:to_date, status:status},
		  dataType:'json',
		  cache: false,
		  success: function(data){
			 $("#loader").LoadingOverlay("hide", true);
           if(data.status == "success")
		   {
			  var table = $('#data_table');
             if ($.fn.DataTable.isDataTable(table)) {
               table.DataTable().destroy();
              }
			    $('#data_table tbody').empty();
				var tableBody = $('#data_table tbody');
				
				var status='';
				$.each(data.data.data, function(index, value) {
				   // console.log(value);
				   var badgeStatus = ucfirst(value.status); 
				   if(badgeStatus == "Failed")
					{
					 var status = ` <span class="m-1 badge`+value.id+`"><i class="badge bg-danger dot`+value.id+` mr-1"></i> <span id="badge`+value.id+`">`+badgeStatus+`</span></span>`;
					}else if(badgeStatus == "Success"){
					 var status = ` <span class="m-1 badge`+value.id+`"><i class="badge bg-success dot`+value.id+`" ></i> <span id="badge`+value.id+`">`+badgeStatus+`</span></span>`;
					}else if(badgeStatus == "Pending"){
					   var status = ` <span class="m-1 badge`+value.id+`"><i class="badge bg-warning dot`+value.id+`" ></i> <span id="badge`+value.id+`">`+badgeStatus+`</span></span>`; 
					}else{
					    var status = ` <span class="m-1 badge`+value.id+`"><i class="badge bg-primary dot`+value.id+`" ></i> <span id="badge`+value.id+`">`+badgeStatus+`</span></span>`; 
					}
				   if(value.refno == '')
					{
					 var refno = 'NA';
					}else{
					   var refno = value.refno; 
					}
					if(value.groupid == '')
					{
					    $("#txngrouptable").hide();
					}else{
					    $("#txngrouptable").show();
					}
					if(value.groupid == null)
					{
					    var groupid = '';
					}else{
					     var groupid = value.groupid;
					}
					if(value.dt_com == null)
					{
					  var dtcom = 0;  
					}else{
					    var dtcom = value.dt_com; 
					}
					if(value.md_com == null)
					{
					  var mdcom = 0;  
					}else{
					    var mdcom = value.md_com; 
					}
					if(value.wl_com == null)
					{
					  var wlcom = 0;  
					}else{
					    var wlcom = value.wl_com; 
					}
				table.find('tbody').append(`<tr>
                        <td><b>`+value.id+`</b><br>`+value.created_at+`</td>
                        <td>`+value.user.name+`(`+value.user.id+`)</td>
                        <td class="ben_account" title="Total amount: `+value.groupsum+`">`+value.beneficiary_account+`</td>
                        <td>Ref No - <span id="ref`+value.id+`">`+value.refno+`</span><br>Txn id - `+value.txnid+`</td>
                        <td> 
                            <div class="d-flex">
                                <svg style="--tblr-icon-size: 1rem; margin: 2px" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"></path>
                                   <path d="M7 9l11 0"></path>
                                </svg>
                                <span>`+value.amount+`</span>
                            </div>
                        </td>
                       
                         <td>`+status+`</td>
                        <td>
                          <a id="btn-roleinfo" class="btn btn-outline-info rounded-pill" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd">info</a>
                        </td>
                        <td style="display:none">`+value.parents+`</td>
                        <td style="display:none">`+value.user.role.name+`</td>
                        <td style="display:none">`+value.created_at+`</td>
                        <td style="display:none">`+value.sender_name+`</td>
                        <td style="display:none">`+value.sender_mobile+`</td>
                        <td style="display:none">`+value.beneficiary_name+`</td>
                        <td style="display:none">`+value.banks+`</td>
                        <td style="display:none">`+value.beneficiary_account+`</td>
                        <td style="display:none">`+value.beneficiary_ifsc+`</td>
                        <td style="display:none" class="amount">`+value.amount+`</td>
                        <td style="display:none">`+value.ccf+`</td>
                        <td style="display:none">`+value.profit+`</td>
                        <td style="display:none">`+value.charge+`</td>
                        <td style="display:none">`+value.gst+`</td>
                        <td style="display:none">`+value.tds+`</td>
                        <td style="display:none">`+value.beneficiary_bankid+`</td>
                        <td style="display:none">`+value.id+`</td>
                        <td style="display:none">`+value.txnid+`</td>
                        <td style="display:none">`+value.remark+`</td>
                        <td style="display:none">`+value.id+`</td>
                        <td style="display:none">`+value.tid+`</td>
                        <td style="display:none">`+value.provider_id+`</td>
                        <td style="display:none" class="classgroupid">`+groupid+`</td>
                        <td style="display:none">`+value.refno+`</td>
                        <td style="display:none">`+value.user_id+`</td>
                        <td style="display:none">`+value.user.name+`</td>
                        <td style="display:none">`+value.user.mobile+`</td>
                        <td style="display:none">`+value.shops.shop_name+`</td>
                        <td style="display:none">`+value.shops.shop_address+`</td>
                        <td style="display:none">`+value.transfer_mode+`</td>
                        <td style="display:none">`+value.dt_id+`</td>
						<td style="display:none">`+value.md_id+`</td>
						<td style="display:none">`+value.wl_id+`</td>
						<td style="display:none">`+dtcom+`</td>
						<td style="display:none">`+mdcom+`</td>
						<td style="display:none">`+wlcom+`</td>	
						<td style="display:none">`+value.status+`</td>
						<td style="display:none">`+value.apiremark+`</td>
                      </tr>`);
				});

             $('#data_table').DataTable({
        		    bLengthChange: true,
                    searching: true,
        			ordering: false,
        			select: true,
            		dom: 'Bfrtip',
            		dom: '<"float-left"B><"float-right"f>rt<"row"<"col-sm-2"l><"col-sm-3"i><"col-sm-7"p>>',
                    drawCallback: function(){
                      $('.paginate_button.next:not(.disabled)', this.api().table().container())          
                         .on('click', function(){
                            //alert('next') ;
                         });       
                   }
            	});
            $('.dt-button').addClass('btn btn-default');
       $('.dt-button').addClass('btn btn-primary');
       $('.dt-button').removeClass('dt-button');
		  }else{
			  $.LoadingOverlay("hide");
			  webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
		  } 
		  
		  },
			
		});
       }
	}
 </script>
  <!--<script src="{{ asset('public/mytheme/comutils/js/darklightthemecolors.js') }}" ></script>-->
  </body>
</html>