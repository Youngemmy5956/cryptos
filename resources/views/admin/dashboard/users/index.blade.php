@extends('admin.layout.app')
@section('content')
<div class="">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">All Users</h4>
            <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">First Name</th>
                                <th class="align-middle">Last Name</th>
                                <th class="align-middle">Email</th>
                                <th class="align-middle">Phone</th>
                                <th class="align-middle">View Details</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <form action="{{route('admin.users.destroy',[$user->id])}}" method="POST">
                                        @csrf @method("Delete")
                                        <a class="btn btn-success" href="{{ route('admin.users.edit',[$user->id])}}">
                                            <i class="dripicons-document-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger"><i class="dripicons-trash"></i></button>
                                        <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-primary"><i class="fas fa-tools"></i></></a>
                                        <a href="{{ route('admin.users.imitate',[$user->id]) }}" class="btn btn-default"><i class="fas fa-eye"></i></></a>
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
