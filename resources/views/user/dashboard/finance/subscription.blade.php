@extends('user.layout.app', ['title' => 'User - Subscription'])
@section('content')
<div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">Subsccribe to a Plan</h4>
        <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->
    </div>
    <div class="col-sm-12 alert alert-success">
        <p>Be sure to have sufficient funds in your wallet before proceeding to subscribe. <a href="{{route("user.wallets.index")}}">Click here to check wallet balance</a> </p>
    </div>
</div>
@include('notification.flash')
<div class="row mt-5">
    @foreach($plans as $plan)
    <div class="col-xl-4 col-md-6">
        <div class="card plan-box">
            <div class="card-body p-4">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5> <b>{{ $plan->name }}</b></h5>
                        <!-- <p class="text-muted">Neque quis est</p> -->
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <img src="{{$plan->logoUrl()}}" class="avatar-sm" alt="logo">
                    </div>
                </div>
                <div class="py-4">
                    <h2><sup><small>NGN</small></sup> {{ $plan->price }}/ <span class="font-size-13">Per month</span></h2>
                </div>
                <div class="text-center">
                    <form action="{{route("user.subscriptions.deductions" , $plan->id)}}" method="post">@csrf
                        <button type="submit" onclick="if (confirm('NGN{{$plan->price}} will be deducted from your wallet, proceed?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-success btn-sm waves-effect waves-light mb-3">SUBSCRIBE NOW <i class="simple-icon-arrow-right"></i></button>
                    </form>
                    <div>

                        <button data-bs-toggle="modal" data-bs-target="#showDetail_{{$plan->id}}" class="btn btn-primary btn-sm waves-effect waves-light">View Plan Details</button>
                    </div>
                </div>
                @include('user.dashboard.finance.fragments.show_plan_detail')

                <!-- <div class="plan-features mt-5">
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Live Support</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Unlimited User</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> No Time Tracking</p>
                    <p><i class="bx bx-checkbox-square text-primary me-2"></i> Free Setup</p>
                </div> -->
            </div>

        </div>
    </div>
    @endforeach

</div>
@endsection
