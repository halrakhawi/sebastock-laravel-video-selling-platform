@extends('layouts.seller')
@section('content')

<div class="Table-SubUser">
  <!-- Page Header-->
 
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('seller.index',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
      <li class="breadcrumb-item">{{__('Offers')}}</a></li>
     </ul>
    </div>
    {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
      <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>
    </div> --}}
  </div>
</div>

    <div class="">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              <div class="card-close" style="position: absolute; display: flex;">
                <div class="dropdown itemstop">
                  <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                    <i class="fas fa-sort"></i></button>

                  <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                    <a href="{{route('seller.sortmyvideosOffers','sort-asc')}}" class="dropdown-item ATZ">
                      {{__('A TO Z')}}</a>
                      <a href="{{route('seller.sortmyvideosOffers','sort-desc')}}" class="dropdown-item ZTA">
                        {{__('Z TO A')}}</a>
                  </div>
                  </div>
                  <div class="dropdown itemstop">
                    <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                      <i class="fas fa-filter"></i></button>
    
                      <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                        <a href="{{route('seller.sortmyvideosOffers','sort-recent')}}" class="dropdown-item">
                          {{__('Recently')}} </a>
                            <a href="{{route('seller.sortmyvideosOffers','sort-old')}}" class="dropdown-item ">
                              {{__('Oldest')}}  </a>
            
                  </div>
                  
                </div>

                {{-- <div class="dropdown itemstop">
                    <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                      <i class="fas fa-plus"></i></button>                   
                  </div> --}}
               </div>
              
              <div class="card-header align-items-center">
                <h3 class="h4">{{__('Offers')}}</h3>
                <div class="d-grid gap-2 col-12 content-filter">
                  @foreach ($cats as $cat)
                  <button type="submit" class="btn btn-outline-danger"><a href="{{route('seller.sortmyvideosOffers','cat-'.$cat->name)}}" class="dropdown-item acatoffer">{{__($cat->name)}} </a></button>
                  @endforeach

                  </div>
              </div>       
                            
            </div>
        </div>                
      </div>
  <!-- Start slider channels-->

  <!-- Start slider channels-->

  <!-- Start div channels-->
  <div class="channel-div">
      <div class="container">
        <div class="row boxs">

          @foreach ($offers as $item)
          @foreach ($veds as $video)
              @if ($video->id == $item->video_id && $video->seller_id==auth('seller')->id())
          <a href="">
            <div class="box-channles col-sm-4 col-md-4 col-lg-3">
              <div class="containt-channel">
                <div class="vedio-channel">
                  <iframe width="100%" class="move"
                   src="{{ route('file1', $video->url) }}" sandbox="0" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="info-channel">

                  <h4 class="Vediotitle">
                    {{$video->name}}
                  </h4>

                  <div class="div-channel-info2">
                  <div class="channele-name-div">
                   <div class="channel-data">
                                <i class="fas fa-sitemap"></i>
                                <p class="channelname">{{$video->cat->name}}</p>
                              </div>
                              <p class="price-number-offer"> {{$item->offerPrice}} $ </p>
                              <p class="price-number video-price"> {{$video->price}} $ </p>
                   
             </div>
             </div>


                <div class="second-info">
                  <Div class="right-info">
                  <div class="iconinfo1">
                    <i class="fas fa-eye"></i>
                    <p class="num-info">{{$video->views}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-download"></i>
                    <p class="num-info">{{$video->sales}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-share"></i>
                    <p class="num-info">{{$video->share}}</p>
                  </div>

                </Div>
                <div class="left-div">
                  <p class="time-info">{{(($video->created_at))}}</p>
                </div>
      
                </div>
              
              </div>
            </div>
          </div>
          </a>
          @endif
          @endforeach
          @endforeach
        
        <!--=================================divfirstvedio=============================-->
     
      </div>
    </div>
   <!--End div channels-->


  
</div>


   </div>
</div>

@endsection