@component('mail::message')
Hello {{ $user->first_name }},

It`s a pleasure to have you on board.

@if ($referred_by_provider ?? false)

You joined through <b>{{$provider_name}}</b>.

Find your account credentials below:

Email: {{$user->email}}

Password: {{$password}}

@endif

Do have fun as you stay with us.

@component('mail::button', ['url' => route('login')])
    Login Now
@endcomponent

Kind regards and best wishes!<br>
ZingHunt.
@endcomponent
