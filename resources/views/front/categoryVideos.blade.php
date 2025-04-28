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
            <a href="{{route('home',App()->getLocale())}}">
            <label> Categories / </label>
            </a>
            <a href="#">
            <label> {{(categoryName(request()->route()->parameters['id'])[0]->name)}} </label>
            </a>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
        <div class="row" id="post-data">
            @include('front.categoryvideosData')
        </div>
        <div class="ajax-load text-center" style="display:none">
            <p><img src="{{asset('assets/front/img/loader.gif')}}"> Loading More Videos..</p>
        </div> 
@endsection