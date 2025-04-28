@extends('layouts.admin')
@section('content')

<div class="Table-SubUser">
    <div class="breadcrumb-holder container-fluid">
        <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin.offers',App()->getLocale())}}">Offers</a></li>
          <li class="breadcrumb-item active">Offer_details</li>
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
    <div class="col-md-6 ">
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
<div class="hidediv1 delete Videodiv">
<div class="massage-hidediv1 delete Videodiv2 ">
<div class="colseicon">
<i class="far fa-times-circle colse"></i>
</div>
<br>
<div class="title-hidediv container">
<p>Once you press continue, you will permanently delete Video this user. Are you sure about the deletion process?</p>
</div>
<div class="datahide container" style="margin-top: 5px;">
<div class="actiondiv2" style="margin-bottom: 5px;">
<button type="submit" class="continuedetelet" style="margin:5px !important;">continue</button>
</div>
</div>
</div>


<div class="">
<div class="row">
  
    <form calss="form" action="{{route('admin.offer.action',[$offer->id,App()->getLocale()])}}" method="post">
        @csrf
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="channel-div">
          
                <div class="first-big vedio" style="padding: 0px !important;">
                    <div class="col-sm-12 md-12 lg-12">
                        {{-- <iframe width="100%" class="big-move big-move-Contantdetails" src="https://www.youtube.com/embed/8Swzhq9Pnr0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> --}}
                        <video width="100%" class="video" controls disablePictureInPicture controlsList="nodownload nofullscreen">
                            <source src="{{route('file1',$offer->videos->url)}}" type="video/mp4">
                        </video>
                

                <div class="info-channel big-video ">

                    <div class="div-channel-info2">
                    <div class="channele-name-div">
                      <div class="channel-data">
                        <div class="v-desc-div">
                          <h3 class="Vediotitle video-name">
                            {{$offer->videos->name}} </h3> 
                           <button class="btn-desc btn-vedio" style=" margin-top: -10px;  margin-left: 30px;" > <i class="fas fa-pen icon-list description"></i></button>
                         </div>
                      
                 </div>
                 <div class="flexofferprices" style="display:flex">
                  <p class="price-number price-" style="margin-right:5px; background-color:#B80303"> {{$offer->videos->price}}$ </p>
                  <p class="price-number priceoffer "> {{$offer->offerPrice}}$ </p>

                 </div>
                    
               </div>
               <div class="v-desc" >
                 <div class="v-desc-div">
                  <h4 class="Vediotitle video-name">
                    Video Description  </h4> 
                   <button class="btn-desc" > <i class="fas fa-pen icon-list description"></i></button>
                 </div>
                 <p class="V-description" > {{$offer->videos->details}}</p>
               </div>
               <div class="iconinfo2 video-D" style="padding-left: 0px;">
                <div class="right-info">
                  <div class="iconinfo1">
                    <i class="fas fa-eye"></i>
                    <p class="num-info">{{$offer->videos->views}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-download"></i>
                    <p class="num-info">{{$offer->videos->sales}}</p>
                  </div>
                  <div class="iconinfo2">
                    <i class="fas fa-share"></i>
                    <p class="num-info">178</p>
                  </div>

                </div>
              </div>
               </div>

                  <div class=" row second-info  second-info-contantDetails" style="font-size: 20px;">

                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <p class="time-info" style="    font-size: 17px !important;
                      padding-top: 10px;">{{$offer->videos->created_at}}</p>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="end-date">Offer Price</label>
                     <input type="text" id="offerPrice" name="offerPrice" value="{{$offer->offerPrice}}"> 
                    </div>
                    <div class="date-div">
                        
                        <div class="col-sm-12 col-md-6 col-lg-4 S_DIV">
                            <label class="end-date">Start Date</label>
                         <input type="date" id="startdate" name="startdate" placeholder="{{$offer->startdate}}" value="{{\Carbon\Carbon::parse($offer->startdate)->toDateString()}}"> 
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 endtime">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label class="end-date">End Date</label>
                                 <input type="date" id="enddate" name="enddate" placeholder="" value="{{\Carbon\Carbon::parse($offer->enddate)->toDateString()}}"> 
                             </div>
                        </div>

                    </div>
                    
                        {{-- <input type="text" value="{{$offer->offerprice}}" id="name"
                                           class="form-control"
                                           placeholder="  "
                                           name="name">  --}}
                    <div class="d-grid gap-2 col-12 mx-auto offers-options ">
                      {{-- <input type="submit" name="action" class="btn btn-outline-info" value="Deactivate"/> --}}
                      <input type="submit" name="action" class="btn btn-outline-danger" value="delete Video"/>
                      {{-- <input type="submit" name="action" class="btn btn-outline-secondary" value="Report"/> --}}
                      <input type="submit" name="action" class="btn btn-outline-success" value="Update" id="update"/>
                    </form>
                      </div>
        
                  </div>
                <hr style="margin-top: 10px;">
                  <!--============================-->
                  <div class="channel-detailspage">
                    <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="image-channelDiv">
                          <img src="{{url('profile')}}/{{$offer->videos->seller->picture}}" class="logochannel">
                        </div>

                  
                              <div class="details-image-channelDiv">
                          <h3 class="channelName3">{{$offer->videos->seller->seller_name}}</h3>
                          <div>
                          <i class="fas fa-user userdetails"></i>
                          <p class="supscription">2.3K</p>
                        </div>
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
                <h3 class="h4">downloads</h3>
              </div>
             <div class="more-vidoes more-vidoesContant-details">
                
                 <div class=" row video-home" style="background-color: #fff;">
                     <div class="col-sm-5 col-md-5 col-lg-5">
                        <iframe width="100%" class="movedownloads" src="https://www.youtube.com/embed/8Swzhq9Pnr0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                     </div>
                     <div class="col-sm-7 col-md-7 col-lg-7">
                        <div class="info-channel contant-detailmove " style="padding-top: 15px;">
                          <div class="VIDEO-LIST">
                            <h6 class="Vediotitle">
                              Vedio Title
                              </h6>
                              <div class="dropdown sub-dropdown">
                                  <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle morebutton"><i class="fas fa-ellipsis-v"></i></button>                                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow ">
                                    
                                    <a href="#" class="dropdown-item remove acceptdiv"><i class="fas fa-pen icon-list"></i></i>Edite</a>
                                    <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt icon-list"></i>delete Video</a>
                                    <a href="#" class="dropdown-item edit rejectdiv"><i class="fas fa-ban icon-list"></i>Report</a>
                                  </div> 
                                  </div>
                         
                          </div>
                           
  
                            <div class="div-channel-info2">
                            <div class="channele-name-div channele-name-contantdetails">
                                    <div class="channel-data">
                                  <i class="fas fa-sitemap"></i>
                                  <p class="channelname">Motion</p>
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
                        <div class="dropdown sub-dropdown">
                          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>
                          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                              <a href="#" class="dropdown-item remove acceptdiv"><i class="fas fa-pen icon-list "></i></i>Edite</a>
                              <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt icon-list "></i>delete Video</a>
                              <a href="#" class="dropdown-item edit rejectdiv"><i class="fas fa-ban icon-list"></i>Report</a>
                            </div> 
                            </div>

                         <div class="div-channel-info2">
                         <div class="channele-name-div channele-name-contantdetails">
                          <div class="channel-data">
                            <i class="fas fa-sitemap"></i>
                            <p class="channelname">Motion</p>
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
                      <div class="dropdown sub-dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                          <a href="#" class="dropdown-item remove acceptdiv"><i class="fas fa-pen icon-list "></i></i>Edite</a>
                          <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt icon-list"></i>delete Video</a>
                          <a href="#" class="dropdown-item edit rejectdiv"><i class="fas fa-ban icon-list"></i>Report</a>
                        </div> 
                          </div>

                       <div class="div-channel-info2">
                       <div class="channele-name-div channele-name-contantdetails">
                        <div class="channel-data">
                          <i class="fas fa-sitemap"></i>
                          <p class="channelname">Motion</p>
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
                    <div class="dropdown sub-dropdown">
                      <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>
                      <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                        <a href="#" class="dropdown-item remove icon-list"><i class="fas fa-eye icon-list"></i>View details</a>
                        <a href="#" class="dropdown-item remove acceptdiv"><i class="fas fa-check icon-list "></i>Edite</a>
                        <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt icon-list "></i>delete Video</a>
                        <a href="#" class="dropdown-item edit rejectdiv"><i class="fas fa-ban icon-list"></i>Report</a>
                        </div> 
                        </div>

                     <div class="div-channel-info2">
                     <div class="channele-name-div channele-name-contantdetails">
                             <div class="channel-data">
                                  <i class="fas fa-sitemap"></i>
                                  <p class="channelname">Motion</p>
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
         </div> --}}
         
      </div>


</div>

@endsection