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
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Personal Information</h4>
                <div class="text-center mb-3">
                    <img src="{{ auth()->user()->pictureUrl() }}" class="rounded-circle" alt="my image">
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
    </div>

    @include('user.dashboard.myaccount.fragments.user_update')
</div>
@endsection
