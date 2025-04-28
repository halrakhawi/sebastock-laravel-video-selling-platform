@extends('layouts.admin')
@section('content')

<div class="Table-SubUser">
    <div class="breadcrumb-holder container-fluid">
        <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Content</li>
          <li class="breadcrumb-item active">Content_details</li>
        </ul>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 right">               
            <div class="card-close" style="position: absolute; display: flex;">
                
                  <div class="dropdown itemstop">
                  <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                    <i class="fas fa-filter"></i></button>

                  <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                   <a href="#" class="dropdown-item">
                  Recently </a>
                    <a href="#" class="dropdown-item ">
                    Oldest </a>
            
                    <a href="#" class="dropdown-item ">
                        Most downloaded </a>
                        
                  </div>
                  
                </div>

                <div class="dropdown itemstop">
                    <!-- <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                      <i class="fa fa-ellipsis-v"></i> -->
                      
                      <!-- <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"> -->
                      <form action="{{route('admin.deletevideo',$video->id)}}"
                              method="post">
                              @csrf
                            <button type="submit" href="" class="dropdown-item edit"><i class="fas fa-trash-alt"></i></button>
                          </form>
                            <!-- <a href="{{route('front.vedios.delete',$video->id)}}" class="dropdown-item edit"><i class="fas fa-trash-alt"></i>delete</a> -->
                          <!-- </div> -->


                    </button></div>
                
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


<div class="">
<div class="row">
  

    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="channel-div">
          
                <div class="first-big vedio" style="padding: 0px !important;">
                    <div class="col-sm-12 md-12 lg-12">
                        <iframe width="100%" sandbox="0" class="big-move big-move-Contantdetails" src="{{route('file1',$video->url)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                   
                

                <div class="info-channel big-video ">

                    <div class="div-channel-info2">
                    <div class="channele-name-div">
                      <div class="channel-data">
                    <h2 class="Vediotitle">
                      {{$video->name}}
                      </h2>

                  </div>
                  <p class="price-number"> {{$video->price}}$ </p>
                     
               </div>
               </div>

                  <div class=" row second-info  second-info-contantDetails" style="font-size: 20px;">

                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <p class="time-info" style="    font-size: 17px !important;
                      padding-top: 10px;">{{timeInfo(now()->diffInHours($video->created_at))}}</p>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6 DetailsChann">
                      
                            
                    <div class="iconinfo2">
                      <div class="right-info">
                        <div class="iconinfo1">
                          <i class="fas fa-eye"></i>
                          <p class="num-info">{{$video->views}}</p>
                        </div>
                        <div class="iconinfo2">
                          <i class="fas fa-download"></i>
                          <p class="num-info">{{$video->sales}}</p>
                        </div>
                        <div class="iconinfo2">
                          <i class="fas fa-share"></i>
                          <p class="num-info">{{$video->share}}</p>
                        </div>


                    


                      </div>
                    </div>
               

                  </div>
                 
        
                  </div>
                <hr style="margin-top: -10px;">
                  <!--============================-->
                  <div class="channel-detailspage">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="image-channelDiv">
                          <img src="{{asset('/Seba/storage/profile')}}/{{$video->seller->picture}}" class="logochannel">
                        </div>

                        <div class="details-image-channelDiv">
                          <h3 class="channelName3">{{$video->seller->name}}</h3>
                          <div>
                          <i class="fas fa-user userdetails"></i>
                          <p class="supscription">2.3K</p>
                        </div>
                        <!-------------------->
                        {{-- <form action="{{route('admin.addprice',$id)}}" method="post">
                            @csrf
                            Price: <input type="text" name="price"><br>
                            <input type="submit" value="Add">
                            </form> --}}
                        <!-------------------->    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>
        </div>
        </div>

    
        <!--End div channels-->
         {{-- <div class="col-sm-4 col-md-4 col-lg-4">
         <div class="downloads-buyer">
            <div class="card-header title-moremove title-moremove-contantdetails">
                <h3 class="h4">Similar vedio</h3>
              </div>
             <div class="more-vidoes more-vidoesContant-details">
                
                 <div class=" row video-home" style="background-color: #fff;">
                     <div class="col-sm-5 col-md-5 col-lg-5">
                        <iframe width="100%"  class="movedownloads" src="https://www.youtube.com/embed/8Swzhq9Pnr0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                     </div>

                     <div class="col-sm-7 col-md-7 col-lg-7">
                        <div class="info-channel contant-detailmove " style="padding-top: 15px;">

                            <h6 class="Vediotitle">
                            Vedio Title
                            </h6>
  
                            <div class="div-channel-info2">
                            <div class="channele-name-div channele-name-contantdetails">
                              <div class="channel-data channel-data-contant-details">
                            <span class="fas fa-check-circle leftplace check-contant-details"></span>
                            <p class="channelname channelname-contant-details">Channel Name</p>
                          </div>
                    </div>
  
                     
                    <div class="data_contant">
                      <p class="time-info" style="font-size: 12px !important; margin-top: -15px;">4 Sept.2012</p>
                     </div>
                          <div class="second-info">
                            <div class="right-info">
                           
                            <div class="iconinfo2" style="padding-left: 0px;">
                              <div class="right-info">
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
      
                              </div>
                            </div>
                       
  
                          </div>
                       
                
                          </div>
                        
                        </div>
                     </div>
                 </div>
                 </div>
                 <hr>
                 <!--==============================================-->
                 <div class=" row video-home" style="background-color: #fff;">
                  <div class="col-sm-5 col-md-5 col-lg-5">
                     <iframe width="100%" class="movedownloads" src="https://www.youtube.com/embed/8Swzhq9Pnr0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                  </div>
                  <div class="col-sm-7 col-md-7 col-lg-7">
                     <div class="info-channel contant-detailmove " style="padding-top: 15px;">

                         <h6 class="Vediotitle">
                         Vedio Title
                         </h6>

                         <div class="div-channel-info2">
                         <div class="channele-name-div channele-name-contantdetails">
                           <div class="channel-data channel-data-contant-details">
                         <span class="fas fa-check-circle leftplace check-contant-details"></span>
                         <p class="channelname channelname-contant-details">Channel Name</p>
                       </div>
                 </div>

                  
                 <div class="data_contant">
                   <p class="time-info" style="font-size: 12px !important; margin-top: -15px;">4 Sept.2012</p>
                  </div>
                       <div class="second-info">
                         <div class="right-info">
                        
                         <div class="iconinfo2" style="padding-left: 0px;">
                           <div class="right-info">
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
   
                           </div>
                         </div>
                    

                       </div>
                    
             
                       </div>
                     
                     </div>
                  </div>
              </div>
              </div>
              <hr>
              <!--==============================================-->
              
              <div class=" row video-home" style="background-color: #fff;">
                <div class="col-sm-5 col-md-5 col-lg-5">
                   <iframe width="100%" class="movedownloads" src="https://www.youtube.com/embed/8Swzhq9Pnr0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                </div>
                <div class="col-sm-7 col-md-7 col-lg-7">
                   <div class="info-channel contant-detailmove " style="padding-top: 15px;">

                       <h6 class="Vediotitle">
                       Vedio Title
                       </h6>

                       <div class="div-channel-info2">
                       <div class="channele-name-div channele-name-contantdetails">
                         <div class="channel-data channel-data-contant-details">
                       <span class="fas fa-check-circle leftplace check-contant-details"></span>
                       <p class="channelname channelname-contant-details">Channel Name</p>
                     </div>
               </div>

                
               <div class="data_contant">
                 <p class="time-info" style="font-size: 12px !important; margin-top: -15px;">4 Sept.2012</p>
                </div>
                     <div class="second-info">
                       <div class="right-info">
                      
                       <div class="iconinfo2" style="padding-left: 0px;">
                         <div class="right-info">
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
 
                         </div>
                       </div>
                  

                     </div>
                  
           
                     </div>
                   
                   </div>
                </div>
            </div>
            </div>
            <hr>
            <!--==============================================-->
            <div class=" row video-home" style="background-color: #fff;">
              <div class="col-sm-5 col-md-5 col-lg-5">
                 <iframe width="100%" class="movedownloads" src="https://www.youtube.com/embed/8Swzhq9Pnr0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
              </div>
              <div class="col-sm-7 col-md-7 col-lg-7">
                 <div class="info-channel contant-detailmove " style="padding-top: 15px;">

                     <h6 class="Vediotitle">
                     Vedio Title
                     </h6>

                     <div class="div-channel-info2">
                     <div class="channele-name-div channele-name-contantdetails">
                       <div class="channel-data channel-data-contant-details">
                     <span class="fas fa-check-circle leftplace check-contant-details"></span>
                     <p class="channelname channelname-contant-details">Channel Name</p>
                   </div>
             </div>

              
             <div class="data_contant">
               <p class="time-info" style="font-size: 12px !important; margin-top: -15px;">4 Sept.2012</p>
              </div>
                   <div class="second-info">
                     <div class="right-info">
                    
                     <div class="iconinfo2" style="padding-left: 0px;">
                       <div class="right-info">
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

                       </div>
                     </div>
                

                   </div>
                
         
                   </div>
                 
                 </div>
              </div>
          </div>
          </div>
          <hr>
          <!--==============================================-->
           
                
             </div>
         </div>
      </div> --}}
    
</div>

@endsection