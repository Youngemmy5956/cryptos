@extends('admin.layout.app')
@section('content')
<div class="">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">All Plans</h4>
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
                <a href="{{route('admin.plans.create')}}" class="btn btn-primary">Add Plan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">Logo</th>
                                <th class="align-middle">Currency</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Description</th>
                                <th class="align-middle">Price</th>
                                <th class="align-middle">Duration</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        @foreach ($plans as $plan)
                        <tbody>
                            <tr>
                                <td><img src="{{$plan->logoUrl()}}" class="avatar-sm"></td>
                                <td>{{$plan->currency->name}}</td>
                                <td>{{$plan->name}}</td>
                                <td>{{$plan->description ?? "N/A"}}</td>
                                <td>{{$plan->price}}</td>
                                <td>{{$plan->duration ?? "N/A"}}</td>
                                <td> <button class="btn btn-sm btn-{{pillClasses($plan->status)}} mb-1">
                                        {{ $plan->status }}
                                    </button></td>
                                <td>
                                    <form action="{{route('admin.plans.destroy',[$plan->id])}}" method="POST">
                                        @csrf @method("Delete")
                                        <a class="btn btn-success" href="{{ route('admin.plans.edit',[$plan->id])}}">
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
