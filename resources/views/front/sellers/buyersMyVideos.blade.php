@extends('layouts.seller')
@section('content')


<div class="Table-SubUser">
    <!-- Page Header-->
   
   <!-- Breadcrumb-->
   <div class="breadcrumb-holder container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('seller.index',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
      <li class="breadcrumb-item active">{{__('Buyers')}}</li>
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
            <div class="card">
              <div class="card-close filter-icons" style="position: absolute; display: flex;">
                <div class="dropdown itemstop">
                  <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                    <i class="fas fa-sort"></i></button>

                    <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                      <a href="{{route('seller.buyersort','sort-asc')}}" class="dropdown-item ATZ">
                        {{__('A TO Z')}}</a>
                        <a href="{{route('seller.buyersort','sort-desc')}}" class="dropdown-item ZTA">
                         {{__('Z TO A')}}</a>
                    </div>
                    </div>
                    <div class="dropdown itemstop">
                    <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                      <i class="fas fa-filter"></i></button>
  
                    <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                      <a href="{{route('seller.buyersort','sort-recent')}}" class="dropdown-item">
                        {{__('Recently')}} </a>
                          <a href="{{route('seller.buyersort','sort-old')}}" class="dropdown-item ">
                          {{__('Oldest')}} </a>

                          {{-- <a href="{{route('seller.buyersort','sort-mostdownload')}}" class="dropdown-item ">
                              Most downloaded </a>
                    
                              <a href="{{route('seller.buyersort','sort-leastdownload')}}" class="dropdown-item ">
                                 least loaded</a> --}}
            
                  </div>
                  
                </div>
                
              </div>
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">{{__('Buyers')}}</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Full Name')}}</th>
                        <th>{{__('Country')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Date Join')}}</th>
                        <th>{{__('Downlods')}}</th>
                        <th>{{__('Details')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($buyersMyVideos as $item)  

                      <tr>
                        <th scope="row">{{$item->UserID}}</th>
                        <td>{{$item->userName}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->mobile}}</td>
                        
                        <td>{{Carbon\Carbon::parse($item->created_at)->format('Y m d')}}</td>
                        <td>{{((array)downloadscount($item->UserID)[0])['count(id)']}}</td>
                        <td>                         
                          <div class="card-close">      
                                <div class="dropdown">
                                  <button type="submit" class="dropdown-item remove acceptdiv"><a href="{{route('seller.detailsbuyersMyVideos',[$item->UserID,App()->getLocale()])}}" class="dropdown-item "><i class="fas fa-eye"></i></a></button>
                                  {{-- <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                                    <a href="Buyer_details.html" class="dropdown-item massage"></a>
                                    </div>  --}}
                                </div>                                     
                        </td>
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
    <footer>
    
    </footer>
  </div>
</div>
</div>

@endsection