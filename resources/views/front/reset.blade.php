@extends('layouts.front')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="">
               <h2 class="hlogin">{{__('Reset Password')}}</h2>
    <div class="divbars">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
                     <div class="card-body">
                         <form method="POST" action="{{route('user.resetpassword')}}">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
                       <div class="form-group row"  style="justify-content:center">
                           <!--<label for="email" class="col-md-4 col-form-label text-md-right"></label>-->
                         <div class="col-md-6">
                               <input  placeholder="{{__('Your Email')}}" id="email" type="email" class="inputform inputemail  form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus style="width:100%">
                               @error('email')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>

                       <div class="form-group row" style="justify-content:center">
                           <!--<label for="password" class="col-md-4 col-form-label text-md-right"></label>-->
                           <div class="col-md-6">
                               <input id="password" placeholder="{{__('Password')}}"  type="password" class="inputform inputemail  form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" style="width:100%">

                               @error('password')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>

                       </div>

                     <div class="form-group row"  style="justify-content:center">
                           <!--<label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>-->
                           <div class="col-md-6">
                               <input id="password-confirm" placeholder="{{__('Confirm Password')}}" type="password" class="form-control inputform inputemail " name="password_confirmation" autocomplete="new-password" style="width:100%">
                           </div>
                       </div>

                    <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                               <button type="submit" class="btnsend btnformlogin">
                                  {{__('Reset Password')}}
                               </button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>


@endsection