@extends('web.layout.app')

@section('content')
<div class="container-fluid mt-5 mb-4">
    @include("web.layout.notifications.flash_messages")
    <div class="row">
        <div class="col-sm-6 mx-auto mt-2">

            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="mb-3 header-title text-center">Reset Password</h4>

                    <form class="" action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="col-sm-6 mx-auto mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mx-auto mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" old('password') required autocomplete="new-password">
                            <!-- @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror -->
                        </div>
                        <div class="col-sm-6 mx-auto mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <!-- @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror -->
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Reset password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection