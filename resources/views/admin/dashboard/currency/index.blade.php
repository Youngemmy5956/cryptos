@extends('admin.layout.app')
@section('content')
    <div class="">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Currency</h4>
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
                    <a href="{{ route('admin.currencies.create') }}" class="btn btn-primary">Add Currency</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">Logo</th>
                                    <th class="align-middle">Name</th>
                                    <th class="align-middle">Short Name</th>
                                    <th class="align-middle">Type</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Actions</th>
                                </tr>
                            </thead>
                            @foreach ($currencies as $currency)
                                <tbody>
                                    <tr>
                                        <td><img src="{{ $currency->logoUrl() }}" class="avatar-sm"></td>
                                        <td>{{ $currency->name }}</td>
                                        <td>{{ $currency->short_name }}</td>
                                        <td>{{ $currency->type }}</td>
                                        <td>{{ $currency->status }}</td>
                                        <td>
                                            <form action="{{ route('admin.currencies.destroy', [$currency->id]) }}"
                                                method="POST">
                                                @csrf @method("Delete")
                                                <a class="btn btn-success"
                                                    href="{{ route('admin.currencies.edit', [$currency->id]) }}">
                                                    <i class="dripicons-document-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="dripicons-trash"></i></button>
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
