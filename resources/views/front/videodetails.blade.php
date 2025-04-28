@extends('layouts.front')

@section('content')

  <style>

       .video::-webkit-media-controls-fullscreen-button{

           display: inline-block !important;

           

       }

   </style>   

{{-- @dd($video->seller) --}}

<section class="secnewvideos secmostwatch">

    <div class="container">

    <div class="newvideos">

        <div  class="pathpages">

            <a href="{{route('home',App()->getLocale())}}">

            <label>{{__('Home')}} /</label>

            </a>

            <a href="{{route('categoryvideos',[$video->cat_id,App()->getLocale()])}}">

            <label> {{__($video->cat->name)}} /</label>

            </a>

            <!--{{-- @dd($video) --}}-->

            <!--{{-- @foreach ($video as $item) --}}-->



             <!--{{-- @if ($item->id==request()->route()->id) --}}-->

            <a href="{{route('videodetails',[request()->route()->id,App()->getLocale()])}}">

            <label> {{$video->name}}  </label>

            </a>

        </div>

        <div class="titlehead">

            <div><h3>{{$video->name}}</h3></div>

        </div>

        <!--{{-- @endif --}}-->

        <!--{{-- @endforeach --}}-->

        <div class="divbars divbarsstart">

            <div class="barone bar"></div>

            <div class="bartwo bar"></div>

            <div class="barthree bar"></div>

        </div>

        <div class="row">

            <!--{{-- @foreach ($video as $item) --}}-->

            <!-- {{-- @if ($item->id==request()->route()->id) --}}-->

             @php

                 $sellerid=$video->seller_id;

             @endphp

             

            <div class="col-lg-7 col-md-6 col-12">

                <div class="boxvideo boxvideodetails">

                    <div class="divvideo divvideodetails">

                     <div class="relativevideocontrols player" style="position: relative">

                        <!--<video class="video" id="{{$video->id}}" poster="{{url('profile')}}/{{$video->Videopicture}}">-->

                        <!--    <source src="{{route('file1',$video->url)}}" type="video/mp4">-->

                        <!--  </video>-->

                        <video class="video" style="height:400px" id="{{$video->id}}" poster="{{url('Seba/storage/profile')}}/{{$video->Videopicture}}"  controls allowfullscreen>

                            <source src="{{url('Seba/storage/videos/watermark')}}{{$video->url}}" type="video/mp4">

                          </video>

                        

                    <!--<div class='controls video-controls'>-->

                    <!--    <div style="display: flex">-->

                    <!--        <a class="control bt play" onclick="play_vid({{$video->id}})" style="margin-right: 5px"></a>-->

                    <!--        <a class="control bt pause" onclick="pause_vid({{$video->id}})" id="pause_button"></a>-->

                    <!--      </div> -->

                    <!--  <div class="timeline">-->

                    <!--     <div class="progress" id="p-{{$video->id}}" ></div>-->

                    <!--  </div>-->

                   

                    <!--</div>-->

                    </div>

                    <!--<div class="divimgwatermark">-->

                    <!--    <img src="{{asset('/assets/front/img/logo.png')}}" class="imgwatermark" alt="">-->

                    <!--  </div>-->

                    <div class="divcart divlove">

                        <a href="{{route('favorite',$video->id)}}">

                            <div>

                                <i class="fas fa-heart iconcartcolor"></i>

                            </div>

                        </a>

                    </div>

                <div class="divcart divnext">

                    <div>

                        <i class="fas fa-clock iconcartcolor"></i>

                    </div>

                </div>

                   </div>

                   <div class="divcontent divcontentdetails">

                    <div class="flexcontent">

                        <div class="divimgandname">

                            <div class="divimg">

                            <img src="{{url('Seba/storage/profile')}}/{{$video->seller->picture}}" class="imgseller" alt="seller img">

                        </div>

                        <div class="divnames">

                            <h6 class="hname hnamedetails">{{$video->name}}</h6>

                           <a href="{{route('sellerprofile',[$video->seller->seller_id,App()->getLocale()])}}">

                                <p class="pname">{{$video->seller->name}}</p>

                            </a>

                        </div>

                        </div>

                        <div class="divdollar">

                            <p class="pdollar">{{$video->price}}$</p>

                        </div>

                    </div>

                    <div class="flexcontent">

                        <div class="videotype">

                            <a href="{{route('sellerprofile',[$video->seller->seller_id,App()->getLocale()])}}">

                            <p class="pvideotype">{{$video->seller->seller_name}}</p>

                             </a>

                        </div>

                        <div class="divstars">

                            @for ($i=1;$i<=$video->rating;$i++)

                            <div>

                              <i class="fas fa-star star"></i>

                          </div>

                            @endfor

                            @for ($i=1;$i<=5-$video->rating;$i++)

                            <div>

                            <i class="far fa-star star"></i>

                            </div>

                            @endfor

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

                            <label class="lbl">{{$video->sales}}</label>

                        </div>

                    </div>

                    <div class="flexcontent">

                        <p class="pvideodetails">{{$video->details}}</p>

                    </div>

                    

                    <div class="flexcontentsocial">

                        <div class="divshare">

                            <i class="fas fa-share-alt"></i>

                        </div >

                        {{-- style form here --}}

                        <form calss="form" action="{{route('front.share',$video->id)}}" method="post" style="display: flex">

                            @csrf

                       {{-- style btnshare here --}}

                            <button type="submit" name="action" value="twitter" class="share">                        

                        <div class="divface">

                            <i class="fab fa-twitter shariconsocial shariconsocialtwitter"></i>

                        </div>

                       </button>

                       <button type="submit" name="action" value="instagram" class="share">                        

                        <div class="divface">                                  

                            <i class="fab fa-instagram shariconsocial shariconsocialinsta"></i>

                        </div>

                       </button>

                       <button type="submit" name="action" value="mail" class="share">                        

                        <div class="divface">

                            <i class="far fa-envelope shariconsocial shariconsocialgmail"></i>

                        </div>

                         </button>

                         <button type="submit" name="action" value="facebook" class="share">                        

                        <div class="divface">

                            <i class="fab fa-facebook-f shariconsocial shariconsocialface"></i>

                            <!-- <span class="material-icons">facebook</span> -->

                        </div>

                    </button>

                    </div>

                </form>

                    <div class="divbtnsdetails row">

                        

                        <div class="col-lg-6 col-12">

                            <div class="divalertcart">

                          <a href="{{route('addcart',[$video->id,App()->getLocale()])}}">

                              <button type="button" class="btn btnaddcartdetails" data-toggle="modal" data-target="#exampleModalLongaddtocart">

                                  {{__('Add to Cart')}}

                              </button>

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

                        </div>

                        <div>

                          <!-- <a href="#">

                              <button class="btnaddcartdetails">400 Comments</button>

                          </a> -->

                        </div>

                    </div>

                </div>

                </div>

                <hr>

                <div class="titlehead">

                    <div><h3>{{__('Comments')}} ({{count($comments)}})</h3></div>

                </div>

                <div class="divbars divbarsstart">

                    <div class="barone bar"></div>

                    <div class="bartwo bar"></div>

                    <div class="barthree bar"></div>

                </div>

                <div>

                    <div class="addcomment">

                @if(Auth::guard('admin')->check())

                       <img src="{{url('Seba/storage/profile')}}/{{auth('admin')->user()->picture}}" class="imgseller" alt="seller img">



                       <form action="{{route('comment',$video->id)}}" method="post">

                           @csrf

                        <div class="inputcomment">

                            <input type="text" placeholder="{{__('Add Comment')}}" class="inputaddcomment inputresponsive" name="comment">

                        </div> 

                       </form>

                         </div>

                  

                        @elseif(Auth::guard('seller')->check())

                         <img src="{{url('Seba/storage/profile')}}/{{auth('seller')->user()->picture}}" class="imgseller" alt="seller img">



                       <form action="{{route('comment',$video->id)}}" method="post">

                           @csrf

                        <div class="inputcomment">

                            <input type="text" placeholder="{{__('Add Comment')}}" class="inputaddcomment inputresponsive" name="comment">

                        </div> 

                       </form>

                 </div>

                   

                         @elseif(Auth::guard('user')->check())

                         <div>

                        <img src="{{url('Seba/storage/profile')}}/{{auth('user')->user()->picture}}" class="imgseller" alt="seller img">

                       <form action="{{route('comment',$video->id)}}" method="post">

                           @csrf

                        <div class="inputcomment">

                            <input type="text" placeholder="{{__('Add Comment')}}" class="inputaddcomment inputresponsive" name="comment">

                        </div> 

                       </form>

                        </div>

                        @endif

                    @foreach ($comments as $comment )

                                      @if($comment->user!=null)   

                                      <div class="divcomments">

                        <div class="divcontent divcontentcomments">

                            <div class="flexcontent flexcontentcomments">

                                <div class="divimgandname">

                                    <div class="divimg">

                                    <img src="{{url('Seba/storage/profile')}}/{{$comment->user->picture}}" class="imgseller" alt="seller img">

                                </div>

                                <div class="divnames">

                                    <h6 class="hname">{{$comment->user->name}}</h6>

                                    <i class="fas fa-clock iconcartcolor icons"></i>

                                    <label class="lbl">{{$comment->created_at}}</label>

                                </div>

                                </div>

                                <div class="divdollar">

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

                            <div class="flexcontent">

                                <div class="videotype">

                                    <p class="pcomments">{{$comment->comment}}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                                      @elseif($comment->selleruser!=null)  

                                      <div class="divcomments">

                        <div class="divcontent divcontentcomments">

                            <div class="flexcontent flexcontentcomments">

                                <div class="divimgandname">

                                    <div class="divimg">

                                    <img src="{{url('Seba/storage/profile')}}/{{$comment->selleruser->picture}}" class="imgseller" alt="seller img">

                                </div>

                                <div class="divnames">

                                    <h6 class="hname">{{$comment->selleruser->name}}</h6>

                                    <i class="fas fa-clock iconcartcolor icons"></i>

                                    <label class="lbl">{{$comment->created_at}}</label>

                                </div>

                                </div>

                                <div class="divdollar">

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

                            <div class="flexcontent">

                                <div class="videotype">

                                    <p class="pcomments">{{$comment->comment}}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                                      @elseif($comment->adminuser!=null)  

                                      <div class="divcomments">

                        <div class="divcontent divcontentcomments">

                            <div class="flexcontent flexcontentcomments">

                                <div class="divimgandname">

                                    <div class="divimg">

                                    <img src="{{url('Seba/storage/profile')}}/{{$comment->adminuser->picture}}" class="imgseller" alt="seller img">

                                </div>

                                <div class="divnames">

                                    <h6 class="hname">{{$comment->adminuser->name}}</h6>

                                    <i class="fas fa-clock iconcartcolor icons"></i>

                                    <label class="lbl">{{$comment->created_at}}</label>

                                </div>

                                </div>

                                <div class="divdollar">

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

                            <div class="flexcontent">

                                <div class="videotype">

                                    <p class="pcomments">{{$comment->comment}}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                                      @endif

                    

                    @endforeach

                

                   

                    

                </div>

            

           

        </div>

           

            <!--{{-- @endif --}}-->

            <!--{{-- @endforeach --}}-->

          

        </div>

         <div class="col-lg-5 col-md-6 col-12">

             <div class="row" style="padding: 5px; border: 1px solid #70707078; align-items:center; box-shadow:2px 3px 4px #7070703b; margin-bottom: 20px">

                 <div class="col-md-6 col-12">

                     <video controls style="height:170px; width:100%">

                      <source src="{{url('Seba/storage/advertisments/')}}/{{!empty($adv->url) ? $adv->url:''}}">

                     </video>     

                 </div>

                <div class="col-md-6 col-12" style="text-align:center">

                    <h5>Seba Ads</h5>

                    <a href="#">

                      <button type="button" class="btn btnaddcartdetails">

                          {{__('LEARN MORE')}}

                      </button>

                    </a>

                </div>

                 

             </div>

                @foreach ($likesVideo as $item)

                <!--{{-- @dd($sellerid) --}}-->

                <!--{{-- @if ($sellerid==$seller->seller_id)-->

                <!--{{-- @foreach ($seller->video as $video)    --}}-->



               <div class="row rowsimilarvideos" style="align-items:center">

                   <div class="col-6">

               

                    <div class="divvideo">

                      <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">

                    <video style="height:180px" class="video" id="{{100100+$item->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->Videopicture}}" loop onmouseover="hover({{100100+$item->id}})" onmouseout="mouselet({{100100+$item->id}})" allowfullscreen>

                            <source src="{{url('Seba/storage/videos/watermark')}}{{$item->url}}" type="video/mp4">

                          </video>

                    

                        <div class="divcart divalertcart">

                            <div>

                            <i class="fas fa-shopping-cart"></i>

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

                                                    <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">

                                                    <p class="pVideoNameCart">{{$item->name}}</p>

                                                    </a>

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

                        <div class="divcart divlove">

                            <a href="{{route('favorite',$item->id)}}">

                                <div>

                                    <i class="fas fa-heart iconcartcolor"></i>

                                </div>

                            </a>

                        </div>

                    <div class="divcart divnext">

                        <div>

                            <i class="fas fa-clock iconcartcolor"></i>

                        </div>

                    </div>

                   </a>

                    </div>    

               

                   </div>

                   <div class="col-6">

                    <div class="divcontent">

                        <div class="flexcontent">

                            <div class="divimgandname">

                                <!-- <div class="divimg">

                                <img src="img/seller.jpg" class="imgseller" alt="seller img">

                                </div> -->

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

                            <!-- <div class="videotype">

                                <p class="pvideotype">Motion Graphic</p>

                            </div> -->

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

            



               @endforeach

            </div>

         <!--end row-->

    </div>

    <!--start from here-->

</div>

</section>



@endsection