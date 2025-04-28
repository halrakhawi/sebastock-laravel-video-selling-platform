@extends('layouts.front')
@section('content')
  <style>
       .video::-webkit-media-controls-fullscreen-button{
           display: inline-block !important;
           
       }
   </style>   
         <!--start section Body-->
         <section class="secnewvideos secmostwatch">
            <div class="container">
            <div class="newvideos">
                <div  class="pathpages">
                  <a href="{{route('home',App()->getLocale())}}">
                    <label>{{__('Home')}} /</label>
                    </a>
                    <a href="{{route('showcart',App()->getLocale())}}">
                    <label> {{__('Shopping Cart')}} </label>
                    </a>
                   
                </div>
                <div class="titlehead">
                  <div class="titlewithNumber">
                    <h3> {{__('Shopping Cart')}}  </h3>
                    <h3>({{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})</h3>
                  </div>
                </div>
                <div class="divbars divbarsstart">
                    <div class="barone bar"></div>
                    <div class="bartwo bar"></div>
                    <div class="barthree bar"></div>
                </div>
                <section>
                    <div class="divbtnCart row" style="align-items:baseline" >
                        <div class="col-md-4 col-12">
                            <a href="{{route('home',App()->getLocale())}}">
                                <button class="btnaddcartdetails btnaddShoppingcartdetails ">{{__('Continue Shopping')}}</button>
                            </a>
                        </div>
                        <!-- <div  class="col-md-4 col-12">
                            <p class="ptotalVideos">Total Videos:</p>
                            <label class="lbltotalvideos">2</label>
                        </div> -->
                        <div  class="col-md-4 col-12">
                            <a href="#">
                                <a href="{{route('emptycart',App()->getLocale())}}" >
                                     <button class="btnaddcartdetails btnaddShoppingcartdetails "> {{__('Empty Cart')}}</button>
                                   
                                    </a>
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">{{__('Delete Confirmation')}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body" style="text-align: center;">
                                        <i class="far fa-times-circle closedelete"></i>
                                        <h4>{{__('Are You Sure?')}}</h4>
                                        <p class="pDelete">{{__('Do you really want to empty your cart? This process cannot be undone.')}}</p>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <button type="button" class="btn btn-danger">{{__('Empty')}}</button>
                                    </div>
                                    <!-- <div class="modal-footer">
                                    
                                    </div> -->
                                  </div>
                                </div>
                              </div>
                           </div>
                    </div>
                    <!--<div class="selectAll">-->
                    <!--   <input type="checkbox" class="checkbox">-->
                    <!--   <label class="lblselectall">Select All</label>-->
                    <!--</div>-->
                   
                    <div class="row">
                        @if($cart)
                        
                        <div class="col-md-6 col-12">
                            @foreach ($cart->items as $video )
                            @foreach ($veds as $item )
                                @if($item->id==$video['id'])
                                @if($video['offer']==1)
                                
                                <div class="checkboxCart">
                                  <!--<div>-->
                                  <!--  <input type="checkbox" class="checkbox">-->
                                  <!--</div>-->
                                  <div class="VideoandDetails row">
                                      <div class="col-md-6 col-12">
                                          <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">
                     <video class="video" id="{{$item->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->Videopicture}}" loop onmouseover="hover({{$item->id}})" onmouseout="pause({{$item->id}})">
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$item->url}}" type="video/mp4">
                          </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--    <video class="video VideoCart" id="{{$item->id}}" poster="{{url('profile')}}/{{$item->Videopicture}}">-->
                    <!--        <source src="{{route('file1',$item->url)}}" type="video/mp4">-->
                    <!--      </video>-->
                        
                    <!--<div class='controls video-controls'>-->
                    <!--    <div style="display: flex">-->
                    <!--        <a class="control bt play" onclick="play_vid({{$item->id}})" style="margin-right: 5px"></a>-->
                    <!--        <a class="control bt pause" onclick="pause_vid({{$item->id}})" id="pause_button"></a>-->
                    <!--      </div> -->
                    <!--  <div class="timeline">-->
                    <!--     <div class="progress" id="p-{{$item->id}}" ></div>-->
                    <!--  </div>-->
                   
                    <!--</div>-->
                    <!--</div>-->
                     </a>
                    <!--<div class="divimgwatermark">-->
                    <!--    <img src="{{asset('/assets/front/img/logo.png')}}" class="imgwatermark" alt="">-->
                    <!--  </div>-->
                                      </div>
                                      <div class="col-md-6 col-12">
                                        <div class="VideoDetailsCart">
                                            <div class="divclose">
                                             <i class="fas fa-times-circle" data-toggle="modal" data-target="#exampleModaldelete{{$item->id}}"></i>
                                            </div>
                                            <div class="modal fade" id="exampleModaldelete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{__('Delete Confirmation')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" style="text-align: center;">
                                                      <i class="far fa-times-circle closedelete"></i>
                                                      <h4>{{__('Are You Sure?')}}</h4>
                                                      <p class="pDelete">{{__('Do you really want to delete this video from your cart? This process cannot be undone.')}}</p>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <a href="{{route('deletevideofromcart',[$item->id,App()->getLocale()])}}" class="btn btn-danger">{{__('Delete')}}</a>
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                            <div class="NameandDollarCart">
                                              <div>
                                                  <p class="pVideoNameCart">{{$item->name}}</p>
                                                  <a href="ProfileSeller.html">
                                                  <p class="pSellerNameCart">{{$item->seller->seller_name}}</p>
                                                 </a>
                                                 </a>
                                                </div>
                                                <div >
                                                <p class="pdollarCart pdiscount">{{$item->price}}</p>
                                                </div>
                                                {{-- @dd($item->offer) --}}
                                                <div>
                                                  @foreach ( $item->offer as $offer)
                                                  <p class="pdollarCart " >{{$offer->offerPrice}}</p>
                                                  @endforeach
                                                </div>
                                            </div>
                                            <div class="divstars">
                                              @for ($i=1;$i<=$item->rating;$i++)
                                              <div>
                                                <i class="fas fa-star star"></i>
                                            </div>
                                              @endfor
                                              @for ($i=1;$i<=5-$item->rating;$i++)
                                              <div>
                                              <i class="far fa-star star"></i>
                                              </div>
                                              @endfor
                                              </div>
                                              {{-- @dd($cart->items['offer']) --}}
                                              @foreach ( $item->offer as $offer)
                                              @if (isset($item->offer))
                                              
                                              
                                              <a href="{{route('checkout',[$offer->offerPrice,App()->getLocale()])}}">
                                                <div class="divbtnlogin btnbuyCart">
                                                  <button class="btn btnlogin ">{{__('Buy Now')}}</button>
                                              </div>
                                              </a>
                                           
                                                {{-- @elseif (!isset($item->offer)) --}}
                                                {{-- {{$video->offer}} --}}
                                                {{-- <a href="{{route('checkout',[$item->price,App()->getLocale()])}}">
                                                  <div class="divbtnlogin btnbuyCart">
                                                      <button class="btn btnlogin ">{{__('Buy Now')}}</button>
                                                  </div>
                                              </a> --}}
                                              @endif
                                              @endforeach
                                      </div>
                                      </div>
                                  </div>
                              </div>
                              <hr>
                              @else
                            <div class="checkboxCart">
                                <!--<div>-->
                                <!--  <input type="checkbox" class="checkbox">-->
                                <!--</div>-->
                                <div class="VideoandDetails row">
                                    <div class="col-md-6 col-12">
                                        <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">
                    <video class="video" id="{{$item->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->Videopicture}}" loop onmouseover="hover({{$item->id}})" onmouseout="pause({{$item->id}})">
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$item->url}}" type="video/mp4">
                          </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--    <video class="video VideoCart" id="{{$item->id}}" poster="{{url('profile')}}/{{$item->Videopicture}}">-->
                    <!--        <source src="{{route('file1',$item->url)}}" type="video/mp4">-->
                    <!--      </video>-->
                        
                    <!--<div class='controls video-controls'>-->
                    <!--    <div style="display: flex">-->
                    <!--        <a class="control bt play" onclick="play_vid({{$item->id}})" style="margin-right: 5px"></a>-->
                    <!--        <a class="control bt pause" onclick="pause_vid({{$item->id}})" id="pause_button"></a>-->
                    <!--      </div> -->
                    <!--  <div class="timeline">-->
                    <!--     <div class="progress" id="p-{{$item->id}}" ></div>-->
                    <!--  </div>-->
                   
                    <!--</div>-->
                    <!--</div>-->
                     </a>
                    <!--<div class="divimgwatermark">-->
                    <!--    <img src="{{asset('/assets/front/img/logo.png')}}" class="imgwatermark" alt="">-->
                    <!--  </div>-->
                                    </div>
                                    <div class="col-md-6 col-12">
                                      <div class="VideoDetailsCart">
                                          <div class="divclose">
                                           <i class="fas fa-times-circle" data-toggle="modal" data-target="#exampleModaldelete{{$item->id}}"></i>
                                          </div>
                                          <div class="modal fade" id="exampleModaldelete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">{{__('Delete Confirmation')}}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body" style="text-align: center;">
                                                    <i class="far fa-times-circle closedelete"></i>
                                                    <h4>{{__('Are You Sure?')}}</h4>
                                                    <p class="pDelete">{{__('Do you really want to delete this video from your cart? This process cannot be undone.')}}</p>
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                                                  <a href="{{route('deletevideofromcart',[$item->id,App()->getLocale()])}}" class="btn btn-danger">{{__('Delete')}}</a>
                                                </div>
                                                <!-- <div class="modal-footer">
                                                
                                                </div> -->
                                              </div>
                                            </div>
                                          </div>
                                          <div class="NameandDollarCart">
                                            <div>
                                                <p class="pVideoNameCart">{{$item->name}}</p>
                                                <a href="ProfileSeller.html">
                                                <p class="pSellerNameCart">{{$item->seller->seller_name}}</p>
                                               </a>
                                               </a>
                                              </div>
                                              <div>
                                              <p class="pdollarCart">{{$item->price}}</p>
                                              </div>
                                              {{-- @dd($item->offer) --}}
                                              {{-- <div>
                                                @if (isset($item->offer))
                                                @foreach ( $item->offer as $offer)
                                                <p class="pdollarCart">{{$offer->offerPrice}}</p>
                                                @endforeach
                                                @endif
                                              </div> --}}
                                          </div>
                                          <div class="divstars">
                                            @for ($i=1;$i<=$item->rating;$i++)
                                            <div>
                                              <i class="fas fa-star star"></i>
                                          </div>
                                            @endfor
                                            @for ($i=1;$i<=5-$item->rating;$i++)
                                            <div>
                                            <i class="far fa-star star"></i>
                                            </div>
                                            @endfor
                                            </div>
                                            {{-- @dd($cart->items['offer']) --}}
                                            {{-- @foreach ( $item->offer as $offer)
                                            @if (isset($item->offer))
                                            
                                            
                                            <a href="{{route('checkout',[$offer->offerPrice,App()->getLocale()])}}">
                                              <div class="divbtnlogin btnbuyCart">
                                                <button class="btn btnlogin ">{{__('Buy Now')}}</button>
                                            </div>
                                            </a> --}}
                                         
                                              {{-- @elseif (!isset($item->offer)) --}}
                                              {{-- {{$video->offer}} --}}
                                              <a href="{{route('checkout',[$item->price,App()->getLocale()])}}">
                                                <div class="divbtnlogin btnbuyCart">
                                                    <button class="btn btnlogin ">{{__('Buy Now')}}</button>
                                                </div>
                                            </a>
                                            {{-- @endif
                                            @endforeach --}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @endif
                            @endforeach
                            @endforeach

                         @else
                        <p>There are no items in cart</p>
                        @endif
                        
                        </div>
                        <div class="col-md-6 col-12 flexOrderSummary">
                            <div class="divOrderSummary">
                                <h5>{{__('Order Summary')}}</h5>
                                <p class="pPriceCart">{{__('Price')}}:</p>
                                <label>{{$cart->totalPrice}}$</label>
                                <hr class="hrOrderSummary">
                               
                                    <button class="btnaddcartdetails ">{{__('Buy')}} ({{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})</button>
                              
                                <a href="{{route('checkout',[$cart->totalPrice,App()->getLocale()])}}">
                                    <button class="btnaddcartdetails btnbuydetails">{{__('Buy Now')}}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!--start from here-->
        </div>
        </section>
    

         <!--End section Body-->

@endsection