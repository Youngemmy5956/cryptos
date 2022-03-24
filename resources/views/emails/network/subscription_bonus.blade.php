@component('mail::message')
Dear {{ $user->first_name }},

Someone in your network just subscribed for a plan. You have been credited with <b>{{$amount}}</b>.

@component('mail::button', ['url' => route("auth.network.earnings")])
    View earnings
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
