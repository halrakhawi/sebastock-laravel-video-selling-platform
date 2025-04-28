@extends('layouts.seller')
@section('content')


   <div class="Table-SubUser">
            <div class="breadcrumb-holder container-fluid">
                <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item active">Update video</li>
                </ul>
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
 

       <div class="container-fluid" style="margin-top: 10px;">
        <div class="col-lg-12">
          <div class="card">                  
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Update video</h3>
            </div> 
            <div class="row contant-div " style="height: 500px; margin-top:3%;">
              <div class=" col-sm-12 col-md-9 col-lg-9  update-video">
               <form action="{{route('seller.videoupdate',$video->id)}}" method="post" class="form update-inputs col-lg-12" >
                   @csrf
                    <div class="form-group col-lg-6" style="margin-bottom:40px">
                       <input type="text" class="form-control" placeholder="Video name" name="name" value="{{$video->name}}">
                     </div>
                     <div class="form-group col-lg-6"  style="margin-bottom:40px">
                      <input type="number" class="form-control" placeholder="Video price" name="price" value="{{$video->price}}">
                    </div>
                   
                    
                    
                      <div class="form-group col-lg-12"  style="margin-bottom:40px">
                        <input type="textarea" style="height:70px" class="form-control" placeholder="video description" name="details" value="{{$video->details}}">
                      </div>
                       
                    
                     
                     
                        <div class="input-group mb-3  col-lg-12"  style="margin-bottom:40px">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Category</label>
                          </div>
                          <select class="custom-select" id="inputGroupSelect01" name="cat">
                              @foreach($cats as $cat)
                           
                            <option value="{{$cat->id}}" {{$cat->id==$video->cat->id? 'selected':''}}>{{$cat->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      <!--</form>-->
                      <!--<form action="#" class="form upload-V col-lg-12">-->
                      <!--  <div class="input-group mb-3  col-lg-12 ">-->
                      <!--    <div class="input-group-prepend">-->
                      <!--      <span class="input-group-text" id="inputGroupFileAddon01">Upload Video</span>-->
                      <!--    </div>-->
                      <!--    <div class="custom-file">-->
                      <!--      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">-->
                      <!--      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</form>-->
                      <!--<form action="#" class="form   col-lg-12 m-auto">-->
                      <div class="form-group col-lg-9 savebtn" style="margin-top:40px">
                        <button class="btn btn-success col-lg-6 m-auto " type="submit">Save</button>
                      </div> 
                      </form>
                  </div>
                
                </div>                    
          </div>

        </div>

   


            </div>

           
    
            
                
        </div>
            
      </div>

@endsection