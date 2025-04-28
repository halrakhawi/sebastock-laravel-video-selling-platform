@extends('layouts.admin')
@section('content')

 
<div class="Table-SubUser">
    <!-- Page Header-->
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
        <li class="breadcrumb-item active">{{__('Backup')}}</li>
      </ul>
      </div>
    
    </div>
  </div>


      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-close" style="position: absolute; display: flex;">
               
              </div>
                               
            </div>
          </div>                
        </div>

        <div class="export_msg">
          <div class="Export_MSG">
            <div class="row Top_MSGEx">
              <div class="TitleMSG col-md-6">
                <p>Export data location</p>
              </div>

              <div class="colseicon col-md-6 right">
                <i class="far fa-times-circle colse"></i>
              </div>

            </div>
            <br>
            <div class="secondMSG row">
              <div class="col-md-2">
                <img src="./img/logo.png" class="msglogo">
            </div>
            <div class="col-md-10">
              <p class="msg_Data">{{__('Choose where to save the copy of data.
                And store it in a safe and easy to get place when needed')}}
                 </p>
          </div>

          </div>

          <div class="inputlocation row">
            <div class="col-md-2"></div>
            <div class="col-md-4"><p class="locationName">{{__('Location Name')}}:</p></div>
            <div class="col-md-6">
              <a href="path/to/file/to/download" download>
                <input type="text" placeholder="click to select location">
              </a>
            </div>
          </div>

          <div class="actiondiv">
            <button type="submit" class="actionbtn"><a href="{{route('admin.backupdatabase')}}">{{__('Export')}}</a></button>
          </div>

        </div>

 <!--start backup div-->
 <div class="container-fluid">
  <div class="row">
      <div class="left-div2 col-sm-3 col-md-3 col-lg-3">
          <nav class="side-navbar" style=" text-align: left;
          min-width: 220px;
          max-width: 220px;
          background: none;
          box-shadow: none;">
           
              <!-- Sidebar Navidation Menus-->
              <ul class="list-unstyled">
                <li class="active"><a href="./Backup.html" style="height: 45px; margin-bottom: 5%"><i class="fas fa-file-export"></i>{{__('Export Data')}}</a></li>
                {{-- <li><a href="{{route('admin.getbackupimport')}}"  style="height: 45px; margin-bottom: 5%"><i class="fas fa-desktop"></i>{{__('Import Data')}} </a></li>          --}}
            
              </ul>
          </nav>

          

      </div>
      <div class="col-sm-9 col-md-9 col-lg-9">
          <div class="image-backup">
              <img src="{{asset('/assets/admin/img/backup.png')}}" class="img-back">
              <div class= "text-back">
                  <p>{{__('You save a copy of all website data so that you can retrieve it at another time')}}</p>
              </div>
          </div>
          
          <div class="container-fluid">
          <div class="row">
          
          <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="moredata">
                  <div class="export-data">
                      <p class="title-ex-data">{{__('Backup total data')}}:</p>
                      <p class="answer-ex">189,079 {{__('File')}}</p>
                  </div>
                  <div class="export-data">
                      <p class="title-ex-data">{{__('Backup total Sizes')}}:</p>
                      <p class="answer-ex">189,079 {{__('File')}}</p>
                  </div>
                  <div class="export-data">
                      <p class="title-ex-data">{{__('Date Last export')}}:</p>
                      <p class="answer-ex">4, April 2017</p>
                  </div>
                  <div class="export-data">
                      <p class="title-ex-data">{{__('Current export date')}}:</p>
                      <p class="answer-ex">4, April 2017</p>
                  </div>
              </div>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="divexport">
                <button type="submit" class="actionbtn"><a href="{{route('admin.backupdatabase')}}">{{__('Export')}}</a></button>

                  <br>

                  {{-- <div class="links">
                  <a href="#">Data export location?</a>
                  <a href="#">What does back up mean?</a>
              </div> --}}
              </div>
          </div>

      </div>
  </div>
      </div>
  </div>
 </div>


@endsection