@component('mail::message')
Dear {{ $user->first_name }},

Thank you for your active contribution to our earning community.

We wish to inform you that your subscription to {{$plan_name}} plan has expired.

You can subscribe to any of the network plans now so you don`t miss out on more bonuses.

@component('mail::button', ['url' => route("auth.network.plans")])
    View plans
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
