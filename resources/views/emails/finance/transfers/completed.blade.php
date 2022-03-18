@component('mail::message')
Hey {{ $user->first_name }},

Your transfer has been <b>completed</b>. Kindly find the details below:

<p>
    <b>Amount: </b> <span class="text-danger">{{ $transfer->amount }} {{ $transfer->type }}</span>
</p>
<p>
    <bUsername: </b> <span class="text-success">{{ $transfer->reciever_id }}</span>
</p>
<!-- <p>
    <b>Account Number: </b> <span class="text-success">{{ $withdrawal->account_number }}</span>
</p>
<p>
    <b>Bank Name: </b> <span class="text-success">{{ $withdrawal->bank_name }}</span>
</p> -->

If you are unaware of this request , please contact support or change your login credentials to ensure account security!

@component('mail::button', ['url' => route("login")])
    Login to account
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
