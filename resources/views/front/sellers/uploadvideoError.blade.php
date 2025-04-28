@extends('layouts.seller')
@section('content')

<div class="Table-SubUser">
    <!-- Page Header-->
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('seller.index',App()->getLocale())}}">Dashboard</a></li>
         <li class="breadcrumb-item active">Add Video</li>
      </ul>
      </div>
    
    </div>
  </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card" style="justify-content:center; align-items:center;">
                <div>
               <p style="color:red; font-size:20px; margin-top:20px">uploaded video must be 2 minutes or less than!</p>
               <img src="{{asset('assets/front/img/faildUpload.png')}}" style="max-width:80%">
               
             </div>
                               
            </div>
          </div>                
        </div>



@endsection