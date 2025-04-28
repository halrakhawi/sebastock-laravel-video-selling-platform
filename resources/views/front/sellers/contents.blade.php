@extends('layouts.seller')
@section('content')
<div class="">
    <div class="row ">
      <div class="col-lg-12">
        <div class="card filters">
          <div class="card-close" style="position: absolute; display: flex;">
            <div class="dropdown itemstop">
              <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                <i class="fas fa-sort"></i></button>

              <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                <a href="{{route('seller.contentsort','sort-asc')}}" class="dropdown-item ATZ">{{__('A TO Z')}}</a>
                  <a href="{{route('seller.contentsort','sort-desc')}}" class="dropdown-item ZTA">{{__('Z TO A')}}</a>
              </div>
              </div>
              <div class="dropdown itemstop">
                <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                  <i class="fas fa-filter"></i></button>

                  <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                    <a href="{{route('seller.contentsort','sort-recent')}}" class="dropdown-item">
                      {{__('Recently')}} </a>
                        <a href="{{route('seller.contentsort','sort-old')}}" class="dropdown-item ">
                        {{__('Oldest')}} </a>
            
                  </div>
                
              </div>
              <div class=" itemstop" style="background:#d30505" >
                <a href="{{route('front.vedios.create',App()->getLocale())}}"type="AddNAME" id="closeCard1" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon"><i class="fas fa-plus"></i></a>
              </div>
          </div>
          
          <div class="card-header align-items-center">
            <h3 class="h4">{{__('Contents')}}</h3>
            <div class="d-grid gap-2 col-12 content-filter">
              @foreach ($cats as $cat)
              <button type="submit" class="btn btn-outline-danger"><a href="{{route('seller.contentsort','cat-'.$cat->name)}}" class="dropdown-item acatoffer">{{__($cat->name)}} </a></button>
              @endforeach

              </div>
          </div>       
          <!--div class="card-close" style="position: absolute; display: flex;"-->
            {{-- <div class="dropdown itemstop AddNAME"> --}}

              
              {{-- </div> --}}

          {{-- </div>        --}}
        </div>
      </div> 
                     
    </div>
    
<!-- Start slider channels-->

<!-- Start slider channels-->

<!-- Start div channels-->

    
<div class="channel-div">
    <div class="container">
      <div class="row Videos-content">
        @foreach ($videoss as $vedio)
          <!--End first vedio-->
            <div class="box-channles col-sm-12 col-md-4 col-lg-3">
          <a href="{{route('seller.contentdetails',$vedio->id)}}">
              <div class="containt-channel ">
                <div class="vedio-channel divvideocontent">
                  <video controls=""  name="media" class="move" poster="{{asset('/Seba/storage/profile')}}/{{$vedio->Videopicture}}">
                    <source src="{{route('file1',$vedio->url)}}" type="video/mp4">
                    </video>
                    <div class="divimgwatermark">
                      <img src="{{asset('/assets/admin/img/logo.png')}}" class="imgwatermark" alt="">
                    </div>
                  {{-- <iframe width="100%" class="move"
                   src="{{route('file1',$vedio->url)}}" frameborder="0" allow="accelerometer;clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                </div>
                <div class="info-channel">

                  <a href="{{route('seller.contentdetails',$vedio->id)}}"> <h4 class="Vediotitle">
                    {{$vedio->name}}
                    </h4></a>

                  <div class="div-channel-info2">
                  <div class="channele-name-div">
                  <div class="channel-data">
                              <i class="fas fa-sitemap"></i>
                              @foreach ($cats as $item)
                              @if ($item->id==$vedio->cat_id)
                              <p class="channelname">{{$item->name}}</p>
                              @endif
                              @endforeach
                            </div>
                  <p class="price-number"> {{$vedio->price}} $ </p>
                   
             </div>
             </div>


                <div class="second-info">
                  <Div class="right-info">
                  <div class="iconinfo1">
                    <i class="fas fa-eye"></i>
                    <p class="num-info">{{$vedio->views}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-download"></i>
                    <p class="num-info">{{$vedio->sales}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-share"></i>
                    <p class="num-info">{{$vedio->share}}</p>
                  </div>

                </Div>
                <div class="left-div">
                  <p class="time-info">{{timeInfo(now()->diffInHours($vedio->created_at))}}</p>
                </div>
      
                </div>
              
              </div>
            </div>
          </a>
          </div>
          @endforeach
    </div>
  </div>
</div>

            
@endsection