
@extends('frontend.layout.main')

@section('main-container')

      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
        <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <div class="page-body">
                            <div class="row row-deck row-cards">
                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                        <div class="card ">
                                            <div class="card-status-start bg-primary"></div>
                                            <!--<div class="ribbon bg-red">Wallet Load</div>-->
                                            <div class="card-body">
                                                <form id="dmtmobile" method="post" name="dmtmobile">
                                                   @csrf                                                   <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group mb-3 validetta-valid">
                                                                <label class="form-label text-muted">Enter mobile number to get sender account details</label>
                                                                <input id="mobile" type="text" name="mobile" autocomplete="off" data-validetta="number,required,minLength[10],maxLength[10]" class="form-control" data-vd-message-required="Please enter mobile number" placeholder="Enter Mobile Number"  data-vd-message-number="Please enter only number" data-vd-message-minlength="Please enter minimum 10 digit number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <button id="btn-getDetails" type="submit" class="btn btn-primary">
                                                            Get Details
                                                        </button>
                                                    </div>
                                                    <div class="mt-3">
                                                            <p class="text-muted">Nepal Money Transfers allow you to send funds across bank accounts in Nepal.</p>
                                                            <p class="text-muted">DMTs are safe, reliable, and are completed in real-time.</p>
                                                        
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end-->
                                    
                                    <div id="sender_details" class="col-sm-12 col-md-7 col-lg-7" style="display: none;">
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
                                                            <div class="row img-fluid d-flex justify-content-center">
                                                                <img class="w-50" src="https://wlstaging.sec2paymoney.in/public/mytheme/img/payments/dmt-img.png">
                                                            </div>
                                                            <div class="row my-auto text-center">
                                                                <h5 class="page-title d-flex justify-content-center" id="user_name">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <!-- Content here -->
          </div>
        </div>
       
      </div>
    
    <!-- Libs JS -->
    <!-- Tabler Core -->
  </body>
  </html>
@endsection
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link href="{{url('frontend/dist/css/validetta.min.css')}}" rel="stylesheet"/>

  <script type='text/javascript'>
//Check if mobile number is registered.
 
$(document).ready(function() {
    $('#dmtmobile').submit(function (e) {
  e.preventDefault();
  $.ajax({
    type: 'GET',
    url: '{{route('remitterProfile')}}',
    data: { 
       mobile: $('#mobile').val(),
      "_token": "{{ csrf_token() }}",  
        },
 
    
      success: function(result) {
       
      if(result.apistatus=='REGISTERED')
      {
            $("#user_name").html(result.data.firstName);
            $("#sendrmobile").html(result.data.mobile);
           
            // var trHTML = '';
            // $.each(result.data.beneficiaries.beneficiary, function(i, item) {
            //   trHTML += '<tr><td>' + item.b_id + '</td><td>' + item.b_name + '</td><td>' + item.b_account + '</td><td>'+item.b_bank+'</td><td>' + item.b_ifsc +'</td><td>' + item.banktype +'</td><td><a class="btn" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd" onclick="openCanvas('+item.b_id+',\''+ item.b_name + '\','+item.b_account+',\''+item.b_bank+'\',\''+item.b_ifsc+'\',\''+item.banktype+'\')">View</a></td></tr>';
              

            //   });
              $('#records_table').append(trHTML);
            
      }else{
      $('#datarecord').html(data.message);
       }
      console.log({ data });
    },
    error: function(result) {
      //alert(result.responseText);
      $('#datarecord').html(result.responseText.message);

      console.log(result);
    }
  })
   
});

function openCanvas(id,bene_name,bene_account,bene_bank,bene_ifsc,bene_banktype)
{
 // alert('kkk'+account);
             var sender_name = $('#user_name').text();
              var sender_mobile =  $('#sendrmobile').text();
              var total_limit = $('#totallimit').text();
              var used_limit =  $('#usedlimit').text();
              
              $("#sender_name").text(sender_name);
              $("#sender_mobile").text(sender_mobile);
              $("#total_limit").text(total_limit);
              $("#used_limit").text(used_limit);
             
            $('#ben_name').text($.trim(bene_name));
              $('#ben_bank').text($.trim(bene_bank));
              $('#benaccount').text($.trim(bene_account));
              $('#benifsc').text($.trim(bene_ifsc));
              
              $('#ben_id').val($.trim(id));
              $('#receiver_name').val($.trim(bene_name));
              $('#receiver_bank').val($.trim(bene_bank));
              $('#receiver_account').val($.trim(bene_account));
              $('#receiver_ifsc_number').val($.trim(bene_ifsc));
              
              $("#sene_name").val(sender_name);
              $("#sene_mbl").val(sender_mobile);
            
            
  
}
          $('#btn-sendMoney').click(function(){
              var receivers_name = document.getElementById('receiver_name').value;
              var receivers_bank = document.getElementById('receiver_bank').value;
              var receivers_account = document.getElementById('receiver_account').value;
              var receiver_ifsc_number = document.getElementById('receiver_ifsc_number').value;
              var receiver_id = document.getElementById('ben_id').value;
             // alert(receiver_id+'@@@name'+receivers_name);
              var senders_name = document.getElementById('sene_name').value;
              var senders_mbl = document.getElementById('sene_mbl').value;

              var amount_transfer = parseFloat(document.getElementById('tr_amount').value);
              amount_transfer = amount_transfer.toFixed(2);
              var pay_mode = $('input[name="tr_mode"]:checked').val();
              //alert(pay_mode);
              $.ajax({
                  type: "POST",
                  url: "{{route('sendMoney')}}",
                  data: { 
                    ben_id: receiver_id,
                    tr_mode:pay_mode,
                    tr_amount:amount_transfer,
                    sen_mbl:senders_mbl,
                    sen_name:senders_name,
                    receivers_name:receivers_name,
                    b_bank:receivers_bank,
                    receivers_account:receivers_account,
                    receiver_ifsc_number:receiver_ifsc_number,
                    "_token": "{{ csrf_token() }}",
                    
                  },
                  success: function(result) {
                      alert(result.userData);
                    //  if(result.status=='success')
                    //  {
                    //   //alert(result.userData.userName);
                    //   $("#userNamelable").html(result.userData.userName);
                    //     $.each(result.userData, function (key, val) {
                    //          // alert(key +"=="+ val);
                    //          $("#"+key).html(val);
                    //       });
                    
                    //  }else{
                    //   $("#userRow").html("No Record Found !");
                          
                    //   $("#offcanvasEnd").remove();
                    //   webToast.Danger({
                    //                   status:'Failed',
                    //                   message:result.message,
                    //                   delay:1000,
                    //                   align:'bottomright'
                    //               });
                    //               window.location.replace(
                    //             '{{route("listUser")}}'
                    //            );
                          
                    //  }
                    
                  },
                  error: function(result) {
                      webToast.Danger({
                                      status:'Failed',
                                      message:result.message,
                                      delay:1000,
                                      align:'bottomright'
                                  });
                      // $("#userRow").html("No Record Found !");
                        
                  }
              });
              return false;
           

    });   
});       
              </script>
