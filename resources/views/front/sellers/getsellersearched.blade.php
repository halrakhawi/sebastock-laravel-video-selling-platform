@extends('layouts.seller')
@section('content')


<div class="container">
  <div class="row">
      @foreach ( $filterdVideos as $item)
  <div class="box-channles col-6 col-md-4 col-lg-3">
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
            <p class="num-info">1.7K</p>
          </div>
          <div class="iconinfo2">
            <i class="fas fa-share"></i>
            <p class="num-info">178</p>
          </div>
  
        </div>
        <div class="left-div">
          <p class="time-info">14 hours ago</p>
        </div>
        </div>
      
      </div>
    </div>
  </div>
  @endforeach
  </div>
  </div>
@endsection