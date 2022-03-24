@component('mail::message')
Dear {{ $user->first_name }},

Someone in your network just subscribed for a {{$plan_name}} plan.

However, you missed out on your network referral bonus because you currently don`t have an active network subscription.

You can subscribe to any of the network plans now so you don`t miss out on more bonuses.

@component('mail::button', ['url' => route("auth.network.plans")])
    View plans
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
