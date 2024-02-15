
@extends('frontend.layout.main')

@section('main-container')


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/webToast.min.css')}}" rel="stylesheet"/>
   
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
   
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{url('frontend/dist/js/webToast.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{url('frontend/dist/js/webToast.js')}}"></script> -->

   
<table id="example" class="table table-striped" style="width:70%; margin-left: auto;margin-right: auto;">
        <thead>
          <tr>
      <th >SR No
      </th>
      <th >Name
      </th>
      <th >Email
      </th>
      <th >Created date
      </th>
      <th >Action
      </th>
    </tr>
        </thead>
        <tbody>
        <tbody>
    <?php $i=0;?>
  @foreach ($user as $item)
    <tr>
      <td>{{++$i}}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->created_at }}</td>
      <td>
          <!-- <a href="#" class="btn btn-primary btn-sm">Edit</a>
          <a href="#" class="btn btn-danger btn-sm">Delete</a> -->
          <form method="post">
            @csrf
          <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd" onclick='return check({{ $item->id }})'>
                  View
                </a>
</form>
       </td>
           
            </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
      <th >SR No
      </th>
      <th >Name
      </th>
      <th >Email
      </th>
      <th >Created date
      </th>
      <th >Action
      </th>
    </tr>
        </tfoot>
    </table>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                    <div class="offcanvas-header">
                        <h2 class="offcanvas-title" id="offcanvasEndLabel">Hello <span id="userNamelable"></span></h2>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="row" id="userRow">
                            <div class="col-6">
                                <span>Name</span><br>
                                <p id="userName"></p>
                            </div>
                            <div class="col-6">
                                <span>Email</span><br>
                                <p id="userEmail"></p>
                            </div>
</div>

                        <div class="mt-3">
                        <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                            Close 
                        </button>
                        </div>
                    </div>
                    </div>
                    
<script type='text/javascript'>

function check(id)
{
    //alert("kkkkk"+id);
    $.ajax({
        type: "POST",
        url: "{{route('getUserRenderView')}}",
        data: { 
            id: id,
            "_token": "{{ csrf_token() }}",
           
        },
        success: function(result) {
           // alert("success"+result);
          $("#userRow").html(result);
           
        },
        error: function(result) {
          //  alert("failed"+result);
             $("#offcanvasEnd").remove();
            webToast.Danger({
                            status:'Failed',
                            message:"No Record Found !",
                            delay:1000,
                            align:'bottomright'
                        });
                        window.location.replace(
                      '{{route("showUser")}}'
                     );
                
               
        }
    });
    return false;
}

</script>        
@endsection