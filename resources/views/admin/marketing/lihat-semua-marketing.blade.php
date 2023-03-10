@extends('layout.app')
@section('title', 'List Tim Marketing')

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
                                    <div class="my-3">
                                        <a href="{{route('admin.salesReport', ['periode' => 'day'])}}" target="_blank" class="my-2 btn btn-primary btn-sm"> Laporan Harian </a>
                                        <a href="{{route('admin.salesReport', ['periode' => 'week'])}}" target="_blank" class="my-2 btn btn-primary btn-sm"> Laporan Mingguan </a>
                                        <a href="{{route('admin.salesReport', ['periode' => 'month'])}}" target="_blank" class="my-2 btn btn-primary btn-sm"> Laporan Bulanan </a>
                                        <a href="{{route('admin.salesReport', ['periode' => 'all'])}}" target="_blank" class="my-2 btn btn-primary btn-sm"> Laporan Keseluruhan </a>
                                    </div>
                                    <form class="my-4" method="get" action="{{route('admin.salesReport')}}">
                                        @csrf
                                        <input type="hidden" name="periode" value="range">
                                        <div class="input-group flex-nowrap my-1">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="addon-wrapping">Awal</span>
                                            </div>
                                            <input type="date" class="form-control" name="date_start" placeholder="Tanggal Awal" aria-label="Tanggal Awal" aria-describedby="addon-wrapping">
                                        </div>
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="addon-wrapping">Akhir</span>
                                            </div>
                                            <input type="date" class="form-control" name="date_end" placeholder="Tanggal Akhir" aria-label="Tanggal Akhir" aria-describedby="addon-wrapping">
                                        </div>
                                        
                                        <button type="submit" class="my-2 btn btn-primary">SUBMIT</button>

                                    </form>

                                    <h4 class="card-title">List Tim Marketing</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th> Foto </th>
                                                    <th> Name </th>
                                                    <th> No WA </th>
                                                    <th> Email </th>
                                                    <th> Klik </th>
                                                    <th> Submit </th>
                                                    <th> Penjualan </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sales as $s)
                                                <tr>
                                                    <td class="py-1">
                                                        <img src={{asset("storage/{$s->profile_filename}")}} alt="image" />
                                                    </td>
                                                    <td>
                                                        {{"{$s->full_name} [{$s->id}]"}}
                                                    </td>
                                                    <td>
                                                        {{$s->no_wa}}
                                                    </td>
                                                    <td>
                                                        {{$s->email}}
                                                    </td>
                                                    <td>
                                                        {{$s->histories->where('type', 'click')->count()}}
                                                    </td>
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
                                    {{ $sales->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
