@extends('web.layout.app')
@section('content')
<div class="col-sm-6 mx-auto mt-5 mb-3">
    @include('web.layout.notifications.flash_messages')
    <div class="card">
        <div class="col-md-4 mx-auto mt-2">
            <img class="card-img avatar-lg" src="{{ $plan->logoUrl() }}" alt="Card image">
        </div>
        <div class="card-body">
            <h4 class="card-title"><b>Plan Info</b></h4>
            <hr>
            <h5 class="card-title"><b><i>Amount</i> :</b></h5>

            <p class="card-text">Some quick example text to build on the card title and make
                up the bulk of the card's content.</p>
            <form id="makePaymentForm">
                @csrf
                <input type="hidden" id="email_address" name="email" value="{{auth()->user()->email}}">
                <input type="hidden" id="number" name="phone" value="{{auth()->user()->phone}}">
                <input type="hidden" id="name" name="name" value="{{auth()->user()->names()}}">
                <input type="hidden" id="amount" name="amount" value="{{$plan->price}}">
                <input type="hidden" id="plan_id" name="plan" value="{{$plan->id}}">
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Deposit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
