@extends('layouts.seller')
@section('content')
<div class="Table-SubUser">
    <!-- Page Header-->
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('seller.index',App()->getLocale())}}">Dashboard</a></li>
         <li class="breadcrumb-item active">Add Video</li>
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
  <button type="submit" class="continuedetelet" style="margin:5px !important;">continue</button>
</div>
</div>
</div>

<form action="{{route('front.vedios.store')}}" method="post" id="addvidio" enctype="multipart/form-data">
  @csrf
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-8 col-md-8 col-lg-9">
      <div class="card mb-3">
        <Div class="add-video-box">
          <input id="urlinput" type="file" name="url" class="choosefile">  
          <span class="text-danger error-text url_error"></span>
        </Div>         
        <div class="progress">
    <div class="progress-bar"></div>
</div>
<div id="uploadStatus"></div>
  <!--      <div id="myProgress" style=" width: 100%;background-color: grey;">-->
  <!--<div id="myBar" style=" width: 1%;height: 30px;background-color: green;"></div>-->
</div>
       
          <div class="card-body ">
                                     

                                <div>

                        

                        

                    </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Video title</label>
              <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
              <span class="text-danger error-text name_error"></span>
            </div>
              <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Picutre</label>
             <input type="file" name="picture" class="inputsignup custom-file-input" style="opacity:1" id="customFile">
             <span class="text-danger error-text picture_error"></span>
            </div>
             
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Video description</label>
              <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3"></textarea>
              <span class="text-danger error-text details_error"></span>
            </div>
         
 
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Category Name</label>
              <select name="cat_id" class="form-select form-select-sm Danger" aria-label=".form-select-sm example">
                <option selected>Select Category</option>
                @foreach ($cats as $item)
                <option value="{{$item->id}}">{{$item->name}} </option>
                @endforeach
              </select>
              <span class="text-danger error-text cat_id_error"></span>
            </div>

          
        </div>
        <div class="btn-group col-lg-4 ">
          <input id="submit" type="submit" value="Done" class="btn btn-success btnupdatesellerprofile" />
        </div>
      </div>
 

    </div>
 </div>
</div>
</form> 



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
