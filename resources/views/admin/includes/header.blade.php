<div  class="content-inner">
  <div class="header">
       <nav class="navbar">
        
         <div class="container-fluid">
           <div class="navbar-holder d-flex align-items-center justify-content-between">
             <!-- Navbar Header-->
             <div class="navbar-header">
               <!-- Navbar Brand --><a href="{{route('admin.dashboard',App()->getLocale())}}" class="navbar-brand d-sm-inline-block">
                 <div class="brand-text  d-lg-inline-block">
                  <img src="{{asset('/assets/admin/img/logo.png')}}" alt="Logo" style="height: 50px;">
                 </div>
               <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
             </div>
             <!-- Navbar Menu -->
             <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Topbar Search -->
              <form  action="{{route('admin.search',App()->getLocale())}}" method="POST">
                @csrf
              <div class=" h-100">
                <div class=" h-100">
                  <div class="searchbar">
                    <input class="search_input" type="text" name="q" placeholder="Search...">
                    <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                  </div>
                </div>
              </div>
              </form>
              <!-- End Topbar Search -->
               <!-- Languages dropdown    -->
           
             <li class="nav-item dropdown">
               <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language">
                 <i class="fas fa-globe "></i>
               </a>
               {{-- @dd(get_CurrentUrl()) --}}
               <!--   --->
               @if (get_CurrentUrl()=='admin.admins.profile')
               <ul aria-labelledby="languages" class="dropdown-menu">
                 <li><a rel="nofollow" href="{{url('admin/admins/profile/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                 <li><a rel="nofollow" href="{{url('admin/admins/profile/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                 <li><a rel="nofollow" href="{{url('admin/admins/profile/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                 <li><a rel="nofollow" href="{{url('admin/admins/profile/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
               </ul>
               @elseif(get_CurrentUrl()=='admin.sellerDetails')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/sellerDetails/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/sellerDetails/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/sellerDetails/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/sellerDetails/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.messagessort')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/sort/messagessort/'.request()->route()->parameters['urlpram'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/messagessort/'.request()->route()->parameters['urlpram'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/sort/messagessort/'.request()->route()->parameters['urlpram'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/messagessort/'.request()->route()->parameters['urlpram'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.admins.update')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/admins/update/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/admins/update/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/admins/update/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/admins/update/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.offerssort')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/sort/offerssort/sort-recent'.request()->route()->parameters['urlpram'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/offerssort/sort-recent'.request()->route()->parameters['urlpram'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/sort/offerssort/sort-recent'.request()->route()->parameters['urlpram'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/offerssort/sort-recent'.request()->route()->parameters['urlpram'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.videorequestsort')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/sort/videorequests/sort-recent'.request()->route()->parameters['urlpram'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/videorequests/sort-recent'.request()->route()->parameters['urlpram'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/sort/videorequests/sort-recent'.request()->route()->parameters['urlpram'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/videorequests/sort-recent'.request()->route()->parameters['urlpram'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.sellersort')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/sort/sellers/sort-recent'.request()->route()->parameters['urlpram'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/sellers/sort-recent'.request()->route()->parameters['urlpram'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/sort/sellers/sort-recent'.request()->route()->parameters['urlpram'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/sellers/sort-recent'.request()->route()->parameters['urlpram'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.buyersort')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/sort/buyers/sort-recent'.request()->route()->parameters['urlpram'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/buyers/sort-recent'.request()->route()->parameters['urlpram'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/sort/buyers/sort-recent'.request()->route()->parameters['urlpram'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/buyers/sort-recent'.request()->route()->parameters['urlpram'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.userrequestsort')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/sort/userrequest/sort-recent'.request()->route()->parameters['urlpram'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/userrequest/sort-recent'.request()->route()->parameters['urlpram'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/sort/userrequest/sort-recent'.request()->route()->parameters['urlpram'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/userrequest/sort-recent'.request()->route()->parameters['urlpram'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.contentsort')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/sort/contents/sort-recent/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/contents/sort-recent/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/sort/contents/sort-recent/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/sort/contents/sort-recent/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.buyerDetails')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/buyerDetails/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/buyerDetails/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/buyerDetails/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/buyerDetails/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.requestdetails')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/requestdetails/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/requestdetails/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/requestdetails/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/requestdetails/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.Advertisments.delete')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/Advertisments/delete/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/Advertisments/delete/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/Advertisments/delete/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/Advertisments/delete/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.Advertisments.update')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/Advertisments/update/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/Advertisments/update/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/Advertisments/update/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/Advertisments/update/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='user.contactusdetails')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('contactus/details/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('contactus/details/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('contactus/details/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('contactus/details/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.contentdetails')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/content/details/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/content/details/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/content/details/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/content/details/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.paymentdetails')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/paymentdetails/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/paymentdetails/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/paymentdetails/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/paymentdetails/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.offer.details')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/offers/show/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/offers/show/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/offers/show/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/offers/show/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.offer.create')
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{url('admin/offers/create/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{url('admin/offers/create/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{url('admin/offers/create/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{url('admin/offers/create/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
              @elseif(get_CurrentUrl()=='admin.categories.edit')
              <ul aria-labelledby="languages" class="dropdown-menu">
               <li><a rel="nofollow" href="{{url('admin/categories/edit/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
               <li><a rel="nofollow" href="{{url('admin/categories/edit/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
               <li><a rel="nofollow" href="{{url('admin/categories/edit/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
               <li><a rel="nofollow" href="{{url('admin/categories/edit/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
             </ul>
              @elseif(get_CurrentUrl()=='admin.Advertisments.edit')
              <ul aria-labelledby="languages" class="dropdown-menu">
               <li><a rel="nofollow" href="{{url('admin/Advertisments/edit/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
               <li><a rel="nofollow" href="{{url('admin/Advertisments/edit/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
               <li><a rel="nofollow" href="{{url('admin/Advertisments/edit/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
               <li><a rel="nofollow" href="{{url('admin/Advertisments/edit/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
             </ul>
              @elseif(get_CurrentUrl()=='admin.Advertisments.show')
              <ul aria-labelledby="languages" class="dropdown-menu">
               <li><a rel="nofollow" href="{{url('admin/Advertisments/show/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
               <li><a rel="nofollow" href="{{url('admin/Advertisments/show/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
               <li><a rel="nofollow" href="{{url('admin/Advertisments/show/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
               <li><a rel="nofollow" href="{{url('admin/Advertisments/show/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
             </ul>
               @else
               <ul aria-labelledby="languages" class="dropdown-menu">
                <li><a rel="nofollow" href="{{route(get_CurrentUrl(),'ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                <li><a rel="nofollow" href="{{route(get_CurrentUrl(),'en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                <li><a rel="nofollow" href="{{route(get_CurrentUrl(),'es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                <li><a rel="nofollow" href="{{route(get_CurrentUrl(),'fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
              </ul>
                 
               @endif
               </li>

             <!-- Notifications-->
             <li class="nav-item dropdown" onclick="createVideomarkNotificationAsRead({{count(auth('admin')->user()->notifications)}})"> 
               <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                 <i class="fas fa-bell fa-fw"></i>
                 <span class="badge bg-red badge-corner">{{count(auth('admin')->user()->unreadNotifications)}}</span></a>
               <ul aria-labelledby="notifications" style="height: 300px; overflow-y:scroll" class="dropdown-menu">
                    @if(count(auth('admin')->user()->unreadNotifications)==0)
                                    <p class="pnotification" style="color:#707070; text-align:center">No Notifications </p>
                                @endif
                @foreach (auth('admin')->user()->unreadNotifications as $notification)
               @if ($notification->type == 'App\Notifications\Blance100')
                <li><a rel="nofollow" href="{{route('balanceMarkASRead')}}" class="dropdown-item"> 
                     <div class="notification">
                       <div class="notification-content"><i class="fa fa-envelope"></i>{{ $notification->data['seller'][0]['seller_name']}}{{' reached to balance: '}}{{$notification->data['balance']}} </div>
                       <div class="notification-time"><small>{{now()->diffForHumans($notification->created_at)}}</small></div>
                     </div></a></li>
                     @endif
                     @if ($notification->type == 'App\Notifications\CreateVideo')
                 <li><a rel="nofollow" href="{{route('acceptvideoMarkASRead')}}" class="dropdown-item"> 
                     <div class="notification">
                       <div class="notification-content"><i class="fa fa-envelope"></i>{{$notification->data['video']['name']}}{{__('created and Waiting accepting')}}.  </div>
                       <div class="notification-time"><small>{{now()->diffForHumans($notification->created_at)}}</small></div>
                     </div></a></li>
                     @endif
                 @endforeach
                    
                
               </ul>
             </li>
             
             
               <!-- Messages                        -->
               <li class="nav-item dropdown"> 
                 <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                   <i class="fas fa-envelope fa-fw"></i>
                   <span class="badge bg-red badge-corner">{{count($unreadMessages)}}</span></a>
                 <ul aria-labelledby="notifications" class="dropdown-menu">
                   @foreach ($unreadMessages as $unreadMsg)
                   @if ($unreadMsg->usertype==1)
                   @foreach ($sellers as $seller)
                   @if ($unreadMsg->sender_id==$seller->seller_id)
                   <li><a rel="nofollow" href="{{route('admin.Message.details',$unreadMsg->id)}}" class="dropdown-item d-flex"> 
                          <div class="msg-profile"> <img src="{{url('profile')}}/{{$seller->picture}}" alt="..." class="img-fluid rounded-circle"></div>
                          <div class="msg-body">
                            <h3 class="h5">{{$seller->seller_name}}</h3><span>{{__('Sent You Message')}}</span>
                          </div></a>
                   </li>
                   @endif
                   @endforeach
                   @elseif ($unreadMsg->usertype==2)
                   @foreach ($users as $user)
                   @if ($unreadMsg->sender_id==$user->id)
                   <li><a rel="nofollow" href="{{route('admin.Message.details',$unreadMsg->id)}}" class="dropdown-item d-flex"> 
                    <div class="msg-profile"> <img src="{{url('profile')}}/{{$user->picture}}" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="msg-body">
                      <h3 class="h5">{{$user->name}}</h3><span>{{__('Sent You Message')}}</span>
                    </div></a>
                    </li>
                   @endif
                   @endforeach
                   @endif
                   @endforeach
                   <li><a rel="nofollow" href="{{route('admin.Message',App()->getLocale())}}" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                 </ul>
                   <!-- Languages dropdown    -->
           
             <li class="nav-item dropdown">
               <a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language">
                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               </a>
              

               <ul aria-labelledby="languages" class="dropdown-menu menuperson">
                 <li>
               <a class="dropdown-item" href="{{route('admin.admins.profile',[auth('admin')->user()->id,App()->getLocale()])}}">
                   <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                   {{__('Profile')}}
               </a>
             </li>
             <li>
               {{-- <a class="dropdown-item" href="./setting.html">
                 <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                 {{__('Settings')}}
             </a> --}}
           </li>
           <li>
             <a class="dropdown-item" href="{{route('admin.logout')}}">
               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               {{__('Logout')}}
           </a>
         </li>
         <li> 
               </ul>
               </li>

             </ul>
           </div>
         </div>
       </nav>
     </div >
      
 