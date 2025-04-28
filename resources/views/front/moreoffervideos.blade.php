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
        <a href="{{route('moreoffervideos',App()->getLocale())}}">
        <label> {{__('Offer Videos')}} </label>
        </a>
    </div>
    <div class="titlehead">
        <div><h3>{{__('Offer Videos')}}</h3></div>
    </div>
    <div class="divbars divbarsstart">
        <div class="barone bar"></div>
        <div class="bartwo bar"></div>
        <div class="barthree bar"></div>
    </div>
    <div class="row">
        @foreach ($moreoffervideos as $item)

        <div class=" col-lg-3 col-md-4 col-sm-6 col-12 ">

          
            <div class="boxvideo">
                <div class="divvideo">
                      <a href="{{route('videodetails',[$item->videos->id,App()->getLocale()])}}">
                    <video class="video" id="{{$item->videos->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->videos->Videopicture}}" loop onmouseover="hover({{$item->videos->id}})" onmouseout="mouselet({{$item->videos->id}})">
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$item->videos->url}}" type="video/mp4">
                          </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--    <video class="video" id="{{$item->videos->id}}" poster="{{url('profile')}}/{{$item->videos->Videopicture}}">-->
                    <!--        <source src="{{route('file1',$item->videos->url)}}" type="video/mp4">-->
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
                @auth
                <div class="divcart divalertcart">
                    <div>
                        <a href="{{route('addcart',[$item->id,App()->getLocale()])}}">
                    <i class="fas fa-shopping-cart iconcartcolor"></i>
                        </a>
                    </div>
                </div>
                @endauth
                   @guest
                <div class="divcart">
                    <div>
                        <a href="{{route('addcart',[$item->id,App()->getLocale()])}}">
                    <i class="fas fa-shopping-cart iconcartcolor"></i>
                        </a>
                    </div>
                </div>
                @endguest
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
                                    <video class="video VideoCart" controls>
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
                </div> --}}
             
                <div class="divcart divlove">
                    <a href="{{route('favorite',$item->videos->id)}}">
                        <div>
                            <i class="fas fa-heart iconcartcolor"></i>
                        </div>
                    </a>
                </div>
            <div class="divcart divnext">
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
</div>
</section>
@endsection