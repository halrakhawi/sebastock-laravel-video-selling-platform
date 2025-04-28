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
                    <label>{{__('Home')}}/</label>
                    </a>
                    <a href="{{route('showcart',App()->getLocale())}}">
                    <label> Shopping Cart/ </label>
                    </a>
                    <a href="">
                    <label> Payment </label>
                    </a>
                </div>
                <div class="titlehead">
                    <div><h3>Payment</h3></div>
                </div>
                <div class="divbars divbarsstart">
                    <div class="barone bar"></div>
                    <div class="bartwo bar"></div>
                    <div class="barthree bar"></div>
                </div>
               <!-- <div class="divmainFormlogin">
                   <div class="paymentsuccess">
                       <div>
                        <i class="fas fa-money-check-alt iconpayment"></i>
                       
                        </div>
                       <div>
                        <h4>Payment Was Successful</h4>
                       </div>
                       <div>
                           <p class="pcartandpayment">You can go to see your video 
                            in your downloads</p>
                       </div>
                       <div>
                        <a href="Downloads.html">
                        <button class="btnaddcartdetails btnbuydetails">Downloads</button>
                        </a>
                    </div>
                   </div>
               </div> -->

      {{-- @dd($vid['sales']) --}}
      <div class="row">
        @foreach ($videos as $item )
        @foreach ($veds as $vid )
        @if ($vid->id==$item['id']) 
        @foreach ($cats as $cat )
          @if ($vid->cat_id==$cat->id)
        <div class=" col-lg-3 col-md-4 col-sm-6 col-12 ">
            <div class="boxvideo">
                <div class="divvideo">
                     <a href="{{route('videodetails',[$vid->id,App()->getLocale()])}}">
                        <video class="video" id="{{$vid->id}}" poster="{{url('Seba/storage/profile')}}/{{$vid->Videopicture}}" loop onmouseover="hover({{$vid->id}})" onmouseout="mouselet({{$vid->id}})">
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$vid->url}}" type="video/mp4">
                        </video>
                    <!-- <div class="relativevideocontrols player" style="position: relative">-->
                    <!--    <video class="video" id="{{$vid->id}}" poster="{{url('profile')}}/{{$vid->Videopicture}}">-->
                    <!--        <source src="{{route('file1',$vid->url)}}" type="video/mp4">-->
                    <!--      </video>-->
                        
                    <!--<div class='controls video-controls'>-->
                    <!--    <div style="display: flex">-->
                    <!--        <a class="control bt play" onclick="play_vid({{$vid->id}})" style="margin-right: 5px"></a>-->
                    <!--        <a class="control bt pause" onclick="pause_vid({{$vid->id}})" id="pause_button"></a>-->
                    <!--      </div> -->
                    <!--  <div class="timeline">-->
                    <!--     <div class="progress" id="p-{{$vid->id}}" ></div>-->
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
                        <img src="{{url('Seba/storage/profile')}}/{{$vid->seller->picture}}" class="imgseller" alt="seller img">
                    </div>
                    <div class="divnames">
                        <h6 class="hname">{{$vid->name}}</h6>
                       <a href="ProfileSeller.html" target="_blank">
                            <p class="pname">{{$vid->seller->seller_name}}</p>
                        </a>
                    </div>
                    </div>
                    <div class="divdollar">
                        <p class="pdollar  ">{{$vid->price}}$</p>

                    </div>
                </div>
                <div class="flexcontent">
                    <div class="videotype">
                        <p class="pvideotype">{{$cat->name}}</p>
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
                        <label class="lbl">5</label>
                    </div>
                </div>
                <div class="flexcontent">
                    <div class="divfinishDownload">
                        {{-- <a href="{{route('downloadVideo',$vid->id)}}"> --}}
                        <button class="btnaddcartdetails btnbuydetails btnfinishdownload" style="margin-top:10px" data-toggle="modal" data-target="#ReviewexampleModalLong{{$vid->id}}">Download</button>
                        {{-- </a> --}}
                    </div>
                    {{-- <div>
                        <button class="btnaddcartdetails btnbuydetails"  data-toggle="modal" data-target="#ReviewexampleModalLong">Review </button>
                       </div> --}}
                       <div class="modal fade" id="ReviewexampleModalLong{{$vid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content modalcontentArabic">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              
                                <div>
                                    <p class="pcartandpayment paymentmodal">Please rate your experience buying videos from our website</p>
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
                                    <form action="{{route('downloadVideo',$vid->id)}}" method="get">
                                    <select class=" js-states form-control" name="rate" id="rate" required>
                                        <option></option>
                                        <option>1 Star</option>
                                        <option>2 Star</option>
                                        <option>3 Star</option>
                                        <option>4 Star</option>
                                        <option>5 Star</option>
                                      
                                      </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a href="">
                              <button type="submit" class="btn btn-primary">Download</button>
                              </a>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
                </div>
               </div>
            </div>

        </div>
        @endif
        @endforeach
        @endif
        @endforeach
              @endforeach
    </div>


      
            <!--start from here-->
        </div>
        </section>

@endsection