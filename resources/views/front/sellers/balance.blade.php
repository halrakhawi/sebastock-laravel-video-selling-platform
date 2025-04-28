@extends('layouts.seller')
@section('content')


<div class="Table-SubUser" style="height: 800px;">
    <!-- Page Header-->


      <div class="">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">{{__('Balance')}}</h3>
              </div>                     
            </div>
          </div>                
        </div>
    <!-- Start Balance Div -->
    <div class="breadcrumb-holder container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('seller.index',App()->getLocale())}}">{{__('Dashboard')}}</a></li>
        <li class="breadcrumb-item active">{{__('Revenues')}}</li>
      </ul>
    </div>
    <div class="container">
    <div class="Balance_MSG1" style="display: none;">
      
      <div class="row Top_MSGEx">
        <div class="TitleMSG col-md-6">
          <p>Balance withdrawal</p>
        </div>

        <div class="colseicon col-md-6 right">
          <i class="far fa-times-circle colse"></i>
        </div>

      </div>
      <br>
      <div class="form_Balance">
        <div class="row">
        <div class="col-md-6">
          <div class="dropdown">
            <button class="dropbtn form-control">payment method</button>
            <div class="dropdown-content">
              <a href="#"><i class="fab fa-cc-paypal payment_icon"></i> <p class="txt_pay">PAYPAL</p></a>
              <a href="#"><i class="fab fa-cc-visa payment_icon"></i> <p class="txt_pay">VISA</p></a>
              <a href="#"><i class="fab fa-cc-mastercard payment_icon"></i> <p class="txt_pay">MASTERCARD</p></a>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="amount_div">
            <div class="ammount_txt"><p>Ammount</p></div>
            <div class="input_ammount"><input type="txt" class="mount_inp"></div>
            <div class="carancy"><p>$</p></div>
          </div>
        </div>


        <div class="col-md-6">
          <p class="top-heading2">CARD NUMBER</p>
          <br>
          <input type="text" class="form-control" placeholder="1234     5678     3456     2456">
        </div>

        <div class="col-md-6">
          <p class="top-heading2">CARD NAME</p>
            <br>
            <input type="text" class="form-control" placeholder="John Doe">
          </div>

          <div class="col-md-6">
            <div class="group row">
            <div class="col-md-8">
              <p class="top-heading2">EXPIRE DATE</p>
                <br>
                <input type="text" class="form-control" placeholder="05    /    21">
            </div>

            <div class="col-md-4" style="margin-top: 8px;">
              <p class="top-heading2">CVV</p>
                <br>
                <input type="text" class="form-control" placeholder="123">
            </div>
          </div>

          </div>

          <div class="col-md-12" style="margin-top: 5%;">
            <input type="checkbox" class="checkbox1" style="float: left;">
            <p style="color: gray;">SAVE CARD</p>
          </div>

          <div class="col-md-12">
            <p class="note">* Payment process fees are deducted from electronic payment gateways such as PayPal and credit cards.</p>
          </div>

          <hr>
          <div class="col-md-4">
            <div class="actiondiv5">
              <button type="submit" class="actionbtn5">Save</button>
            </div>
          </div>

          <div class="col-md-8">
            <div class="grop2 row">
              <div class="col-md-2">
              <img src="./img/security.png" class="security">
            </div>
            <div class="col-md-10">
              <p style="font-size: 12px;">Withdraw securely, your connection is encrypted and protected</p>
            </div>
            </div>
          </div>

        </div>
      </div>
      </div>
   
  </div>
</div>

    <div class="btntopdive">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-sm-12 col-md-6 col-lg-6"></div>
                    
                {{-- <div class=" row col-sm-12 col-md-6 col-lg-6">
                  <div class="col-sm-12 col-md-6 col-lg-6">
                      <button class="btnbalance">Balance withdrawal</button>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6">
                      <button class="btnbalance2">Recharge balance</button>
                  </div>

                </div> 
            </div> --}}
        </div>
    </div>
<!-- End Balance Div -->

          <!-- Start Balance Div2 -->
          <div class="container-fluid" style="margin-top: 5%;">
            <div class="container">
               
               
                <div class="row" style="padding-bottom: 30px;">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="table-responsive">
                      <p class="title-Balance">{{__('Estimated earnings')}}</p><table class="table" style="background-color: #fff;">

                        

                        <thead>
                          <tr>
                            <th>{{__('Today')}}</th>
                            <th>{{__('Yesterday')}}</th>
                            <th>{{__('Last 7 days')}}</th>
                            <th>{{__('This month')}}</th>
                            
                          </tr>
                        </thead>
        
                        <tbody>
        
                          <tr class="earned">
                            <td>{{$todaybalance}} $</td>
                            <td>{{$yesterdaybalance}} $</td>
                            <td>{{$weekbalance}} $</td>
                            <td>{{$monthbalance}} $</td>
                            </tr>
                         
                    </tbody>
        
                     </table>
                    </div>
                </div>
        
        
              <div class="col-sm-12 col-md-3 col-lg-3 balanc-Num">
                  <div class="Plus-Balance">
                     <div class="Balance_head"><p>{{__('Balance')}}</p></div>
                     <div class="Balance_NUM"><p>{{auth('seller')->user()->balance}} $</p></div>
                  </div>
              </div>
                
            </div>
          </div>
        </div>
        <div class="Table-SubUser">
          <!-- Page Header-->
         
          <!-- Breadcrumb-->
          
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
                          {{__('A TO Z')}}</a>
                          <a href="#" class="dropdown-item ZTA">
                            {{__('Z TO A')}}</a>
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

                          {{-- <a href="#" class="dropdown-item ">
                            Most downloaded </a>

                            <a href="#" class="dropdown-item ">
                               least loaded</a>
                   --}}
                        </div>
                        
                      </div>
                      
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">{{__('Revenues Detailes')}}</h3>
                      {{-- <div class="salary">
                        <div class="num-salary">
                            <p> $300</p>
                        </div>
                    </div> --}}
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>{{__('ID')}}</th>
                              <th>{{__('Full Name')}}</th>
                              <th>{{__('Full Name')}}</th>
                              <th>{{__('Price')}}</th>
                              <th>{{__('Phone')}}</th>
                              <th>{{__('Date Join')}}</th>
                              <th>{{__('Downlods')}}</th>
                              <!--<th>{{__('Details')}}</th>-->
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($userorder as $item)                               

                            <tr>
                              <th scope="row">{{$item->id}}</th>
                              <td>{{$item->name}}</td>
                              <td>{{$item->address}}</td>
                              <td>{{((array)priceofsellervideos($item->id)[0])['sum(price)']}} $</td>
                              <td>{{$item->mobile}}</td>
                              
                              <td>{{Carbon\Carbon::parse($item->created_at)->format('Y m d')}}</td>
                              <td>{{((array)downloadscount($item->id)[0])['count(id)']}}</td>
                              <!--<td>                         -->
                              <!--  <div class="card-close">      -->
                              <!--        <div class="dropdown">-->
                              <!--          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle morebutton"><i class="fas fa-eye"></i></button>-->
                              <!--          {{-- <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">-->
                              <!--            <a href="Buyer_details.html" class="dropdown-item massage"></a>-->
                              <!--            </div>  --}}-->
                              <!--        </div>                                     -->
                              <!--</div></td>-->
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
