@extends('frontend.layout.main')

@section('main-container')
<style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Data grid
                </h2>
                <form method="post" id="csearch" name="csearch">
                  @csrf
                 
              <label for="mobileno">Search customer:</label>
              <input type="search" id="mobileno" name="mobileno">
              <input type="submit">
            </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Base info</h3>
              </div>
              <div class="card-body" id="datarecord">
                <div class="datagrid">
                          <div class="datagrid-item">
                            <div class="datagrid-title">Name</div>
                            <div class="datagrid-content" id="user_name">-</div>
                          </div>
                          <div class="datagrid-item">
                            <div class="datagrid-title">Mobile</div>
                            <div class="datagrid-content" id="sendrmobile"> -</div>
                          </div>
                          <div class="datagrid-item">
                            <div class="datagrid-title">Total Limit</div>
                            <div class="datagrid-content" id="totallimit">-</div>
                          </div>
                          <div class="datagrid-item">
                            <div class="datagrid-title">Used Limit</div>
                            <div class="datagrid-content" id="usedlimit">–</div>
                          </div>
                        
                          <div class="datagrid-item">
                            <div class="datagrid-title">Status</div>
                            <div class="datagrid-content">
                              <span class="status status-green">
                                Active
                              </span>
                            </div>
                          </div>
                  
                  <div class="datagrid-item">
                    <div class="datagrid-title">Beneficiary Data</div>
                    <div class="datagrid-content">
                    <table id="records_table" class="table table-striped">
                              <thead>
                                  <tr>
                                  <th>ID</th>
                                      <th>Name</th>
                                      <th>Account</th>
                                      <th>Bank</th>
                                      <th>IFSC</th>
                                      <th>Bank Type</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                             
                     </table>
                     <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                          <div class="offcanvas-header">
                              <h2 class="offcanvas-title" id="offcanvasEndLabel">Transaction Details <span id="userNamelable"></span></h2>
                              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                    <div class="offcanvas-body">
                                <div class="row" id="senderRow">
                                    <div class="col-12">
                                        <span>Sender Details</span></br></br>
                                      </div><div class="col-6">
                                        <span>Name</span><br>
                                        <p id="sender_name"></p>
                                        <span>Mobile</span><br>
                                        <p id="sender_mobile"></p>
                                      </div><div class="col-6">
                                        <span>Total Limit</span><br>
                                        <p id="total_limit"></p>
                                        <span>Used Limit</span><br>
                                        <p id="used_limit"></p>
                                    </div>
                                </div>
                                <div class="row" id="BeneficiaryRow">
                                              <div class="col-12">
                                                  <span>Beneficiary Details</span></br></br>
                                                  </div><div class="col-6">
                                                  <span>Beneficiary Name</span><br>
                                                  <p id="ben_name"></p>
                                                  <span>Account</span><br>
                                                <p id="benaccount"></p>
                                              </div><div class="col-6">
                                                <span>Bank Name</span><br>
                                              <p id="ben_bank"></p>
                                              <span>IFSC NO</span><br>
                                              <p id="benifsc"></p>
                                        </div>
                                 </div>
                                 <form id="send-money" method="post" action="#">   
                            @csrf
                            <input type="hidden" id="ben_id" name="ben_id" value="">
                            <input type="hidden" id="receiver_name"  name="receiver_name" value="">
                            <input type="hidden" id="receiver_bank" name="receiver_bank" value="">
                            <input type="hidden" id="receiver_account" name="receiver_account" value="">
                            <input type="hidden" id="receiver_ifsc_number" name="receiver_ifsc_number" value="">
                            <input type="hidden" id="sene_name" name="sene_name" value="">
                            <input type="hidden" id="sene_mbl" name="sene_mbl" value="">
                           
                                <div class="row">
                                <label class="form-label required text-muted">Enter Amount to transfer</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">                             
                                    </span>
                                    <input id="tr_amount" type="text"  name="tr_amount" autocomplete="off" placeholder="Amount" data-validetta="required" class="form-control field-disable" data-vd-message-required="Please enter amount">
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
                                 
                     </div><!--- off canvas body ---->
                </div>

                <!--- Off Canvas End--->
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
           </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script type='text/javascript'>
  $('#csearch').submit(function (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: '{{route('query-remitter')}}',
    data: { 
      mobile: $('#mobileno').val(),
      "_token": "{{ csrf_token() }}",
           
        },
 
    
      success: function(data) {
      if(data.apistatus=='REGISTERED')
      {
            $("#user_name").html(data.name);
            $("#sendrmobile").html(data.mobile);
            $("#totallimit").html(data.totallimit);
            $("#usedlimit").html(data.usedlimit);

           
            var trHTML = '';
            $.each(data.beneficiaries.beneficiary, function(i, item) {
              trHTML += '<tr><td>' + item.b_id + '</td><td>' + item.b_name + '</td><td>' + item.b_account + '</td><td>'+item.b_bank+'</td><td>' + item.b_ifsc +'</td><td>' + item.banktype +'</td><td><a class="btn" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd" onclick="openCanvas('+item.b_id+',\''+ item.b_name + '\','+item.b_account+',\''+item.b_bank+'\',\''+item.b_ifsc+'\',\''+item.banktype+'\')">View</a></td></tr>';
              

              });
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
</script>
   </body>
</html>
@endsection