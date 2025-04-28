@extends('layouts.admin')
@section('content')

<div class="Table-SubUser">
    <!-- Page Header-->
   
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
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
                     <a href="{{route('admin.offerssort',['sort-asc',App()->getLocale()])}}" class="dropdown-item ATZ">
                      {{__('A TO Z')}}</a>
                      <a href="{{route('admin.offerssort',['sort-desc',App()->getLocale()])}}" class="dropdown-item ZTA">
                        {{__('Z TO A')}}</a>
                    </div>
                    </div>
                    <div class="dropdown itemstop">
                    <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                      <i class="fas fa-filter"></i></button>

                    <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                      <a href="{{route('admin.offerssort',['sort-recent',App()->getLocale()])}}" class="dropdown-item">
                        {{__('Recently')}} </a>
                          <a href="{{route('admin.offerssort',['sort-old',App()->getLocale()])}}" class="dropdown-item ">
                            {{__('Oldest')}} </a>
              
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
                    <button type="submit" class="btn btn-outline-danger"><a href="{{route('admin.offerssort',['cat-'.$cat->name,App()->getLocale()])}}" class="dropdown-item acatoffer">{{__($cat->name)}} </a></button>
                    @endforeach
                    {{-- <button type="submit" class="btn btn-outline-danger"><a href="{{route('admin.offerssort','cat-video')}}" class="dropdown-item ">Video </a></button>
                    <button type="submit" class="btn btn-outline-danger"><a href="{{route('admin.offerssort','cat-report')}}" class="dropdown-item ">Report </a></button>
                    <button type="submit" class="btn btn-outline-danger"><a href="{{route('admin.offerssort','cat-motion')}}" class="dropdown-item ">Motion </a></button>
                    <button type="submit" class="btn btn-outline-danger"><a href="{{route('admin.offerssort','cat-fun')}}" class="dropdown-item ">Fun </a></button> --}}

                    </div>
                </div>       
                              
              </div>
          </div>                
        </div>


<!-- Start div channels-->
<div class="channel-div">
    <div class="container">
      <div class="row boxs">
          @foreach ($Adminoffers as $offer )

          <!--Offer vedio-->
          <div class="box-channles col-12 col-md-6 col-lg-4">
          <a href="{{route('admin.offer.details',[$offer->id,App()->getLocale()])}}">
              <div class="containt-channel">
                <div class="vedio-channel">
                  <video width="100%" height="220px" class="video" controls disablePictureInPicture controlsList="nodownload nofullscreen">
                    <source src="{{route('file1',$offer->videos->url)}}" type="video/mp4">
                </video>
                  {{-- <iframe width="100%" class="move"
                   src="{{route('file1',$offer->videos->url)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                  </iframe> --}}
                </div>
                <div class="info-channel">

                  <h4 class="Vediotitle">
                  {{$offer->videos->name}}
                  </h4>

                  <div class="div-channel-info2">
                  <div class="channele-name-div">
                  <div class="channel-data">
                     <i class="fas fa-sitemap"></i>
                       <p class="channelname">{{$offer->videos->cat->name}}</p>
                  </div>
                  <div class="flexofferprices" style="display:flex">
                    <p class="price-number video-price" style="background-color:#B80303; margin-right:5px"> {{$offer->videos->price}}$ </p>
                    <p class="price-number priceoffer "> {{$offer->offerPrice}}$ </p>
                  </div>
                  

                   
             </div>
             </div>


                <div class="second-info">
                  <Div class="right-info">
                  <div class="iconinfo1">
                    <i class="fas fa-eye"></i>
                    <p class="num-info">{{$offer->videos->views}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-download"></i>
                    <p class="num-info">{{$offer->videos->sales}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-share"></i>
                    <p class="num-info">178</p>
                  </div>

                </Div>
                <div class="left-div">
                  <p class="time-info">{{now()->diffInMonths($offer->videos->created_at)}} ago</p>
                </div>
      
                </div>
              
              </div>
            </div>
          </a>      
        </div>

          @endforeach
          <!--End Offer vedio-->
          <div class="container">
            <div class="row">
            
              <div class="col-sm-12 col-md-12" style="display: flex; justify-content: center;">
                <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                 {{$Adminoffers->links()}}
                  {{-- <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="example_previous">
                      <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                      <li class="paginate_button page-item active">
                        <a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                      </li><li class="paginate_button page-item ">
                        <a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                      </li><li class="paginate_button page-item next" id="example_next">
                        <a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">Next</a>
                      </li></ul> --}}
                    </div>
                  </div>
                </div>
              </div>
    </div>
  </div>
 <!--End div channels-->



</div>


 </div>

@endsection