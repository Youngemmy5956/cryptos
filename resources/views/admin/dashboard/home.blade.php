@extends('admin.layout.app', ["title" => "Admin Home"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
            <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="{{route("admin.users.index")}}">
                        <div class="">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <b>Total Users</b>
                        <div>{{$countUsers}}</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a href="{{route("admin.subscriptions.index")}}">
                        <div class="">
                            <i class="far fa-snowflake"></i>
                        </div>
                        <b>Total Subscribers</b>
                        <div>{{$countSub}}</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                <a href="{{route("admin.subscriptions.index")}}">
                    <div class="">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <b>Total Income</b>
                    <div>NGN{{$income}}</div>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-sm-5">
        <div class="card">
            <div class="card-header bg-primary text-white"><b>Newly Registered Members</b></div>
            <div class="card-body">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><a href="{{route("admin.users.show",[$user->id])}}">{{$user->names()}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="card">
            <div class="card-header  bg-primary text-white"><b>Latest Transactions</b></div>
            <div class="card-body">
                <div class="">
                    <table class="table table-responsive">
                        <thead>

                            <tr>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Activity</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $tr)
                            <tr>
                                <td><a href="{{route("admin.users.show",[$tr->user->id])}}">{{$tr->user->names()}}</a></td>
                                <td> {{$tr->amount}}</td>
                                <td> {{$tr->activity}}</td>
                                <td> {{$tr->type}}</td>
                                <td> <button class="btn btn-sm btn-{{pillClasses($tr->status)}} mb-1">
                                        {{ $tr->status }}
                                    </button></td>
                                <td> {{$tr->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection