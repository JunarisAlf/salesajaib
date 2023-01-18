@extends('layout.app')
@section('title', 'History Submit')

@section('body')
    <div class="container-scroller">
        @include('admin.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Riwayat Submit</h4>
                                    <p class="card-description">
                                        Submit merupakan calon pembeli yang telah mengisi data diri dan menghubungi admin
                                    </p>
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
                                                        <td>{{$history->created_at}}</td>
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
