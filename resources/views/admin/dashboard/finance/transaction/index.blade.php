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
<div class="col-sm-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Users Transaction Histories</h4>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->user->names()}}</td>

                                <td>{{$transaction->currency->name}}</td>
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
                            </tr>
                            @include('admin.dashboard.finance.transaction.fragments.transaction_modal')
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
       {{  $transactions->links() }}
    </div>
</div>
@endsection
