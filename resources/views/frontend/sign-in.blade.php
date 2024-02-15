
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{url('frontend/dist/css/tabler.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/tabler-payments.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/tabler-vendors.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/demo.min.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/custom.css?1684106062')}}" rel="stylesheet"/>
    <link href="{{url('frontend/dist/css/webToast.min.css')}}" rel="stylesheet"/>
   
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
    <!-- <script type="text/javascript" src="{{url('frontend/dist/js/webToast.js')}}"></script> -->


    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{url('frontend/static/logo.svg')}}" height="36" alt=""></a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form action="{{ route('checkUser') }}" method="post" autocomplete="off" id="signIn_form">
            @csrf  
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email"  name="email" id="email" class="form-control" placeholder="your@email.com" autocomplete="off" data-validetta="required,email">
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                  <span class="form-label-description">
                    <a href="./forgot-password.html">I forgot password</a>
                  </span>
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" name="password" id="password" class="form-control"  placeholder="Your password"  autocomplete="off" data-rule="Password: required; length(1~5)" data-tip="Please fill in at least eight characters">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                    </a>
                  </span>
                </div>
              </div>
              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" class="form-check-input"/>
                  <span class="form-check-label">Remember me on this device</span>
                </label>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100" id="btn2FA">Sign in</button>
              </div>
            </form>
          </div>
          <div class="hr-text">or</div>
          <div class="card-body">
            <div class="row">
              <div class="col"><a href="#" class="btn w-100">
                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                  Login with Github
                </a></div>
              <div class="col"><a href="#" class="btn w-100">
                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                  Login with Twitter
                </a></div>
            </div>
          </div>
        </div>
        <div class="text-center text-muted mt-3">
          Don't have account yet? <a href="{{url('/signUp')}}" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>
    <script>
//         $("#signIn_form").submit(function(e){
//          e.preventDefault();

//         var all = $(this).serialize();
// alert('kkkk');
// alert(all);
//         $.ajax({
//             url:  $(this).attr('action'),
//             type: "POST",
//             data: all,
//             beforeSend:function(){
//                 $(document).find('span.error-text').text('');
//             },
//             //validate form with ajax. This will be communicating  with your LoginController
//             success: function(data){
//                 if (data.status==0) {
//                     $.each(data.error, function(prefix, val){
//                         $('span.'+prefix+'_error').text(val[0]);
//                     });
//                 }
//                // redirect the user to [another page] if the  login cred are correct. Remember this is  communicating with the LoginController which we  are yet to create
//                 if(data == 1){
//                     window.location.replace(
//                      '{{route("dashboard")}}'
//                     );
//                 }else if(data == 2){
//                  // Show the user authentication error if the  login cred are invalid. Remember this is communicating with the LoginController which we are yet to create
//                     $("#show_error").hide().html("Invalid login  details");
//                 }

//             }
//             })

//         });
$(document).ready(function(){
         $('#signIn_form').validetta({
                display : 'inline',
                realTime :true,
                errorTemplateClass : 'validetta-inline',
                onValid : function( event ) {
                event.preventDefault();
                $.ajax({
                    url : "{{route('checkUser')}}",
                    data : $("#signIn_form").serialize(),
                    type:'POST',
                    beforeSend : function(){
                        console.log('Started request !');
                        $("#btn2FA").addClass("btn-loading");
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
                    $("#btn2FA").removeClass("btn-loading");
                    window.location.replace(
                      '{{route("signIn")}}'
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