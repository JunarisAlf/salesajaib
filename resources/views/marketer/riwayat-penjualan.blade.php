@extends('layout.app')
@section('title', 'Dashboard')

@section('body')
    <div class="container-scroller">
        @include('marketer.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('marketer.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Riwayat Transaksi</h4>
                                    <div class="table-responsive pt-3 mb-4">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> No. </th>
                                                    <th> Nama Properti </th>
                                                    <th> Admin</th>
                                                    <th> Price </th>
                                                    <th> Pelanggan </th>
                                                    <th> WA Pelanggan </th>
                                                    <th> Tanggal </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trxs as $index => $trx)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>
                                                            {{"{$trx->property->name} [{$trx->property->id}]"}}
                                                        </td>
                                                        <td>{{$trx->admin->full_name}}</td>
                                                        <td>{{ "Rp. " . number_format($trx->price, 2, ",", ".")}}</td>
                                                        <td>{{$trx->customer_name}}</td>
                                                        <td>{{$trx->customer_wa}}</td>
                                                        <td>{{$trx->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $trxs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
