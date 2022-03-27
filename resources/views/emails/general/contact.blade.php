@component('mail::message')
Hey Admin ,

Kindly find below the details of the new contact us form.

**Subject**: {{ $subject ?? "N/A" }}

**Email**: {{ $email ?? "N/A" }}

**Message**: {{ $user_query ?? "N/A" }}

Thanks,<br>
Customer Care
@endcomponent
