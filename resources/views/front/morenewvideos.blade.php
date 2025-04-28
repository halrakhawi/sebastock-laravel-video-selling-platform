@extends('layouts.front')
@section('content')
  <style>
       .video::-webkit-media-controls-fullscreen-button{
           display: inline-block !important;
           
       }
   </style>   
<section class="secnewvideos secmostwatch">
    <div class="container">
<div class="newvideos">
    <div class="pathpages">
        <a href="{{route('home',App()->getLocale())}}">
        <label>{{__('Home')}} /</label>
        </a>
        <a href="{{route('morenewvideos',App()->getLocale())}}">
        <label> {{__('New Videos')}} </label>
        </a>
    </div>
    <div class="titlehead">
        <div><h3>{{__('New Videos')}}</h3></div>
    </div>
    <div class="divbars divbarsstart">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
    <div class="row" id="post-data">
      @include('front.newvideosData')
    </div>
    <div class="ajax-load text-center" style="display:none">
        <p><img src="{{asset('assets/front/img/loader.gif')}}"> Loading More Videos..</p>
    </div>
            {{-- <div class="container" style="margin-top:20px;">
      <div class="row">
     <div class="col-sm-12 col-md-12" style="display: flex; justify-content: center;">
      <div class="pagination" id="example_paginate" >
                  {{$morenewvideos->links() }}
        </div>
        </div>
        </div>
        </div> --}}
</div>
</div>
</section>
@endsection