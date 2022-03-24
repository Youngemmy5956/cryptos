@extends('user.layout.app', ['title' => 'My personal account'])
@section('content')
<div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">Account</h4>
        <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->

    </div>
</div>
<div class="row">
    <!-- end card -->
    @include('notification.flash')
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Personal Information</h4>
                <div class="text-center mb-3">
                    <img src="{{ auth()->user()->pictureUrl() }}" class="avatar-xl rounded-circle" alt="my image">
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Full Name :</th>
                                <td>{{auth()->user()->names()}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile :</th>
                                <td>{{auth()->user()->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td>{{auth()->user()->email}}</td>
                            </tr>
                            <!-- <tr>
                                <th scope="row">Location :</th>
                                <td></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Change Password</h4>
                @include('notification.password')
                <form action="{{route("user.myaccount.change_password")}}" method="POST">
                    @csrf
                    <div class="mb-3 col-12">
                        <label for="password">Old Password</label>
                        <input id="" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="" required autocomplete="current_password">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="password">New Pasword</label>
                        <input id="new" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="" required autocomplete="current_password">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="password">Password Confirmation</label>
                        <input id="confirm" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="" required autocomplete="confirm_password">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('user.dashboard.myaccount.fragments.user_update')
</div>
@endsection
