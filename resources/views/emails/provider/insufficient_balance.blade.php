@component('mail::message')
Hey {{ $user->first_name }},

One of your users tried to fund their wallet through <b>{{$provider->name}}</b>.

However, the transaction failed because your wallet balance was insufficient.

Kindly find the details below:

<p>
    <b>Amount: </b> <span class="text-danger">{{ $amount }} {{ $currency->name }}</span>
</p>
<p>
    <b>User Name: </b> <span class="text-success">{{ $providerUser->user->names() }}</span>
</p>
<p>
    <b>User Key: </b> <span class="text-success">{{ $providerUser->key }}</span>
</p>


If you are unaware of this request , please contact support or change your login credentials to ensure account security!

@component('mail::button', ['url' => route("login")])
    Login to account
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
