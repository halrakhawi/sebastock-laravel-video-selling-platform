@extends('layouts.admin')
@section('content')

<div class="Table-SubUser">
      

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
    <p>{{__('You are about to deactivate the user, please select the time period to deactivate it')}}</p>
  </div>
  <div class="datahide container">
  <div class="row">
    <div class="col-md-6">
      <p>{{__('Start date')}}</p>
      <input type="date" id="startdate" name="startdate" required="">
    </div>
    <div class="col-md-6">
      <p>{{__('End date')}}</p>
      <input type="date" id="Enddate" name="Enddate" required="">
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
<p>{{__('Once you press continue, you will permanently delete this user. Are you sure about the deletion process')}}?</p>
</div>
<div class="datahide container" style="margin-top: 5px;">
<div class="actiondiv2" style="margin-bottom: 5px;">
<button type="submit" class="continuedetelet" style="margin:5px !important;">{{__('continue')}}</button>
</div>
</div>
</div>
<form class="formuser1" action="{{route('admin.admins.update',[$admin->id,App()->getLocale()])}}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="container-fluid">
<div class="row">
    <div class="left-div2 col-sm-4 col-md-4 col-lg-4">
    
      <div class="image-div-subAdmin">
        <div class="img-avatar8">
        <img id="blah" class="avatar8" src="{{url('profile')}}/{{$admin->picture}}" alt="your image">
        <input type="file" name="picture" class="input_btn" onchange="readURL(this);" style="float: left; width: 100%; margin-top: 15%;">  
      </div>

      <div class="avatar-name">
        <p class="name-avatar8">{{$admin->name}}</p>
        
      </div>
      </div>


    </div>

    <div class="col-sm-8 col-md-8 col-lg-8">
     
           
      

          <div class=" FLname">

          <div class="mb-3">
            <input type="text" class="form-control" placeholder="{{__('Name')}}" required="" value="{{$admin->name}}" name="name">
          </div>
          {{-- <div class="col-sm-12 col-md-6 col-lg-6 lname">
            <input type="text" class="form-control" placeholder="Last Name" required="">
          </div> --}}
        </div>
        <br>
        <br>
        <div class="mb-3">
          <input type="email" required="" placeholder="{{__('Email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$admin->email}}" name="email">
        </div>
        <br>
        <div class="mb-3">
          <input type="number" placeholder="{{__('Phone Number')}}" class="form-control" required="">
        </div>
        <br>

        <div class="mb-3">
          <input type="password" placeholder="{{__('password')}}" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" required="" value="{{$admin->password}}" name="password">
        </div>
        <br>
        <div class="mb-3">
          <input type="password" placeholder="{{__('Confirm password')}}" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" required="" name="confirmpassword">
        </div>
        <br>

        {{-- <div class="row Gender-div">

          <div class="Title-Gender">
            <p class="Gender">Gender:</p>
          </div>

          <div class="divoptoin1">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
          <label class="form-check-label" for="inlineRadio1">Male</label>
        </div> --}}
{{-- 
        <div class="divoptoin2">
          <input class="form-check-input" type="radio" checked="" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>

        </div> --}}
        <br>
      
        {{-- <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-4 ">
            <input type="text" class="form-control" placeholder="Country" required="">
          </div>
          <div class="col-sm-12 col-md-4 col-lg-4 location1">
            <input type="text" class="form-control" placeholder="Region" required="">
          </div>
          <div class="col-sm-12 col-md-4 col-lg-4 location1">
            <input type="text" class="form-control" placeholder="Zip code" required="">
          </div>
        </div> --}}
        <br>
        <button type="submit" class="btn-save">{{__('Save')}}</button>
       
      </form>
    </div>
</div>
</div>
</div>

@endsection