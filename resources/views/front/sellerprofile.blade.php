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
            <a href="{{route('sellerprofile',[request()->route()->id,App()->getLocale()])}}">
            <label>{{__('Profile Seller')}}</label>
            </a>
        </div>
        <div class="titlehead">
            <div><h3>{{__('Profile')}}</h3></div>
        </div>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
        <!-- start profile -->
        <div class="row">
          
            <div class="col-lg-4 col-12">
                <div class="cardprofileSeller">
                    <div class="insidecardProfileSeller">
                        <div class="relativeimg">
                            <img src="{{url('Seba/storage/profile')}}/{{$profile->picture}}" class="imgsellerprofile">
                        </div>
                    </div>
                    <div>
                        <p class="pnameprofile pprofile">{{$profile->seller_name}}</p>
                        <p class="pprofile">{{$profile->email}}</p>
                    </div>
                    <div class="divstars divstarsSeller">
                        <div>
                            <i class="fas fa-star star"></i>
                        </div>
                        <div>
                            <i class="fas fa-star star"></i>
                        </div>
                        <div> 
                            <i class="fas fa-star star"></i>
                        </div>
                        <div>
                            <i class="fas fa-star star"></i>
                        </div>
                        <div>
                        <i class="far fa-star star"></i>
                        </div>
                        </div>
                    <div class="flexCardsellerinfo">
                        <p class="pnameprofile pprofile">{{$profile->storename}}</p>
                        <p class="pprofile">{{__('Best Videos')}}</p>
                    </div>
                    <div class="flexCardsellerinfo">
                        <p class="pnameprofile pprofile">{{__('Sellings')}}</p>
                        <p class="pprofile">{{$sellersalling[0]->count}} Videos
                    </div>
                    <div class="flexCardsellerinfo">
                        <p class="pnameprofile pprofile">{{__('Country')}}</p>
                        <p class="pprofile">{{$profile->address}}</p>
                    </div>
                    <div class="flexCardsellerinfo"> 
                        <p class="pnameprofile pprofile">{{__('Phone')}}</p>
                        <p class="pprofile">{{$profile->mobile}}</p>
                    </div>
                    <div class="flexCardsellerinfo">
                        <p class="pnameprofile pprofile">{{__('Date Join')}}</p>
                        <p class="pprofile">{{$profile->created_at}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <!--******************************* Start Videos******************************* -->
                <div class="row">

            
                    @foreach ($profile->video as $video)
                    @foreach($Accvideos as $accvideo)
                    @if($video->id==$accvideo->id)
                    <div class="col-lg-4 col-sm-6 col-12 ">
              
                        <div class="boxvideo">
                            <div class="divvideo">
                               <a href="{{route('videodetails',[$video->id,App()->getLocale()])}}">
                   <video class="video" id="{{$video->id}}" poster="{{url('Seba/storage/profile')}}/{{$video->Videopicture}}" loop onmouseover="hover({{$video->id}})" onmouseout="mouselet({{$video->id}})">
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$video->url}}" type="video/mp4">
                          </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--    <video class="video" id="{{$video->id}}" poster="{{url('profile')}}/{{$video->Videopicture}}">-->
                    <!--        <source src="{{route('file1',$video->url)}}" type="video/mp4">-->
                    <!--      </video>-->
                        
                    <!--<div class='controls video-controls'>-->
                    <!--    <div style="display: flex">-->
                    <!--        <a class="control bt play" onclick="play_vid({{$video->id}})" style="margin-right: 5px"></a>-->
                    <!--        <a class="control bt pause" onclick="pause_vid({{$video->id}})" id="pause_button"></a>-->
                    <!--      </div> -->
                    <!--  <div class="timeline">-->
                    <!--     <div class="progress" id="p-{{$video->id}}" ></div>-->
                    <!--  </div>-->
                   
                    <!--</div>-->
                    <!--</div>-->
                     </a>
                    <!--<div class="divimgwatermark">-->
                    <!--    <img src="{{asset('/assets/front/img/logo.png')}}" class="imgwatermark" alt="">-->
                    <!--  </div>-->
                            <div class="divcart divalertcart">
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
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="VideoandDetails row">
                                            <div class="col-md-6 col-12">
                                              <div>
                                                <video class="video VideoCart" controls="">
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
                                                      <p class="pdollarCart">13$</p>
                                                      </div>
                                                  </div>
                                                  <div class="divstars">
                                                    <div>
                                                        <i class="fas fa-star star"></i>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-star star"></i>
                                                    </div>
                                                    <div> 
                                                        <i class="fas fa-star star"></i>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-star star"></i>
                                                    </div>
                                                    <div>
                                                    <i class="far fa-star star"></i>
                                                    </div>
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
                                <div>
                                    <i class="fas fa-heart iconcartcolor"></i>
                                </div>
                            </div>
                        <div class="divcart divnext">
                            <div>
                                <i class="fas fa-clock iconcartcolor"></i>
                            </div>
                        </div>
                           </div>
                           <div class="divcontent">
                            <div class="flexcontent">
                                <div class="divimgandname">
                                    <div class="divimg">
                                    <img src="{{url('Seba/storage/profile')}}/{{$profile->picture}}" class="imgseller" alt="seller img">
                                </div>
                                <div class="divnames">
                                    <h6 class="hname">{{$video->name}}</h6>
                                   <a href="ProfileSeller.html" target="_blank">
                                <p class="pname">{{$profile->name}}</p>
                            </a>
                                </div>
                                </div>
                                <div class="divdollar">
                                    <p class="pdollar">{{$video->price}} $</p>
                                </div>
                            </div>
                            <div class="flexcontent">
                                <div class="videotype">
                                    <p class="pvideotype">{{$video->cat->name}}</p>
                                </div>
                                <div class="divstars">
                                <div>
                                    <i class="fas fa-star star"></i>
                                </div>
                                <div>
                                    <i class="fas fa-star star"></i>
                                </div>
                                <div> 
                                    <i class="fas fa-star star"></i>
                                </div>
                                <div>
                                    <i class="fas fa-star star"></i>
                                </div>
                                <div>
                                <i class="far fa-star star"></i>
                                </div>
                                </div>
                            </div>
                            <div class="flexcontent">
                                <div class="divicons">
                                    <i class="fas fa-clock icons"></i>
                                    <label class="lbl">{{__(timeInfo(now()->diffInHours($video->created_at)))}}</label>
                                    <i class="fas fa-eye icons"></i>
                                     <label class="lbl">{{$video->views}}</label>
                                     <i class="fas fa-hand-holding-usd icons"></i>
                                    <label class="lbl">{{$video->sales}}</label>
                                    <i class="fas fa-share-alt icons"></i>
                                    <label class="lbl">{{$video->share}}</label>
                                </div>
                            </div>
                        </div>
                        </div>
               
                    </div>
                    @endif
                    @endforeach
                    @endforeach

                </div>
                 <!--******************************* End Videos******************************* -->
            </div>
        </div>
       
    </div>
    <!--start from here-->
</div>
</section>

@endsection