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
                                <th class="align-middle"></th>
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
                        @if($subscriptions->isNotEmpty())
                        <div class="mb-2">
                            <label>Select all</label>
                            <input type="checkbox" class="" id="select-all">
                        </div>
                        <button style="margin-bottom: 10px" class="btn btn-primary mr-1 delete_all" data-url="{{ url('admin/subscriptions-delete') }}">Delete All Selected</button>
                        <tbody>
                        @foreach ($subscriptions as $subs)
                            <tr>
                                <td><input type="checkbox" class="sub_chk" data-id="{{$subs->id}}"></td>
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
                                        <button type="submit" class="btn btn-danger" data-tr="tr_{{$subs->id}}" data-toggle="confirmation" data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove" data-btn-ok-class="btn btn-sm btn-danger" data-btn-cancel-label="Cancel" data-btn-cancel-icon="fa fa-chevron-circle-left" data-btn-cancel-class="btn btn-sm btn-default" data-title="Are you sure you want to delete ?" data-placement="left" data-singleton="true" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @else
                    <div class="mt-2 text-center col-12 alert alert-danger">
                        <h5><i> No Subscribe users yet</i></h5>
                    </div>
                    @endif
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
@endsection
