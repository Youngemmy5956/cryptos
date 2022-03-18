@component('mail::message')
Dear Zinghunters,

We are well pleased to inform you of a  <a href="{{ route("auth.social.rooms.index")}}">Social Feature </a>, where you can interact with the whole of Zinghunt's community through livechats.

We are also giving {{$amount}} {{$currency_type}} coins to the first 50 people to join the General Room to celebrate our new feature!

Hurry and claim yours now!

Thanks,<br>
Customer Care
@endcomponent
