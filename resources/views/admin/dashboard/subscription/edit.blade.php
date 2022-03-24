@extends('admin.layout.app')
@section('content')
@include('notification.flash')
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Edit Subscription</h4>

        <form action="{{route('admin.plans.update',[$sub->id])}}" method="POST" enctype="multipart/form-data">
            @csrf @method("PATCH")
            <div class="row">
                <div class="mb-3 col-sm-4">
                    <label for="formrow-firstname-input" class="form-label">Plan</label>
                    <select class="form-control" name="plan_id">
                        <option disabled selected>Choose Plan</option>
                        @foreach ($plans as $plan)
                        <option value="{{$plan->id}}">{{$plan->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="formrow-firstname-input" class="form-label">User</label>
                    <select class="form-control" name="user_id">
                        <option disabled selected>Choose User</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}"{{ $user->id == $sub->user_id ? 'selected' : "" }}>{{$user->names()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-sm-4">
                    <label for="formrow-firstname-input" class="form-label">Currency</label>
                    <select class="form-control" name="currency_id">
                        <option disabled selected>Choose Currency</option>
                        @foreach ($currencies as $currency)
                        <option value="{{$currency->id}}" {{ $currency->id == $sub->currency_id ? 'selected' : "" }}>{{$currency->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label for="formrow-firstname-input" class="form-label">Price</label>
                    <select class="form-control" name="price">
                        <option disabled selected>Choose Price</option>
                        @foreach ($plans as $plan)
                        <option value="{{$plan->price}}"{{ $plan->price == $sub->price ? 'selected' : "" }}>{{$plan->name}} - {{$plan->price}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="formrow-firstname-input" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option disabled selected>Choose Status</option>
                        @foreach ($statuses as $key => $value)
                        <option value="{{$key}}" {{ $key == $sub->status ? 'selected' : "" }}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label for="formrow-firstname-input" class="form-label">Paid On</label>
                    <input type="date" name="paid_on" value="{{ date('Y/m/d',strtotime($sub->paid_on)) }}" class="form-control" id="" placeholder="">
                </div>
                <div class="mb-3 col-sm-6">
                    <label for="formrow-firstname-input" class="form-label">Expiry Date</label>
                    <input type="date" name="expires_at" value="{{ date('Y/m/d',strtotime($sub->expires_at)) }}" class="form-control" id="" placeholder="">
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
