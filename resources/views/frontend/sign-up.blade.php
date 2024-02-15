<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign up - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{url('frontend/dist/css/tabler.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/tabler-payments.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/tabler-vendors.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/demo.min.css?1684106062')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="{{url('frontend/dist/js/demo-theme.min.js?1684106062')}}"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="{{url('frontend/dist/js/validetta-min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/dist/js/webToast.min.js')}}"></script>

    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{url('frontend/static/logo.svg')}}" height="36" alt=""></a>
        </div>
        <form class="card card-md" action="{{ route('store') }}" method="post" autocomplete="off" id="signUp_form" novalidate>
        @csrf  
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" placeholder="Enter name" name="name" id="name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" data-validetta="required,email">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" id="password" class="form-control"  placeholder="Password"  autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-check">
                <input type="checkbox" class="form-check-input"/>
                <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100" id="newAcc">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Already have account? <a href="{{url('/signIn')}}" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script>
    $(document).ready(function(){
         $('#signUp_form').validetta({
          
                display : 'inline',
                realTime :true,
                errorTemplateClass : 'validetta-inline',
                onValid : function( event ) {
                event.preventDefault();
                $.ajax({
                    url : "{{route('store')}}",
                    data : $("#signUp_form").serialize(),
                    type:'POST',
                    beforeSend : function(){
                        console.log('Started request !');
                        $("#newAcc").addClass("btn-loading");
                    }
                })
                .done(function(data){
                    console.log("done");
                    
                    var load=webToast.loading({
                        status:"Login Successful!",
                        message:"Redirecting to dashboard...",
                        align:'bottomright',
                        line:false
                    });
                    window.location.replace(
                      '{{route("dashboard")}}'
                     );
                })
                .fail(function(errors){
                    if(errors.status=="400") {
                        webToast.Danger({
                            status:'Failed',
                            message:errors.responseJSON.message,
                            delay:3000,
                            align:'bottomright'
                        });
                    }else{
                        webToast.Danger({
                            status:'Failed',
                            message:"Failed to process request, please try again",
                            delay:3000,
                            align:'bottomright'
                        });                        
                    }
                    $("#newAcc").removeClass("btn-loading");
                    window.location.replace(
                      '{{route("signUp")}}'
                     );
                })
                
                .always( function( result ){ console.log('Request done !!');
                //$("#btn2FA").removeClass("btn-loading");
            });
        }});
        
    });


    </script>
     </body>
</html>