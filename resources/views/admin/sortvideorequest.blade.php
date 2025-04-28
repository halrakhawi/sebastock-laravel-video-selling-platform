@extends('layouts.admin')
@section('content')


<div class="Table-SubUser">
    <!-- Page Header-->
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Requests</li>
      </ul>
      </div>
      {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
        <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>
      </div> --}}
    </div>
  </div>


  <!--start backup div-->
<div class="Accept-div">
<div class="Accept_div">
<div class="colseicon">
  <i class="far fa-times-circle colse"></i>
</div>
<br>
<div class="title-hidediv container">
  <p>You must set the price for the content first</p>
</div>
<div class="datahide container">
  {{--  --}}
  {{-- <form action="{{route('admin.addprice',request()->route()->id)}}" method="post"> --}}
    {{-- @csrf --}}
<div class="row">
  <div class="col-md-12">
    <p style="float: left; color: rgb(177, 186, 202); padding-top: 3px;">The price is in dollars:</p>
    <input type="number" id="Priceaccepted" name="price" placeholder="$">
  </div>
 
</div>
<div class="actiondiv">
  
  <button type="submit" class="actionbtn">continue</button>
</div>
</div>
</div>
{{-- </form> --}}
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
<!--************************-->

<div class="">
<div class="RejectionDiv">
<div class="colseicon">
  <i class="far fa-times-circle colse"></i>
</div>
<br>
<div class="head-rejection container">
  <p style="color: gray;">Please specify the reason for rejecting this content</p>
</div>

<div class="dropdown rejectionlist container">
       
  <button class="btn  dropdown-toggle reson_title container" type="button" data-toggle="dropdown">the reason of refuse:
 </button>
  <ul class="Rejection_resons dropdown-menu container" style="width: 93%;">
    <li class="reson_first">Select the reason of refuse</li>
    <li class="reson1">The facility quality is not good enough</li>
    <li class="reson2">The attachment is against the terms and policies of the site</li>
    <li class="reson3">Unable to have a preset watermark</li>
    <li class="reson4">Another reason</li>
  </ul>
</div>


<br>
<div class="box_4reson container">
<label for="resons" class="for-resons">Please specify the reason for rejection *</label>
<input type="text" class="inputresone">
</div>

<div class="datahide container" style="margin-top: 5px;">
<div class="actiondiv2" style="margin-bottom: 5px;">
  <button type="submit" class="continuedetelet">send</button>
  
</div>
</div>
</div>
</div>


    <section class="tables">   
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div style="background: #ffffff;">
              <div class="card-close" style="position: absolute; display: flex;">
                <div class="dropdown itemstop">
                  <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                    <i class="fas fa-sort"></i></button>

                  <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                   <a href="{{route('admin.videorequestsort',['sort-asc',App()->getLocale()])}}" class="dropdown-item ATZ">
                    A TO Z</a>
                    <a href="{{route('admin.videorequestsort',['sort-desc',App()->getLocale()])}}" class="dropdown-item ZTA">
                     Z TO A</a>
                  </div>
                  </div>
                  <div class="dropdown itemstop">
                  <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                    <i class="fas fa-filter"></i></button>

                  <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow ">
                   <a href="{{route('admin.videorequestsort',['sort-recent',App()->getLocale()])}}" class="dropdown-item">
                  Recently </a>
                    <a href="{{route('admin.videorequestsort',['sort-old',App()->getLocale()])}}" class="dropdown-item ">
                    Oldest </a>
            
                  </div>
                  
                </div>
                
              </div>
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Requests</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Period</th>
                        <th>more</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($vr as $item)
                        {{-- @dd($item->seller) --}}
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->seller_name}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>{{now()->diffForHumans($item->created_at)}}</td>
                            <td>                         
                              <div class="card-close">  
                                <a href="{{route('admin.requestdetails',[$item->id,App()->getLocale()])}}" class="dropdown-item "><i class="fas fa-eye"></i></a>
                                    {{-- <div class="dropdown">
                                      <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>
                                      <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                                          <a href="{{route('admin.accept',$item->id)}}" class="dropdown-item remove acceptdiv"><i class="fas fa-check"></i>Accepts</a>
                                          <a href="#" class="dropdown-item edit rejectdiv"><i class="fas fa-ban"></i>Rejection</a>
                                          <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt"></i>delete</a>
                                        </div> 
                                        </div>                                      --}}
                            </div></td>
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
@endsection