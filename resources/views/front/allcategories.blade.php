<style>
    .page-item.active .page-link{
            z-index: 1;
    color: #fff !important;
    background-color: #A21B21 !important;
    border-color: #A21B21 !important;
    }
    .page-link{
        color: #A21B21 !important;
    }
</style>
@extends('layouts.front')
@section('content')
         <!--start section Body-->
        
         <section class="secnewvideos secmostwatch">
            <div class="container">
            <div class="newvideos">
                <div class="pathpages">
                    <a href="{{route('home',App()->getLocale())}}">
                    <label>{{__('Home')}} /</label>
                    </a>
                    <a href="{{route('allcategories',App()->getLocale())}}">
                    <label>{{__('All Categories')}}</label>
                    </a>
                </div>
                <div class="titlehead">
                    <div><h3>{{__('All Categories')}}</h3></div>
                </div>
                <div class="divbars divbarsstart">
                    <div class="barone bar"></div>
                    <div class="bartwo bar"></div>
                    <div class="barthree bar"></div>
                </div>
            </div>
            <!--start from here-->
        </div>
        <div class="container">
         <div class="row" id="post-data">
             @include('front.allcategoriesData')
        </div>
        <div class="ajax-load text-center" style="display:none">
            <p><img src="{{asset('assets/front/img/loader.gif')}}"> Loading More Videos..</p>
        </div> 
        </div>
 </section>
    

         <!--End section Body-->

@endsection