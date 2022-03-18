@component('mail::message')
Hey Admin ,

Kindly find below the details of the new contact us form.

**Name**: {{ $name ?? "N/A" }}

**Email**: {{ $email ?? "N/A" }}

**Phone**: {{ $phone ?? "N/A" }}

**Message**: {{ $message ?? "N/A" }}

Thanks,<br>
Customer Care
@endcomponent
