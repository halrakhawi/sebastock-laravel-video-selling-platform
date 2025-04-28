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
        <li class="breadcrumb-item active">SubCategories</li>
      </ul>
      </div>
      {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">
        <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i>Backup Data</button>
      </div> --}}
    </div>
  </div>

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
  <form action="#" method="get">
    @csrf
<button type="submit" class="continuedetelet" style="margin:5px !important;">continue</button>
</form>
</div>
</div>
</div>
</div>
<!--************************-->
<div class="Renamediv1">
<div class="Renamediv">
<div class="colseicon">
<i class="far fa-times-circle colse"></i>
</div>
<br>
<div class="title-hidediv container">
<p>Enter the name of the new item to add it to the list</p>
</div>
<!------>
<div class="card-content collapse show">
  <div class="card-body">
      <form class="form" action="{{route('admin.subcategories.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label> Category Picture </label>
              <label id="projectinput7" class="file center-block">
                  <input type="file" id="file" name="picture">
                  <span class="file-custom"></span>
              </label>
              @error('picture')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-body">

              <h4 class="form-section"><i class="ft-home"></i> Category Data </h4>

           
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="projectinput1"> Category Name </label>
                                  <input type="text" value="" id="name"
                                         class="form-control"
                                         placeholder="  "
                                         name="name">
                                  @error("$subcategories.name")
                                  <span class="text-danger">This field is required This field is required</span>
                                  @enderror
                              </div>
                          </div>


                         {{--<div class="col-md-6 hidden">
                              <div class="form-group">
                                  <label for="projectinput1"> Abrrtiation {{__('messages.'.$lang -> abbr)}} </label>
                                  <input type="text" id="abbr"
                                         class="form-control"
                                         placeholder="  "
                                         value="{{$lang -> abbr}}"
                                         name="category[{{$index}}][abbr]">

                                  @error("category.$index.abbr")
                                  <span class="text-danger">This field is required</span>
                                  @enderror
                              </div>
                          </div>--}} 

                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group mt-1">
                                  <input type="checkbox" value="1"
                                         name="active"
                                         id="switcheryColor4"
                                         class="switchery" data-color="success"
                                         checked/>
                                  <label for="switcheryColor4"
                                         class="card-title ml-1">Active </label>

                                  @error("$subcategories.active")
                                  <span class="text-danger"> </span>
                                  @enderror
                              </div>
                          </div>
                      </div>
                 
          </div>


          <div class="form-actions">
              <button type="button" class="btn btn-warning mr-1"
                      onclick="history.back();">
                  <i class="ft-x"></i> Back
              </button>
              <input type="submit" value="Save">
              {{--<button type="submit" class="btn btn-primary">
                  <i class="la la-check-square-o"></i> Save
              </button>--}}
          </div>
      </form>
  </div>
</div>
<!------>
</div>
</div>


      <div class="">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-close" style="position: absolute; display: flex;">
                <div class="dropdown itemstop AddNAME">
                  <button type="button AddNAME" id="closeCard1" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
                    <i class="fas fa-plus"></i></button>
                  </div>

              </div>
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">SubCategories</h3>
              </div>
            </div>
          </div>
        </div>

    <!-- Start slider channels-->
    <div class="row" style="padding: 10px">
    @isset($subcategories)
        @foreach ($subcategories as $subcategory)

        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="box-channles">
          <div class="div-categorie-box1">
          <img src="{{URL('assets/images')}}{{$subcategory->picture}}" alt="categoryPicture">
          <div class="card-close">      
            <div class="dropdown" style="text-align: right;
            padding: 5px;">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton">
            <i class="fa fa-ellipsis-v" style="color: #fff !important;"></i></button>
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
              <a href="{{route('admin.subcategories.edit',$subcategory->id)}}" ><i class="fas fa-pencil-alt "></i>Rename</a>
              <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>Deactivate</a>
              <a href="{{route('admin.subcategories.delete',$subcategory->id)}}"><i class="fas fa-trash-alt"></i>delete</a></div>
            </div> 
          </div>
          </div>
          <div class="card-body category-name-box">
              <h3 class="category-name"> {{$subcategory->name}}</h3>
          </div>
          </div>
          </div>
        <!--=================================div first categories=============================-->

        @endforeach
      </div>

        @endisset

        <span>{{$subcategories->links()}}</span>
</div>
</div>
</div></div></div>


@endsection

