@extends('layouts.admin')
@section('content')


<div class="Table-SubUser">
    <div class="breadcrumb-holder container-fluid">
        <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
          <li class="breadcrumb-item "> <a href="{{route('admin.sellers',App()->getLocale())}}">{{__('Sellers')}}</a></li>
          <li class="breadcrumb-item active">{{__('Seller Destails')}}</li>
        </ul>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 right">               
          <div class="card-close" style="position: absolute; display: flex;">
            <div class="dropdown itemstop">
              <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                <i class="fas fa-sort"></i></button>

              <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
               <a href="#" class="dropdown-item ATZ">
                {{__('A TO Z')}}</a>
                <a href="#" class="dropdown-item ZTA">
                  {{__('Z TO A')}}</a>
              </div>
              </div>
              <div class="dropdown itemstop">
              <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                <i class="fas fa-filter"></i></button>

              <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
               <a href="#" class="dropdown-item">
                {{__('Recently')}} </a>
                <a href="#" class="dropdown-item ">
                {{__('Oldest')}}  </a>
        
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
        <img src="{{asset('/Seba/storage/profile')}}/{{$seler->picture}}" class="avatar8">
      </div>

      <div class="avatar-name">
        <p class="name-avatar8">{{$seler->seller_name}}</p>
        <div class="salary Seller-pice">
          <div class="num-salary" >
              <p> {{$seler->balance}}$</p>
          </div>
        
      </div>
        <p class="avatar-Email" style="font-size: 12px;">{{$seler->email}}</p>
        <div class="Seller-details-icon">
           <a href="#" class="dropdown-item massage extra-icon " aria-haspopup="true" aria-expanded="false" title="Send message" id="myBtn"><i class="far fa-envelope envo"></i></a>
           <div id="myModal" style="display: none; position: fixed; z-index: 1; padding-top: 100px; left: 0px; top: 0px; width: 100%; height: 100%; overflow: auto;">

            <!-- Modal content -->
            <div class="modal-contentmsg">
                <div class="modal-headermsg">
                    <span class="closemsg ">&times;</span>
                    <!-- <i class=" close close1  fas fa-chevron-down"></i> -->
                    <h2>New message</h2>
                </div>
                <form action="{{ route('admin.Message.tosellerstore') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-3  Mainform">
                            <input type="text" class="form-control form1 form-input" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm"  name="to" value="{{$seler->email}}">
                        </div>
                        <div class="input-group input-group-sm mb-3 Mainform">
                            <input type="text" class="form-control form-input" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" placeholder="Subject" name="subject">
                        </div>
                        <div class="input-group input-group-sm mb-3  ">
                            <textarea class="form-control form-input textareamsg" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" placeholder="write here" name="body"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-light" value="Send"><i class="far fa-paper-plane"></i>
                        {{-- <button type="button" class="btn btn-light">Send <i class="far fa-paper-plane"></i></button> --}}

                    </div>
                </form>
            </div>

        </div>
           <a href=""  data-toggle="modal" data-target="#activesellerexampleModal" class="dropdown-item remove extra-icon" title="Deactivate"> <i class="far fa-times-circle envo"></i> </a>
          <div class="modal fade" id="activesellerexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Accept Users</h5>
                  <button type="submit" class="close" data-dismiss="modal" aria-label="Close">   
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    {{-- <i class="far fa-times-circle closedelete"></i> --}}
                    <h4>Do you want to accept this user?</h4>
                    <p class="pDelete">Do you really want to accept this user? This process cannot be undone.</p>
                  <button type="button" class="btn btn-secondary" style="margin-bottom: 10px" data-dismiss="modal">Cancel</button>
                  <form action="{{route('admin.sellerActivate',$seler->seller_id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="margin-bottom: 10px">Accept</button>
                  </form>
                </div>
                <!-- <div class="modal-footer">
                
                </div> -->
              </div>
            </div>
          </div>
          <a href="#" class="dropdown-item edit extra-icon" title="Delete" data-toggle="modal" data-target="#deletesellerexampleModal"><i class="fas fa-trash-alt envo"></i></i></a>
          <div class="modal fade" id="deletesellerexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Users</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <i class="far fa-times-circle closedelete"></i>
                    <h4>Do you want to delete this user?</h4>
                    <p class="pDelete">Do you really want to delete this user? This process cannot be undone.</p>
                  <button type="button" class="btn btn-secondary" style="margin-bottom: 10px" data-dismiss="modal">Cancel</button>
                  <form action="{{route('admin.deleteseller',$seler->seller_id)}}" method="post">
                    @csrf
                  <button type="submit" class="btn btn-danger" style="margin-bottom: 10px">Delete</button>
                  </form>
                </div>
                <!-- <div class="modal-footer">
                
                </div> -->
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
      
      </div>
      
      <div class="col-sm-9 col-md-9 col-lg-9">
        <div class="channel-div">
            <div class="container">
              <div class="row">
                  <!--End first vedio-->

                  @foreach ( $veds as $video)
                    @if($seler->seller_id == $video->seller_id)


                    <div class="box-channles col-12 col-md-6 col-lg-6">
                      <div class="containt-channel">
                        <div class="vedio-channel">
                          <video class="video move" width="100%" controls disablePictureInPicture controlsList="nodownload nofullscreen">
                            <source src="{{route('file1',$video->url)}}" type="video/mp4">
                        </video>
                          {{-- <iframe width="100%" class="move" src="{{route('file1',$item->url)}}"  allow=" clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> --}}
                        </div>
                        <div class="info-channel">
    
                          <h4 class="Vediotitle">
                          {{$video->name}}
                          </h4>
    
                          <div class="div-channel-info2">
                          <div class="channele-name-div">
                             <div class="channel-data">
                                      <i class="fas fa-sitemap"></i>
                                       @foreach ( $cats as $cat)
                                        @if($cat->id == $video->cat_id)
                                      <p class=" channelname CH-N">{{$cat->name}}</p>
                                      @endif
              @endforeach
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
                          <p class="time-info">{{now()->diffInMonths($video->created_at)}}month ago</p>
                        </div>
              
                        </div>
                      
                      </div>
                    </div>
              </div>
              @endif
              @endforeach
              <!--=================================divfirstvedio=============================-->
           
            </div>
          </div>
         <!--End div channels-->

    
        
      </div>
    
</div>

</div>
    


@endsection