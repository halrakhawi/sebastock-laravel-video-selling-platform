@extends('layouts.seller')
@section('content')

<div class="Table-SubUser">
    <div class="breadcrumb-holder container-fluid">
        <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('seller.index',App()->getLocale())}}">Dashboard</a></li>
          <li class="breadcrumb-item ">Profile</a></li>
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
        <img src="{{url('Seba/storage/profile')}}/{{$seller->picture}}" class="avatar8">
      </div>

      <div class="avatar-name">
        <p class="name-avatar8">{{auth('seller')->user()->seller_name}}</p>
        <div class="salary buyer-pice">
          <div class="num-salary">
              <p>{{auth('seller')->user()->balance}}$</p>
          </div>
      </div>
        <p class="avatar-Email" style="font-size: 12px;">{{auth('seller')->user()->email}}</p>
      </div>
      </div>


    </div>

    <div class="col-sm-9 col-md-9 col-lg-9">
        <form action="{{route('sellerupdate',auth('seller')->id())}}" method="post">
            @csrf
        <div class="channel-div">
            <div class="container">
             <div class="row">
              <div class="mb-3 col-sm-9 col-md-9 col-lg-9">
                <label for="exampleFormControlInput1" class="form-label profile-input">First Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex. jon" name="name" value="{{auth('seller')->user()->seller_name}}">
              </div>
              <div class="mb-3 col-sm-9 col-md-9 col-lg-9">
                <label for="exampleFormControlInput1" class="form-label profile-input">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{auth('seller')->user()->email}}">
              </div>
              <div class="mb-3 col-sm-9 col-md-9 col-lg-9">
                <label for="exampleFormControlInput1" class="form-label profile-input">Channel Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ABC" name="storename" value="{{auth('seller')->user()->store_name}}">
              </div>
              <div class="mb-3 col-sm-9 col-md-9 col-lg-9">
                <button type="submit" class="btn btn-success btnupdatesellerprofile">Update</button>
              </div>
             </div>

          </div>
         
         <!--End div channels-->

    
        
      </div>
    </form>
</div>

@endsection