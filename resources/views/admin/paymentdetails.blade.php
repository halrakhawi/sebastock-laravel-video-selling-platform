@extends('layouts.admin')
@section('content')
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
      <li class="breadcrumb-item "><a href="{{route('admin.payments',App()->getLocale())}}">{{__('Payments')}}</a></li>
      <li class="breadcrumb-item active">{{__('Payments Details')}}</li>

      </ul>
      </div>
      {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
      <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>
      </div> --}}
      </div>
      </div>
      <div class="row" >
        <div class="col-lg-12">
          <div class="card">
            
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">{{__('Payments Details')}}</h3>
            </div>                     
          </div>
        </div>                
      </div>
                      {{-- <div class="view_payement"> 
                        <div class="colseicon">
                          <i class="far fa-times-circle colse"></i>
                        </div>
                        <br> --}}
                        <div class="hero_div" style="padding:30px; width:60%">
                          <div class="pay_div" style="display:flex; justify-content:space-between">
                            <h5 class="intro-pay" style="color:#707070; margin-right:20px">{{__('ID')}}</h5>
                            <p class="txt-pay">{{$payment->seller_id}}</p>
                          </div>
                          <div class="pay_div"  style="display:flex; justify-content:space-between">
                            <h5 class="intro-pay" style="color:#707070; margin-right:20px">{{__('Name')}}</h5>
                            <p class="txt-pay">{{$payment->seller->seller_name}}</p>
                          </div>
                  
                          <div class="pay_div"  style="display:flex; justify-content:space-between">
                            <h5 class="intro-pay" style=" color:#707070; margin-right:20px">{{__('Email')}}</h5>
                            <p class="txt-pay">{{$payment->seller->email}}</p>
                          </div>
                  
                          <div class="pay_div"  style="display:flex; justify-content:space-between">
                            <h5 class="intro-pay" style="color:#707070; margin-right:20px">{{__('Date & time')}}</h5>
                            <p class="txt-pay">{{$payment->created_at}}</p>
                          </div>
                          <div class="pay_div"  style="display:flex; justify-content:space-between" >
                            <h5 class="intro-pay" style="color:#707070 ; margin-right:20px">{{__('State')}}</h5>
                            <div>
                              @if ($payment->state=='proceed')
                              <i class="fas fa-circle circle" style="color: green;"></i>
                              @elseif ($payment->state=='on hold')
                              <i class="fas fa-circle circle" style="color: yellow;"></i>
                              @else
                              <i class="fas fa-circle circle" style="color: red;"></i>
                              @endif
                            <p class="txt-pay" style="float: right;">{{__($payment->state)}}</p>
                          </div s>
                          </div>
                  
                          <div class="pay_div"  style="display:flex; justify-content:space-between">
                            <h5 class="intro-pay" style="color:#707070; margin-right:20px">{{__('Amount')}}</h5>
                            <p class="txt-pay">{{$payment->seller->balance}} $</p>
                          </div>
                  
                          <div class="pay_div"  style="display:flex; justify-content:space-between">
                            <h5 class="intro-pay" style="color:#707070; margin-right:20px">{{__('Paypal Account')}}</h5>
                            <p class="txt-pay">{{$payment->seller->account}}</p>
                          </div>
                  
                          <div class="pay_div"  style="display:flex; justify-content:space-between">
                            <h5 class="intro-pay" style="color:#707070; margin-right:20px">{{__('Description')}}</h5>
                            <p class="txt-pay">The process of paying for an advertisement</p>
                          </div>
                          @if($payment->state=='proceed')
                          <div class="actiondiv2" style="margin-bottom: 5px;">
                            <form action="{{route('admin.canceledpayments',[$payment->seller_id,$payment->id])}}" method="post">
                              @csrf
                              <button type="submit" class="continuedetelet" >Complete</button>
                             
                         </div>
                       
                        </div>
                      {{-- </div>  --}}
                      <hr>
                      <div class="hero_div" style="display: flex; align_items:center; padding:30px" >
                        <div>
                        <p style="margin-bottom: 0px" >Enter the amount you want to transfer to this seller</p>
                        </div>
                        <div style="margin-left:20px">
                        <input type="text" name="transferamount" placeholder="Transfer Amount" style="border:1px solid #b9b6b6; padding:5px">    
                        </div>
                      </div>
                      @endif
                    </form> 
@endsection