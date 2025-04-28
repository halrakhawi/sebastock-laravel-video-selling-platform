@extends('layouts.seller')

@section('content')

<form action="{{route('seller.Message.delete')}}" method="GET">
  <div class="breadcrumb-holder container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"> <h3 class="h4">Messages</h3></li>
     
    </ul>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 right">               
      <button class="backbtn" style="margin-top: 10px;"><i class="fas fa-arrow-down" style="color: #ffffff !important;"></i> Backup Data</button>
    </div>
  </div>
  </div>
  
   @error('subject')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
 @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <!---Star div Massages-->
  <div class="container">     
  <ul class="tabs">
  
  <li class="tab">
  
  <input type="radio" name="tabs" checked="checked" id="tab1" />
  
  
 
  
  
  <div id="tab-content2 " class="content pt-5">
    <div class="row icons-list" style="display: flex; justify-content:space-between; z-index: 5;width: 100%;margin-top: 15px;">
  
      <div class="col-md-8 options-icon d-flex">
        <input type="checkbox" class="m-2" id="chkall">
        <div>
          
        </div>
        <div class="card-close refresh divbtndeletemsg">
     
            <input type="submit" value="Delete" style="border:none; background-color:transparent; color:#707070" >
              {{-- <i class="fa fa-refresh" aria-hidden="true" class="ms-2"></i> --}}
              <i class="fas fa-trash" aria-hidden="true" class="ms-2"></i>
            {{-- </button> --}}
            </div>
          </form>
      </div>
    <div class="divbtnsheadmsg">
      <div class="card-close">
        <div class="dropdown itemstop">
          <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle backicon">
            <i class="fas fa-sort"></i></button>
    
          <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
           <a href="{{route('seller.messagessort','sort-asc')}}" class="dropdown-item ATZ">
               A TO Z</a>
           <a href="{{route('seller.messagessort','sort-desc')}}" class="dropdown-item ZTA">
               Z TO A</a>
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
    
        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="close ">&times;</span>
             <!-- <i class=" close close1  fas fa-chevron-down"></i> -->
            <h2>New message</h2>
          </div>
          <form action="{{route('seller.Message.store')}}" method="POST">
            @csrf
          <div class="modal-body">
            <div class="input-group input-group-sm mb-3  Mainform">
               <label type="text" class="form-control form1 form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Admin" name="to">Admin</label>
            </div>
             <div class="input-group input-group-sm mb-3 Mainform">
              <input type="text" class="form-control form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Subject" name="subject">
           </div>
           <div class="input-group input-group-sm mb-3  ">
            {{-- <input type="textarea " class="form-control form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="write here" name="body"> --}}
            <textarea class="form-control form-input textareamsg" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="write here" name="body"></textarea>
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-light" value="Send"><i class="far fa-paper-plane"></i>
             {{-- <button type="button" class="btn btn-light">Send <i class="far fa-paper-plane"></i></button> --}}
    
           </div>
          
        </div>
      </form>
    
    </div>
      
      </div>
    
    
    
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
       
        <tbody>
          
          @foreach ($sellermessages as $message)
          @if ($message->usertype==0)
          @foreach ($admins as $admin)
          @if ($message->sender_id==$admin->id)
          {{-- @dd($message->sender->seller_name) --}}
          <tr>
            <th scope="row"><input type="checkbox" name="checked[]" value="{{$message->id}}"></th>
            <!--<td><i class="fa fa-star" aria-hidden="true"></i></td>-->
            <td><a href="{{route('seller.messages.details',$message->id)}}">{{$admin->name}}</a></td>
            <td>
              <div>{{$message->subject}}
                </div></td>
            <td>{{$message->created_at}}</td>               
          </tr>
          @endif
          @endforeach
          {{-- @elseif ($message->usertype==2)
          @foreach ($users as $user)
          @if ($message->reciever_id==$user->id)
          {{-- @dd($message->sender->seller_name) --}}
          {{-- <tr>
            <th scope="row"><input type="checkbox" name="checked[]" value="{{$message->id}}"></th>
            <td><i class="fa fa-star" aria-hidden="true"></i></td>
            <td><a href="{{route('seller.Message.details',$message->id)}}">{{$user->name}}</a></td>
            <td>
              <div>{{$message->body}}
                </div></td>
            <td>{{$message->created_at}}</td>               
          </tr> --}}
          {{-- @endif --}}
          {{-- @endforeach --}}
          @endif
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
                <label type="text" class="input_msg" placeholder="Admin">
              </div>
  
              <div class="input_form1">
                <input type="text" class="input_msg" placeholder="Subject">
              </div>
  
              <div class="input_form1">
                <textarea class="input_msg " style="outline: none; height: 100px;"></textarea>
              </div>
              
              <button type="button" class="btn btn-outline-secondary m-3" style="float: right;">Send</button>
            </div>
      </div>

@endsection