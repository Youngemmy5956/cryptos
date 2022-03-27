@extends('web.layout.app')

@section('content')
<div class="container-fluid mt-5 mb-4">
    @include("web.layout.notifications.flash_messages")
    <div class="row">
        <div class="col-sm-6 mx-auto mt-2">

            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="mb-3 header-title text-center">Reset Password</h4>

                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="col-sm-6 mx-auto mb-3">
                            <!-- <label for="email" class="form-label">Email</label> -->
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" old('email') placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Send password Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection