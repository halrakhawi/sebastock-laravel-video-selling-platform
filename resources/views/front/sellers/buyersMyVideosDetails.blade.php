@extends('layouts.seller')
@section('content')

   
<div class="Table-SubUser">
  <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('seller.index',App()->getLocale())}}">Dashboard</a></li>
        <li class="breadcrumb-item "> <a href="{{route('seller.getrbuyersMyVideos',App()->getLocale())}}">Buyers</a></li>
        <li class="breadcrumb-item active">Buyers Details</li>
      </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 right">               
        <div class="card-close" style="position: absolute; display: flex;">
          <div class="dropdown itemstop">
            <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
              <i class="fas fa-sort"></i></button>

            <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
              <a href="{{route('seller.buyersort','sort-asc')}}" class="dropdown-item ATZ">
                A TO Z</a>
                <a href="{{route('seller.buyersort','sort-desc')}}" class="dropdown-item ZTA">
                 Z TO A</a>
            </div>
            </div>
            <div class="dropdown itemstop">
            <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
              <i class="fas fa-filter"></i></button>

            <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
              <a href="{{route('seller.buyersort','sort-recent')}}" class="dropdown-item">
                Recently </a>
                  <a href="{{route('seller.buyersort','sort-old')}}" class="dropdown-item ">
                  Oldest </a>
      
            </div>
            
          </div>
          
        </div> 
       </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-close" style="position: absolute; display: flex;">
           
          </div>
                           
        </div>
      </div>                
    </div>

<!--start backup div-->
<div class="hidediv1">
<div class="massage-hidediv1 ">
<div class="colseicon">
  <i class="far fa-times-circle colse"></i>
</div>
<br>
<div class="title-hidediv container">
  <p>You are about to deactivate the user, please select the time period to deactivate it</p>
</div>
<div class="datahide container">
<div class="row">
  <div class="col-md-6">
    <p>Start date</p>
    <input type="date" id="startdate" name="startdate">
  </div>
  <div class="col-md-6">
    <p>End date</p>
    <input type="date" id="Enddate" name="Enddate">
  </div>
 
</div>
<div class="actiondiv">
  <button type="submit" class="actionbtn">Save</button>
</div>
</div>
</div>

<!--************************-->
<div class="hidediv1 deletediv">
<div class="massage-hidediv1 deletediv2 ">
<div class="colseicon">
<i class="far fa-times-circle colse"></i>
</div>
<br>
<div class="title-hidediv container">
<p>Once you press continue, you will permanently delete this user. Are you sure about the deletion process?</p>
</div>
<div class="datahide container" style="margin-top: 5px;">
<div class="actiondiv2" style="margin-bottom: 5px;">
<button type="submit" class="continuedetelet" style="margin:5px !important;">continue</button>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row">
  <div class="left-div2 col-sm-3 col-md-3 col-lg-3">
  
    <div class="image-div-subAdmin">
      <div class="img-avatar8">
      <img src="{{asset('/Seba/storage/profile')}}/{{ $user->picture }}" class="avatar8">
    </div>

    <div class="avatar-name">
      <p class="name-avatar8">{{$user->name}}</p>
      <div class="salary buyer-pice">
        <div class="num-salary">
            <p>{{((array)priceofsellervideos($user->id)[0])['sum(price)']}} $</p>
        </div>
    </div>
      <p class="avatar-Email" style="font-size: 12px;">{{$user->email}}</p>
    </div>
    </div>


  </div>

  <div class="col-sm-9 col-md-9 col-lg-9">
      <div class="channel-div">
          <div class="container">
            <div class="row" style="width:100%">
                <!--End first vedio-->
              @foreach ($user->downloads as $item)
              @foreach ($veds as $video)
              @if ($video->id == $item->video_id && $video->seller_id==auth('seller')->id())
              <div class="box-channles col-sm-4 col-md-4 col-lg-4">
                <div class="containt-channel">
                  <div class="vedio-channel">
                    <iframe width="100%" class="move" src="{{ route('file1', $video->url) }}"  frameborder="0" sandbox allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
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
                     
               </div>
               </div>


                  <div class="second-info">
                    <div class="right-info">
                   
                    <div class="iconinfo2">
                      <i class="fas fa-download"></i>
                      <p class="num-info">{{$video->sales}}</p>
                    </div>
               

                  </div>
                  <div class="left-div">
                    <p class="time-info">{{(($video->created_at))}}</p>
                  </div>
        
                  </div>
                
                </div>
              </div>
            </div>  
            @endif    
            @endforeach
            @endforeach
            <!--=================================div first vedio=============================-->
              <!--End first vedio-->
          

  
      
    </div>
  
</div>

@endsection