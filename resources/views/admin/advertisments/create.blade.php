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
              <li class="breadcrumb-item active">{{__('Advertisements')}}</li>
              <li class="breadcrumb-item active">{{__('Add Advertising')}}</li>
            </ul>
            </div>
            <!--<div class="col-sm-12 col-md-6 col-lg-6 right">               -->
            <!--  <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>-->
            <!--</div>-->
          </div>
        </div>

  

          <div class="card-close subadmin-icon more_optionicon" >      
            <div class="dropdown" style="float: right; margin-right: 30px;">
              <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                <a href="#" class="dropdown-item massage"><i class="fas fa-pen"></i>{{__('Edit')}}</a>
                  <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>{{__('Deactivate')}}</a>
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
      <p>{{__('Once you press continue, you will permanently delete this user. Are you sure about the deletion process?')}}</p>
    </div>
    <div class="datahide container" style="margin-top: 5px;">
    <div class="actiondiv2" style="margin-bottom: 5px;">
      <button type="submit" class="continuedetelet" style="margin:5px !important;">{{__('continue')}}</button>
    </div>
</div>
</div>
</div>


    
    <!--Start div Advertising details-->
  

    <div class="Advertising_details">
      
        
        <div class="container-fluid">
 
                <form id="addadv" class="details_Advertising " method="post" action="{{route('admin.Advertisments.add',App()->getLocale())}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising">
                            <p class="top-heading">ID</p>
                          <input type="text" class="form-control" placeholder="123456">
                        </div> -->
                        <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising ">
                            <p class="top-heading">{{__('Title')}}</p>
                          <input type="text" class="form-control" name="title" placeholder="Example: product site">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising">
                            <p class="top-heading">{{__('Announcement Start')}}</p>
                            <div class="input_long row">
                            <div class="col-sm-6 col-md-6 col-lg-6 ">
                          <input type="date"  class="form-control" placeholder="17/07/2017" id="date" >
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 select_time row">
                         <div class="">
                          <input type="number"  class="form-control" placeholder="0" id="oclock" >
                           </div>
                           <div class="">
                          <input type="number"  class="form-control" placeholder="0" id="oclock" >
                        </div>
                        <div class="">

                          <select class="form-control" id="zoon">
                              <option>{{__('AM')}}</option>
                              <option>{{__('PM')}}</option>
                          </select>
                          </div>
                          </div>
                        </div>
                    </div>

                    <!-- <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising">
                        <p class="top-heading">Description </p>
                      <textarea  class="form-control descriptindiv"
                      placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        "></textarea>
                    </div> -->

                    <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising">
                        <p class="top-heading">{{__('Announcement Link')}}</p>
                      <input type="text" class="form-control" placeholder="Example: http:/example.com">
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising">
                        <p class="top-heading">{{__('Announcement Price')}}</p>
                      <input type="text" class="form-control" placeholder="$70">
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising">
                        <p class="top-heading">{{__('Announcement type')}}</p>
                      <input type="radio" class="form-control" value="1" name="type">{{__('Video')}}</input>
                      <input type="radio" class="form-control" value="2" name="type">{{__('image')}}</input>
                    </div>
                    
                    <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising">
                        <p class="top-heading">Announcement Status')}}</p>
                      <input type="radio" class="form-control" value="1" name="status">{{__('Active')}}</input>
                      <input type="radio" class="form-control" value="0" name="status">{{__('Deactive')}}</input>
                    </div>
             

                <div class="col-sm-12 col-md-6 col-lg-6 input_Advertising">
                    <p class="top-heading">{{__('Attachment')}}</p>
                  <div class="row">

                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <img id="blah" src="./img/uploadimage.png" alt="your image" />            
                        </div>

                    <div class="col-sm-6 col-md-6 col-lg-6">
                    <input type='file' class="input_btn" onchange="readURL(this);" name="url" style="float: left; width: 100%;" />
                    </div>
         
        </div>
          
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 input_Advertising">
                <button  id="submit" type="submit" class="btn-Accept">{{__('Accept')}}</button>
                 </div>

            </div>
             </form>  
        </div>
    </div>
@endsection