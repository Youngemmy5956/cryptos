@if ($errors->all())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif

@if (session()->has("error_message"))
<div class="alert alert-danger">{{ session()->get("error_message") }}</div>
@endif

@if (session()->has("success"))
<div class="alert alert-success">{{ session()->get("success") }}</div>
@endif

@if (session()->has("error"))
<div class="alert alert-danger">{{ session()->get("error") }}</div>
@endif

@if (session()->has("success_message"))
<div class="alert alert-success">{{ session()->get("success_message") }}</div>
@endif



@if (session()->has("info_message"))
<div class="alert alert-info">{{ session()->get("info_message") }}</div>
@endif
