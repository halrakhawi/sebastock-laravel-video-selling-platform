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
        <li class="breadcrumb-item active">Sub-Admin</li>
        <li class="breadcrumb-item active">Add-SubAdmin</li>
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
  <button type="submit" class="continuedetelet" style="margin:5px !important;">continue</button>
</div>
</div>
</div>


 <div class="container-fluid">
  <div class="row">
      

      </div>

      <div class="col-sm-8 col-md-8 col-lg-8">
        
        <!--<div class="card-close subadmin-icon">      -->
        <!--  <div class="dropdown">-->
        <!--    <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>-->
        <!--    <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">-->
        <!--      <a href="./massage.html" class="dropdown-item massage"><i class="far fa-envelope"></i>{{__('Send massage')}}</a>-->
        <!--        <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>Deactivate</a>-->
        <!--        <a href="#" class="dropdown-item edit  actionsubadmin2"><i class="fas fa-trash-alt"></i></i>delete</a></div>-->
        <!--      </div> -->
        <!--      </div>-->

              <br>
             
        <form class="formuser1" method="POST" action="{{route('admin.admins.store',App()->getLocale())}}" enctype="multipart/form-data">
            @csrf
            <div class="row FLname">

            <div class="col-sm-12 col-md-6 col-lg-12">
              <input type="text" class="form-control" placeholder="{{__('Name')}}" name="name">
            </div>
          </div>
          <br>
          <br>
          <div class="mb-3">
            <input type="email" name="email" placeholder="{{__('Email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <br>

          <div class="mb-3">
            <input type="password" name="password" placeholder="{{__('Password')}}" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
          </div>
          <br>
          <div class="mb-3">
            <input type="file" placeholder="{{__('Picture')}}" id="picture" class="form-control" name="picture">
          </div>
          <br>

          
          <br>
        
          
          <br>
          <button type="submit" class="btn-save">{{__('Save')}}</button>
         
        </form>
      </div>
  </div>
 </div>
</div>

@endsection

