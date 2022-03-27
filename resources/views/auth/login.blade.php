@extends('web.layout.app')

@section('content')
<div class="container-fluid mt-5 mb-4">
    @include("web.layout.notifications.flash_messages")
    <div class="row">
        <div class="col-sm-6 mx-auto mt-2">

            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="mb-3 header-title text-center">Login</h4>

                    <form class="" action="{{route('login')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" old('email') placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                        <div class="text-center mt-3 mr-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            <div class="mt-2">
                            <a class="ml-3" href="{{ route('password.request') }}"><b>Forgot Password?</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection