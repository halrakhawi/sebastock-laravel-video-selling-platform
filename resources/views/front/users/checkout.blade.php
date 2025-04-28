@extends('layouts.front')
@section('style')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@endsection
@section('content')
{{-- @dd((get_CurrentUrl().'/')) --}}
<div class="container" style="margin-top:30px">
           <div  class="pathpages">
                  <a href="{{route('home',App()->getLocale())}}">
                    <label>{{__('Home')}} /</label>
                    </a>
                    <a href="{{route('showcart',App()->getLocale())}}">
                    <label> {{__('Shopping Cart')}} /</label>
                    </a>
                   <a href="">
                    <label>  {{__('Payment')}} </label>
                    </a>
                </div>
                <div class="titlehead">
                  <div class="titlewithNumber">
                    <h3>{{__('Payment')}} </h3>
                    <!--<h3>({{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})</h3>-->
                  </div>
                </div>
                <div class="divbars divbarsstart">
                    <div class="barone bar"></div>
                    <div class="bartwo bar"></div>
                    <div class="barthree bar"></div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-12">
                         <ul class="nav nav-tabs ulpayment" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active aimg" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> 
                                <img src="{{asset('/assets/front/img/master.jpeg')}}" class="imgpayment" alt="">
                                <img src="{{asset('/assets/front/img/visa.jpeg')}}" class="imgpayment"  alt="">
                            </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link aimg aflex" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <img src="{{asset('/assets/front/img/paypal.jpeg')}}" class="imgpayment" alt=""> 
                              </a>
                            </li>
                </ul> 
                  <div class="tab-content" id="myTabContent">
          <!--<div class="row" style="align-items:center" >-->
         <div class="tab-pane fade show active masterandvisadetails" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="col-md-9">
           
            
            <form action="{{route('charge',App()->getLocale())}}" method="post" id="payment-form">
            @csrf
                <div class="">
                    <input type="hidden" name="amount" value="{{ $amount}}">
                    <label for="card-element" style="color: #707070; font-weight:bold; margin-bottom: 30px;">
                        {{__('Credit or debit card')}}
                    </label>
                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert">
                         @if(Session::has('message'))
                        {{ Session::get('message') }}
                        
                        @endif
                    </div>
                </div>
                <div id="card-errors" role="alert">
                    @if(Session::has('err'))
                   {{ Session::get('err') }}
                   
                   @endif
               </div>

                <button class="btnaddcartdetails btnbuydetails" style=" margin-top: 50px;">{{__('Submit Payment')}}</button>

                
                <p id="loading" style="display:none;">{{__('Payment is in process . please wait...')}}</p>
            </form>
            
           
        </div>
        <!--</div>-->
          
         
           </div>
          
    <div class="tab-pane fade masterandvisadetails" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container">
    <div class="row">    	
        <div class="col-md-8 col-md-offset-2">        	
            <div class="panel panel-default" style="margin-top: 60px;">

                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                {{Session::forget('success')}}
                @endif

                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ $message }}
                </div>
                {{Session::forget('error')}}
                @endif
                <div class="panel-heading"><p style="color: #707070; font-weight:bold; margin-bottom: 30px;">{{__('Pay with Paypal')}}</p></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label" style="color:#707070; padding-left:0px">{{__('Amount:')}}</label>

                            <div class="col-md-6"  style="padding-left:0px">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $amount }}" autofocus readonly>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4" style="padding-left:0px">
                                <button type="submit" class="btn btn-primary btnaddcartdetails btnbuydetails" style=" margin-top: 50px;">
                                    {{__('Pay with Paypal')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
       </div>
                    </div>
                    <div class="col-md-4 col-12">
                         <div class="col-md-3">
              <div class="divOrderSummary">
                  <h5>{{__('Order Summary')}}</h5>
                  <hr class="hrOrderSummary" style="margin-bottom:30px; margin-top:20px">
                   <p class="mb-4">
                {{__('Total Amount is')}} <strong> ${{ $amount}}</strong>
            </p>
              </div>
              
          </div>
                    </div>
                </div>
               
      
       
      
        </section>
         <!--End section Body-->


@endsection

@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    window.onload = function() {
             //var stripe = Stripe('pk_test_ODwPw8EOIaWvPBYB87dHOWgm00E1F3oX7b');
            var stripe = Stripe('pk_live_51HRS5zJZmzou6YLALuHcPNYJPwJgA5jUwAqM0ic2u00dLBsdaJnIB9vEdy7S0djEdPUydZD15CRLPhYlgeAVhjK900TUJcqIFn');
            var elements = stripe.elements();
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            var card = elements.create('card', {
                style: style
            });
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                var loading = document.getElementById('loading')
                loading.style.display = "block";
                form.submit();
            }
        }
</script>
<script>
      $(".tab").click(function (e) { 
       $(".tabcontent").removeClass("show");
        $(".tab").removeClass("active");
        $(this).addClass("active");
        $($(this).attr("href")).addClass("show");
    });
</script>
@endsection

         <!--{{-- <!--start section Body-->
        
         <!--<section class="secnewvideos secmostwatch">
         <!--   <div class="container">-->
         <!--   <div class="newvideos">-->
         <!--       <div  class="pathpages">-->
         <!--           <a href="index.html">-->
         <!--           <label>Home /</label>-->
         <!--           </a>-->
         <!--           <a href="Shopping Cart.html">-->
         <!--           <label> Shopping Cart /</label>-->
         <!--           </a>-->
         <!--           <a href="Payment.html">-->
         <!--           <label> Payment</label>-->
         <!--           </a>-->
         <!--       </div>-->
         <!--       <div class="titlehead">-->
         <!--           <div><h3>Billing Details</h3></div>-->
         <!--       </div>-->
         <!--       <div class="divbars divbarsstart">-->
         <!--           <div class="barone bar"></div>-->
         <!--           <div class="bartwo bar"></div>-->
         <!--           <div class="barthree bar"></div>-->
         <!--       </div>-->
         <!--       <section>-->
                    <!--<div class="row">-->
                    <!--    <div class="col-md-6 col-12">-->
                    <!--       <div class="row inputMarginbottom">-->
                    <!--           <div class="col-md-6 col-12">-->
                    <!--               <p class="pinputpayment">Contact Name</p>-->
                    <!--               <input type="text" class="inputPayment">-->
                    <!--           </div>-->
                    <!--           <div class="col-md-6 col-12">-->
                    <!--            <p class="pinputpayment">Country</p>-->
                    <!--            <select class=" js-states form-control">-->
                    <!--                <option></option>-->
                    <!--                <option>Palestine</option>-->
                    <!--                <option>Egypt</option>-->
                    <!--                <option>India</option>-->
                    <!--                <option>USA</option>-->
                    <!--              </select>-->
                    <!--        </div>-->
                    <!--       </div>-->
                    <!--       <div class="divAddressone inputMarginbottom">-->
                    <!--           <p class="pinputpayment">Address 1</p>-->
                    <!--           <input type="text"  class="inputPayment">-->
                    <!--       </div>-->
                    <!--       <div class="divAddresstwo inputMarginbottom">-->
                    <!--          <p class="pinputpayment">Address 2</p>-->
                    <!--          <input type="text"  class="inputPayment">-->
                    <!--        </div>-->
                    <!--        <div class="phone inputMarginbottom">-->
                    <!--            <p class="pinputpayment">Phone</p>-->
                    <!--            <input type="number"  class="inputPayment">-->
                    <!--        </div>-->
                    <!--        <div class="row inputMarginbottom">-->
                    <!--            <div class="col-md-4 col-12">-->
                    <!--                <p class="pinputpayment">State</p>-->
                    <!--                <div>-->
                    <!--                    <select class=" js-states form-control">-->
                    <!--                        <option></option>-->
                    <!--                        <option>Palestine</option>-->
                    <!--                        <option>Egypt</option>-->
                    <!--                        <option>India</option>-->
                    <!--                        <option>USA</option>-->
                    <!--                      </select>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div  class="col-md-4 col-12">-->
                    <!--                <p class="pinputpayment">City</p>-->
                    <!--                <div>-->
                    <!--                    <select class=" js-states form-control">-->
                    <!--                        <option></option>-->
                    <!--                        <option>Palestine</option>-->
                    <!--                        <option>Egypt</option>-->
                    <!--                        <option>India</option>-->
                    <!--                        <option>USA</option>-->
                    <!--                      </select>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div  class="col-md-4 col-12">-->
                    <!--                <p class="pinputpayment">Zip</p>-->
                    <!--                <input type="number"  class="inputPayment">-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <a href="#">-->
                    <!--            <div class="divpaymentsave">-->
                    <!--            <button class="btnaddcartdetails btnbuydetails">Save</button>-->
                    <!--            </div>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-6 col-12 flexOrderSummary">-->
                    <!--        <div class="divOrderSummary">-->
                    <!--            <h5>Order Summary</h5>-->
                    <!--            <div>-->
                    <!--                <p class="pPriceCart">Video Name 1:</p>-->
                    <!--                <label>13$</label>-->
                    <!--            </div>-->
                    <!--          <div>-->
                    <!--            <p class="pPriceCart">Video Name 2:</p>-->
                    <!--            <label>13$</label>-->
                    <!--          </div>-->
                    <!--            <hr class="hrOrderSummary">-->
                    <!--            <div>-->
                    <!--                <p class="pPriceCart">Total: </p>-->
                    <!--                <label>26$</label>-->
                    <!--              </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
         <!--           <hr>-->
         <!--           <div class="titlehead">-->
         <!--               <div><h3>Payment Methods</h3></div>-->
         <!--           </div>-->
         <!--           <div class="divbars divbarsstart">-->
         <!--               <div class="barone bar"></div>-->
         <!--               <div class="bartwo bar"></div>-->
         <!--               <div class="barthree bar"></div>-->
         <!--           </div>-->
                  <!--<div class="row">-->
                  <!--    <div class="col-md-6 col-12 divPaymentmethod">-->
                  <!--      <ul class="nav nav-tabs ulpayment" id="myTab" role="tablist">-->
                  <!--          <li class="nav-item">-->
                  <!--            <a class="nav-link active aimg" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> -->
                  <!--              <img src="img/mastercard.png" class="imgpayment" alt="">-->
                  <!--              <img src="img/visa.png" class="imgpayment"  alt="">-->
                  <!--          </a>-->
                  <!--          </li>-->
                  <!--          <li class="nav-item">-->
                  <!--            <a class="nav-link aimg aflex" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">-->
                  <!--              <img src="img/paypal.png" class="imgpayment" alt=""> -->
                  <!--            </a>-->
                  <!--          </li>-->
                  <!--        </ul>-->
                  <!--        <div class="tab-content" id="myTabContent">-->
                  <!--          <div class="tab-pane fade show active masterandvisadetails" id="home" role="tabpanel" aria-labelledby="home-tab">-->
                  <!--             <div>-->
                  <!--              <p class="pinputpayment">Card Number</p>-->
                  <!--             <input type="number" class="inputPayment">-->
                  <!--             </div>-->
                  <!--             <div class="row divexpiryandcvv">-->
                  <!--                 <div class="col-md-6 col-12">-->
                  <!--                  <div>-->
                  <!--                      <p class="pinputpayment">Expiry Date</p>-->
                  <!--                      <input type="month" class="inputPayment">-->
                  <!--                  </div>-->
                  <!--                 </div>-->
                  <!--                 <div class="col-md-6 col-12">-->
                  <!--                  <div>-->
                  <!--                      <p class="pinputpayment">CVV</p>-->
                  <!--                      <input type="text" class="inputPayment">-->
                  <!--                  </div>-->
                  <!--                 </div>-->
                  <!--             </div>-->
                  <!--              <div class="divsave">-->
                  <!--                  <input type="checkbox" class="checkbox">-->
                  <!--                  <p class="pinputpayment psave">Save Card for Next Time</p>-->
                  <!--              </div>-->
                  <!--              <a href="PaymentSuccessful.html">-->
                  <!--              <div class="divpaymentsave">-->
                  <!--                  <button class="btnaddcartdetails btnbuydetails">Finish</button>-->
                  <!--              </div>-->
                  <!--              </a>-->
                  <!--          </div>-->
                  <!--          <div class="tab-pane fade masterandvisadetails" id="profile" role="tabpanel" aria-labelledby="profile-tab">-->
                  <!--              <div>-->
                  <!--                  <p class="pinputpayment">Your Email</p>-->
                  <!--                 <input type="email" class="inputPayment">-->
                  <!--                 </div>-->
                  <!--                 <a href="#">-->
                  <!--                  <div class="divpaymentsave">-->
                  <!--                  <button class="btnaddcartdetails btnbuydetails  btnpaypal">Send</button>-->
                  <!--                  </div>-->
                  <!--              </a>-->
                  <!--          </div>-->
                  <!--        </div>-->
                  <!--    </div>-->
                  <!--    <div class="col-md-6 col-12"></div>-->
                  <!--</div>-->
         <!--       </section>-->
            </div>
            <!--start from here-->
        </div>
      