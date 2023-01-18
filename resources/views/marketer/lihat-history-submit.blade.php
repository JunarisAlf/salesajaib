@extends('layout.app')
@section('title', 'History Submit')

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
                                    <h4 class="card-title">Riwayat Submit</h4>
                                    <div class="table-responsive pt-3 mb-4">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> No. </th>
                                                    <th> Nama Properti </th>
                                                    <th> Nama Customer </th>
                                                    <th> WA Customer</th>
                                                    <th> Tanggal </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($histories as $index => $history)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$history->property->name}}</td>
                                                        <td>{{$history->customer_name}}</td>
                                                        <td>{{$history->customer_wa}}</td>
                                                        <td>{{$history->createed_at}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $histories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
