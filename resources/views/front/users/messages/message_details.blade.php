@extends('layouts.front')
@section('content')
{{-- @dd(url('messages/details/'.request()->route()->parameters['id'].'/en')) --}}
<!--start section Body-->
        
<section class="secnewvideos secmostwatch">
    <div class="container">
    <div class="newvideos">
        <div class="pathpages">
            <a href="{{route('home',App()->getLocale())}}">
            <label>{{__('Home')}} /</label>
            </a>
            <a href="{{route('user.messages',App()->getLocale())}}">
            <label> {{__('Messages')}}</label>
            </a>
            <a href="messageDetails.html">
                <label> {{$message->subject}}</label>
            </a>
        </div>
        <div class="titlehead">
            <div class="titlewithNumber">
                <h3>{{$message->subject}}</h3>
            </div>
          
        </div>
        <div class="divbars divbarsstart">
            <div class="barone bar"></div>
            <div class="bartwo bar"></div>
            <div class="barthree bar"></div>
        </div>
      <div>
       <div class="headDetailsmsg">
           
           <div class="flexheadmsgicon">
            <div class="composemsg btnaddcartdetails btnbuydetails" id="myBtn">
                <div  id="closeCard1" class="replymsgdetails">
                    <i class="material-icons">{{__('reply')}}</i>
                    <Label>{{__('Reply')}}</Label>
                </div>
            </div>
            <div id="myModal" class="modalmsg modalmsgform">
                <!-- Modal content -->
                <div class="modal-contentmsg">
                  <div class="modal-header modalmsghead">
                    <span class="closemsg closemsgform">&times;</span>
                     <!-- <i class=" close close1  fas fa-chevron-down"></i> -->
                    <h4>{{__('Reply')}}</h4>
                  </div>
                  
                  <div class="modal-body">
                    <form action="{{route('user.messages.send',App()->getLocale())}}" method="post">
                        @csrf
                    <div class="input-group input-group-sm mb-3  Mainform">
                       <label type="text" class="form-control form1 form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="{{__('To')}}">To Admin</label>
                    </div>
                     <div class="input-group input-group-sm mb-3 Mainform">
                      <input type="text" class="form-control form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="{{__('Subject')}}" name="subject">
                   </div>
                   <div class="input-group input-group-sm mb-3  ">
                    <textarea class="form-control form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="{{__('write here')}}" name="body"></textarea>
                 </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btnformsendmsg">{{__('Send')}} <i class="far fa-paper-plane"></i></button>
    
                   </div>
                </form>
                </div>
              </div>
              <div class="composemsg btnaddcartdetails ">
                  {{-- <form action="{{route('user.messages.delete',$message->id)}}" method="get"> --}}
                <div >
                    <i class="fas fa-trash"></i>
                    <button type="submit" style="background-color:transparent; border:none; color:#fff"><a href="{{route('user.messages.delete',$message->id)}}" style="color:#fff">Delete</a></button>
                </div>
            {{-- </form> --}}
            </div>
           </div>
       </div>
       <div>
        <label class="lblnewnotification" style="display: block;">{{now()->diffInHours($message->created_at)}} h ago</label>

       </div>
      
       <div>
           <p class="ppagemsgdetails">{{$message->body}}</p>

       </div>
       
      </div>
    </div>
    <!--start from here-->
</div>
</section>


 <!--End section Body-->

@endsection