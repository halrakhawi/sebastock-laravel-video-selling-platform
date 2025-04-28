@extends('layouts.admin')

@section('content')

    <form action="{{ route('admin.Message.delete') }}" method="GET">
        <div class="breadcrumb-holder container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <h3 class="h4">{{__('Messages')}}</h3>
                        </li>

                    </ul>
                </div>
                {{-- <div class="col-sm-12 col-md-6 col-lg-6 right">
                    <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down"
                            style="color: #ffffff !important;"></i>Backup Data</button>
                </div> --}}
            </div>
        </div>


        <!---Star div Massages-->
        <div class="container">
            <ul class="tabs">

                <li class="tab">

                    <input type="radio" name="tabs" checked="checked" id="tab1" />


                    {{-- <div class="row icons-list" style="position: fixed;z-index: 5;width: 100%;margin-top: 15px;">

  <div class="col-md-8 options-icon d-flex">
    <input type="checkbox" class="m-2" id="chkall">
    <div class="card-close refresh">
        <input type="submit" >
          <i class="fas fa-trash" aria-hidden="true" class="ms-2"></i>
        </div>
      </form>
  </div>

  <div class="card-close">
    <div class="dropdown itemstop">
      <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
        <i class="fas fa-sort"></i></button>

      <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow" style="display: none;">
       <a href="{{route('admin.messagessort',['sort-asc',App()->getLocale()])}}" class="dropdown-item ATZ">
                        {{__('A TO Z')}}</a>
                    <a href="{{route('admin.messagessort',['sort-desc',App()->getLocale()])}}" class="dropdown-item ZTA">
                        {{__('Z TO A')}}</a>
      </div>
      </div>
      
  </div>

  <div class="card-close mx-3 ">
    <div class="dropdown itemstop addnew-msg   " id="myBtn">
      <button type="button" id="closeCard1" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
        <i class="fas fa-plus"></i></button>
      </div>
      
  </div>
  <div id="myModal" class="modal">

    <div class="modal-content">
      <div class="modal-header">
        <span class="close ">&times;</span>
        <h2>New message</h2>
      </div>
      <form action="{{route('admin.Message.store')}}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="input-group input-group-sm mb-3  Mainform">
           <input type="text" class="form-control form1 form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="To" name="to">
        </div>
         <div class="input-group input-group-sm mb-3 Mainform">
          <input type="text" class="form-control form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Subject" name="subject">
       </div>
       <div class="input-group input-group-sm mb-3  ">
        <input type="textarea " class="form-control form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="write here" name="body">
     </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-light" value="Send"><i class="far fa-paper-plane"></i>

       </div>
      
    </div>
  </form>

 
  
  </div>



</div> --}}


                    <div id="tab-content2 " class="content pt-5">

                        <div class="row icons-list"
                            style=" d-flex ;justify-content: space-between; width: 100%;margin-top: 15px;">

                            <div class="col-md-8 options-icon d-flex">
                                <input type="checkbox" class="m-2" id="chkall">

                                <div class="card-close refresh divbtndeletemsg">

                                    <input type="submit" class="btndeletemsg" value="Delete">
                                    {{-- <i class="fa fa-refresh" aria-hidden="true" class="ms-2"></i> --}}
                                    <i class="fas fa-trash" aria-hidden="true" class="ms-2"></i>
                                    {{-- </button> --}}
                                </div>
    </form>
    </div>
    <div class="divbtnsheadmsg">
        <div class="card-close">
            <div class="dropdown itemstop">
                <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="dropdown-toggle backicon">
                    <i class="fas fa-sort"></i></button>

                <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                    <a href="{{route('admin.messagessort',['sort-asc',App()->getLocale()])}}" class="dropdown-item ATZ">
                        {{__('A TO Z')}}</a>
                    <a href="{{route('admin.messagessort',['sort-desc',App()->getLocale()])}}" class="dropdown-item ZTA">
                        {{__('Z TO A')}}</a>
                </div>
            </div>

        </div>

        <div class="card-close mx-3 ">
            <div class="dropdown itemstop addnew-msg" id="myBtn">
                <button type="button" id="closeCard1" aria-haspopup="true" aria-expanded="false"
                    class="dropdown-toggle backicon">
                    <i class="fas fa-plus"></i></button>
            </div>
            <div id="myModal" style="display: none; position: fixed; z-index: 1;padding-top: 100px;left: 0 ;top: 0 ; width: 100%;height: 100%;overflow: auto ">

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
                         right: 4%;">&times;</span>
                        <!-- <i class=" close close1  fas fa-chevron-down"></i> -->
                        <h2> {{__('New message')}}</h2>
                    </div>
                    <form action="{{ route('admin.Message.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="input-group input-group-sm mb-3  Mainform">
                                <input type="text" class="form-control form1 form-input" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm" placeholder="{{__('To')}}" name="to">
                            </div>
                            <div class="input-group input-group-sm mb-3 Mainform">
                                <input type="text" class="form-control form-input" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm" placeholder="{{__('Subject')}}" name="subject">
                            </div>
                            <div class="input-group input-group-sm mb-3  ">
                                <textarea class="form-control form-input textareamsg" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm" placeholder="{{__('write here')}}" name="body"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-light" value="{{__('Send')}}"><i class="far fa-paper-plane"></i>
                            {{-- <button type="button" class="btn btn-light">Send <i class="far fa-paper-plane"></i></button> --}}
    
                        </div>
                    </form>
                </div>
    
            </div>
        </div>
      
    </div>
    </div>



    <div class="card-body">
        <div class="table-responsive">
            <table class="table">

                <tbody>
                    @foreach ($msg as $message)
                        @if ($message->usertype == 1)
                            @foreach ($sellers as $seller)
                                @if ($message->sender_id == $seller->seller_id)
                                    {{-- @dd($message->sender->seller_name) --}}
                                    <tr>
                                        <th scope="row"><input type="checkbox" name="checked[]"
                                                value="{{ $message->id }}">
                                        </th>
                                        <!--<td><i class="fa fa-star" aria-hidden="true"></i></td>-->
                                        <td><a
                                                href="{{ route('admin.Message.details', $message->id) }}">{{ $seller->seller_name }}</a>
                                        </td>
                                        <td>
                                            <div class="msgsubadmin">{{ $message->subject }}
                                            </div>
                                        </td>
                                        <td>{{ $message->created_at }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @elseif ($message->usertype==2)
                            @foreach ($users as $user)
                                @if ($message->sender_id == $user->id)
                                    {{-- @dd($message->sender->seller_name) --}}
                                    <tr>
                                        <th scope="row"><input type="checkbox" name="checked[]"
                                                value="{{ $message->id }}">
                                        </th>
                                        <!--<td><i class="fa fa-star" aria-hidden="true"></i></td>-->
                                        <td><a
                                                href="{{ route('admin.Message.details', $message->id) }}">{{ $user->name }}</a>
                                        </td>
                                        <td>
                                            <div class="msgsubadmin">{{ $message->subject }}
                                            </div>
                                        </td>
                                        <td>{{ $message->created_at }}</td>
                                    </tr>
                                   
                        @endif
                    @endforeach
                    @endif

                    @endforeach
                    @foreach ($contactus as $user)
                    {{-- @dd($message->sender->seller_name) --}}
                    <tr>
                        <th scope="row"><input type="checkbox" name="checked[]"
                                value="{{ $user->id }}">
                        </th>
                        <!--<td><i class="fa fa-star" aria-hidden="true"></i></td>-->
                        <td><a
                                href="{{ route('user.contactusdetails', [$user->id,App()->getLocale()]) }}">{{ $user->name }}</a>
                        </td>
                        <td>
                            <div class="msgsubadmin">{{ $user->name }}
                            </div>
                        </td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
    @endforeach
                </tbody>

            </table>

        </div>
    </div>
    </div>
    </li>

    </ul>

    </div>

    </div>
    <!--End div massages-->



    <div class="msg-reply">
        <div class="top_send">
            <div class="TitleMSG" style="
                    padding-top: 5px; float: left;">
                <p>Send massage</p>
            </div>

            <div class="select_people" style="text-align: right;">
                <div class="filter_slect px-3 py-1" style="font-size: 20px; float: right;">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
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

@endsection
