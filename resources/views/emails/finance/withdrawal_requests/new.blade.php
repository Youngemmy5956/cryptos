@component('mail::message')
Hey Admin,

A new withdrawal request has been made. Kindly find the details below:

<p>
    <b>Amount: </b> <span class="text-danger">{{ int_format($withdrawal->amount) }} {{ $withdrawal->currency->name }}</span>
</p>
<p>
    <b>Account Name: </b> <span class="text-success">{{ $withdrawal->account_name }}</span>
</p>
<p>
    <b>Account Number: </b> <span class="text-success">{{ $withdrawal->account_number }}</span>
</p>
<p>
    <b>Bank Name: </b> <span class="text-success">{{ $withdrawal->bank_name }}</span>
</p>


@component('mail::button', ['url' => route("login")])
    Login to account
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
