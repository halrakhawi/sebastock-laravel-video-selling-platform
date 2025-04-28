<div class="content-inner">
    <div class="header">
        <nav class="navbar">

            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <!-- Navbar Brand --><a href="{{ route('seller.index',App()->getLocale()) }}"
                            class="navbar-brand d-sm-inline-block">
                            <div class="brand-text  d-lg-inline-block">
                                <img src="{{ asset('/assets/admin/img/logo.png') }}" alt="Logo" style="height: 50px;">
                            </div>
                            <!-- Toggle Button-->
                            <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Topbar Search -->
                        <form action="{{ route('seller.search') }}" method="POST">
                            @csrf
                            <div class=" h-100">
                                <div class=" h-100">
                                    <div class="searchbar">
                                        <input class="search_input" type="text" name="" placeholder="Search...">
                                        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Languages dropdown    -->

                        <li class="nav-item dropdown">
                            <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" class="nav-link language">
                                <i class="fas fa-globe "></i>
                            </a>
                             @if (get_CurrentUrl()=='seller.detailsbuyersMyVideos')
               <ul aria-labelledby="languages" class="dropdown-menu">
                 <li><a rel="nofollow" href="{{url('seller/buyers/details/'.request()->route()->parameters['id'].'/ar')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/AE.png')}}" alt="Arabic" class="mr-2">العربية</a></li>
                 <li><a rel="nofollow" href="{{url('seller/buyers/details/'.request()->route()->parameters['id'].'/en')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/US.png')}}" alt="English" class="mr-2">English</a></li>                                         
                 <li><a rel="nofollow" href="{{url('seller/buyers/details/'.request()->route()->parameters['id'].'/es')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/ES.png')}}" alt="Spanish" class="mr-2">Spanish</a></li>
                 <li><a rel="nofollow" href="{{url('seller/buyers/details/'.request()->route()->parameters['id'].'/fr')}}" class="dropdown-item"> <img src="{{asset('/assets/admin/img/flags/16/FR.png')}}" alt="French" class="mr-2">French </a></li>                                        
               </ul>
               @else
                            <ul aria-labelledby="languages" class="dropdown-menu">
                                <li><a rel="nofollow" href="{{ route(get_CurrentUrl(), 'ar') }}" class="dropdown-item">
                                        <img src="{{ asset('/assets/admin/img/flags/16/AE.png') }}" alt="Arabic"
                                            class="mr-2">العربية</a></li>
                                <li><a rel="nofollow" href="{{ route(get_CurrentUrl(), 'en') }}" class="dropdown-item">
                                        <img src="{{ asset('/assets/admin/img/flags/16/US.png') }}" alt="English"
                                            class="mr-2">English</a></li> </a>
                        </li>
                        <li><a rel="nofollow" href="{{ route(get_CurrentUrl(), 'es') }}" class="dropdown-item"> <img
                                    src="{{ asset('/assets/admin/img/flags/16/ES.png') }}" alt="Spanish"
                                    class="mr-2">Spanish</a></li>
                        <li><a rel="nofollow" href="{{ route(get_CurrentUrl(), 'fr') }}" class="dropdown-item"> <img
                                    src="{{ asset('/assets/admin/img/flags/16/FR.png') }}" alt="French"
                                    class="mr-2">French </a></li> </a></li>

                    </ul>
                    @endif
                    </li>


                    <!-- Notifications-->

                    <!-------->
                    <li class="nav-item dropdown-notifications" id="markasread">
                        <a id="notifications" rel="nofollow" data-target="#" href="" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="nav-link">
                            <i class="fas fa-bell fa-fw"></i>
                            <span class="badge bg-red badge-corner"
                                data-count="0">{{ count(auth('seller')->user()->unreadNotifications) }}</span></a>
                               
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                             @if(count(auth('seller')->user()->unreadNotifications)==0)
                                    <p class="pnotification" style="color:#707070; text-align:center">No Notifications </p>
                                   
                                @endif
                            @foreach (auth('seller')->user()->unreadNotifications as $notification)

                            @if ($notification->type == 'App\Notifications\ActiveUser')
                            <li><a class="dropdown-item dropitemhover" href="" onclick="markNotificationAsRead({{count(auth()->user()->unreadNotifications)}})" >
                                <div class="flexnewnotification">
                                    <p class="pnotification">{{auth('seller')->user()->seller_name}} {{__('you are activated!Go!')}} </p>
                                    <div>
                                        <label class="lblnewnotification">{{now()->diffForHumans($notification->created_at)}}</label>
                                        <div class="newnotification"></div>
                                    </div>
                                </div>
                            </a></li>
                        @endif
                                    @if ($notification->type == 'App\Notifications\RepliedToComment')
                                    <li><a rel="nofollow" href="{{route('commentmarkAsRead',[$notification->data['video']['id'],App()->getLocale()])}}" class="dropdown-item">
                                            <div class="notification">
                                                <div class="notification-content"><i class="fa fa-envelope"></i>
                                                @if(isset($notification->data['user']['name']))
                                                    <p>{{ $notification->data['user']['name'] }} {{__('commented on your video')}} {{ $notification->data['video']['name'] }}</p>
                                                    @else
                                                    <p>{{ $notification->data['user']['seller_name'] }} {{__('commented on your video')}} {{ $notification->data['video']['name'] }}</p>
                                                    @endif
                                                </div>
                                                <div class="notification-time">
                                                    <small>{{ now()->diffForHumans($notification->created_at) }}</small>
                                                </div>
                                            </div>
                                        </a></li>
                                @endif
                                @if ($notification->type == 'App\Notifications\RjectVideo')
                                    <li><a class="dropdown-item dropitemhover" href=""
                                        onclick="markNotificationAsRead({{ count(auth('seller')->user()->unreadNotifications) }})">
                                        <div class="flexnewnotification">
                                            <p class="pnotification">{{ auth('seller')->user()->seller_name }} your video is rejected! </p>
                                            @if(isset($notification->data['video']))
                                            <p class="pnotification">{{__('because:')}}{{ $notification->data['video'] }}</p>
                                            @endif
                                            <div>
                                                <label
                                                    class="lblnewnotification">{{ now()->diffForHumans($notification->created_at) }}</label>
                                                <div class="newnotification"></div>
                                            </div>
                                        </div>
                                    </a></li>
                                @endif
                            @endforeach
                            
                        </ul>
                    </li>


                    <!-- Messages                        -->
                    <li class="nav-item dropdown">
                        <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="nav-link">
                            <i class="fas fa-envelope fa-fw"></i>
                            <span class="badge bg-red badge-corner">{{ count($unreadSellerMessages) }}</span></a>
                        <ul aria-labelledby="notifications" class="dropdown-menu"  style="height: 300px; overflow-y:scroll" >
                            @foreach ($unreadSellerMessages as $unreadMsg)
                                @if ($unreadMsg->usertype == 0)
                                    @foreach ($admins as $admin)
                                        @if ($unreadMsg->sender_id == $admin->id)
                                            <li><a rel="nofollow"
                                                    href="{{ route('seller.messages.details', $unreadMsg->id) }}"
                                                    class="dropdown-item d-flex">
                                                    <div class="msg-profile"> <img
                                                            src="{{ url('profile') }}/{{ $admin->picture }}" alt="..."
                                                            class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h3 class="h5">{{ $admin->name }}</h3><span>{{__('Sent You Message')}}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                                 @if ($unreadMsg->usertype == 0)
                                    @foreach ($users as $user)
                                        @if ($unreadMsg->sender_id == $user->id)
                                            <li><a rel="nofollow"
                                                    href="{{ route('seller.messages.details', $unreadMsg->id) }}"
                                                    class="dropdown-item d-flex">
                                                    <div class="msg-profile"> <img
                                                            src="{{ url('profile') }}/{{ $user->picture }}" alt="..."
                                                            class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h3 class="h5">{{ $user->name }}</h3><span>{{__('Sent You Message')}}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <li><a rel="nofollow" href="{{ route('seller.Message',App()->getLocale()) }}"
                                    class="dropdown-item all-notifications text-center"> <strong>{{__('Read all messages')}}
                                    </strong></a></li>
                        </ul>
                    </li>

                    <!-- Languages dropdown    -->

                    <li class="nav-item dropdown">
                        <a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="nav-link language">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        </a>


                        <ul aria-labelledby="languages" class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('getsellerprofile', auth('seller')->id()) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   {{__('Profile')}}
                                </a>
                            </li>
                            {{-- <li>
                                <a class="dropdown-item" href="./setting.html">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                            </li> --}}
                            <li>
                                <a class="dropdown-item" href="{{ route('sellerlogout',App()->getLocale()) }}">
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
    </div>
