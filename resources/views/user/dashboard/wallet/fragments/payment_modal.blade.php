<div class="modal fade bs-example-modal-center" id="paymentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            @foreach ($gateways as $gateway)
            <div class="modal-header">
                <h5 class="modal-title">Fund With {{$gateway['name']}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route("auth.fund.card.process")}}" method="POST">@csrf
                    @csrf
                    <!-- <input type="hidden" id="email_address" name="email" value="{{auth()->user()->email}}">
                    <input type="hidden" id="number" name="phone" value="{{auth()->user()->phone}}">
                    <input type="hidden" id="name" name="name" value="{{auth()->user()->names()}}"> -->
                    <div class="mb-3">
                        <label for="amount">Amount</label>
                        <input type="hidden" name="currency_type" value="{{$wallet->currency->type}}" required>
                        <input type="hidden" name="gateway" value="{{$gateway["key"]}}">
                        <input type="number" class="form-control" id="amount" name="amount" value="">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Deposit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
        @endforeach
    </div><!-- /.modal-dialog -->
</div>
<!-- /.mo
