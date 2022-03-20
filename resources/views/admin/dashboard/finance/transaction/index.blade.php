@extends('admin.layout.app', ['title' => 'Admin - All trasactions'])
@section('content')
<div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">All Transactions</h4>
        <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> -->
    </div>
</div>
<div class="col-sm-12 mt-3">
    <div class="card">
        <div class="card-body">
            <label>Select all</label>
            <input type="checkbox" class="" id="select-all">
            <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('admin/transactions-delete') }}">Delete All Selected</button>
            <ul class="nav nav-tabs nav-tabs-custom">
                <li class="nav-item">
                    <a class="nav-link active" href="#">All</a>
                </li>
            </ul>
            @include('notification.flash')
            <div class="mt-4">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>User</th>
                                <th>Currency</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Activity</th>
                                <th>Batch No</th>
                                <th>Reference</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Time/Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td><input type="checkbox" class="sub_chk" data-id="{{$transaction->id}}"></td>
                                <td>{{(optional($transaction->user)->names())}}</td>

                                <td>{{(optional($transaction->currency)->name)}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td>{{$transaction->description}}</td>
                                <td>{{$transaction->activity}}</td>
                                <td>{{$transaction->batch_no ?? "N/A"}}</td>
                                <td>{{$transaction->reference}}</td>
                                <td>
                                    <button class="btn btn-sm btn-{{pillClasses($transaction->type)}} mb-1">
                                        {{ $transaction->type }}
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-{{pillClasses($transaction->status)}} mb-1" data-bs-toggle="modal" data-bs-target="#transactionStatus_{{$transaction->id}}">
                                        {{ $transaction->status }}
                                    </button>
                                </td>
                                <td>{{$transaction->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.transactions.destroy', [$transaction->id])}}" method="POST">
                                        @csrf @method("DELETE")
                                        <button type="submit" onclick="" title="delete item" data-tr="tr_{{$transaction->id}}" data-toggle="confirmation" data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove" data-btn-ok-class="btn btn-sm btn-danger" data-btn-cancel-label="Cancel" data-btn-cancel-icon="fa fa-chevron-circle-left" data-btn-cancel-class="btn btn-sm btn-default" data-title="Are you sure you want to delete ?" data-placement="left" data-singleton="true" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                    </form>
                                    </button>
                                </td>
                            </tr>
                            @include('admin.dashboard.finance.transaction.fragments.transaction_modal')
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        {{ $transactions->links() }}
    </div>
</div>
@endsection
