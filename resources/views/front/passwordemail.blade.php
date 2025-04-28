@extends('layouts.front')
@section('content')

 <!--Start main-->
 <div class="divmainFormlogin">
    <h2 class="hlogin">Forget Password</h2>
    <div class="divbars">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
    <p class="plogin">Don't worry! Just fill your email and we'll send you a link to reset your password</p>
    <div class="divformlogin">
        <form action="{{route('user.postEmail')}}" method="post">
            @csrf
        <div>
        <input type="email" placeholder="Your Email" class="inputform inputemail inputlogin " name="email">
        </div>
      
        <div class="formbtn">
            <button type="submit" class="btnsend btnformlogin">Reset password</button>
        </div>
      
        <div>
            <p class="psignup">Back to <a href="{{route('login',App()->getLocale())}}"><span class="spansignup">Login</span></a></p>
        </div>
    </form>
    </div>
  </div>
 
  <!--End main-->

@endsection