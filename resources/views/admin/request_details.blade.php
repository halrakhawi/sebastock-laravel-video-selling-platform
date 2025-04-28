@extends('layouts.admin')
@section('content')

<div class="Table-SubUser">
    <!-- Page Header-->
    <!--start backup div-->
<div class="Accept-div">
  {{-- comment modal accept video --}}
{{-- <div class="Accept_div">
  <div class="colseicon">
    <i class="far fa-times-circle colse"></i>
  </div>
  <br>
  <div class="title-hidediv container">
    <p>You must set the price for the content first</p>
  </div>
  <div class="datahide container">
  <div class="row">
    <div class="col-md-12">
      <p style="float: left; color: rgb(177, 186, 202); padding-top: 3px;">The price is in dollars:</p>
      <input type="number" id="Priceaccepted" name="Price" placeholder="$">
    </div>
   
  </div>
  <div class="actiondiv">
    <button type="submit" class="actionbtn">continue</button>
  </div>
</div>
</div> --}}

<!--************************-->
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
        <li class="breadcrumb-item active">{{__('Requests')}}</li>
        <li class="breadcrumb-item active">{{__('Request_details')}}</li>
      </ul>
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
        <p>{{__('Start date')}}</p>
        <input type="date" id="startdate" name="startdate">
      </div>
      <div class="col-md-6">
        <p>{{__('End date')}}</p>
        <input type="date" id="Enddate" name="Enddate">
      </div>
     
    </div>
    <div class="actiondiv">
      <button type="submit" class="actionbtn">{{__('Save')}}</button>
    </div>
</div>
</div>

<!--************************-->
<div class="hidediv1 deletediv">
  <div class="massage-hidediv2 deletediv2 ">
<div class="colseicon">
  <i class="far fa-times-circle colse"></i>
</div>
<br>
<div class="title-hidediv container">
  <p>Once you press continue, you will permanently delete this user. Are you sure about the deletion process?</p>
</div>
<div class="datahide container" style="margin-top: 5px;">
<div class="actiondiv2" style="margin-bottom: 5px;">
  <button type="submit" class="continuedetelet" style="margin:5px !important;">{{__('continue')}}</button>
</div>
</div>
</div>


 <div class="container-fluid">
  <div class="row">
      <div class="left-div2 col-sm-4 col-md-4 col-lg-4" style="height:450px">
      
        <div class="image-div-subAdmin"  style="display:flex; flex-direction:column; justify-content:center; align-items:center">
          <div class="img-avatar8" style="padding:0px; display:flex; justify-content:center; width:170px; height:170px">
            
          <img src="{{asset('/Seba/storage/profile')}}/{{$req->seller->picture}}" class="avatar8">         
             
         
        </div>

        <div class="avatar-name" style="margin-top:30px">
            
          <p class="name-avatar8" >{{$req->seller->name}}</p>
          <div style="display:flex; justify-content:space-between">
          <label style="color:#707070;  padding-right:15px">Email</label>
          <p class="avatar-Email" >{{$req->seller->email}}</p>
          </div>
            <div style="display:flex; justify-content:space-between">
           <label style="color:#707070; padding-right:15px">Phone</label>
          <p class="avatar-phone" >{{$req->seller->mobile}}</p>
          </div>
            <div style="display:flex; justify-content:space-between">
           <label style="color:#707070;  padding-right:15px">Date Join</label>
          <p class="avatar-date" >{{$req->seller->created_at}}</p>
          </div>
         
        </div>
        </div>


      </div>

      <div class="col-sm-8 col-md-8 col-lg-8">

          {{-- <div class="card-close subadmin-icon">      
              <div class="dropdown show">
                <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"> 
                 <a href="#" class="dropdown-item massage"><i class="far fa-envelope"></i>Send massage</a>
                    <a href="#" class="dropdown-item edit  actionsubadmin2"><i class="fas fa-trash-alt"></i>delete</a></div>
                  </div> 
                  </div> --}}

        <br>
          <div class="channel-div">
            
              <div class="first-big vedio" style="padding: 0px !important;">
                  <div class="col-sm-12 md-12 lg-12">
                     {{-- @dd($req) --}}
                      <iframe width="100%" sandbox="0" class="big-move big-move-Contantdetails" src="{{route('file1',$req->video->url)}}" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                 
              

              <div class="info-channel big-video ">

                  <div class="div-channel-info2">
                  <div class="channele-name-div">
                    <div class="channel-data">
                  <h2 class="Vediotitle">
                    {{$req->video->name}}
                    </h2>

                   
                </div>
              
                   
             </div>
             </div>

                <div class=" row second-info  second-info-contantDetails" style="font-size: 20px; padding-top: 10px;">

                  <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="channel-data">
                          <span class="fas fa-check-circle leftplace check"></span>
                          <p class="channelname"> {{$req->seller->seller_name}}</p>
                        </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6 right">
                      <p class="time-info" style="    font-size: 17px !important;
                      padding-top: 10px;">{{now()->diffForHumans($req->created_at)}}</p>
                    </div>

               
      
                </div>
              <hr style="margin-top: -10px;">
                <!--============================-->

                <form action="{{route('admin.addprice',$req->video->id)}}" method="post">
                    @csrf
                <div class="row">
                  <div class="col-md-12 divrequestprice">
                    <div>
                      <p style="float: left; color: rgb(177, 186, 202); padding-top: 3px;">{{__('The price is in dollars')}}:</p>
                      <input type="number" id="Priceaccepted" name="price" placeholder="$" value="{{$req->video->price}}">
                    </div>
                    <button type="submit" class="actionbtn btnrequestprice">{{__('continue')}}</button>
                  </div>
                
                </div>
                {{-- <div class="actiondiv">
                   --}}
                </form>
                <div class="btns_option">
                    {{-- <div class="row"> --}}
                        {{-- <div class="col-md-8"> --}}
                          
                          <button type="submit" class="btn-Reject">{{__('Reject')}}</button>
                        {{-- </form> --}}
                          <form action="{{route('admin.accept',$req->id)}}" method="post">
                            @csrf
                          <button type="submit" class="btn-Accept">{{__('Accept')}}</button>
                          </form>
                      {{-- </div> --}}
                      {{-- @dd($req) --}}
                      <form action="{{route('admin.rject',$req->id)}}" method="post">
                            @csrf
                      <div class="Reject_resone container-fluid">
                          <label for="resons" class="for-resons">{{__('Please specify the reason for rejection')}}*</label>
                          <input type="text" class="inputresone" name="reason">

                          <div class="row">
                              <div class="col-md-4">
                                
                            </div>

                              <div class="col-md-8">
                                  <button type="submit" class="btn-send">{{__('Send')}}</button>


                                </div>
                        </div>

                       

                    </div>
                      </form>
                {{-- </div> --}}
              </div>

          </div>
        </div>
      </div>
              <br>
             
       
      </div>
  </div>
 </div>
</div>
<!--==========================delete js========================-->

@endsection