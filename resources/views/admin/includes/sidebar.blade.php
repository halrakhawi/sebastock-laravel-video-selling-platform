<div class="page-content d-flex align-items-stretch"> 
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center" style="justify-content:space-around">
        <div style="display:flex; align-items:center">
        <div class="avatar"><img src="{{url('Seba/storage/profile')}}/{{auth('admin')->user()->picture}}" alt="..." class="rounded-circle" style="height:100%; width:100%"></div>
        <div class="title">
          <h1 class="h4">{{ \Auth::guard('admin')->user()->name }}</h1>
          
        </div>
       </div>
    
        <div class="salary">
          <div class="num-salary">
            <a href="{{route('admin.payments',App()->getLocale())}}"><p> {{totalRevenue()[0]->sum}} $</p></a>
          </div>
      </div>
      </div>
      <!-- Sidebar Navidation Menus-->
      <ul class="list-unstyled" id="mySidebar">
        <li class="active"><a href="{{route('admin.dashboard',App()->getLocale())}}"><i class="fab fa-dashcube"></i>{{__('Dashboard')}} </a></li>
        <li><a href="{{route('admin.admins',App()->getLocale())}}"><i class="fas fa-user-tie iconi"></i></i>  {{__('Sub Admins')}}   <span class="badge bg-red badge-corner">   {{App\Models\Admin::count()}}</span></a></li>         
        <li><a href="{{route('admin.sellers',App()->getLocale())}}"> <i class="fas fa-users-cog iconi"></i></i>{{__('Sellers')}} <span class="badge bg-red badge-corner">   {{App\Models\Seller::count()}}</span></a></li>
        <li><a href="{{route('admin.buyers',App()->getLocale())}}"> <i class="fas fa-users-cog iconi"></i></i>{{__('Buyers')}} <span class="badge bg-red badge-corner">   {{App\Models\User::count()}}</span></a></li>
        <li><a href="{{route('admin.requests',App()->getLocale())}}"><i class="fas fa-users iconi"></i></i>{{__('Video Requests')}} <span class="badge bg-red badge-corner">   {{App\Models\VideoRequested::count()}}</span></a></li>
        <li><a href="{{route('admin.contents',App()->getLocale())}}"><i class="fas fa-copy iconi"></i></i>{{__('Contents')}} <span class="badge bg-red badge-corner">   {{App\Models\Vedio::count()}}</span></a></li>
        <li><a href="{{route('admin.categories',App()->getLocale())}}"> <i class="fas fa-chart-pie iconi"></i>{{__('Categories')}} <span class="badge bg-red badge-corner">   {{App\Models\Category::count()}}</span></a></li>
        <!--<li><a href="{{route('admin.userrequests',App()->getLocale())}}">   <i class="fas fa-poll-h iconi"></i></i>{{__('User Requests')}} <span class="badge bg-red badge-corner">   {{App\Models\VideoRequested::count()}}</span></a></li>         -->
        <li><a href="{{route('admin.payments',App()->getLocale())}}">  <i class="far fa-credit-card iconi"></i></i>{{__('Payments')}} </a></li>
        <li><a href="{{route('admin.offers',App()->getLocale())}}"> <i class="fas fa-ad iconi"></i></i>{{__('Offers')}}  <span class="badge bg-red badge-corner">   {{App\Models\Offer::count()}}</span></a></li>
        <li><a href="{{route('admin.buyerReport',App()->getLocale())}}"><i class="fas fa-chart-area iconi"></i></i>{{__('Reports')}}  </a></li>
        <li><a href="{{route('admin.Advertisments',App()->getLocale())}}"><i class="fas fa-chart-area iconi"></i></i>{{__('Advertisments')}} <span class="badge bg-red badge-corner"> {{App\Models\Advertisment::count()}}  </span> </a></li>
        <!--<li>-->
        <!--<a href="https://www.sebastock.com/admin/buyerReport/ar" >-->
        <!--<img src="https://www.sebastock.com/assets/admin/img/logo.png" class="iconi" style="max-width:25px; " alt="Logo">     -->
        <!--    SEBA</a>-->
        <!--</li>-->
        <div style="display:flex; justify-content:center; align-items:center; margin-top:20px">
        <a href="{{route('front.indexlogining',App()->getLocale())}}" style="text-align:center; border:none; border-radius:8px; background-color:#9B0404; color:#fff; padding:10px" target="_blank">SEBA Website</a>
        </div>
        {{-- <li><a href="{{route('admin.backup',App()->getLocale())}}"><i class="fas fa-cloud-upload-alt"></i></i>{{__('Backup')}} </a></li> --}}
    </nav>
    </nav>