@extends('layouts.front')
@section('content')

  <!--Start main-->
  <div class="divmainFormlogin">
    <h2 class="hlogin">{{__('Forget Password')}}</h2>
    <div class="divbars">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
    <p class="plogin">{{__('Don't worry! Just fill your email and we'll send you a link to reset your password')}}</p>
    <div class="divformlogin">
        <form action="{{route('user.postEmail')}}" method="post">
        <div>
        <input type="email" placeholder="{{__('Your Email')}}" class="inputform inputemail inputlogin " name="email">
        </div>
        </form>
      
        <div class="formbtn">
            <button class="btnsend btnformlogin">{{__('Reset password')}}</button>
        </div>
      
        <div>
            <p class="psignup">{{__('Back to')}}<a href="{{route('login',App()->getLocale())}}><span class="spansignup">{{__('Login')}}</span></a></p>
        </div>
    </div>
  </div>
 
  <!--End main-->

@endsection