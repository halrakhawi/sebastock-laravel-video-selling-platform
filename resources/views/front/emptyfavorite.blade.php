@extends('layouts.front')
@section('content')

<section class="secnewvideos secmostwatch">
    <div class="container">
    <div class="newvideos">
        <div class="pathpages">
            <a href="{{route('home',App()->getLocale())}}">
            <label>{{__('Home')}} /</label>
            </a>
            <a href="">
            <label>{{__('Favorite')}} </label>
           </a>
        </div>
        <div class="titlehead">
            <div><h3>{{__('Favorite')}}</h3></div>
        </div>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
       <div>
           <div class="paymentsuccess">
               <div> 
                <span class="material-icons iconpayment"> favorite_border </span>
                </div>
               <div>
                <h4>{{__('You Don\'t Have Videos in Favorite')}}</h4>
               </div>
               <div>
                   <p class="pcartandpayment">{{__('You don\'t have videos in favorite, you can go to browse videos and add it to your favorite')}}</p>
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