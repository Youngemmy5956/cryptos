@if (session()->has("password_error"))
<div class="alert alert-danger">{{ session()->get("password_error") }}</div>
@endif



@if (session()->has("password_success"))
<div class="alert alert-success">{{ session()->get("password_success") }}</div>
@endif
