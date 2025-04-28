@extends('layouts.front')
@section('content')
            @error('subject')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
 @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
         <!--start section Body-->

         {{-- @if ($message->usertype==0) --}}
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
                </div>
 
                <div class="titlehead">
                    <div class="titlewithNumber">
                        <h3>Messages</h3>
                        <h3>({{count($unreadUserMessages)}})</h3>
                    </div>
                    <div class="composemsg btnaddcartdetails btnbuydetails" id="myBtn">
                        <div  id="closeCard1">
                            <i class="fas fa-plus"></i>
                            <Label>{{__('Compose Message')}}</Label>
                        </div>
                    </div>
                    <div id="myModal" class="modalmsg modalmsgform">
                        <!-- Modal content -->
                        <div class="modal-contentmsg">
                          <div class="modal-header modalmsghead">
                            <span class="closemsg closemsgform">&times;</span>
                             <!-- <i class=" close close1  fas fa-chevron-down"></i> -->
                            <h4>{{__('Compose Message')}}</h4>
                          </div>
                          
                          <div class="modal-body">
                            <form action="{{route('user.messages.send',App()->getLocale())}}" method="post">
                                @csrf
                            <div class="input-group input-group-sm mb-3  Mainform">
                               <label type="text" class="form-control form1 form-input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="{{__('To')}}">{{__('To Admin')}}</label>
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
                </div>
                <div class="divbars divbarsstart">
                    <div class="barone bar"></div>
                    <div class="bartwo bar"></div>
                    <div class="barthree bar"></div>
                </div>
              <div>
                @foreach ($usermessages as $message)
                <a class="dropitemhover amsg" href="{{route('user.messages.details',[$message->id,App()->getLocale()])}}"> 
                    <h6 class="hmsgpage">{{$message->subject}}</h6> 
                         <div class="flexcontentmsg">
                            <p class="pnotificationspage"> </p>
                            <div>
                                <label class="lblnewnotification">{{now()->diffInHours($message->created_at)}} h ago</label>
                                <!--<i class="fas fa-trash trashmsg"></i>-->
                            </div>
                         </div>            
                   
                </a>
                @endforeach
              </div>
                <div>
                @foreach ($usermessages as $message)
                <a class="dropitemhover amsg" href="{{route('user.messages.details',[$message->id,App()->getLocale()])}}"> 
                    <h6 class="hmsgpage">{{$message->subject}}</h6> 
                         <div class="flexcontentmsg">
                            <p class="pnotificationspage"> </p>
                            <div>
                                <label class="lblnewnotification">{{now()->diffInHours($message->created_at)}} h ago</label>
                                <!--<i class="fas fa-trash trashmsg"></i>-->
                            </div>
                         </div>            
                   
                </a>
                @endforeach
              </div>
            </div>
            <!--start from here-->
        </div>
        </section>
    {{-- @endif --}}

    
         <!--End section Body-->

@endsection