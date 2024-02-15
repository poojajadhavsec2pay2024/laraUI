<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
   
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
<table id="example" class="table table-striped">
    <thead>
        <tr>
        <th>ID</th>
            <th>Name</th>
            <th>email</th>
            <th>dob</th>
            <th>img</th>
        </tr>
    </thead>
    <tbody>
    <tr>
      <td>{{$userData->id}}</td>
      <td>{{ $userData->name }}</td>
      <td>{{ $userData->email }}</td>
      <td>06/11/2022</td>
      <td><img src="{{url('j1.jpg')}}" alt="Flowers in Chania" width="100" height="100"></td>
    </tr>
       
    </tbody>
</table>
