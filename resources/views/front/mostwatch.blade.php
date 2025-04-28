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
        <a href="{{route('mostwatch',App()->getLocale())}}">
        <label> {{__('Most Watch')}} </label>
        </a>
    </div>
    <div class="titlehead">
        <div><h3>{{__('Most Watch')}}</h3></div>
    </div>
    <div class="divbars divbarsstart">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
    <div class="row" id="post-data">
       @include('front.mostwatchData')
    </div>
    <div class="ajax-load text-center" style="display:none">
        <p><img src="{{asset('assets/front/img/loader.gif')}}"> Loading More Videos..</p>
    </div> 
</div>
</div>
</section>
@endsection