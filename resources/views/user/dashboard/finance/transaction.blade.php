@extends('user.layout.app', ['title' => 'User - All trasactions'])
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
            <h4 class="card-title mb-4">My Transaction Histories</h4>
            <ul class="nav nav-tabs nav-tabs-custom">
                <li class="nav-item">
                    <a class="nav-link active" href="#">All</a>
                </li>
            </ul>

            <div class="mt-4">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Currency</th>
                                <th>Amount</th>
                                <th>Amount in USD</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">#SK3215</a></td>

                                <td>03 Mar, 2020</td>
                                <td>Buy</td>
                                <td>Bitcoin</td>
                                <td>1.00952 BTC</td>
                                <td>$ 9067.62</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
