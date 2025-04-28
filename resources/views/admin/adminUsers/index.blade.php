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
      <li class="breadcrumb-item active">{{__('Sub Admins')}}</li>
    </ul>
    </div>
    {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
      <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i>{{__('Backup')}} {{__('Data')}}</button>
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
<button type="submit" class="actionbtn">{{__('Save')}}</button>
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


  <section class="tables">   
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="" style="background: #ffffff;">
            
           <div class="card-close" style="position: absolute;">
         <div class="dropdown itemstop">
         
            <button type="submit"  
                id="closeCard1"
                aria-haspopup="true" aria-expanded="false" 
                class="dropdown-toggle backicon">
                <a href="{{route('admin.admins.create',App()->getLocale())}}">
                <i class="fas fa-plus" ></i>
              </a>
               </button>
              
        </div>
            </div> 
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">{{__('Sub Admins')}}</h3>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>{{__('ID')}}</th>
                      <th>{{__('Name')}}</th>
                      <th>{{__('Email')}}</th>
                      <th>{{__('Picture')}}</th>
                      <!--<th>{{__('Details')}}</th>-->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                      <th scope="row">{{$admin->id}}</th>
                      <td>{{$admin->name}}</td>
                      <td>{{$admin->email}}</td>
                      <td><img src="{{url('profile')}}/{{$admin->picture}}" alt="" width="50" height="50"></td>
                      <td>                         
                        <div class="card-close">      
                          <div class="dropdown">
                            {{-- change to admin details here --}}
                            <!--{{-- <a href="{{route('admin.sellerDetails',[$seller->seller_id,App()->getLocale()])}}"><i class="fas fa-eye"></i></a> --}}-->
                           {{-- start comment ddlist --}}
                            {{-- <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button> --}}
                            {{-- <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                                <a href="#" id="myBtn" class="dropdown-item massage" title="Send message"><i class="far fa-envelope"></i>Send massage</a>                       
                                <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>Deactivate</a>
                                <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt"></i></i>delete</a>
                              </div> --}}
                           {{-- end comment ddlist --}}
                              </div> 
                            
                              </div> 
                                                                
                      </td>
                    </tr>
                                        
                    @endforeach
                  </tbody>
                  
                </table>
                <div class="container">
                      {{-- {{$admins->links()}} --}}

                    </div>
                   
              </div>
              
            </div>
            
          </div>
        </div>
      
      </div>
    </div>
    
  </section>

@endsection

