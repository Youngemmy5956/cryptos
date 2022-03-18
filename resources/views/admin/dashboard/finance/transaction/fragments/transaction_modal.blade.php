<div class="modal fade" id="transactionStatus_{{$transaction->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 mb-4">

                    <p>
                        <b>User: </b>
                        <a href="{{ route("admin.users.index" , ["username" => $transaction->user->username])}}">
                            {{ $transaction->user->names() }}
                        </a>
                    </p>
                    <p>
                        <b>Amount: </b> <span class="text-danger">{{ int_format($transaction->amount) }} {{ $transaction->currency->name }}</span>
                    </p>
                    <p>
                        <b>Description: </b> {{ $transaction->description }}
                    </p>
                    <p>
                        <b>Reference: </b> {{ $transaction->reference }}
                    </p>
                    <p>
                        <b>Current Status: </b> <span class="text-info">{{ $transaction->status }}</span>
                    </p>
                </div>
                <form action="{{route('admin.transactions.change_status', [$transaction->id])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Status:</label>
                        <select class="form-control" name="status">
                            <option disabled selected>Select Options</option>
                            @foreach($statuses as $key => $value)
                            <option value="{{ $key }}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
