@extends('layouts.front')

@section('content')

<form action="{{route('front.postlogin',App()->getLocale())}}" method="post">
    @csrf
<div class="divmainFormlogin">
    <h2 class="hlogin">{{__('Login')}}</h2>
    <div class="divbars">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
  
    <p class="plogin">{{__('To Keep Connected with us Please Login with your Personal Info')}}</p>
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert" style="margin-left:40%; margin-right:40%"
                id="type-error">{{Session::get('error')}}
</div>
@endif
    <div class="divformlogin">
        <div>
        <input type="email" name="email" placeholder="{{__('Your Email')}}" class="inputform inputemail inputlogin ">
        </div>
        <div>
        <input type="password" name="password" placeholder="{{__('Your Password')}}" class="inputform inputlogin">
        </div>
        <a href="{{route('user.getEmail',App()->getLocale())}}">
        <div class="forgetpass">
            <div>
                <p class="pforget">{{__('Forget Your Password?')}}</p>
            </div>
        </div>
    </a>
        <!--a href="indexLogining.html" target="_blank"-->
        <div class="formbtn">
            <button class="btnsend btnformlogin">{{__('Login')}}</button>
        </div>
        </a>
        <div>
            <p class="psignup">{{__('Don\'t have account?')}} <a href="{{route('front.signup',App()->getLocale())}}"><span class="spansignup">{{__('Sign Up')}}</span></a></p>
        </div>
    </div>
  </div>
</form>
@endsection