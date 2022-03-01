@extends('web.layout.app')

@section('content')
<div class="container-fluid mt-5 mb-4">
    @include("web.layout.notifications.flash_messages")
    <div class="row">
        <div class="col-sm-4">
            <img src="{{asset('data/images/login-img.jpg')}}" alt="" class="img-fluid login-img">
        </div>
        <div class="col-sm-8 mt-2 ml-5 align-items-center">

            <div class="card ">
                <div class="card-body">
                    <h4 class="mb-3 header-title text-center">Register</h4>

                    <form class="" action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" old('first_name') placeholder="First Name">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-sm-6  mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="last_name" old('last_name') placeholder="Lastname">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
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

                            <div class="col-sm-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" old('phone') placeholder="phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div </form>
                </div>
            </div>
        </div>
        @endsection
