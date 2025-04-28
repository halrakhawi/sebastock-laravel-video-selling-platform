@extends('layouts.admin')

@section('content')

<div class="card-content collapse show">
    <div class="card-body">
        <form class="form" action="{{route('admin.categories.update',$id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
  
                <h4 class="form-section"><i class="ft-home"></i> {{__('Category Data')}} </h4>
  
             
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div style="display:flex; align-items:center; margin-top:30px; margin-bottom:30px">
                                    <label for="projectinput1"> {{__('Category Name')}} </label>
                                    <input type="text" value="{{__($categories->name)}}" id="name"
                                           class="form-control"
                                           placeholder="  "
                                           name="name" style="width:auto; margin-left:20px">
                                           </div>
                                    <div style="display:flex; align-items:center">
                                    <label for="projectinput1"> {{__('Picture')}} </label>
                                    <div class="input-group" style="width: 30%; margin-left:93px; margin-bottom:30px">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">{{__('Upload')}}</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01" name="picture">
              <label class="custom-file-label" for="inputGroupFile01">{{__('Choose file')}}</label>
            </div>
             
          </div>    
                                    </div>
                                           
                                    @error("$categories.name")
                                    <span class="text-danger">{{__('This field is required This field is required')}}</span>
                                    @enderror
                                </div>
                            </div>
                   
            </div>
  
  
            <div class="form-actions">
                <button type="button" class=" mr-1"
                        onclick="history.back();" style="width:80px; border:none; padding:5px; box-shadow:2px 3px 2px #b9cfdc;">
                    <i class="ft-x"></i>  {{__('Back')}} 
                </button>
                <input type="submit" value="{{__('Update')}}" style="width:80px; border:none; padding:5px; box-shadow:2px 3px 2px #b9cfdc; margin-right:20px; background-color:#FF7676; color:#eee">
            </div>
        </form>
    </div>
  </div>

  @endsection