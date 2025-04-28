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
<p>Once you press continue, you will permanently delete this payment method. Are you sure about the deletion process?</p>
</div>
<div class="datahide container" style="margin-top: 5px;">
<div class="actiondiv2" style="margin-bottom: 5px;">
<button type="submit" class="continuedetelet" style="margin:5px !important;">continue</button>
</div>
</div>
</div>
</div>
       <!--************************-->

          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
              <li class="breadcrumb-item active">{{__('Payments')}}</li>
            </ul>
            </div>
            {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">               
              <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>
            </div> --}}
          </div>
        </div>

            <div class="">
              <div class="row" >
                <div class="col-lg-12">
                  <div class="card">
                    
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">{{__('Payments')}}</h3>
                    </div>                     
                  </div>
                </div>                
              </div>
          <!-- Start div Payment method -->
          {{-- <div class="container-fluid">
              <div class="container payment-method">
                 
                  <p class="title-payment">Make Payments</p>
                  <div class="row" style="padding-bottom: 30px;">
                  <div class="col-sm-12 col-md-3 col-lg-3">
                      <div class="paypal-method">
                        <div class="card-close">      
                            <div class="dropdown" style="text-align: right;
                            padding: 5px;">
                          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton">
                            <i class="fa fa-ellipsis-v"></i></button>
                          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                            <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>Deactivate</a>
                            <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt"></i></i>delete</a></div>

                            </div> 
                          </div>
                      </div>
                  </div>

                  <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="master-method">
                      <div class="card-close">      
                          <div class="dropdown" style="text-align: right;
                          padding: 5px;">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton">
                          <i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                          <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>Deactivate</a>
                          <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt"></i></i>delete</a></div>

                          </div> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="visa-method">
                      <div class="card-close">      
                          <div class="dropdown" style="text-align: right;
                          padding: 5px;">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton">
                          <i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                          <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>Deactivate</a>
                          <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt"></i></i>delete</a></div>

                          </div> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="Plus-method">
                        <span class="fas fa-plus"></span>
                    </div>
                </div>
                  
              </div>
            </div>
        </div> --}}
          <!-- End div Payment method -->

          <!--start div method details-->
          <div class="container-fluid" >
          <div class="card-body" style="background-color: #fff;">
            <div class="table-responsive" style="height: 400px;">
              <table class="table" >
                <thead>
                  <tr>
                    <th>{{__('ID')}}</th>
                    <th>{{__('State')}}</th>
                    <th>{{__('Amount')}}</th>
                    <th>{{__('Date')}}</th>
                    <th>{{__('Details')}}</th>                  
                  </tr>
                </thead>
                <tbody>
                @foreach ($cancelpayments as $payment)
                  <tr>
                   <th scope="row">{{$payment->seller->seller_id}}</th>
                   <td><i class="fas fa-circle circle" style="color: red;"></i>{{__('Canceled')}}</td>
                   <td>{{$payment->seller->balance}}</td>
                   <td>{{$payment->created_at}}</td>
                   <td><a href="{{route('admin.paymentdetails',[$payment->id,App()->getLocale()])}}"><i class="fas fa-eye view_details"></i></a></td>
                 </tr>       
                 @endforeach
                  @foreach ($proceedpayments as $payment)
                   <tr>
                    <th scope="row">{{$payment->seller->seller_id}}</th>
                    <td><i class="fas fa-circle circle" style="color: green;"></i>{{__('Proceed')}}</td>
                    <td>{{$payment->seller->balance}}</td>
                    <td>{{$payment->created_at}}</td>
                   <td><a href="{{route('admin.paymentdetails',[$payment->id,App()->getLocale()])}}"><i class="fas fa-eye view_details"></i></a></td> 
                  </tr>       
                  @endforeach
                  @foreach ($holdpayments as $payment)
                  <tr>
                   <th scope="row">{{$payment->seller->seller_id}}</th>
                   <td><i class="fas fa-circle circle" style="color: yellow;"></i>{{__('On hold')}}</td>
                   <td>{{$payment->seller->balance}}</td>
                   <td>{{$payment->created_at}}</td>
                   <td><a href="{{route('admin.paymentdetails',[$payment->id,App()->getLocale()])}}"><i class="fas fa-eye view_details"></i></a></td>   
                 </tr>       
                 @endforeach
                </tbody>
                
              </table>
          </div>
          </div>
        </div>

@endsection