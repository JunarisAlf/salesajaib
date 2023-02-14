{{-- @inject('carbon', 'Carbon\Carbon') --}}
@extends('layout.app')
@section('title', 'History Klik')

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
                                    <p class="card-description">
                                        Jumlah Klik halaman per Minggu
                                    </p>
                                    <div class="table-responsive pt-3 mb-4">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Tanggal </th>
                                                    <th> Jumlah Klik</th>
                                                    <th> Jumlah Submit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($histories as $history)
                                                  <tr>
                                                    <td>
                                                        {{
                                                            \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history[0]->created_at)->startOfWeek()->format('d/m/Y')
                                                        }}
                                                        sd.
                                                        {{
                                                            \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history[0]->created_at)->endOfWeek()->format('d/m/Y')
                                                        }}
                                                    </td>
                                                    <td>
                                                        {{$history->where('type', 'click')->count()}}
                                                    </td>
                                                    <td>
                                                        {{$history->where('type', 'submit')->count()}}
                                                    </td>
                                                  </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
