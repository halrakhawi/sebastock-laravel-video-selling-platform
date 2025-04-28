@extends('layouts.admin')
@section('content')


<div class="Table-SubUser">
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
  </div>
  
  
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
  <div class="row">
  <div class="col-sm-12 col-md-6 col-lg-6">
  <ul class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
  <li class="breadcrumb-item active">Buyers</li>
  </ul>
  </div>
  {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
  <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>
  </div> --}}
  </div>
  </div>
  
  <section class="tables">   
  <div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
  <div class="">
    <div class="card-close" style="position: absolute; display: flex;">
      <div class="dropdown itemstop">
        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
          <i class="fas fa-sort"></i></button>
  
        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
         <a href="{{route('admin.buyersort',['sort-asc',App()->getLocale()])}}" class="dropdown-item ATZ">
          A TO Z</a>
          <a href="{{route('admin.buyersort',['sort-desc',App()->getLocale()])}}" class="dropdown-item ZTA">
           Z TO A</a>
        </div>
        </div>
        <div class="dropdown itemstop">
        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
          <i class="fas fa-filter"></i></button>
  
        <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
          <a href="{{route('admin.buyersort',['sort-recent',App()->getLocale()])}}" class="dropdown-item">
            {{__('Recently')}} </a>
              <a href="{{route('admin.buyersort',['sort-old',App()->getLocale()])}}" class="dropdown-item ">
                {{__('Oldest')}} </a>
  
          <a href="{{route('admin.buyersort',['sort-mostdownload',App()->getLocale()])}}" class="dropdown-item ">
            {{__('Most downloaded')}}  </a>
  
            <a href="{{route('admin.buyersort',['sort-leastdownload',App()->getLocale()])}}" class="dropdown-item ">
              {{__('least loaded')}} </a>
  
        </div>
        
      </div>
      
    </div>
    {{-- @dd($userss) --}}
    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Buyers</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Country</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Date Join</th>
              <th>Download</th>
              <th>more</th>
            </tr>
          </thead>
          <tbody>
  @foreach ($userss as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->name}}</td>
              <td>{{$item->address}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->mobile}}</td>
              
              <td>{{$item->created_at}}</td>
              <td>{{count($item->downloads)}}</td>
              <td>                         
                <div class="card-close tddivdd"> 
                  <button type="submit>" class="dropdown-item remove acceptdiv"><a href="{{route('admin.buyerDetails',[$item->id,App()->getLocale()])}}" class="dropdown-item "><i class="fas fa-eye"></i></a></button>     
                      {{-- <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                          <button type="submit>" class="dropdown-item remove acceptdiv"><a href="{{route('admin.buyerDetails',$item->id)}}" class="dropdown-item "><i class="fas fa-eye"></i>View details</a></button>
                            <button type="submit>" class="dropdown-item remove acceptdiv"><a href="{{route('admin.userActivate',$item->id)}}"><i class="fas fa-check"></i>Accepts</a></button>
                            <a href="#" class="dropdown-item edit rejectdiv"><i class="fas fa-ban"></i>Rejection</a>
                            <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt"></i>delete</a>
                          </div> 
                          </div>  --}}                                   
                     </div> 
            </td>
              {{-- <td>                         
                <div class="card-close">      
                      <div class="dropdown">
                        <a href="{{route('admin.buyerDetails',$item->id)}}"><i class="fas fa-eye"></i></a>
                        
                          </div>                                     
              </td> --}}
            </tr>
  @endforeach
          </tbody>
          
        </table>
        <div class="container">
          <div class="row">
          
            <div class="col-sm-12 col-md-12" style="display: flex; justify-content: center;">
              <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="example_previous">
                    <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                    <li class="paginate_button page-item active">
                      <a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                    <li class="paginate_button page-item ">
                      <a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                    </li><li class="paginate_button page-item ">
                      <a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                    </li><li class="paginate_button page-item next" id="example_next">
                      <a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">Next</a>
                    </li></ul>
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
  </section>
  <!-- Page Footer-->
  </div>

@endsection