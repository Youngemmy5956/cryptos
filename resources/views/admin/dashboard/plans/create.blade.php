@extends('admin.layout.app')
@section('content')
@include('notification.flash')
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Create Plan</h4>

        <form action="{{route('admin.plans.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col-sm-4">
                    <label for="formrow-firstname-input" class="form-label">Currency</label>
                    <select class="form-control" name="currency_id">
                        <option disabled selected>Choose Currency</option>
                        @foreach ($currencies as $currency)
                        <option value="{{$currency->id}}">{{$currency->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="formrow-firstname-input" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Enter new plan name">
                </div>

                <div class="mb-3 col-sm-4">
                    <label for="formrow-firstname-input" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="" placeholder="Enter new plan price">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Describe plan">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Duration</label>
                        <input type="number" class="form-control" name="duration" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-inputState" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option selected disabled>Choose Status</option>
                            @foreach ($status as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
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
