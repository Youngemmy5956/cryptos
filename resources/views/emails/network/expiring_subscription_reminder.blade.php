@component('mail::message')
Dear {{ $user->first_name }},

We are delighted that you have been an active subscriber.

However, your subscription to {{$plan_name}} plan would be expiring on {{ $date }}.

You can subscribe to any of the network plans now so you don`t miss out on more bonuses.

@component('mail::button', ['url' => route("auth.network.plans")])
    View plans
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
