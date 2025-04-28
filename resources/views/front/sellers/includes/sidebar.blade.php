<div class="page-content d-flex align-items-stretch"> 
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center" style="justify-content:space-between">
          <div style="display:flex; align-items:center">
        <div class="avatar"><img src="{{url('Seba/storage/profile')}}/{{$seller->picture}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          
          <h1 class="h4" style="margin-bottom:0px">{{$seller->seller_name}}</h1>
          
        </div>
         </div>
        <div class="salary">
          <div class="num-salary">
            <a href="{{route('seller.sellerbalance',App()->getLocale())}}"><p> {{$seller->balance}}$</p></a>
          </div>
      </div>
      
      </div>
      <!-- Sidebar Navidation Menus-->
      <ul class="list-unstyled" id="myDIV">
            <li class="LIST active"><a href="{{route('seller.index',App()->getLocale())}}"><i class="fab fa-dashcube"></i>{{__('Dashboard')}} </a></li>
          <!--href="{{route('front.vedios',App()->getLocale())}}"-->
            <li class="LIST liContents"><a ><i class="fas fa-copy iconi"></i> {{__('Contents')}} </a></li>   
            <div class="divFadeContents">
                <ul style="list-style-type:none; padding:15px 10px;">
                  <li><a href="{{route('front.vedios',App()->getLocale())}}"><i class="fas fa-copy iconi"></i> {{__('View Contents')}} </a></li>
                  <li><a href="{{route('front.vedios.create',App()->getLocale())}}"><i class="fas fa-plus"></i>{{__('Add Video')}}</a></li>
                </ul>
            </div>
            <li class="LIST" id="buyer" ><a href="{{route('seller.getrbuyersMyVideos',App()->getLocale())}}"> <i class="fas fa-users-cog iconi"></i></i>{{__('Buyers')}} </a></li>
            {{-- <li><a href="{{route('admin.categories',get_default_lang())}}"> <i class="fas fa-chart-pie iconi"></i>categories <span class="badge bg-red badge-corner">   {{App\Models\Category::count()}}</span></a></li> --}}
            <li class="LIST"><a href="{{route('seller.offersMyVideos',App()->getLocale())}}"><i class="fas fa-tags"></i>{{__('Offers')}} </a></li>
            {{-- <li><a href="Requests.html">  <i class="fas fa-poll-h iconi"></i></i>Requests</a></li> --}}
            <li class="LIST"><a href="{{route('seller.sellerbalance',App()->getLocale())}}">   <i class="far fa-credit-card iconi"></i></i>{{__('Revenues')}} </a></li>  
            <div style="display:flex; justify-content:center; align-items:center; margin-top:20px">
        <a href="{{route('front.indexlogining',App()->getLocale())}}" style="text-align:center; border:none; border-radius:8px; background-color:#9B0404; color:#fff; padding:10px" target="_blank">SEBA Website</a>
        </div>
            {{-- <li><a href="Aid Center.html">  <i class="far fa-question-circle"></i>Aid Center </a></li> --}}
            {{-- <li><a href="Reports_user.html"><i class="fas fa-chart-area iconi"></i></i>Reports </a></li> --}}
            {{-- <li><a href="Backup.html"><i class="fas fa-cloud-upload-alt"></i></i>Backup </a></li> --}}
        
    </nav>
</nav>