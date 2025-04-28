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
        <li class="breadcrumb-item "><a href="Categories.html">{{__('Categories')}}</a></li>
        <li class="breadcrumb-item active">{{__('Add Category')}}</li>

      </ul>
      </div>
      {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
        <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>
      </div> --}}
    </div>
  </div>



        <div class="row">
          <div class="col-lg-12">
            <div class="card">
          
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">{{__('Add Category')}}</h3>
              </div>                     
            </div>
          </div>                
        </div>
<form action="{{route('admin.categories.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <!-- Start slider channels-->
    <div class="channel-div">
      <div class="container-fluid">
        <div class="divaddcontentcategory"  style="margin-bottom:30px">
          <label class="lbladdcategory" style="color:#707070">{{__('Name')}}:</label>
          <input type="text" class="txtaddcategory" name="name" style="border:none; margin-left:20px; padding:5px"> 
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div  class="divaddcontentcategory" style="display: flex; margin-bottom:30px">
          <label class="lbladdcategory" style="color:#707070">{{__('Picture')}}:</label>
          <div class="input-group" style="width: 30%; margin-left:20px;">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">{{__('Upload')}}</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01" name="picture">
              <label class="custom-file-label" for="inputGroupFile01">{{__('Choose file')}}</label>
            </div>
             
          </div>
             @error('picture')
              <span class="text-danger">{{$message}}</span>
              @enderror
          <!-- <input type="file" > -->
        </div>
        <div  class="divaddcontentcategory" style="margin-bottom:30px">
          <input type="checkbox" class="checkactivecategory" name="active" style="border:none; box-shadow:2px 3px 4px #b9cfdc">
          <label class="lbladdcategory" style="color:#707070">{{__('Active')}}</label>
        </div>
        <div  class="divaddcontentcategory" style="margin-bottom:30px">
          <input type="submit" class="btnaddcategory btnyesaddcategory" style="width:80px; border:none; padding:5px; box-shadow:2px 3px 2px #b9cfdc; margin-right:20px; background-color:#FF7676; color:#eee" value="{{__('Add')}}">
          <input type="submit" class="btnaddcategory btnnoaddcategory" style="width:80px; border:none; padding:5px; box-shadow:2px 3px 2px #b9cfdc;" value="{{__('Cancel')}}"  data-toggle="modal" data-target="#exampleModalcategory">
          <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{__('Cancel Confirmation')}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <i class="far fa-times-circle closedelete"></i>
                    <h4>Are Your Sure?</h4>
                    <p class="pDelete">Do you really want to cancel this process? This process cannot be undone.</p>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <button type="button" class="btn btn-danger">Yes</button>
                </div>
                <!-- <div class="modal-footer">
                
                </div> -->
              </div>
            </div>
          </div>
        </div>
        
  
    
    
</div>
</div>
</form>
@endsection
