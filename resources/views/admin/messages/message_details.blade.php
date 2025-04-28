 
 @extends('layouts.admin')

 @section('content')
 <div class="breadcrumb-holder container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"> <h3 class="h4">{{__('Massage Details')}}</h3></li>
     
    </ul>
    </div>
    
  </div>
</div>
 <!---Star div Massages-->

 <div class="details-msg" style="background: #fff;">
    <div class="container test">
        <div class="row p-5">
            <div class="col-md-6">
                <h1 style="font-weight: 500;">{{$message->subject}}</h1>
            </div>
        </div>
        @if ($message->usertype==1)
        @foreach ($sellers as $seller )
        @if ($message->sender_id==$seller->seller_id)
        <div class="row px-5">
            <div class="col-md-6">
                <div class=" d-flex"> 
                    <div class="msg-profile px-3"> <img src="{{url('profile')}}/{{$seller->picture}}" style="height: 50px;" 
                        alt="..." class="img-fluid rounded-circle"></div>
                    <div class="msg-body">
                      <h3 class="h5">{{$seller->seller_name}} </h3><span>{{$seller->email}}</span>
                    </div></div>
            </div>
            @endif
            @endforeach
            @elseif($message->usertype==2)
            @foreach ($users as $user )
        @if ($message->sender_id==$user->id)
        <div class="row px-5">
            <div class="col-md-6">
                <div class=" d-flex"> 
                    <div class="msg-profile px-3"> <img src="{{url('profile')}}/{{$user->picture}}" style="height: 50px;" 
                        alt="..." class="img-fluid rounded-circle"></div>
                    <div class="msg-body">
                      <h3 class="h5">{{$user->name}} </h3><span>{{$user->email}}</span>
                    </div></div>
            </div>
            @endif
            @endforeach
            @endif
            <div class="col-md-6 d-flex justify-content-around">
                <p class="px-3">{{$message->created_at}}</p>
                <!--<i class="fa fa-star" aria-hidden="true" style="font-size: 20px;"></i>-->

                <!--<div class="card-close">      -->
                <!--    <div class="dropdown">-->
                <!--      <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle morebutton"><i class="fa fa-ellipsis-v"></i></button>-->
                <!--      <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow " x-placement="bottom-end" style=" position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-143px, 24px, 0px);">-->
                        <!--<a href="Downloads.html" target="_blank" class="dropdown-item "><i class="fas fa-download"></i>Downloads</a>
                        <a href="./massage.html" class="dropdown-item massage" target="_blank"><i class="far fa-envelope"></i>Send massage</a>
                        <a href="#" class="dropdown-item remove actionsubadmin1"><i class="fa fa-times"></i>Deactivate</a>-->
                        <!--<a href="{{ route('admin.Message.delete') }}" class="dropdown-item edit actionsubadmin2"><i class="fas fa-trash-alt"></i>{{__('delete')}}</a></div>-->
            <!--            </div> -->
            <!--            </div>-->
            <!--</div>-->
        </div>

        <div class="container px-3 test">
            <div class="row p-5 ">
            <div class="msg-description p-5">
               
                    <p>{{$message->body}}
                    </p>
            </div>
            </div>
        </div>

        <div class="options row p-3 test">
           
            <div class="col-md-6  pt-5">
                <button type="button" class="btn btn-outline-secondary replay-btn" id="myBtn"><i class="fa fa-reply" aria-hidden="true"></i>{{__('Reply')}}</button>
            </div>
            {{-- <div class="col-md-6">

            </div> --}}
        </div>
         <div id="myModal" style="display: none; position: fixed; z-index: 1; padding-top: 100px; left: 0px; top: 0px; width: 100%; height: 100%; overflow: auto;">

                <!-- Modal content -->
                <div class="modal-contentmsg" style="position: relative; 
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                border: none;
                width: 40% ;
                height:60%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s;
                position: fixed;
                 bottom: 2%;
                 right: 3%;
                 text-align: left;">
                    <div class="modal-headermsg" style="padding: 2px 16px;
                    background-image: linear-gradient(to right,rgb(138, 5, 5), #ff0000);
                    color: white;">
                        <span class="closemsg " style="color: white;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                        position: fixed;
                         right: 4%;">×</span>
                        <!-- <i class=" close close1  fas fa-chevron-down"></i> -->
                        
                        <h2> New message</h2>
                    </div>
                    <form action="{{route('admin.Message.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="input-group input-group-sm mb-3  Mainform">
                                <input type="text" class="form-control form1 form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="To" name="to" value="{{$sender->email}}">
                            </div>
                            <div class="input-group input-group-sm mb-3 Mainform">
                                <input type="text" class="form-control form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Subject" name="subject">
                            </div>
                            <div class="input-group input-group-sm mb-3  ">
                                <textarea class="form-control form-input textareamsg" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="write here" name="body"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-light" value="Send"><i class="far fa-paper-plane"></i>
                            
    
                        </div>
                    </form>
                </div>
    
            </div>
        <!--<div class="msg-reply ">-->
        <!--    <div class="top_send">-->
        <!--        <div class="TitleMSG" style="-->
        <!--        padding-top: 5px; float: left;"> -->
        <!--          <p>{{__('Send massage')}}</p>-->
        <!--        </div>-->

        <!--        <div class="select_people" style="text-align: right;">-->
        <!--          <div class="filter_slect px-3 py-1" style="font-size: 20px; float: right;">-->
        <!--            <i class="fa fa-times-circle closeformmsgadmin" aria-hidden="true"></i>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--    </div>-->

        <!--    <div class="form_msg">-->
        <!--        <div class="input_form1">-->
        <!--          <input type="text" class="input_msg" placeholder="{{__('Email')}}">-->
        <!--        </div>-->

        <!--        <div class="input_form1">-->
        <!--          <input type="text" class="input_msg" placeholder="{{__('Subject')}}">-->
        <!--        </div>-->

        <!--        <div class="input_form1">-->
        <!--          <textarea class="input_msg" style="outline: none; height: 100px;"></textarea>-->
        <!--        </div>-->
                
        <!--        <button type="button" class="btn btn-outline-secondary m-3" style="float: right;">{{__('Send')}}</button>-->
        <!--      </div>-->
        <!--</div>-->
    </div>
</div>
<!--End div massages-->
     


@endsection