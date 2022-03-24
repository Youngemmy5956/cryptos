@extends('admin.layout.app')
@section('content')
<div class="">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Update Currency</h4>
            <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>
<div class="card ">
    <div class="card-body">
        <h4 class="card-title mb-4">Edit Currency</h4>

        <form action="{{route('admin.currencies.update',[$currency->id])}}" method="POST" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label for="formrow-firstname-input" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $currency->name }}" class="form-control" id="" placeholder="Enter new currency name">
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Short Name</label>
                        <input type="text" name="short_name" value="{{ old('short_name') ?? $currency->short_name }}" class="form-control" placeholder="Shortname must be in uppercase letter e.g USD, NGN">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-inputState" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option selected disabled>Choose Status</option>
                            @foreach ($status as $key => $value)
                            <option value="{{$key}}"{{ $key == $currency->status ? 'selected' : "" }}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-inputState" class="form-label">Type</label>
                        <input type="text" name="type" value="Naira" class="form-control">
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-md">Submit</button>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
@endsection
