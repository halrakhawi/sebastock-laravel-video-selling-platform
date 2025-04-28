@extends('layouts.admin')

@section('content')   
<!-- Dashboard Header Section    -->
<div class="top-dashboard">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6" >
      <h2 class="dashboardname">{{__('Dashboard')}}</h2>
    </div>

    <div class="col-lg-6 right" style="display: flex; justify-content:flex-end">               
      <a href="{{route('admin.backupdatabase')}}" style="text-align: center; display:flex;justify-content:center; align-items:center" class="backbtn"><i class="fas fa-arrow-down"
         style="color: #ffffff !important;"></i>{{__('Backup')}} {{__('Data')}}</a>
    </div>
    </div>
  </div>

<section class="dashboard-header">
  <div class="container-fluid">
    <div class="row">

      
     
      
      <!-- Line Chart            -->
      <div class="chart col-lg-8 col-12">
        <div class="line-chart bg-white align-items-center justify-content-center has-shadow">
          {{-- <canvas id="lineCahrt"></canvas> --}}
          {{$piechart->container()}}
        </div>
      </div>
      
      <div class="chart col-lg-4 col-12">
        <!-- Bar Chart   -->
        <div class="bar-chart has-shadow bg-white" style="padding-top:20px">
          {{-- <div class="title"><strong class="text-violet">95%</strong><br><small>Daily revenue</small></div> --}}
          {{$barchart->container()}}
        {{-- </div> --}}
        <!-- Numbers-->
        {{-- <div class="statistic d-flex align-items-center bg-white has-shadow">
          <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
          <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
        </div> --}}
      </div>
    </div>
  </div>
</section>
<!-- Client Section-->
<section class="client no-padding-top">
  <div class="container-fluid">
    <div class="row">
      <!-- Work Amount  -->
      <div class="col-lg-4">
        <div class="work-amount card" style="padding-top:20px">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-body">
            <h3>{{__('Work Hours')}}</h3>
            <div class="chart text-center">
              <div class="text"><strong>90</strong><br><span>{{__('Hours')}}</span></div>
              <canvas id="pieChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Client Profile -->
      <div class="col-lg-4">
        <div class="client card" style="padding-top:20px">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="title_topChaneel" style="text-align: center;">
              <h4>{{__('Most popular')}}</h4>
            </div>
            <div class="client-avatar"><img src="{{asset('assets/admin/img/logo.png')}}" alt="..." class="img-fluid rounded-circle">
            </div>
            <div class="client-title">
              <h3>SEBA</h3>
            </div>
            <div class="client-info">
              <div class="row">
                <div class="col-3" style="border-right:1px solid #c3c1c1"><strong>{{count($Accvideos)}}</strong><br><small>{{__('Contents')}}</small></div>
                <div class="col-3" style="border-right:1px solid #c3c1c1"><strong>{{count($users)}}</strong><br><small>{{__('Users')}}</small></div>
                <div class="col-3" style="border-right:1px solid #c3c1c1"><strong>{{count($newvideos)}}</strong><br><small>{{__('New Videos')}}</small></div>
                <div class="col-3"><strong>{{count($mostwatch)}}</strong><br><small>{{__('Most Watch')}}</small></div>
              </div>
            </div>
            <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
          </div>
        </div>
      </div>
      <!-- Total Overdue             -->
      <div class="col-lg-4">
        <div class="overdue card" style="padding-top:20px">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-body">
              
            <h3>{{__('Total revenue')}}</h3>
            <div class="number text-center">{{totalRevenue()[0]->sum}} $</div>
            <div class="chart">
              <canvas id="lineChart1"></canvas>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
</section>

@endsection
