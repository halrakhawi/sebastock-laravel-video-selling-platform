 
 @extends('layouts.seller')
 @section('content')
 <div class="breadcrumb-holder container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"> <h3 class="h4">{{$message->subject}}</h3></li>
     
    </ul>
    </div>
    
  </div>
</div>
 <!---Star div Massages-->


 <div class="details-msg" style="background: #fff;">
    <div class=" test">
        <div class="row p-5">
            <div class="col-md-6">
                <h1 style="font-weight: 500;">{{$message->subject}}</h1>
            </div>
        </div>

        <div class="row px-5" style="justify-content:space-between; align-items:center;">
          
                <div class="d-flex"> 
                    <div class="msg-profile px-3"> <img src="{{url('profile')}}/{{auth('seller')->user()->picture}}" style="height: 50px;" 
                        alt="..." class="img-fluid rounded-circle"></div>
                    <div class="msg-body">
                      <h3 class="h5">{{auth('seller')->user()->seller_name}} </h3><span>{{auth('seller')->user()->email}}</span>
                    </div>
                </div>

            <div class="col-md-6 d-flex justify-content-around">
                <p class="px-3">{{$message->created_at}}</p>
                <i class="fa fa-star" aria-hidden="true" style="font-size: 20px;"></i>

                <div class="card-close">      
                    <div class="dropdown">
                      <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>
                      <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow " x-placement="bottom-end" style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-143px, 24px, 0px);">
                        <!--<a href="Downloads.html" target="_blank" class="dropdown-item "><i class="fas fa-download"></i>Downloads</a>
                        <a href="./massage.html" class="dropdown-item massage" target="_blank"><i class="far fa-envelope"></i>Send massage</a>
                        <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>Deactivate</a>-->
                        <a href="#" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt"></i>delete</a></div>

                        </div> 
                        </div>
            </div>
        </div>

        <div class=" px-3 test">
            <div class="row p-5 ">
            <div class="msg-description p-5">
               
                    <p>{{$message->body}}
                    </p>
            </div>
            </div>
        </div>

        <div class="options row p-3 test">
           
            <div class="col-md-6  pt-5">
                <button type="button" class="btn btn-outline-secondary replay-btn"><i class="fa fa-reply" aria-hidden="true"></i> Reply</button>
            </div>
            {{-- <div class="col-md-6">

            </div> --}}
        </div>

        <div class="msg-reply ">
            <div class="top_send">
                <div class="TitleMSG" style="
                padding-top: 5px; float: left;"> 
                  <p>Send massage</p>
                </div>

                <div class="select_people" style="text-align: right;">
                  <div class="filter_slect px-3 py-1" style="font-size: 20px; float: right;">
                    <i class="fa fa-times-circle closeformmsgadmin" aria-hidden="true"></i>
                  </div>
                </div>
            </div>

            <div class="form_msg">
                <div class="input_form1">
                  <input type="text" class="input_msg" placeholder="User Email">
                </div>

                <div class="input_form1">
                  <input type="text" class="input_msg" placeholder="Subject">
                </div>

                <div class="input_form1">
                  <textarea class="input_msg" style="outline: none; height: 100px;"></textarea>
                </div>
                
                <button type="button" class="btn btn-outline-secondary m-3" style="float: right;">Send</button>
              </div>
        </div>
    </div>
</div>
<!--End div massages-->
     


@endsection