@component('mail::message')
Hey {{ $user->first_name }},

Your transaction with reference #{{$transaction->reference}} was declined.

@if (!empty($comment))
<b>Reason: </b> {{$comment}}
@endif

If you are unaware of this request , please contact support or change your login credentials to ensure account security!

@component('mail::button', ['url' => route("login")])
    Login to account
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
