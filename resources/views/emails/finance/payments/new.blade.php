@component('mail::message')
Hey Admin,

A new payment has been made. Kindly find the details below:

<p>
    <b>User: </b> <span class="text-danger">{{ $user->names() }}</span>
</p>
<p>
    <b>Amount: </b> <span class="text-success">NGN {{ $amount }}</span>
</p>
<p>
    <b>Description: </b> <span class="text-success">{{ $description }}</span>
</p>


Please confirm that the payment was successful and go over to the admin dashboard to confirm the transaction ASAP.

@component('mail::button', ['url' => route("login")])
    Login to account
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
