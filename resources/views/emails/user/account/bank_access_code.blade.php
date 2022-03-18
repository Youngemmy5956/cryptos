@component('mail::message')
Hey {{ $user->first_name }},

Kindly find below the access code to change your bank account details as requested.

**Access Code**: {{ $access_code }}


If you are unaware of this request , please contact support or change your login credentials to ensure account security!

@component('mail::button', ['url' => route("user.account.bank.details")])
    Change Now
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
