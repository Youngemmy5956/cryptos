@extends('user.layout.app', ['title' => 'My trasactions'])
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
<a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">Display Options <i class="simple-icon-arrow-down align-middle"></i></a>
<div class="collapse d-md-block" id="displayOptions">
    <div class="d-block d-md-inline-block">
        <div class="btn-group float-md-left mr-1 mb-1">
            <div class=" d-inline-block float-md-left mr-1 mb-1 align-top">
                <form class="input-group" action="{{ url()->current() }}" method="GET">
                    <input class="form-control" type="text" name="search" value="{{ request()->query('search')}}" placeholder="Search...">
                    <select class="form-control" name="type">
                        <option value="">Select Type</option>
                        @foreach($typeOptions as $key => $value)
                        <option value="{{$key}}"{{$key == request()->query('type') ? "selected" : "" }}>{{$value}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-primary btn-sm ml-3">Filter</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">My Transaction Histories</h4>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
