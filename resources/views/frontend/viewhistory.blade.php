@extends('frontend.layout.main')

@section('main-container')
<link href="{{url('frontend/dist/css/webToast.min.css')}}" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<!-- Page body -->
      <div class="page-wrapper">
       
        <div class="page-body">
          <div class="container-xl d-flex flex-column justify-content-center">
 <!---body content --->

            <body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Example</h2>
                </div>
                <div class="pull-right mb-2">
                 
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
                    <thead>
                <tr>
                    @foreach($selectedColumns as $column)
                        <th>{{ $customColumnNames[$column] }}</th>
                    @endforeach
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportData as $row)
                    <tr>
                        @foreach($selectedColumns as $column)
                            <td><input type="hidden" id="{{$column}}" value="{{ $row->refno2 }}"> {{ $row->$column }}</td>
                            
                        @endforeach
                        <td>
                           <a id="btn-roleinfo" class="btn btn-outline-info rounded-pill" onclick="getstatus('{{ $row->refno2 }}')">Check Status</a>
                           
                        </td>
                    </tr>
                    

                @endforeach
            </tbody>

        </table>
       
    </div>
</body>
<!---body content end --->
            </div>
          </div>
        </div>
     <!---page body end --->
     <script>
         function getstatus(ipayId){
                
                //alert('kkkkk'+ipayId);
                    $("#btn-roleinfo").addClass('btn-loading');
                    $.ajax({
                    type: 'POST', // The HTTP method to use
                    url: "{{route('fetchTransactionStatus')}}",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, // The URL of the controller action to call
                    data: {
                        ipayId:ipayId,
                       
                    },
                    success: function (data) {
                        //alert(data.data);
                        if (data.act == "CONTINUE") {
                                if (data.apistatus == "TRANSFER_SUCCESSFUL") {
                                   
                                    webToast.Success({ status: 'Success', message:data.message , delay: 8000, align: 'bottomright' });
                                }
                            
                        }else if(data.act == "TERMINATE"){
                            webToast.Danger({ status: 'Failed', message: data.message , delay: 3000, align: 'bottomright' });
                            
                        }else{
                            webToast.Danger({ status: 'Failed', message: data.message , delay: 3000, align: 'bottomright' });
                           
                        }
                        
                        $("#btn-roleinfo").removeClass('btn-loading');
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if(jqXHR.responseJSON.message != undefined && jqXHR.status ==400) {
                            var msg=jqXHR.responseJSON.message;
                        }else{
                            var msg="Something went wrong ("+ jqXHR.status +")";
                        }
                        webToast.Danger({ status: 'Failed', message: msg, delay: 3000, align: 'bottomright' });
                        $("#loadingIcon").addClass("d-none");
                        $("#btn-roleinfo").removeClass('btn-loading');
                    }
                });
        }
     </script>
     @endsection
    