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
        <div class="pathpages">
            <a href="{{route('home',App()->getLocale())}}">
            <label>{{__('Home')}} /</label>
            </a>
            <a href="{{route('showwatchlater',App()->getLocale())}}">
            <label>{{__('Watch Later')}} </label>
            </a>
        </div>
        <div class="titlehead">
            <div class="titlewithNumber"> 
                <h3>{{__('Watch Later')}} </h3>
                <h3> ({{$showwatchlater->count()}})</h3>
            </div>
        </div>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
        <div class="row">
           
            @foreach ( $showwatchlater as $item)
             @foreach($veds as $vid)
             @if($vid->id==$item->video_id)
            <div class=" col-lg-3 col-md-4 col-sm-6 col-12 ">
         
                <div class="boxvideo">
                    <div class="divvideo">
                          <a href="{{route('videodetails',[$item->video_id,App()->getLocale()])}}">
                    <video class="video" id="{{$item->video_id}}" poster="{{url('Seba/storage/profile')}}/{{$vid->Videopicture}}" loop onmouseover="hover({{$item->video_id}})" onmouseout="mouselet({{$item->video_id}})">
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$vid->url}}" type="video/mp4">
                          </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--    <video class="video" id="{{$item->video_id}}" poster="{{url('profile')}}/{{$item->Videopicture}}">-->
                    <!--        <source src="{{route('file1',$vid->url)}}" type="video/mp4">-->
                    <!--      </video>-->
                        
                    <!--<div class='controls video-controls'>-->
                    <!--    <div style="display: flex">-->
                    <!--        <a class="control bt play" onclick="play_vid({{$item->video_id}})" style="margin-right: 5px"></a>-->
                    <!--        <a class="control bt pause" onclick="pause_vid({{$item->video_id}})" id="pause_button"></a>-->
                    <!--      </div> -->
                    <!--  <div class="timeline">-->
                    <!--     <div class="progress" id="p-{{$item->video->id}}" ></div>-->
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
                                                <p class="pVideoNameCart">{{$item->video->name}}</p>
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
                    <a href="{{route('deletewatchlater',[$item->id,App()->getLocale()])}}">
                    <div>
                        <i class="fas fa-clock fa-check "></i>
                    </div>
                </a>
                </div>
                   </div>
                   <div class="divcontent">
                    <div class="flexcontent">
                        <div class="divimgandname">
                            <div class="divimg">
                            <img src="{{url('Seba/storage/profile')}}/{{$item->video->seller->picture}}" class="imgseller" alt="seller img">
                        </div>
                        <div class="divnames">
                            <h6 class="hname">{{$vid->name}}</h6>
                           <a href="{{route('sellerprofile',[$item->video->seller->seller_id,App()->getLocale()])}}">
                                <p class="pname">{{$vid->seller->seller_name}}</p>
                            </a>
                        </div>
                        </div>
                        <div class="divdollar">
                            <p class="pdollar">{{$vid->price}}$</p>
                        </div>
                    </div>
                    <div class="flexcontent">
                        <div class="videotype">
                            <p class="pvideotype">{{$vid->cat->name}}</p>
                        </div>
                        <div class="divstars">
                            @for ($i=1;$i<=$vid->rating;$i++)
                            <div>
                              <i class="fas fa-star star"></i>
                          </div>
                            @endfor
                            @for ($i=1;$i<=5-$vid->rating;$i++)
                            <div>
                            <i class="far fa-star star"></i>
                            </div>
                            @endfor
                            </div>
                    </div>
                    <div class="flexcontent">
                        <div class="divicons">
                            <i class="fas fa-clock icons"></i>
                            <label class="lbl">{{__(timeInfo(now()->diffInHours($vid->created_at)))}}</label>
                            <i class="fas fa-eye icons"></i>
                             <label class="lbl">{{$vid->views}}</label>
                             <i class="fas fa-hand-holding-usd icons"></i>
                            <label class="lbl">{{$vid->sales}}</label>
                            <i class="fas fa-share-alt icons"></i>
                            <label class="lbl">{{$vid->share}}</label>
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


 <!--End section Body-->

@endsection