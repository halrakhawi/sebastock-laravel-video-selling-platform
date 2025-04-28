 <!--start header-->
          <header class="header">
            <div class="container">
               <nav class="navbar navbar-expand-lg navbar-light">
                   <a class="navbar-brand Mainbrand" href="{{url('/homeg/'.App()->getLocale())}}">
                       <div class="divimglogo">
                           <img class="imglogo" src="{{asset('assets/front/img/logo.png')}}" alt="logo">
                       </div>
                   </a>
                   <div id="main">
                       <button style="background-color:transparent" class="navbar-toggler openbtn imglogo" onclick="openNav()" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                       </button>
                   </div>
                 <!-- side navbar  -->
                 <div id="mySidebar" class="sidebar" style="background-color:#EEE">
                   <a href="javascript:void(0)" style="color:#707070" class="closebtn" onclick="closeNav()">×</a>
                   <a class="navbar-brand" href="{{url('/homeg/'.App()->getLocale())}}">
                       <div class="divimglogo divimglogosidebar">
                           <img class="imglogo" src="{{asset('assets/front/img/logo.png')}}" alt="logo">
                       </div>
                   </a>
                   <form class="form-inline my-2 my-lg-0 formsearchsidebar" action="{{route('front.search',App()->getLocale())}}" method="POST">
                    @csrf   
                    <div class="flexsearch">
                           <div>
                               <input type="search" placeholder="{{__('Search')}}" class="searchbox" name="q" id="q">
                                
                            </div>
                           </div>
                     </form>
                     <a class="aAllCategory" href="{{url('/homeg/'.App()->getLocale())}}" role="button" id="dropdownMenuLink"   aria-expanded="false" style="color:#707070">
                        {{__('Home')}}
                    </a>
                   <a class="aAllCategory" href="{{route('allcategories',App()->getLocale())}}" role="button" id="dropdownMenuLink"   aria-expanded="false" style="color:#707070">
                        {{__('All Categories')}}
                    </a>
                      @foreach ($cats as $item)
                      <a href="{{route('categoryvideos',[$item->id,App()->getLocale()])}}" class="aAllCategory" style="color:#707070">
                        {{__($item->name)}}
                        <!--<i class="fas fa-sort-down"></i>-->
                    </a>
                    <div class="divaReports">
                        @foreach ($cats as $cat)
                            <a class=" asideCategory" href="{{route('categoryvideos',[$cat->id,App()->getLocale()])}}" >{{__($cat->name)}}</a>
                        @endforeach
                    </div>
                    @endforeach
                    <!--<a>-->
                           <div class="iconsecsearch dropdown aAllCategory" >
                               <div id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="fas fa-globe iconheader" ></i>
                                     <label>Language</label>
                               </div>
                             
                                       {{-- route(get_CurrentUrl() --}}
             
                                       
                @if (get_CurrentUrl()=='checkout')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('checkout/'.$amount.'/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('checkout/'.$amount.'/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('checkout/'.$amount.'/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('checkout/'.$amount.'/fr')}}">français</a>
                </div>  
               
                @elseif (get_CurrentUrl()=='videodetails')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('videodetails/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('videodetails/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('videodetails/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('videodetails/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='deletewatchlater')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('watchlater/delete/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('watchlater/delete/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('watchlater/delete/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('watchlater/delete/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='user.messages.details')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('messages/details/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('messages/details/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('messages/details/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('messages/details/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  

                @elseif (get_CurrentUrl()=='deletevideofromcart')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('deletevideofromcart/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('deletevideofromcart/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('deletevideofromcart/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('deletevideofromcart/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='sellerprofile')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerprofile/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerprofile/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerprofile/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerprofile/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='categoryvideos')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('categoryvideos/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('categoryvideos/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('categoryvideos/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('categoryvideos/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='sellerlogout')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerlogout/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerlogout/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerlogout/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerlogout/fr')}}">français</a>
                </div>  

                @else
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{route(get_CurrentUrl(),'en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{route(get_CurrentUrl(),'ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{route(get_CurrentUrl(),'es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{route(get_CurrentUrl(),'fr')}}">français</a>
                </div>
              @endif
                           </div>
                         
                      <!--</a>-->
                 </div>
                 <a class="navbar-brand branduser" href="{{url('/homeg/'.App()->getLocale())}}">
                    <div class="divimglogo">
                        <img class="imglogo" src="{{asset('assets/front/img/logo.png')}}" alt="logo">
                    </div>
                </a>
                 <div id="mainuser">
                    <button style="background-color:transparent" class="navbar-toggler openbtn imglogo" onclick="openNavuser()" type="button" data-toggle="collapse" data-target="#navbarSupportedContentuser" aria-controls="navbarSupportedContentuser" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-user iconheader"></i>
                    </button>
                </div>
              <!-- side navbar  -->
              <div id="mySidebaruser" class="sidebar" style="background-color:#EEE">
                <a href="javascript:void(0)" style="color:#707070" class="closebtn" onclick="closeNavuser()">×</a>
                <a class="navbar-brand" href="{{url('/homeg/'.App()->getLocale())}}">
                    <div class="divimglogo divimglogosidebar">
                        <img class="imglogo" src="{{asset('/assets/front/img/logo.png')}}" alt="logo">
                    </div>
                </a>
                {{-- <a href="notifications.html" class="dropdown-itembuyer asideArabic" style="color:#707070">
                    <div class="iconsecsearch iconseachsidebar">
                        <i class="fas fa-bell iconheader"></i>
                        <div class="elips">
                          <div>3</div>
                        </div>
                        Notification
                    </div>
                </a> --}}
                <a href="{{route('showcart',App()->getLocale())}}" class="dropdown-itembuyer asideArabic" style="color:#707070">
                    <i class="fas fa-shopping-cart iconheader"></i>
                    {{__('Shopping Cart')}}
                </a>
                <form  action="{{route('front.filter',App()->getLocale())}}" method="POST">
                            @csrf
                <a href="#" class="dropdown-itembuyer aiconfilter asideArabic" style="color:#707070">
                 <i class="fas fa-filter iconheader"></i>
                 {{__('Filter')}}
                </a>
               <div class="divfadefilter">
              <h6>{{('Price')}}</h6>
              <div class="row inputMarginbottom">
                  <div class="col-md-6 col-12">
                      <p class="pinputpayment">{{('Min')}}</p>
                      <input type="number" class="inputPayment"  name="min">
                  </div>
                  <div class="col-md-6 col-12">
                      <p class="pinputpayment">{{('Max')}}</p>
                      <input type="number" class="inputPayment" name="max">
                  </div>
              </div>
              <div class="row inputMarginbottom">
                <!--   <div class="col-md-6 col-12">-->
                <!--           <h6>Rate</h6>-->
                <!--    <div class="divstars">-->
                <!--        <div>-->
                <!--            <i class="fas fa-star star"></i>-->
                <!--        </div>-->
                <!--        <div>-->
                <!--            <i class="fas fa-star star"></i>-->
                <!--        </div>-->
                <!--        <div> -->
                <!--            <i class="fas fa-star star"></i>-->
                <!--        </div>-->
                <!--        <div>-->
                <!--            <i class="fas fa-star star"></i>-->
                <!--        </div>-->
                <!--        <div>-->
                <!--        <i class="far fa-star star"></i>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div> --}}-->
                <div class="col-md-6 col-12">
                    <h6>Rate</h6>
                    <select class=" js-states form-control" name="rate">
                        <option></option>
                        <option>1 star</option>
                        <option>2 star</option>
                        <option>3 star</option>
                        <option>4 star</option>
                        <option>5 star</option>
                      </select>
                </div>
                  <div class="col-md-6 col-12">
                      <h6>Category</h6>
                      <select class=" js-states form-control" name="rate">
                          <option></option>
                          @foreach($cats as $cat)
                          <option>{{$cat->name}}</option>
                          @endforeach
                          <!--<option>Motion</option>-->
                          <!--<option>Fun</option>-->
                          <!--<option>Reports</option>-->
                        </select>
                  </div>
              </div>
              <!--<div>-->
              <!--    <h6>Duration</h6>-->
              <!--    <select class=" js-states form-control">-->
              <!--        <option></option>-->
              <!--        <option>Short (0-4 min)</option>-->
              <!--        <option>Meduim (4-20 min)</option>-->
              <!--        <option>Long (+20 min)</option>-->
              <!--      </select>-->
              <!--</div>-->
              <div class="filterresponsivebtns">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                  <button type="submit" class="btn btn-primary">{{('Apply')}}</button>
              </div>
             </form>
               </div>
                <div class="btns btnsidebar">

                    <div class="divbtnlogin dropdown">
                                <button class="btn btnsignup dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('LOGIN')}}</button>
                                <div class="dropdown-menu menuesidebar" aria-labelledby="dropdownMenuButton"  style="box-shadow: 2px 3px 4px  #7070708f;">
                                 <a class="dropdown-item" href="{{route('login',App()->getLocale())}}">{{__('Buyer')}}</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="{{route('sellerlogin',App()->getLocale())}}">{{__('Seller')}}</a>
                               </div>
                             </div>
                 <div class="divbtnsignup dropdown" style="display:flex; justify-content:center; align-items:center;">
                                    <!--<button class="btn btnsignup"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                     <div>
                                         
                                     
                                        <a class="btn btnsignup" style="text-align:center; color:#C71A23; padding:5px;" href="{{route('front.signup',App()->getLocale())}}">{{__('SIGNUP')}}</a>
                                       </div>
                                        <!--</button>-->
                                    <!--<div class="dropdown-menu menuesidebar" aria-labelledby="dropdownMenuButton">-->
                                     <!--<a class="dropdown-item" href="{{route('front.signup',App()->getLocale())}}">{{__('Buyer')}}</a>-->
                                     <!--<a class="dropdown-item" href="{{route('sellersignup',App()->getLocale())}}">{{__('Seller')}}</a>-->
                                   <!--</div>-->
                                 </div>
                </div>
              </div>
                 <!--End side navbar  -->
                   <div class="collapse navbar-collapse navbarlargscreen" id="navbarSupportedContent">
                   
                    <form class="form-inline my-2 my-lg-0 formsearchsidebar" action="{{route('front.search',App()->getLocale())}}" method="POST">
                        @csrf   
                        <div class="flexsearch">
                               <div>
                                   <input type="search" placeholder="{{__('Search')}}" class="searchbox" name="q" id="q">
                                    
                                </div>
                               </div>
                         </form>
                     <ul class="navbar-nav navmargin navmarginarabic">
                       {{-- <li class="nav-item">
                           <div class="dropdown show">
                            <div class="iconsecsearch "id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell iconheader" ></i>
                                <div class="elips">
                                  <div>3</div>
                                </div>
                            </div>
                            <div class="dropdown-menu menunotifications" aria-labelledby="dropdownMenuLink">
                                <div class="flexheadnotifications">
                                <h6 class="hnewnotification">Notifications</h6>
                                <a class="dropdown-item dropitemhover" href="notifications.html" target="_blank">
                                    <div class="divallnotification">
                                        <i class="fas fa-bell" ></i>
                                        <p class="pnotification pallnotification">See All</p>
                                    </div>
                                </a>
                            </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item dropitemhover" href="#">
                                    <div class="flexnewnotification">
                                        <p class="pnotification">congratulations! You have successfully purchased a video </p>
                                        <div>
                                            <label class="lblnewnotification">2h ago</label>
                                            <div class="newnotification"></div>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item dropitemhover" href="#">
                                    <div class="flexnewnotification">
                                        <p class="pnotification">congratulations! You have successfully purchased a video </p>
                                        <div>
                                            <label class="lblnewnotification">2h ago</label>
                                            <div class="newnotification"></div>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item dropitemhover" href="#">
                                    <div class="flexnewnotification">
                                        <p class="pnotification">congratulations! You have successfully purchased a video </p>
                                        <div>
                                            <label class="lblnewnotification">2h ago</label>
                                            <div class="newnotification"></div>
                                        </div>
                                    </div>
                                </a>
                              </div>
                           </div>
                       </li>                        --}}
                       <a href="{{route('showcart',App()->getLocale())}}">
                       <li class="nav-item">
                           <div class="iconsecsearch">
                               <i class="fas fa-shopping-cart iconheader"></i>
                                <div class="elips">
                        <div>{{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}</div>
                      </div>
                               </div>
                       </li>
                        </a>
                        
                       <li class="nav-item">
                           <div class="iconsecsearch">
                               <i class="fas fa-filter iconheader" data-toggle="modal" data-target="#filterexampleModalLong"></i>
                           </div>
                           <form  action="{{route('front.filter',App()->getLocale())}}" method="POST">
                            @csrf 
                           <div class="modal fade" id="filterexampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                     <div class="modal-content modalcontentArabic">
                                       <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLongTitle">{{__('Filter')}}</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                       </div>
                                       <div class="modal-body">
                                           <h6>{{__('Price')}}</h6>
                                           <div class="row inputMarginbottom">
                                               <div class="col-md-6 col-12">
                                                   <p class="pinputpayment">{{__('Min')}}</p>
                                                   <input type="number" class="inputPayment" name="min">
                                               </div>
                                               <div class="col-md-6 col-12">
                                                   <p class="pinputpayment">{{__('Max')}}</p>
                                                   <input type="number" class="inputPayment" name="max">
                                               </div>
                                           </div>
                                           <div class="row inputMarginbottom">
                <!--                             <div class="col-md-6 col-12">-->
                <!--                                        <h6>Rate</h6>-->
                <!--    <div class="divstars">-->
                <!--        <div>-->
                <!--            <i class="fas fa-star star"></i>-->
                <!--        </div>-->
                <!--        <div>-->
                <!--            <i class="fas fa-star star"></i>-->
                <!--        </div>-->
                <!--        <div> -->
                <!--            <i class="fas fa-star star"></i>-->
                <!--        </div>-->
                <!--        <div>-->
                <!--            <i class="fas fa-star star"></i>-->
                <!--        </div>-->
                <!--        <div>-->
                <!--        <i class="far fa-star star"></i>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div> --}}-->
                <div class="col-md-6 col-12">
                    <h6>Rate</h6>
                    <select class=" js-states form-control" name="rate">
                        <option></option>
                        <option>1 star</option>
                        <option>2 star</option>
                        <option>3 star</option>
                        <option>4 star</option>
                        <option>5 star</option>
                      </select>
                </div>
                                               <div class="col-md-6 col-12">
                                                   <h6>{{__('Category')}}</h6>
                                                   <select class=" js-states form-control" name="cat">
                                                       <option></option>
                                                       @foreach($cats as $cat)
                                                        <option>{{$cat->name}}</option>
                                                        @endforeach
                                                     </select>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                         <button type="submit" class="btn btn-primary">{{__('Apply')}}</button>
                                       </div>
                                     </div>
                                   </div>
                           </div>
                           </form>
                       </li>
                        <li class="nav-item">
                           <div class="iconsecsearch dropdown">
                               <i class="fas fa-globe iconheader" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                       {{-- route(get_CurrentUrl() --}}
                @if (get_CurrentUrl()=='checkout')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('checkout/'.$amount.'/en')}}">English</a>
                  <a class="dropdown-item" href="{{url('checkout/'.$amount.'/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('checkout/'.$amount.'/es')}}">Española</a>
                  <a class="dropdown-item" href="{{url('checkout/'.$amount.'/fr')}}">français</a>
                </div>  
               
                @elseif (get_CurrentUrl()=='videodetails')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('videodetails/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" href="{{url('videodetails/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('videodetails/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" href="{{url('videodetails/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='deletewatchlater')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('watchlater/delete/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" href="{{url('watchlater/delete/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('watchlater/delete/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" href="{{url('watchlater/delete/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='user.messages.details')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('messages/details/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" href="{{url('messages/details/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('messages/details/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" href="{{url('messages/details/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  

                @elseif (get_CurrentUrl()=='deletevideofromcart')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('deletevideofromcart/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" href="{{url('deletevideofromcart/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('deletevideofromcart/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" href="{{url('deletevideofromcart/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='sellerprofile')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('sellerprofile/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" href="{{url('sellerprofile/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('sellerprofile/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" href="{{url('sellerprofile/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
                @elseif (get_CurrentUrl()=='login')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('login/en')}}">English</a>
                  <a class="dropdown-item" href="{{url('login/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('login/es')}}">Española</a>
                  <a class="dropdown-item" href="{{url('login/fr')}}">français</a>
                </div>  
                 @elseif (get_CurrentUrl()=='categoryvideos')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('categoryvideos/'.request()->route()->parameters['id'].'/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('categoryvideos/'.request()->route()->parameters['id'].'/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('categoryvideos/'.request()->route()->parameters['id'].'/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('categoryvideos/'.request()->route()->parameters['id'].'/fr')}}">français</a>
                </div>  
               @elseif (get_CurrentUrl()=='sellerlogout')
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerlogout/en')}}">English</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerlogout/ar')}}">العربية</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerlogout/es')}}">Española</a>
                  <a class="dropdown-item" style="color:#707070" href="{{url('sellerlogout/fr')}}">français</a>
                </div>  

                @else
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route(get_CurrentUrl(),'en')}}">English</a>
                  <a class="dropdown-item" href="{{route(get_CurrentUrl(),'ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{route(get_CurrentUrl(),'es')}}">Española</a>
                  <a class="dropdown-item" href="{{route(get_CurrentUrl(),'fr')}}">français</a>
                </div>
              @endif
                           </div>
                        </li>
                       <li class="nav-item">
                           <div class="btns">
                               <!--a href="{{route('login',App()->getLocale())}}">
                               <div class="divbtnlogin">
                                   <button class="btn btnlogin">LOGIN</button>
                               </div-->

                               <div class="divbtnlogin dropdown">
                                <button class="btn btnsignup dropdown-toggle" style="width:auto"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('LOGIN')}}</button>
                                <div class="dropdown-menu menuesidebar" aria-labelledby="dropdownMenuButton" style="box-shadow: 2px 3px 4px  #7070708f;">
                                 <a class="dropdown-item" href="{{route('login',App()->getLocale())}}">{{__('Buyer')}}</a>
                                  <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="{{route('sellerlogin',App()->getLocale())}}">{{__('Seller')}}</a>
                               </div>
                             </div>
                            </a>
                                <div class="divbtnsignup dropdown">
                                    <!--<button class="btn btnsignup"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                        <a class="btn btnsignup" style="width:auto" href="{{route('front.signup',App()->getLocale())}}">{{__('SIGNUP')}}</a>
                                        <!--</button>-->
                                    <!--<div class="dropdown-menu menuesidebar" aria-labelledby="dropdownMenuButton">-->
                                     <!--<a class="dropdown-item" href="{{route('front.signup',App()->getLocale())}}">{{__('Buyer')}}</a>-->
                                     <!--<a class="dropdown-item" href="{{route('sellersignup',App()->getLocale())}}">{{__('Seller')}}</a>-->
                                   <!--</div>-->
                                 </div>
                           </div>
                       </li>
                     </ul>
                   </div>
               </nav>
            </div>
        </header>
            <!--End header-->
            <!--start categories-->
        <section class="secsearch">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="dropdown divcategoryheader show">
                            <a class=" pAllCategoriesheaders" href="{{url('/homeg/'.App()->getLocale())}}" role="button" id="dropdownMenuLink"   aria-expanded="false">
                                {{__('Home')}}
                            </a>
                          </div>
                       </div>
                       <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class="dropdown divcategoryheader show">
                            <a class=" pAllCategoriesheaders" href="{{route('allcategories',App()->getLocale())}}" role="button" id="dropdownMenuLink"   aria-expanded="false">
                                {{__('All Categories')}}
                            </a>
                          </div>
                       </div>
                       @foreach ($cats as $item)
                       <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                        <div class=" divcategoryheader show">
                            <a class=" pAllCategoriesheaders" href="{{route('categoryvideos',[$item->id,App()->getLocale()])}}" role="button" id="dropdownMenuLink"  aria-haspopup="true" aria-expanded="false">
                                {{__($item->name)}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach ($cats as $cat)
                                <a class="" href="{{route('categoryvideos',[$cat->id,App()->getLocale()])}}"> {{__($cat->name)}}</a>
                                @endforeach
                            </div>
                          </div>
                       </div>
                       @endforeach
                       
                       
                      
                       
                   </div>
               </div>
        </section>
           <!--End categories-->
        <!--End header-->