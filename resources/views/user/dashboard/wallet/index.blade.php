@extends('user.layout.app', ['title' => 'My Wallet'])
@section('content')
@section('style')
<style>
    .duration{
        color: red;
    }
</style>
@endsection

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0 font-size-18">My Wallet</h4>
    <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->
</div>
@include('notification.flash')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header"><b>My Wallet </b></div>
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0 me-4">
                    <i class="mdi mdi-account-circle text-primary h1"></i>
                </div>

                <div class="flex-grow-1">
                    <div class="text-muted">
                        <h5>{{$wallet->user->names()}}</h5>
                        <p class="mb-1">{{$wallet->user->email}}</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body border-top">

            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="text-center">
                        <p class="text-muted mb-2">Available Naira <br>Balance</p>
                        <h5 class="mb-3"><b>NGN {{$wallet->formattedBalance()}}</b></h5>
                        <button data-bs-target="#paymentModal" data-bs-toggle="modal" type="" class="btn btn-success">Fund Wallet</button>
                    </div>
                    @include('user.dashboard.wallet.fragments.payment_modal')
                </div>
                <!-- <div class="col-sm-6">
                        <div class="text-sm-end mt-4 mt-sm-0">
                            <p class="text-muted mb-2">Available Dollar <br>Balance</p>
                            <h5>+ $ 248.35 <span class="badge bg-success ms-1 align-bottom"></span></h5>

                        </div>
                    </div> -->

            </div>
            <div class="text-center">
            </div>
        </div>

        <div class="card-body border-top">
            <p class="text-muted mb-4">Subscription Duration <span class="duration">(30days interval)</span></p>
            <div class="text-center">
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <div class="font-size-24 text-primary mb-2">
                                <i class="fas fa-battery-full"></i>
                            </div>

                            <p class="text-muted mb-2">Paid On</p>
                            <h5>{{(optional($sub)->paid_on)}}</h5>

                            <!-- <div class="mt-3">
                                <a href="javascript: void(0);" class="btn btn-primary btn-sm w-md">Send</a>
                            </div> -->
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <div class="font-size-24 text-primary mb-2">
                                <i class="fas fa-battery-empty"></i>
                            </div>

                            <p class="text-muted mb-2">Expires On</p>
                            <h5>{{(optional($sub)->expires_at)}}</h5>

                            <!-- <div class="mt-3">
                                <a href="javascript: void(0);" class="btn btn-primary btn-sm w-md">Withdraw</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
<!-- \ -->


