@extends('layouts.front')
@section('content')

<!--End header-->
  <!--start section Body-->
 
  <section class="secnewvideos secmostwatch">
     <div class="container">
     <div class="newvideos">
         <div class="pathpages">
             <a href="{{route('home',App()->getLocale())}}">
             <label>{{__('Home')}} /</label>
             </a>
             <a href="{{route('showwatchlater',App()->getLocale())}}">
             <label>{{__('Watch Later')}}</label>
            </a>
         </div>
         <div class="titlehead">
             <div><h3>{{__('Watch Later')}}</h3></div>
         </div>
         <div class="divbars divbarsstart">
             <div class="barone bar"></div>
             <div class="bartwo bar"></div>
             <div class="barthree bar"></div>
         </div>
        <div>
            <div class="paymentsuccess">
                <div> 
                 <span class="material-icons iconpayment">{{__('visibility_off')}}</span>
                 </div>
                <div>
                 <h4>{{__('You Don\'t Have Videos in watch Later')}}</h4>
                </div>
                <div>
                    <p class="pcartandpayment">{{__('You don\'t have videos in watch Later, you can go to browse videos and add it to your watch Later')}} </p>
                </div>
                <div>
                 <a href="#">
                     <a href="{{route('home',App()->getLocale())}}">
                      <button class="btnaddcartdetails btnbuydetails">{{__('Browse Videos')}}</button>
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