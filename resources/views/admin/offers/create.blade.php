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
        <li class="breadcrumb-item "> <a href="{{route('admin.offers',App()->getLocale())}}">{{__('Offers')}}</a></li>
        <li class="breadcrumb-item active">{{__('Add offer')}}</li>
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
      <div class="col-md-6 startdatetop">
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


 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-8 col-md-8 col-lg-9">
      <div class="card mb-3">
        {{-- <Div class="add-video-box"> --}}
          <a href="Offers_Details.html">
            <div class="box-channles col-12">
              <div class="containt-channel">
                <div class="vedio-channel">
                  <iframe width="100%" class="move"
                   src="https://www.youtube.com/embed/8Swzhq9Pnr0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="info-channel">

                  <h4 class="Vediotitle">
                  Vedio Title
                  </h4>

                  <div class="div-channel-info2">
                  <div class="channele-name-div">
                  <div class="channel-data">
                     <i class="fas fa-sitemap"></i>
                       <p class="channelname">Motion</p>
                  </div>
                  <p class="price-number-offer"> 20$ </p>
                  <p class="price-number  video-price"> 15$ </p>

                   
             </div>
             </div>


                <div class="second-info">
                  <Div class="right-info">
                  <div class="iconinfo1">
                    <i class="fas fa-eye"></i>
                    <p class="num-info">201</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-download"></i>
                    <p class="num-info">1.7K</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-share"></i>
                    <p class="num-info">178</p>
                  </div>

                </Div>
                <div class="left-div">
                  <p class="time-info">14 hours ago</p>
                </div>
      
                </div>
              
              </div>
            </div>
          </div>
          </a>
      
        {{-- </Div>            --}}
        {{-- <p class="validation">*The video should not exceed two minutes</p> --}}
       
       {{--start form add here  --}}
        <form action="{{route('admin.offer.store',$video->id)}}" method="post">
            @csrf
          <div class="card-body ">                  
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Video title</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$video->name}}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Video description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$video->details}}</textarea>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label"> Offer Price</label>
              <input type="number" class="form-control" id="exampleFormControlTextarea1" rows="3" name="offerprice">
            </div>
            
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label Cat-Name">Category Name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$video->cat->name}}">
            </div>

            <div class="date-div date-div-offer">
              <div class="col-sm-12 col-md-6 col-lg-4">
                  <label class="end-date">Start Date</label>
               <input type="date" placeholder="Start Date" name="startdate"> 
              </div>
        
              <div class="col-sm-12 col-md-6 col-lg-4 endtime">
                  <div class="col-sm-12 col-md-6 col-lg-6">
                      <label class="end-date">End Date</label>
                       <input type="date" placeholder="End Date" name="enddate"> 
                   </div>
              </div>
          </div>
          <div class="btn-group col-lg-6 ">
            <input type="submit" class="btn  btn-success offers-submite " value="Done"/>
          </div>
        </form>
       {{--end form add here  --}}


        </div>
        
      </div>
     
    
    </div>
 </div>
</div>

@endsection