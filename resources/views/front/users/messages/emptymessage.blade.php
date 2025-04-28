@extends('layouts.front')
@section('content')

        
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
                <h3>{{__('Messages')}}</h3>
                <h3></h3>
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
            <div class="paymentsuccess">
                <div> 
                    <i class="fas fa-comment-slash iconpayment"></i>
                 </div>
                <div>
                 <h4>{{__('You Don\'t Have Any Messages')}}</h4>
                </div>
                <div>
                    <p class="pcartandpayment">{{__('You don\'t have messages, If you have any questions you can compose messages and send it to the website manage')}} </p>
                </div>
                <div>
                
             </div>
            </div>
        </div>
    </div>
    <!--start from here-->
</div>
</section>

@endsection