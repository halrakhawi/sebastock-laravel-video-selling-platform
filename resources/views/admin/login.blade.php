<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEBA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{asset('/assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('/assets/admin/css/fontastic.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="{{asset('/assets/admin/css/style.default.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/admin/css/custom.css') }}">
    <link rel="shortcut icon" href="{{asset('/assets/admin/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{asset('/assets/admin/css/all.css') }}">
    <link rel="stylesheet" href="{{asset('/assets/admin/css/media.css') }}">
    <link rel="stylesheet" href="{{asset('/assets/admin/js/function.js')}}">
    <link rel="stylesheet" href="{{asset('/assets/admin/js/function.js')}}">
    <script type="text/JavaScript" 
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
    </script>
 
  </head>
  <body>

<div class="login_div">     
    <div class="context ">
    
            <div class="form_ADMin" >
                <div class="left_login">
                    <div class="logo-login">
                        <img src="{{asset('/assets/admin/img/logo.png')}}" class="logo_login">
                    </div>
					 <form action="{{route('admin.postlogin',App()->getLocale())}}" method="post">
                        @csrf
                    <div class="form_login">
                        <div class="user_login">
                            <input type="text" class="input_login" name="email" id="email"
                             placeholder="Enter user name">
                        </div>

                        <div class="user_login">
                            <input type="password" class="input_login" name="password" id="password"
                             placeholder="Enter your password">
                        </div>

                        <div class="remember-div">
                            <div class="left_remember">
                                <input type="checkbox" class="check_rem">
                                <p class="remmembertxt">Remember me</p cl>
                            </div>
                            <div class="forget_div">
                               <a href="#"> <p class="forgettxt">Forget password?</p></a>
                            </div>

                        </div>

                        <Div class="login_btnDIv">
                            <button class="btn_Login">Login</button>
                        </Div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    </div>
					   </form>
                </div>
            </div>
    </div>
 
<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    </div >


</div>
<!-- JavaScript files-->
    <script src="{{asset('/assets/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/admin/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/assets/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/assets/admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/assets/admin/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/charts-home.js')}}"></script>
    <script src="{{asset('/assets/admin/js/function.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('/assets/admin/js/front.js')}}"></script>
  </body>
</html>