 @if ($notification->type == 'App\Notifications\Blance100')
               <a href="{{route('balanceMarkASRead')}}"> {{ $notification->data['seller'][0]['seller_name']}}{{' reached to balance: '}}{{$notification->data['balance']}}</a>
                    
                     @endif
                     @if ($notification->type == 'App\Notifications\CreateVideo')
                <a href="{{route('acceptvideoMarkASRead')}}">{{$notification->data['video']['name']}}{{__('created and Waiting accepting')}}.</a>
                     @endif
@if ( $notification->type == 'App\Notifications\AddVideo')
    
        <div class="flexnewnotification">
            <a href="{{route('addVideomarkAsRead',[$notification->data['video']['id'],App()->getLocale()])}}" ><p class="pnotification">{{__('New video inserted')}}{{$notification->data['video']['name']}} </p></a>
            <div>
                <label class="lblnewnotification">{{now()->diffForHumans($notification->created_at)}}</label>
                <div class="newnotification"></div>
            </div>
        </div>
  
    @endif
    
@if ($notification->type == 'App\Notifications\ActiveUser')
    <a class="dropdown-item dropitemhover" href="{{route('activemarkAsRead',[App()->getLocale()])}}" >
        <div class="flexnewnotification">
            <p class="pnotification">{{auth()->user()->name}} {{__('you are activated')}}! </p>
            <div>
                <label class="lblnewnotification">{{now()->diffForHumans($notification->created_at)}}</label>
                <div class="newnotification"></div>
            </div>
        </div>
    </a>
@endif







