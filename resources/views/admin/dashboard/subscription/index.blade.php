@extends('admin.layout.app')
@section('content')
<div class="">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">All Subscriptions</h4>
            <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>
@include('notification.flash')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="plan">
                <a href="{{route('admin.subscriptions.create')}}" class="btn btn-primary">Add Subscription</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">User</th>
                                <th class="align-middle">Plan</th>
                                <th class="align-middle">Currency</th>
                                <th class="align-middle">Price</th>
                                <th class="align-middle">Paid On</th>
                                <th class="align-middle">Expiry Date</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Date/time</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        @foreach ($subscriptions as $subs)
                        <tbody>
                            <tr>
                                <td>{{$subs->user->names()}}</td>
                                <td>{{$subs->plan->name}}</td>
                                <td>{{$subs->currency->name}}</td>
                                <td>{{$subs->price}}</td>
                                <td>{{$subs->paid_on}}</td>
                                <td>{{$subs->expires_at}}</td>
                                <td>{{$subs->status}}</td>
                                <td>{{$subs->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.subscriptions.destroy',[$subs->id])}}" method="POST">
                                        @csrf @method("Delete")
                                        <a class="btn btn-success" href="{{ route('admin.subscriptions.edit',[$subs->id])}}">
                                            <i class="dripicons-document-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger"><i class="dripicons-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
@endsection
