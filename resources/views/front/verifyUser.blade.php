@extends('layouts.front')

@section('content')

<form action="{{route('front.postverifyUser',App()->getLocale())}}" method="post">
    @csrf
<div class="divmainFormlogin">
    <h2 class="hlogin">{{__('Verification Code')}}</h2>
    <div class="divbars">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
  
    <p class="plogin">{{__('To Keep Connected with us Please Enter your Verification Code arrived via email')}}</p>
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert" style="margin-left:40%; margin-right:40%"
                id="type-error">{{Session::get('error')}}
</div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success" style="margin-left:40%; margin-right:40%">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="divformlogin">
        <div>
        <input type="text" name="vCode" placeholder="{{__('Verification code')}}" class="inputform inputemail inputlogin ">
        </div>

        <!--a href="indexLogining.html" target="_blank"-->
        <div class="formbtn">
            <button class="btnsend btnformlogin">{{__('Confirm')}}</button>
        </div>
        </a>

    </div>
  </div>
</form>
@endsection