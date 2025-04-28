@extends('layouts.front')
@section('content')

  
<section class="secnewvideos secmostwatch">
    <div class="container">
    <div class="newvideos">
        <div class="pathpages">
            <a href="{{route('home',App()->getLocale())}}">
            <label>{{__('Home')}} /</label>
            </a>
            <a href="{{route('showcart',App()->getLocale())}}">
            <label> {{__('Shopping Cart')}} </label>
           </a>
        </div>
        <div class="titlehead">
            <div><h3>{{__('Shopping Cart')}}</h3></div>
        </div>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
       <div>
           <div class="paymentsuccess">
               <div> 
                <span class="material-icons iconpayment">remove_shopping_cart</span>
                </div>
               <div>
                <h4>{{__('Your Cart Empty')}}</h4>
               </div>
               <div>
                   <p class="pcartandpayment">{{__('Your cart is empty, you can go shopping and add videos to your cart')}}</p>
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