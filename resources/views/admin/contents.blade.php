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
        <li class="breadcrumb-item active">{{__('Contents')}}</li>
      </ul>
      </div>
      {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
        <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> {{__('Backup Data')}}</button>
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
                   <a href="{{route('admin.contentsort',['sort-asc',App()->getLocale()])}}" class="dropdown-item ATZ">
                    {{__('A TO Z')}}</a>
                    <a href="{{route('admin.contentsort',['sort-desc',App()->getLocale()])}}" class="dropdown-item ZTA">
                      {{__('Z TO A')}}</a>
                  </div>
                  </div>
                  <div class="dropdown itemstop">
                  <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                    <i class="fas fa-filter"></i></button>

                  <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                   <a href="{{route('admin.contentsort',['sort-recent',App()->getLocale()])}}" class="dropdown-item">
                    {{__('Recently')}} </a>
                    <a href="{{route('admin.contentsort',['sort-old',App()->getLocale()])}}" class="dropdown-item ">
                      {{__('Oldest')}} </a>
            
                  </div>
                  
                </div>
                
              </div>
              <div class="card-header d-flex align-items-center">
                <h3 class="h4"> {{__('Contents')}}</h3>
              </div>                     
            </div>
          </div>                
        </div>
    <!-- Start slider channels-->
    <div class="container">
      <!-- MULTIPLE ITEMS -->
      {{-- <div class="example-box">
        <div class="carousel-multiple-items ec">
        <div class="ec__holder"><div class="ec__track" style="width: 4433px; transition: transform 300ms ease 0s; transform: translate3d(-858px, 0px, 0px);"><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div style="width: 143px;" class="ec__item">
            <div class="box box_active">All</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div style="width: 143px;" class="ec__item cloned">
            <div class="box box_active">All</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div><div class="ec__item cloned" style="width: 143px;">
            <div class="box">channel Name</div>
          </div></div></div><div class="ec__nav ec__nav--prev" role="button" disabled="true"></div><div class="ec__nav ec__nav--next" role="button"></div></div>
      </div> --}}
    </div>



    <!-- Start slider channels-->

    <!-- Start div channels-->
    <div class="channel-div">
        <div class="container">
          <div class="row">
              @foreach ($AdminAccvideos as $item)
              <!--End first vedio-->
            <div class="box-channles col-sm-4 col-md-4 col-lg-3">
              <div class="containt-channel">
                <div class="vedio-channel">
                  <video class="video move" width="100%" controls disablePictureInPicture controlsList="nodownload nofullscreen" poster="{{asset('/Seba/storage/profile')}}/{{$item->Videopicture}}">
                    <source src="{{route('file1',$item->url)}}" type="video/mp4">
                </video>
                  {{-- <iframe width="100%" class="move" src="{{route('file1',$item->url)}}"  allow=" clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> --}}
                </div>
                <div class="info-channel">

                <a href="{{route('admin.contentdetails',[$item->id,App()->getLocale()])}}"> <h4 class="Vediotitle">
                  {{$item->name}}
                  </h4></a>

                  <div class="div-channel-info2">
                  <div class="channele-name-div">
                    <div class="channel-data">
                  <span class="fas fa-check-circle leftplace check"></span>
                  <p class="channelname">{{$item->seller_name}}</p>
                </div>
                  <p class="price-number"> {{$item->price}}$ </p>
                   
             </div>
             </div>


                <div class="second-info">
                  <div class="right-info">
                  <div class="iconinfo1">
                    <i class="fas fa-eye"></i>
                    <p class="num-info">{{$item->views}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-download"></i>
                    <p class="num-info">{{$item->sales}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-share"></i>
                    <p class="num-info">{{$item->share}}</p>
                  </div>

                </div>
                <div class="left-div">
                  <p class="time-info">{{timeInfo(now()->diffInHours($item->created_at))}}</p>
                </div>
                <div class="left-div">
                  <button class="btnaddoffer" type="submit" style="border:none; padding:10px"><a href="{{route('admin.offer.create',[$item->id,App()->getLocale()])}}">Add Offer</a></button>
                </div>
      
                </div>
              
              </div>
            </div>
          </div>
          @endforeach
       
        </div>
      </div>
     <!--End div channels-->
     <div class="container">
      <div class="row">
     <div class="col-sm-12 col-md-12" style="display: flex; justify-content: center;">
      <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
      
          {{$AdminAccvideos->links()}}

        </div>
      </div>
    </div>
  </div>
  </div>

 
</div>
</div>

@endsection