<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    <?php  "IT Dashboard" ;?>
  </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('public/mytheme/css/tabler.min.css?1674944402') }}" rel="stylesheet" />
  <link href="{{asset('public/mytheme/css/tabler-flags.min.css?1674944402')}}" rel="stylesheet" />
  <link href="{{asset('public/mytheme/css/tabler-payments.min.css?1674944402')}} " rel="stylesheet" />
  <link href="{{asset('public/mytheme/css/tabler-vendors.min.css?1674944402')}}" rel="stylesheet" />
  <link href="{{asset('public/mytheme/css/demo.min.css?1674944402')}}" rel="stylesheet" />
  <link href="{{asset('public/mytheme/plugins/css/validetta.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('public/mytheme/plugins/css/webToast.min.css')}}" />

<style>
  .validetta-inline {
    margin-top: 4px;
  }

  .card-stamp {
    --tblr-stamp-size: 4rem;
    pointer-events: none;
  }

  .empty {
    padding: 1rem;
  }

  .empty-img img {
    height: 1rem;
    width: auto;
  }

  .empty-img {
    margin: 0 0 0rem;
    line-height: 1;
  }

  .form-label {
    font-weight: 5px;
  }

  .multiselect {
    width: 200px;
  }

  .selectBox {
    position: relative;
  }

  .selectBox select {
    width: 100%;
    font-weight: bold;
  }

  .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }

  #checkboxes {
    display: none;
    border: 1px #dadada solid;
  }

  #checkboxes label {
    display: block;
  }

  #checkboxes label:hover {
    background-color: #1e90ff;
  }

  .form-selectgroup-label a {
    padding: 10px;
  }

  .btn fav {
    margin: 2px;
  }

  .custom-tooltip {
    --bs-tooltip-bg: var(--bs-primary);
  }

    .btn-outline-info.btn-icon:hover svg path {
    stroke: white;
    }
</style>


</head>


<body class="{{Session::get('theme')}}">

  <div class="page">
   
    

    <div class="page-wrapper">
      <!-- Page header -->
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <!-- Page pre-title -->
              <div class="page-pretitle">
                <!--overview-->
              </div>
             
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
              <div class="btn-list">
                <!--<span class="d-none d-sm-inline">-->
                <!--  <a href="#" class="btn">-->
                <!--    My Tickets-->
                <!--  </a>-->
                <!--</span>-->
                
                  <a href="#" class="d-none d-sm-inline-block" style="">
                                        <p class="empty-title h1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-rupee-nepalese" style="margin-bottom: 4px;"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M15 5h-11h3a4 4 0 1 1 0 8h-3l6 6"></path> <path d="M21 17l-4.586 -4.414a2 2 0 0 0 -2.828 2.828l.707 .707"></path> </svg>
                                                {{\Auth::user()->aepswallet}}</p>
                                    </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="row row-deck row-cards">
            <!--card body-->
            <!--warning-->
            <div class="col-lg-8 col-md-8 col-sm-12">
              <div class="alert alert-warning w-100" role="alert">
                <div class="d-flex">
                  <div>
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 9v2m0 4v.01"></path> <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"> </path> </svg>
                  </div>
                  <div>
                    <h4 class="alert-title">Operator Update</h4>
                    <div class="text-muted"> Below check box is mandatory to proceed further.
                    <br>.</div>
                  </div>
                </div>
              </div>
            </div>
            
          

            <!--onboard and kyc approved page-->
            <div class="col-sm-12 col-md-8 col-lg-8" id="servicepage" style="">
              <div class="card">

                <div class="card-status-start bg-primary"></div>

                <div class="card-body">
                       <form id="icaepskyc" method="post" action="">
                    @csrf
                    <p class="empty-title">Do 2FA here...</p>
                   
                     <br>
                    
                    <input type="hidden" name="mantra_rd_service" value="{{ $version_value[0]->value  }}">
                    <input type="hidden" name="morpho_rd_service" value="{{ $version_value[1]->value  }}">
                    <input type="hidden" name="startek_rd_service" value="{{ $version_value[2]->value  }}">
                    <input type="hidden" name="mantra_rd_service_110" value="{{ $version_value[3]->value  }}">  <!-- 26122023 NP-->
                    

                    <!--<input type="hidden" name="otpPrimaryKeyID" id="otpPrimaryKeyID" />-->
                    <!--<input type="hidden" name="otpEncodeTxnID" id="otpEncodeTxnID" />-->
                    <input type="hidden" name="ready_status_count" id="ready_status_count" value="">
                    <input type="hidden" id="txtPidData" name="txtPidData" value="" class="form-control">
                    <input type="hidden" id="servicename" name="servicename" value="{{ $service_name }}" class="form-control">
                    <!--  kyc card -->
                    <div class="row">
                     
                      <div class="col-md-12 col-lg-12" id="step3" style="">
                        <div class="card">
                          <!--<div class="card-status-start bg-primary"></div>-->
                          <div class="card-body" style="height: 216px;">
                      
                               <div class="col-sm-12 col-md-6 col-lg-6">
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
            <!--end-->
       
            <div class="col-4">
                <img src="/public/mytheme/img/aepsSample.jpeg">
            </div>
            

              

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

          </div>
        </div>
      </div>
      @include('./utilities.footer')
    </div>
  </div>


<!--end-->
 

  <!-- Libs JS -->
  <script src="{{ asset('public/mytheme/libs/litepicker/dist/litepicker.js ') }}" defer></script>
  <script src="{{ asset('public/mytheme/libs/tom-select/dist/js/tom-select.base.min.js ') }}" defer></script>

  <!-- Tabler Core -->
  <script src="{{ asset('public/mytheme/js/tabler.min.js') }}" defer></script>
  <script src="{{ asset('public/mytheme/js/demo.min.js?16749444v02') }}" defer></script>
  <script src="{{ asset('public/mytheme/plugins/js/jquery-3.6.4.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/mytheme/plugins/js/validetta.min.js') }}"></script>
  <script src="{{ asset('public/mytheme/plugins/js/webToast.min.js') }}" defer></script>
  <script src="{{asset('public/mytheme/comutils/js/customvalidation.js')}}"></script>
  <script src="{{ asset('public/mytheme/plugins/js/loadingoverlay.min.js') }}" ></script>
<script>

</script>
  <!--fetch ready devices-->
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
        
   $(document).ready(function () {
        
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
                
                
                
     });

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
            alert(data);
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
    //   var otpReceivedPrimaryKey = $("#otpPrimaryKeyID").val();
    //   var otpEncodedTxnID = $("#otpEncodeTxnID").val();
      var servicename = $("#servicename").val();
      var selectedDevice = $('#icaepskyc :selected').val();

      $.ajax({
        type: "POST",
        url: '{{ route('twofaaeps') }}',
        data: {  bioPIDData: scannedData, _token: "{{ csrf_token() }}",device: selectedDevice ,servicename :servicename},
        dataType: 'json',
        cache: false,
        success: function (data) {
          if (data.status == "success") {
              console.log(data.twofa_data.tefpkId);
                $("#successmessage").html(data.twofa_data.remark);
                document.getElementById("fingpayTransactionId").innerText = data.twofa_data.fingpaytxnId;
                document.getElementById("bankRrn").innerText = data.twofa_data.bankRrn;
                document.getElementById("tefpkId").innerText = data.twofa_data.tefpkId;
                  location.reload();
            // $("#otpPrimaryKeyID").val(data.primaryKeyID);
            // $("#otpEncodeTxnID").val(data.encodeTxnID);
            $('#modal-success').modal('show'); 
            $('#twofabutton').removeClass('btn-loading');
            $('#EKYCdiv').hide(); 
            $('#ekycstatus').show(); 
            
           
          
            window.location.reload();
          } else if(data.status == "failed"){
             
              webToast.Danger({ status: 'Failed !', message: data.message, delay: 3000, align: 'bottomright' });
                                $("#failedmessage").html(data.message);
                                $('#twofabutton').removeClass('btn-loading');
                                 $('#modal-danger').modal('show');   
          }else
          {
              
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
  
</body>

</html>