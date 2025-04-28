@foreach ($morenewvideos as $item)
@foreach ($cats as $cat )
    @if ($item->cat_id==$cat->id)
            <div class=" col-lg-3 col-md-4 col-sm-6 col-12 ">
 
    <div class="boxvideo">
        <div class="divvideo">
              <a href="{{route('videodetails',[$item->id,App()->getLocale()])}}">
           <video class="video" id="{{$item->id}}" poster="{{url('Seba/storage/profile')}}/{{$item->Videopicture}}" loop onmouseover="hover({{$item->id}})" onmouseout="mouselet({{$item->id}})">
                    <source src="{{url('Seba/storage/videos/watermark')}}{{$item->url}}" type="video/mp4">
                  </video>
              @auth
        <div class="divcart divalertcart">
            <div>
                <a href="{{route('addcart',[$item->id,App()->getLocale()])}}">
            <i class="fas fa-shopping-cart iconcartcolor"></i>
                </a>
            </div>
        </div>
           <div class="divcart divlove">
            <a href="{{route('favorite',$item->id)}}">
                <div>
                    <i class="fas fa-heart iconcartcolor"></i>
                </div>
            </a>
        </div>
    <div class="divcart divnext">
        <a href="{{route('watchlater',[$item->id,App()->getLocale()])}}">
            <div>
                <i class="fas fa-clock iconcartcolor"></i>
            </div>
        </a>
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
        @endguest
        <div class="divcart divlove">
            <a href="{{route('favorite',$item->id)}}">
                <div>
                    <i class="fas fa-heart iconcartcolor"></i>
                </div>
            </a>
        </div>
    <div class="divcart divnext">
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
                <p class="pvideotype">{{($cat->name)}}</p>
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