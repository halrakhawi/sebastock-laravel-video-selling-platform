@extends('layouts.front')
@section('content')

  <style>
       .video::-webkit-media-controls-fullscreen-button{
           display: inline-block !important;
           
       }
   </style>   
         <!--start section Body-->
        
         <section class="secnewvideos secmostwatch">
            <div class="container">
            <div class="newvideos">
                <div  class="pathpages">
                    <a href="{{route('home',App()->getLocale())}}">
                    <label>{{__('Home')}} /</label>
                    </a>
                    <a href="{{route('profile',App()->getLocale())}}">
                    <label>{{__('Profile')}}</label>
                    </a>
                </div>
                <div class="titlehead">
                    <div><h3>{{__('Profile')}}</h3></div>
                </div>
                <div class="divbars divbarsstart">
                    <div class="barone bar"></div>
                    <div class="bartwo bar"></div>
                    <div class="barthree bar"></div>
                </div>
                <!-- start profile -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="cardprofile">
                            <div class="insidecardProfile">
                                <div class="relativeimg">
                                    <img src="{{url('Seba/storage/profile')}}/{{auth()->user()->picture}}" class="imgsellerprofile">
                                </div>
                                <div class="divcamera absolutecamera" data-toggle="modal" data-target="#exampleModalImage">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </div>
                             <form action="{{route('user.updateimageprofile')}}" method="post"  enctype="multipart/form-data">
                                        @csrf
                             <div class="modal fade" id="exampleModalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">{{__('Edit your Image')}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="custom-file mb-3">
                                    <input type="file" name="img" class="inputsignup custom-file-input" id="customFile10">
                                    <label id="label" class="custom-file-label" for="customFile10">{{__('Choose Image')}}</label>
                                  </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btnbuydetails">{{__('Edit')}}</button>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                            <div>
                                </form>
                                @if(auth()->user()==auth('user')->user())
                                <p class="pnameprofile pprofile">{{auth()->user()->name}}</p>
                                <p class="pprofile">{{auth()->user()->email}}</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="cardDetailsProfile" style="height:100%">
                            <div class="divEdit btn btneditprofile" data-toggle="modal" data-target="#exampleModalLongf">
                                <i class="fas fa-pen iconProfileinfo"></i>
                            </div>
                            <div class="modal fade" id="exampleModalLongf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">{{__('Edit')}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{route('user.updateprofile')}}" method="post">
                                        @csrf
                                    <div class="modal-body">
                                        <div>
                                               <div class="row inputMarginbottom">
                                                   <div class="col-md-6 col-12">
                                                       <p class="pinputpayment">{{__('Contact Name')}}</p>
                                                        
                                                       <input type="text" name="name" class="inputPayment" value="{{auth('user')->user()->name}}">
                                                   </div>
                                                   <div class="col-md-6 col-12">
                                                    <p class="pinputpayment">{{__('Email')}}</p>
                                                       <input type="text" name="email" class="inputPayment" value="{{auth('user')->user()->email}}">
                                                   </div>
                                               </div>
                                               <div class="divAddressone inputMarginbottom">
                                                   <p class="pinputpayment">Address 1</p>
                                                   <input type="text" name="address" class="inputPayment" value="{{auth('user')->user()->address}}">
                                               </div>
                                               {{-- <div class="divAddresstwo inputMarginbottom">
                                                  <p class="pinputpayment">Address 2</p>
                                                  <input type="text"  class="inputPayment">
                                                </div> --}}
                                                <div class="phone inputMarginbottom">
                                                    <p class="pinputpayment">{{__('Phone')}}</p>
                                                    <input type="number" name="mobile" class="inputPayment" value="{{auth('user')->user()->mobile}}">
                                                </div>
                                                {{-- <div class="row inputMarginbottom">
                                                    <div class="col-md-4 col-12">
                                                        <p class="pinputpayment">State</p>
                                                        <div>
                                                            <select class=" js-states form-control">
                                                                <option></option>
                                                                <option>Palestine</option>
                                                                <option>Egypt</option>
                                                                <option>India</option>
                                                                <option>USA</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div  class="col-md-4 col-12">
                                                        <p class="pinputpayment">City</p>
                                                        <div>
                                                            <select class=" js-states form-control">
                                                                <option></option>
                                                                <option>Palestine</option>
                                                                <option>Egypt</option>
                                                                <option>India</option>
                                                                <option>USA</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div  class="col-md-4 col-12">
                                                        <p class="pinputpayment">Zip</p>
                                                        <input type="number"  class="inputPayment">
                                                    </div>
                                                </div> --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                      <button type="submit" class="btn btnbuydetails">{{__('Save')}}</button>
                                    </div>
                                </form>
                                  </div>
                                </div>
                            </div>
                            <div>
                                <div class="diviconsProfile" style="margin-top:20px; margin-bottom:20px">
                                    <i class="fas fa-user iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->name}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Contact Name')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-home iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->email}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Email')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-mobile-alt iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->mobile}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Phone')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-home iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->address}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Address')}}</label>
                                    </div>
                                </div>
                                @elseif(auth()->user()==auth('admin')->user())
                                <p class="pnameprofile pprofile">{{$user->name}}</p>
                                <p class="pprofile">{{auth()->user()->email}}</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="cardDetailsProfile" style="height:100%">
                            <div class="divEdit btn btneditprofile" data-toggle="modal" data-target="#exampleModalLongf">
                                <i class="fas fa-pen iconProfileinfo"></i>
                            </div>
                            <div class="modal fade" id="exampleModalLongf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">{{__('Edit')}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{route('user.updateprofile')}}" method="post">
                                        @csrf
                                    <div class="modal-body">
                                        <div>
                                               <div class="row inputMarginbottom">
                                                   <div class="col-md-6 col-12">
                                                       <p class="pinputpayment">{{__('Contact Name')}}</p>
                                                        
                                                       <input type="text" name="name" class="inputPayment" value="{{auth('admin')->user()->name}}">
                                                   </div>
                                                   <div class="col-md-6 col-12">
                                                    <p class="pinputpayment">{{__('Email')}}</p>
                                                       <input type="text" name="email" class="inputPayment" value="{{auth('admin')->user()->email}}">
                                                   </div>
                                               </div>
                                               <div class="divAddressone inputMarginbottom">
                                                   <p class="pinputpayment">Address 1</p>
                                                   <input type="text" name="address" class="inputPayment" value="{{auth('admin')->user()->address}}">
                                               </div>
                                               {{-- <div class="divAddresstwo inputMarginbottom">
                                                  <p class="pinputpayment">Address 2</p>
                                                  <input type="text"  class="inputPayment">
                                                </div> --}}
                                                <div class="phone inputMarginbottom">
                                                    <p class="pinputpayment">{{__('Phone')}}</p>
                                                    <input type="number" name="mobile" class="inputPayment" value="{{auth('admin')->user()->mobile}}">
                                                </div>
                                                {{-- <div class="row inputMarginbottom">
                                                    <div class="col-md-4 col-12">
                                                        <p class="pinputpayment">State</p>
                                                        <div>
                                                            <select class=" js-states form-control">
                                                                <option></option>
                                                                <option>Palestine</option>
                                                                <option>Egypt</option>
                                                                <option>India</option>
                                                                <option>USA</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div  class="col-md-4 col-12">
                                                        <p class="pinputpayment">City</p>
                                                        <div>
                                                            <select class=" js-states form-control">
                                                                <option></option>
                                                                <option>Palestine</option>
                                                                <option>Egypt</option>
                                                                <option>India</option>
                                                                <option>USA</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div  class="col-md-4 col-12">
                                                        <p class="pinputpayment">Zip</p>
                                                        <input type="number"  class="inputPayment">
                                                    </div>
                                                </div> --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                      <button type="submit" class="btn btnbuydetails">{{__('Save')}}</button>
                                    </div>
                                </form>
                                  </div>
                                </div>
                            </div>
                            <div>
                                <div class="diviconsProfile" style="margin-top:20px; margin-bottom:20px">
                                    <i class="fas fa-user iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->name}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Contact Name')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-home iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->email}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Email')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-mobile-alt iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->mobile}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Phone')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-home iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->address}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Address')}}</label>
                                    </div>
                                </div>
                                 @elseif(auth()->user()==auth('seller')->user())
                                <p class="pnameprofile pprofile">{{$user->seller_name}}</p>
                                <p class="pprofile">{{auth()->user()->email}}</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="cardDetailsProfile" style="height:100%">
                            <div class="divEdit btn btneditprofile" data-toggle="modal" data-target="#exampleModalLongf">
                                <i class="fas fa-pen iconProfileinfo"></i>
                            </div>
                            <div class="modal fade" id="exampleModalLongf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">{{__('Edit')}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{route('user.updateprofile')}}" method="post">
                                        @csrf
                                    <div class="modal-body">
                                        <div>
                                               <div class="row inputMarginbottom">
                                                   <div class="col-md-6 col-12">
                                                       <p class="pinputpayment">{{__('Contact Name')}}</p>
                                                        
                                                       <input type="text" name="name" class="inputPayment" value="{{auth('seller')->user()->seller_name}}">
                                                   </div>
                                                   <div class="col-md-6 col-12">
                                                    <p class="pinputpayment">{{__('Email')}}</p>
                                                       <input type="text" name="email" class="inputPayment" value="{{auth('seller')->user()->email}}">
                                                   </div>
                                               </div>
                                               <div class="divAddressone inputMarginbottom">
                                                   <p class="pinputpayment">Address 1</p>
                                                   <input type="text" name="address" class="inputPayment" value="{{auth('seller')->user()->address}}">
                                               </div>
                                               {{-- <div class="divAddresstwo inputMarginbottom">
                                                  <p class="pinputpayment">Address 2</p>
                                                  <input type="text"  class="inputPayment">
                                                </div> --}}
                                                <div class="phone inputMarginbottom">
                                                    <p class="pinputpayment">{{__('Phone')}}</p>
                                                    <input type="number" name="mobile" class="inputPayment" value="{{auth('seller')->user()->mobile}}">
                                                </div>
                                                {{-- <div class="row inputMarginbottom">
                                                    <div class="col-md-4 col-12">
                                                        <p class="pinputpayment">State</p>
                                                        <div>
                                                            <select class=" js-states form-control">
                                                                <option></option>
                                                                <option>Palestine</option>
                                                                <option>Egypt</option>
                                                                <option>India</option>
                                                                <option>USA</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div  class="col-md-4 col-12">
                                                        <p class="pinputpayment">City</p>
                                                        <div>
                                                            <select class=" js-states form-control">
                                                                <option></option>
                                                                <option>Palestine</option>
                                                                <option>Egypt</option>
                                                                <option>India</option>
                                                                <option>USA</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div  class="col-md-4 col-12">
                                                        <p class="pinputpayment">Zip</p>
                                                        <input type="number"  class="inputPayment">
                                                    </div>
                                                </div> --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                      <button type="submit" class="btn btnbuydetails">{{__('Save')}}</button>
                                    </div>
                                </form>
                                  </div>
                                </div>
                            </div>
                            <div>
                                <div class="diviconsProfile" style="margin-top:20px; margin-bottom:20px">
                                    <i class="fas fa-user iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->seller_name}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Contact Name')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-home iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->email}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Email')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-mobile-alt iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->mobile}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Phone')}}</label>
                                    </div>
                                </div>
                                <div class="diviconsProfile"  style="margin-top:20px;">
                                    <i class="fas fa-home iconProfileinfo"></i>
                                    <div class="divpProfileinfo">
                                        <p class="pProfileinfo">{{auth()->user()->address}}</p>
                                        <label class="lblProfileinfo pinputpayment">{{__('Address')}}</label>
                                    </div>
                                </div>
                                @endif
                                <!--{{-- <div class="diviconsProfile"  style="margin-top:20px;">-->
                                <!--    <i class="fas fa-city iconProfileinfo"></i>-->
                                <!--    <div class="divpProfileinfo">-->
                                <!--        <p class="pProfileinfo">Texas , Husten, 989809 </p>-->
                                <!--        <labe class="lblProfileinfo pinputpayment">City / Region / Zip</label>-->
                                <!--    </div>                                 -->
                                <!--</div>-->
                                <!--<div class="diviconsProfile">-->
                                <!--    <i class="fas fa-map-marker-alt iconProfileinfo"></i>-->
                                <!--    <div class="divpProfileinfo">-->
                                <!--        <p class="pProfileinfo">USA</p>-->
                                <!--        <labe class="lblProfileinfo pinputpayment">Country</label>-->
                                <!--    </div>-->
                                <!--</div> --}}-->
                               </div>
                        </div>
                    </div>
                </div>
                <!--{{-- <section>-->
                <!--    <hr>-->
                <!--    <div class="titlehead">-->
                <!--        <div><h3>Saved Cards</h3></div>-->
                <!--    </div>-->
                <!--    <div class="divbars divbarsstart">-->
                <!--        <div class="barone bar"></div>-->
                <!--        <div class="bartwo bar"></div>-->
                <!--        <div class="barthree bar"></div>-->
                <!--    </div>-->
                <!--    <div class="row">-->
                <!--        <div class="col-lg-3 col-md-4 col-12 col-sm-6">-->
                <!--            <div class="divsavedcard">-->
                <!--                <div>-->
                <!--                    <img class="imgpayment" src="img/mastercard.png" alt="">-->
                <!--                    <img class="imgpayment" src="img/visa.png" alt="">-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-lg-3 col-md-4 col-12 col-sm-6">-->
                <!--            <div class="divsavedcard">-->
                <!--                <div>-->
                <!--                    <i class="fas fa-plus iconplus"></i>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</section> --}}-->
            </div>
            <!--start from here-->
        </div>
        </section>
         <!--End section Body-->

         @endsection