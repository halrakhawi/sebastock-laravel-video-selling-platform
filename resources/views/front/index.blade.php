@extends('layouts.front')
@section('content')
  <style>
       .video::-webkit-media-controls-fullscreen-button{
           display: inline-block !important;
           
       }
       .divAdvertisment{
            box-shadow: 2px 3px 4px #eee;
            height: 100px;
            border-radius: 8px;
            background: #eeee;
       }
   </style>  
   <div class="container">
        <div class="divAdvertisment">
            <a href="#">
                <img src="{{url('Seba/storage/advertisments/')}}/{{!empty(Session::get('adv1')->url) ? Session::get('adv1')->url:''}}" alt="Seba Ads" style="width: 100%; height:100%">
            </a>
        </div>
    </div>
        <!-- start Discount Section  -->
        @if(count($offers) != 0)
        <section class="secnewvideos secmostwatch">
            <div class="container">
            <div class="newvideos">
                <div class="titlehead">
                    <div><h3>{{__('Offers')}}</h3></div>
                    <a href="{{route('moreoffervideos',App()->getLocale())}}">
                   <div  class="divmore">
                    <label>{{__('More')}}</label>
                    <i class="fas fa-angle-right arrowEnglish"></i>
                    <i class="fas fa-chevron-left arrowArabic"></i>
                   </div>
                </a>
                </div>
                <div class="divbars divbarsstart">
                    <div class="barone bar"></div>
                    <div class="bartwo bar"></div>
                    <div class="barthree bar"></div>
                </div>
               
                <div class="row">
                    @foreach ($offers as $item)
                     
                    <div class=" col-lg-3 col-md-4 col-sm-6 col-12 ">

                      
                        <div class="boxvideo">
                            <div class="divvideo">
                                 <a href="{{route('videodetails',[$item->videos->id,App()->getLocale()])}}">
                           <video class="video" id="{{100100+$item->videos->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->videos->Videopicture}}" loop onmouseover="hover({{100100+$item->videos->id}})" onmouseout="mouselet({{100100+$item->videos->id}})" allowfullscreen>
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$item->videos->url}}" type="video/mp4">
                          </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--   <video class="video" id="{{$item->videos->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->videos->Videopicture}}">-->
                    <!--        <source src="{{url('Seba/storage/videos/watermark')}}{{$item->videos->url}}" type="video/mp4">-->
                    <!--      </video>-->
                        
                    <!--<div class='controls video-controls'>-->
                    <!--    <div style="display: flex">-->
                    <!--        <a class="control bt play" onclick="play_vid({{$item->videos->id}})" style="margin-right: 5px"></a>-->
                    <!--        <a class="control bt pause" onclick="pause_vid({{$item->videos->id}})" id="pause_button"></a>-->
                    <!--      </div> -->
                    <!--  <div class="timeline">-->
                    <!--     <div class="progress" id="p-{{$item->videos->id}}" ></div>-->
                    <!--  </div>-->
                   
                    <!--</div>-->
                    <!--</div>-->
                     </a>
                    <!--<div class="divimgwatermark">-->
                    <!--    <img src="{{asset('/assets/front/img/logo.png')}}" class="imgwatermark" alt="">-->
                    <!--  </div>-->
                            <div class="divcart ">
                                <div>
                                <i class="fas fa-shopping-cart iconcartcolor"></i>
                                </div>
                            </div>
                            {{-- <div class="modal fade" id="exampleModalLongaddtocart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Add Success</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="VideoandDetails row">
                                            <div class="col-md-6 col-12">
                                              <div>
                                                <video class="video VideoCart" controls allowfullscreen>
                                                    <source src="img/video2.mp4" type="video/mp4">
                                                </video>
                                              </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                              <div class="VideoDetailsCartmodal">
                                                  <div class="NameandDollarCart">
                                                    <div>
                                                        <p class="pVideoNameCart">Video Name</p>
                                                        <p class="pSellerNameCart">Seller Name</p>
                                                      </div>
                                                      <div>
                                                      <p class="pdollarCart" >13$</p>
                                                      </div>
                                                  </div>
                                                  <div class="divstars">

                                                    @for ($i=1;$i<=$item->videos->rating;$i++)
                                                    <div>
                                                      <i class="fas fa-star star"></i>
                                                  </div>
                                                    @endfor
                                                @for ($i=1;$i<=5-$item->videos->rating;$i++)
                                                <div>
                                                <i class="far fa-star star"></i>
                                                </div>
                                                @endfor
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="btncartmodal">
                                            <button data-dismiss="modal" aria-label="Close" class=" btnaddcartdetails btnbuydetails">Continue Shopping</button>
                                        </div>
                                        <div class="btncartmodal">
                                            <a href="Payment.html" target="_blank">
                                            <button class="btnaddcartdetails btnbuydetails">Go To Check</button>
                                            </a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          --}}
                            <div class="divcart" style="top:40px">
                                <a href="{{route('favorite',$item->videos->id)}}">
                                    <div>
                                        <i class="fas fa-heart iconcartcolor"></i>
                                    </div>
                                </a>
                            </div>
                        <div class="divcart" style="top:75px">
                            <a href="{{route('watchlater',[$item->videos->id,App()->getLocale()])}}">
                                <div>
                                    <i class="fas fa-clock iconcartcolor"></i>
                                </div>
                            </a>
                        </div>
                       </div>
                           <div class="divcontent">
                            <div class="flexcontent">
                                <div class="divimgandname">
                                    <div class="divimg">
                                    <img src="{{url('Seba/storage/profile')}}/{{$item->videos->seller->picture}}" class="imgseller" alt="seller img">
                                </div>
                                <div class="divnames">
                                    <a href="{{route('videodetails',[$item->videos->id,App()->getLocale()])}}">
                                    <h6 class="hname">{{$item->videos->name}}</h6>
                                    </a>
                                   <a href="{{route('sellerprofile',[$item->videos->seller->seller_id,App()->getLocale()])}}">
                                        <p class="pname">{{$item->videos->seller->seller_name}}</p>
                                    </a>
                                </div>
                                </div>
                                <div class="divdollar">
                                    <p class="pdollar pdiscount">{{$item->videos->price}}$</p>
                                    <p class="pdollar  ">{{$item->offerPrice}}$</p>

                                </div>
                            </div>
                            <div class="flexcontent">
                                <div class="videotype">
                                    <p class="pvideotype">{{$item->videos->cat->name}}</p>
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
                            </div>
                            <div class="flexcontent">
                                <div class="divicons">
                                    <i class="fas fa-clock icons"></i>
                                    <label class="lbl">{{__(timeInfo(now()->diffInHours($item->videos->created_at)))}}</label>
                                    <i class="fas fa-eye icons"></i>
                                     <label class="lbl">{{$item->videos->views}}</label>
                                     <i class="fas fa-hand-holding-usd icons"></i>
                                    <label class="lbl">{{$item->videos->sales}}</label>
                                    <i class="fas fa-share-alt icons"></i>
                                    <label class="lbl">{{$item->videos->share}}</label>
                                </div>
                            </div>
                           </div>
                        </div>
                    
                    </div>
                                        
                    @endforeach
                </div>
            </div>
            <!--start from here-->
        </div>
        </section>
        <hr>
        @endif
        <!-- End Discount Section -->
<section class="secnewvideos secmostwatch">
    <div class="container">
    <div class="newvideos">
        <div class="titlehead">
            <div><h3>{{__('New Videos')}}</h3></div>
            <a href="{{route('morenewvideos',App()->getLocale())}}">
           <div  class="divmore">
            <label>{{__('More')}}</label>
            <i class="fas fa-angle-right arrowEnglish"></i>
            <i class="fas fa-chevron-left arrowArabic"></i>
           </div>
        </a>
        </div>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
        <div class="row">
           
            @foreach ($newvideos as $item)
            @foreach ($cats as $cat )
            @if ($item->cat_id==$cat->id)

            {{-- @dd($item->seller) --}}
            <div class=" col-lg-3 col-md-4 col-sm-6 col-12 ">
              
                <div class="boxvideo">
                    <div class="divvideo">
                        <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">
                         <video class="video" id="{{now()->timestamp+$item->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->Videopicture}}"   onmouseover="hover({{now()->timestamp+$item->id}})" onmouseout="mouselet({{now()->timestamp+$item->id}})"  allowfullscreen>
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$item->url}}" type="video/mp4">
                          </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--    <video class="video" id="{{$item->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->Videopicture}}" loop onmouseover="this.play({{$item->id}})" onmouseout="this.pause();">-->
                    <!--        <source src="{{url('Seba/storage/videos/watermark')}}{{$item->url}}" type="video/mp4">-->
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
                       
                    <div class="divcart ">
                        <a href="{{route('addcart',[$item->id,App()->getLocale()])}}">
                        <div>
                        <i class="fas fa-shopping-cart iconcartcolor"></i>
                        </div>
                    </a>
                    </div>
                    {{-- <div class="modal fade" id="exampleModalLongaddtocart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Add Success</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="VideoandDetails row">
                                    <div class="col-md-6 col-12">
                                      <div>
                                        <video class="video VideoCart" loop onmouseover="hover({{$item->id}})" onmouseout="pause({{$item->id}})" disablePictureInPicture controlsList="nodownload" allowfullscreen>
                                            <source src="{{url('/storage/videos/')}}/{{$item->url}}" type="video/mp4">
                                        </video>
                                        <!--<div class="divimgwatermark">-->
                                        <!--    <img src="{{asset('/assets/front/img/logo.png')}}" class="imgwatermark" alt="">-->
                                        <!--  </div>-->
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                      <div class="VideoDetailsCartmodal">
                                          <div class="NameandDollarCart">
                                            <div>
                                                <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">
                                                    <p class="pVideoNameCart">{{$item->name}}</p>
                                                    </a>
                                                <p class="pSellerNameCart"></p>
                                              </div>
                                              <div>
                                              <p class="pdollarCart">{{$item->price}}$</p>
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
                                    </div>
                                    </div>
                                </div>
                                <div class="btncartmodal">
                                    <button data-dismiss="modal" aria-label="Close" class=" btnaddcartdetails btnbuydetails">Continue Shopping</button>
                                </div>
                                <div class="btncartmodal">
                                    <a href="Payment.html" target="_blank">
                                    <button class="btnaddcartdetails btnbuydetails">Go To Check</button>
                                    </a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div> --}}
                 
                        <div class="divcart" style="top:40px">
                            <a href="{{route('favorite',$item->id)}}">
                                <div>
                                    <i class="fas fa-heart iconcartcolor"></i>
                                </div>
                            </a>
                        </div>
                    <div class="divcart" style="top:75px">
                        <a href="{{route('watchlater',[$item->id,App()->getLocale()])}}">
                        <div>
                            <i class="fas fa-clock iconcartcolor"></i>
                        </div>
                    </a>
                    </div>
                   </div>
                   <div class="divcontent">
                    <div class="flexcontent">
                        <div class="divimgandname">
                            <div class="divimg">
                            <img src="{{url('Seba/storage/profile')}}/{{$item->picture}}" class="imgseller" alt="seller img">
                        </div>
                    </a>
                        <div class="divnames">
                            <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">
                                <h6 class="hname">{{$item->name}}</h6>
                            </a>
                          
                           <a href="{{route('sellerprofile',[$item->seller_id,App()->getLocale()])}}">
                                <p class="pname">{{$item->seller_name}}</p>
                            </a>
                        </div>
                        </div>
                        <div class="divdollar">
                            <p class="pdollar">{{$item->price}}$</p>
                        </div>
                    </div>
                    <div class="flexcontent">
                        <div class="videotype">
                            <p class="pvideotype">{{$cat->name}}</p>
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
                    </div>
                    <div class="flexcontent">
                        <div class="divicons">
                            <i class="fas fa-clock icons"></i>
                            <label class="lbl">{{__(timeInfo(now()->diffInHours($item->created_at)))}}</label>
                            <i class="fas fa-eye icons"></i>
                             <label class="lbl">{{$item->views}}</label>
                             <i class="fas fa-hand-holding-usd icons"></i>
                            <label class="lbl">{{$item->sales}}</label>
                            <i class="fas fa-share-alt icons"></i>
                            <label class="lbl">{{$item->share}}</label>
                        </div>
                    </div>
                   </div>
                </div>
            
            </div>
                            
            @endif
                
            @endforeach
            @endforeach
          

        </div>
    </div>
    <!--start from here-->
</div>
</section>
<hr>
{{-- @dd(url('Seba/storage/advertisments/')) --}}
{{-- @dd(Session::get('adv')->url) --}}
<div class="container">
        <div class="divAdvertisment">
            <a href="#">
                <img src="{{url('Seba/storage/advertisments/')}}/{{!empty(Session::get('adv2')->url) ? Session::get('adv2')->url:''}}" alt="Seba Ads" style="width: 100%; height:100%">
            </a>
        </div>
    </div>
<section class="secnewvideos">
    <div class="container">
    <div class="newvideos mostwatch">
      
        <div class="titlehead">
            <div><h3>{{__('Most Watch')}}</h3></div>
            <a href="{{route('mostwatch',App()->getLocale())}}">
           <div  class="divmore">
            <label>{{__('More')}}</label>
            <i class="fas fa-angle-right arrowEnglish"></i>
            <i class="fas fa-chevron-left arrowArabic"></i>
           </div>
        </a>
        </div>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
        <div class="row">
            {{-- @dd($mostwatch) --}}
            @foreach ($mostwatch as $item)
            @foreach ($cats as $cat )
            @if ($item->cat_id==$cat->id)
            <div class=" col-lg-3 col-md-4 col-sm-6 col-12 ">
                <div class="boxvideo">
                    <div class="divvideo">
                         <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">
                    <video class="video" id="{{$item->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->Videopicture}}" loop onmouseover="hover({{$item->id}})" onmouseout="mouselet({{$item->id}})" allowfullscreen>
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$item->url}}" type="video/mp4">
                          </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--    <video class="video" id="{{$item->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->Videopicture}}">-->
                    <!--        <source src="{{url('Seba/storage/videos/watermark')}}{{$item->url}}" type="video/mp4">-->
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
                    <div class="divcart ">
                        <div>
                        <i class="fas fa-shopping-cart iconcartcolor"></i>
                        </div>
                    </div>
                    {{-- <div class="modal fade" id="exampleModalLongaddtocart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Add Success</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="VideoandDetails row">
                                    <div class="col-md-6 col-12">
                                      <div>
                                        <video class="video VideoCart" loop onmouseover="hover({{$item->id}})" onmouseout="pause({{$item->id}})" disablePictureInPicture controlsList="nodownload" allowfullscreen>
                                            <source src="{{url('/storage/videos/')}}/{{$item->url}}" type="video/mp4">
                                        </video>
                                        <!--<div class="divimgwatermark">-->
                                        <!--    <img src="{{asset('/assets/front/img/logo.png')}}" class="imgwatermark" alt="">-->
                                        <!--  </div>-->
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                      <div class="VideoDetailsCartmodal">
                                          <div class="NameandDollarCart">
                                            <div>
                                                <p class="pVideoNameCart">{{$item->name}}</p>
                                                <p class="pSellerNameCart">{{$item->seller_name}}</p>
                                              </div>
                                              <div>
                                              <p class="pdollarCart">{{$item->price}}$</p>
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
                                    </div>
                                    </div>
                                </div>
                                <div class="btncartmodal">
                                    <button data-dismiss="modal" aria-label="Close" class=" btnaddcartdetails btnbuydetails">Continue Shopping</button>
                                </div>
                                <div class="btncartmodal">
                                    <a href="Payment.html" target="_blank">
                                    <button class="btnaddcartdetails btnbuydetails">Go To Check</button>
                                    </a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div> --}}
                 
                        <div class="divcart" style="top:40px">
                            <a href="{{route('favorite',$item->id)}}">
                                <div>
                                    <i class="fas fa-heart iconcartcolor"></i>
                                </div>
                            </a>
                        </div>
                    <div class="divcart" style="top:75px">
                        <a href="{{route('watchlater',[$item->id,App()->getLocale()])}}">
                            <div>
                                <i class="fas fa-clock iconcartcolor"></i>
                            </div>
                        </a>
                    </div>
                   </div>
                   <div class="divcontent">
                    <div class="flexcontent">
                        <div class="divimgandname">
                            <div class="divimg">
                            <img src="{{url('Seba/storage/profile')}}/{{$item->picture}}" class="imgseller" alt="seller img">
                        </div>
                        <div class="divnames">
                            <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">
                                <h6 class="hname">{{$item->name}}</h6>
                                </a>
                           <a href="{{route('sellerprofile',[$item->seller_id,App()->getLocale()])}}">
                                <p class="pname">{{$item->seller_name}}</p>
                            </a>
                        </div>
                        </div>
                        <div class="divdollar">
                            <p class="pdollar">{{$item->price}}$</p>
                        </div>
                    </div>
                    <div class="flexcontent">
                        <div class="videotype">
                            <p class="pvideotype">{{$cat->name}}</p>
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
                    </div>
                    <div class="flexcontent">
                        <div class="divicons">
                            <i class="fas fa-clock icons"></i>
                            <label class="lbl">{{__(timeInfo(now()->diffInHours($item->created_at)))}}</label>
                            <i class="fas fa-eye icons"></i>
                             <label class="lbl">{{$item->views}}</label>
                             <i class="fas fa-hand-holding-usd icons"></i>
                            <label class="lbl">{{$item->sales}}</label>
                            <i class="fas fa-share-alt icons"></i>
                            <label class="lbl">{{$item->share}}</label>
                        </div>
                    </div>
                   </div>
                </div>
            
            </div>
            @endif
                
            @endforeach
            @endforeach
           
        </div>
    </div>
    <!--start from here-->
</div>
</section>
<hr>
<section class="contact us">
  <div class="container">
     <div class="titlecontact">
         <h3>{{__('Contact Us')}}</h3>
     </div>
     <div class="divbars divbarsstart">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('user.contactus',App()->getLocale())}}" method="post">
        @csrf
     <div class="contactform row">
         <div class="col-lg-6 col-12">
         <div class="form">
             <div class="formNames">
                 <div class="row">
                 <div class="col-sm-6 col-12">
                     <input type="text" placeholder="{{__('Your Name')}}" class="inputform inputresponsive" name="name">
                 </div>
                    <div class="col-sm-6 col-12">
                    <input type="email" placeholder="{{__('Your Email')}}" class="inputform inputresponsive inputemail" name="email">
                 </div>
                </div>
             </div>
             <div class="formmsg">
                 <textarea placeholder="{{__('Type Your Message Here...')}}" class="inputmsg textarearesponsive" rows="10" name="msg"></textarea>
             </div>
             <div class="formbtn">
                 <button type="submit" class="btnsend">{{__('SEND')}}</button>
             </div>
         </div>
        </div>
         <div class="col-lg-6 col-12">
         <div class="divimgcontact">
             <img src="{{asset('assets/front/img/Asset 2.png')}}" class="imgcontact">
         </div>
        </div>
     </div>
    </form>
   
  </div>
</section>
    
@endsection