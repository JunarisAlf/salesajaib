@extends('layout.app')
@section('title', 'Laporan Sales')

@section('body')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">LAPORAN SALES</h4>
        <p class="card-description">
            {{date("d/m/Y")}}
        </p>
        <div class="table-responsive pt-3 mb-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> No. </th>
                        <th> Nama </th>
                        <th> Nomor WA</th>
                        <th> Email </th>
                        <th> Klik </th>
                        <th> Submit </th>
                        <th> Penjualan </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $index => $s)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $s->full_name }}</td>
                            <td>{{ $s->no_wa }}</td>
                            <td>{{ $s->email }}</td>
                            <td>{{ $s->histories->where('type', 'click')->count() }}</td>
                            <td>
                                {{$s->histories->where('type', 'submit')->count()}}
                            </td>
                            <td>
                                {{$s->transactions->count()}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive pt-3 mb-4">
            <span class="tw-mr-4">
                <span class="tw-font-bold">Jumlah Sales :</span> {{ $count['sales']}}
            </span>
            <span class="tw-mr-4">
                <span class="tw-font-bold">Jumlah Klik :</span> {{ $count['click']}}
            </span>
            <span class="tw-mr-4">
                <span class="tw-font-bold">Jumlah Submit :</span> {{ $count['submit']}}
            </span>
            <span class="tw-mr-4">
                <span class="tw-font-bold">Jumlah Sold :</span> {{ $count['sold']}}
            </span>
        </div>
    </div>
</div>
    
@endsection
