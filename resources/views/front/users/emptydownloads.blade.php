@extends('layouts.front')
@section('content')



<section class="secnewvideos secmostwatch">
    <div class="container">
    <div class="newvideos">
        <div class="pathpages">
            <a href="{{route('home',App()->getLocale())}}">
            <label>{{__('Home')}} /</label>
            </a>
            <a href="{{route('downloads',App()->getLocale())}}">
            <label>{{__('Downloads')}} </label>
           </a>
        </div>
        <div class="titlehead">
            <div><h3>{{__('Downloads')}}</h3></div>
        </div>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
       <div>
           <div class="paymentsuccess">
               <div>
                <span class="material-icons iconpayment"> file_download_off </span> 
                </div>
               <div>
                <h4>{{__('You Don\'t Have Videos in Downloads')}}</h4>
               </div>
               <div>
                   <p class="pcartandpayment">{{__('You don\'t have videos in downloads, you can go to buy videos')}} </p>
               </div>
               <div>
                <a href="#">
                    <a href="{{route('home',App()->getLocale())}}">
                     <button class="btnaddcartdetails btnbuydetails">{{__('Go To Shopping')}}</button>
                    </a>
                </a>
            </div>
           </div>
       </div>
    </div>
    <!--start from here-->
</div>
</section>



@endsection