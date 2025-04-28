@extends('layouts.admin')
@section('content')

<div class="Table-SubUser">
    <!-- Page Header-->
   
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">Dashboard</a></li>
        <li class="breadcrumb-item">Offers</a></li>
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
                      <a href="{{route('admin.offerssort',['sort-asc',App()->getLocale()])}}" class="dropdown-item ATZ">
                        A TO Z</a>
                        <a href="{{route('admin.offerssort',['sort-desc',App()->getLocale()])}}" class="dropdown-item ZTA">
                         Z TO A</a>
                    </div>
                    </div>
                    <div class="dropdown itemstop">
                    <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                      <i class="fas fa-filter"></i></button>

                    <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                     <a href="{{route('admin.offerssort',['sort-recent',App()->getLocale()])}}" class="dropdown-item">
                    Recently </a>
                      <a href="{{route('admin.offerssort',['sort-old',App()->getLocale()])}}" class="dropdown-item ">
                      Oldest </a>
              
                    </div>
                    
                  </div>

                  {{-- <div class="dropdown itemstop">
                      <a href=""><i class="fas fa-plus"></i></a>
                    </div> --}}
                 </div>
                
                <div class="card-header align-items-center">
                  <h3 class="h4" style="text-align:center">{{__('Offers')}}</h3>
                  <div class="d-grid gap-2 col-12 content-filter boxesofferscenter">
                    @foreach ($cats as $cat)
                    <button type="submit" class="btn btn-outline-danger"><a href="{{route('admin.offerssort',['cat-'.$cat->name,App()->getLocale()])}}" class="dropdown-item ">{{__($cat->name)}} </a></button>
                    @endforeach

                    </div>
                </div>       
                              
              </div>
          </div>                
        </div>


<!-- Start div channels-->
<div class="channel-div">
    <div class="container">
      <div class="row boxs">
          @foreach ($of as $offer )

          <!--Offer vedio-->
          <a href="{{route('admin.offer.details',[$offer->id,App()->getLocale()])}}">
            <div class="box-channles col-sm-4 col-md-4 col-lg-3">
              <div class="containt-channel">
                <div class="vedio-channel">
                  <video width="100%" class="video" controls disablePictureInPicture controlsList="nodownload nofullscreen">
                    <source src="{{route('file1',$offer->url)}}" type="video/mp4">
                </video>
                  {{-- <iframe width="100%" class="move"
                   src="{{route('file1',$offer->videos->url)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                  </iframe> --}}
                </div>
                <div class="info-channel">

                  <h4 class="Vediotitle">
                  {{$offer->name}}
                  </h4>

                  <div class="div-channel-info2">
                  <div class="channele-name-div">
                  <div class="channel-data">
                     <i class="fas fa-sitemap"></i>
                     @foreach ($cats as $cat)
                     @if ($offer->cat_id==$cat->id) 
                       <p class="channelname">{{$cat->name}}</p>                      
                       @endif                        
                       @endforeach
                  </div>
                  <div style="display:flex">
                  <p class="price-number-offer" style="margin-right:5px; background-color:#B80303"> {{$offer->price}}$ </p>
                  <p class="price-number  video-price"> {{$offer->offerPrice}}$ </p>       
                  </div>
               

                   
             </div>
             </div>


                <div class="second-info">
                  <Div class="right-info">
                  <div class="iconinfo1">
                    <i class="fas fa-eye"></i>
                    <p class="num-info">{{$offer->views}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-download"></i>
                    <p class="num-info">{{$offer->sales}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-share"></i>
                    <p class="num-info">178</p>
                  </div>

                </Div>
                <div class="left-div">
                  <p class="time-info">{{now()->diffInMonths($offer->created_at)}} ago</p>
                </div>
      
                </div>
              
              </div>
            </div>
          </div>
          </a>                      
          @endforeach
          <!--End Offer vedio-->
    </div>
  </div>
 <!--End div channels-->



</div>


 </div>

@endsection