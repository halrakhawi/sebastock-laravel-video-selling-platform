@extends('layouts.admin')
@section('content')
 <div class="Table-SubUser">
            <!-- Page Header-->
           
            <!-- Breadcrumb-->
            <div class="breadcrumb-holder container-fluid">
              <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-6">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">{{__('Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{__('Advertisements')}}</li>
              </ul>
              </div>
              <!--<div class="col-sm-12 col-md-6 col-lg-6 right">               -->
              <!--  <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>-->
              <!--</div>-->
            </div>
          </div>



            <section class="tables">   
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-close" style="position: absolute; display: flex;">
                        <div class="dropdown itemstop">
                          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                            <i class="fas fa-sort"></i></button>

                          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                           <a href="#" class="dropdown-item ATZ">
                            A TO Z</a>
                            <a href="#" class="dropdown-item ZTA">
                             Z TO A</a>
                          </div>
                          </div>
                          <div class="dropdown itemstop">
                          <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                            <i class="fas fa-filter"></i></button>

                          <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                           <a href="#" class="dropdown-item">
                          {{__('Recently')}} </a>
                            <a href="#" class="dropdown-item ">
                            {{__('Oldest')}} </a>
                    
                          </div>
                          
                        </div>

                        <div class="dropdown itemstop">
                         <a href="{{route('admin.Advertisments.create',App()->getLocale())}}"type="AddNAME" id="closeCard1" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon" style="display:flex; justify-content:center; align-items:center"><i class="fas fa-plus"></i></a>
                </div>
                      </div>
                      <div class="card-header d-flex align-items-center">
                        <h3 class="h4">{{__('Advertisements')}}</h3>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>                                                                  
                                <th>{{__('ID')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Date & time')}}</th>
                                <!--<th>{{__('Price')}}</th>-->
                                <th>{{__('Actions')}}</th>
                              </tr>
                            </thead>
                            <tbody>
                              @isset($advs)
                                @foreach($advs as $item)
                              <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->title}}</td>
                                <td>{{$item->created_at}}</td>
                                <!--<td>14$</td>-->
                                <td><a href="{{route('admin.Advertisments.edit',[$item->id,App()->getLocale()])}}"><button style="border:none; background:transparent;"><i class="fas fa-pencil-alt" style=" color:#4075d9"></i></button></a></td>  
                                <td><a href="{{route('admin.Advertisments.delete',[$item->id,App()->getLocale()])}}"><button style="border:none; background:transparent;" ><i class="fas fa-trash-alt" style=" color:#e00202"></i></button></a></td>  
                                <td><a href="{{route('admin.Advertisments.show',[$item->id,App()->getLocale()])}}"><button style="border:none; background:transparent;"><i class="fas fa-eye" style=" color:green" ></i></button></a></td>  
                                 @endforeach                                                                     
                              @endisset
                              </tr>
                              <!--<tr>-->
                              <!--  <th scope="row">2</th>-->
                              <!--  <td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->
                             
                              <!--<tr>-->
                              <!--  <th scope="row">3</th>-->
                              <!--  <td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->

                              <!--<tr>-->
                              <!--  <th scope="row">4</th>-->
                              <!--  <td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->

                              <!--<tr>-->
                              <!--  <th scope="row">5</th>-->
                              <!--  <td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->

                              <!--<tr>-->
                              <!--  <th scope="row">6</th>-->
                              <!--  <td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->

                              <!--<tr>-->
                              <!--  <th scope="row">7</th>-->
                              <!--<td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->
                              <!--<tr>-->
                              <!--  <th scope="row">8</th>-->
                              <!--  <td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->
                              <!--<tr>-->
                              <!--  <th scope="row">9</th>-->
                              <!--  <td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->
                              <!--<tr>-->
                              <!--  <th scope="row">10</th>-->
                              <!--  <td>Title</td>-->
                              <!--  <td>OCT 13,2019 1:42:01 PM</td>-->
                              <!--  <td>14$</td>-->
                              <!--  <td><a href="./Advertising_details.html" target="_blank"><button class="details-btn">Edit</button></a></td>  -->
                              <!--</tr>-->

                            </tbody>
                            
                          </table>
                          <div class="container">
                            <div class="row">
                            
                              <div class="col-sm-12 col-md-12" style="display: flex; justify-content: center;">
                                <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                  <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="example_previous">
                                      <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">{{__('Previous')}}</a></li>
                                      <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                      <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                      </li><li class="paginate_button page-item ">
                                        <a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                      </li><li class="paginate_button page-item next" id="example_next">
                                        <a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">{{__('Next')}}</a>
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