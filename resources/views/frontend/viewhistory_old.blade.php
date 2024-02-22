@extends('frontend.layout.main')

@section('main-container')
<!-- Page body -->
      <div class="page-wrapper">
       
        <div class="page-body">
          <div class="container-xl d-flex flex-column justify-content-center">
 <!---body content --->

            <<body>
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
                        @foreach($columns as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportData as $row)
                        <tr>
                            @foreach($columns as $column => $displayName)
                                <td>{{ $row->$column }}</td>
                            @endforeach
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
     @endsection
    