
            @foreach ($allVidcategories as $video)
            <div class=" col-lg-3 col-md-4 col-sm-6 col-12 ">
              
                <div class="boxvideo">
                    <div class="divvideo">
                          <a href="{{route('videodetails',[$video->id,App()->getLocale()])}}">
                        <video class="video" id="{{$video->id}}" poster="{{url('Seba/storage/profile')}}/{{$video->Videopicture}}" loop onmouseover="hover({{$video->id}})" onmouseout="mouselet({{$video->id}})">
                            <source src="{{url('Seba/storage/videos/watermark')}}{{$video->url}}" type="video/mp4">
                          </video>
                     @auth
                <div class="divcart divalertcart">
                    <div>
                        <a href="{{route('addcart',[$video->id,App()->getLocale()])}}">
                    <i class="fas fa-shopping-cart iconcartcolor"></i>
                        </a>
                    </div>
                </div>
                @endauth
                   @guest
                <div class="divcart">
                    <div>
                        <a href="{{route('addcart',[$video->id,App()->getLocale()])}}">
                    <i class="fas fa-shopping-cart iconcartcolor"></i>
                        </a>
                    </div>
                </div>
                @endguest
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
                            <img src="{{url('Seba/storage/profile')}}/{{$video->picture}}" class="imgseller" alt="seller img">
                        </div>
                        <div class="divnames">
                            <h6 class="hname">{{$video->name}}</h6>
                           <a href="{{route('sellerprofile',[$video->seller_id,App()->getLocale()])}}">
                                <p class="pname">{{$video->seller_name}}</p>
                            </a>
                        </div>
                        </div>
                        <div class="divdollar">
                            <p class="pdollar">{{$video->price}}$</p>
                        </div>
                    </div>
                    <div class="flexcontent">
                        <div class="videotype">
                            @foreach($cats as $cat)
                            @if($video->cat_id== $cat->id)
                            <p class="pvideotype">{{$cat->name}}</p>
                            @endif
                            @endforeach
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
                            <label class="lbl">{{$video->share}}</label>
                        </div>
                    </div>
                </div>
                </div>
            
            </div>

            @endforeach
