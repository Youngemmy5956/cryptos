@extends('user.layout.app', ['title' => 'My - Home'])
@section('content')
@section('style')
<style>
    .duration {
        color: red;
    }

    .images {
        height: 323px;
        width: 612px;

    }
</style>
@endsection
<div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">Welcome {{$user->names()}}! <i class="fas fa-handshake"></i></h4>
        <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->
    </div>
    <div class="mb-3">
        <h6 class="">My Current Plan : </h6><span>
            @if($sub->status ?? "" == "Active")
            <img src="{{$sub->plan->logoUrl()}}" class="avatar-sm rounded-circle">
            @else
            <h5 class="text-danger">You have no Active plan. <a href="{{route('user.subscriptions.index')}}">Click here to Subscribe now to a choice plan</a></h5>
            @endif
    </div>
</div>
<div class="row mt-2">
    <div class="col-sm-12">
        <div class="card">
            <img src="{{asset('user/images/custom/welcom.jpg')}}" class="img-fluid">
        </div>
    </div>
    <!-- <div class="col-sm-6">
        <div class="card">
            <div class="images">
                <img src="{{asset('user/images/custom/cryptohands.jpg')}}" class="">
            </div>
        </div>
    </div> -->
</div>
@endsection