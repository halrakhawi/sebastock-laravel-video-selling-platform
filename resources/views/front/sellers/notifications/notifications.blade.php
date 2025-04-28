{{-- @if(isset($notification->pluck('data')->flatten(1)->pluck('video')))

<a href="{{route('commentmarkAsRead',[$notification->data['video']['id'],App()->getLocale()])}}"><p>{{$notification->data['user']['name']}} commented on your video {{$notification->data['video']['name']}}</p></a>
@endif --}}
