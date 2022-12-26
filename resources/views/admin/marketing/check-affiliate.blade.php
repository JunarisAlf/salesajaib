@extends('layout.app')
@section('title', 'Check Affiliate')

@section('body')
    <div class="container-scroller">
        @include('admin.layout.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Cek Affiliate</h4>
                                    <p class="card-description">
                                        Temukan pelanggan berasal dari sales yang mana
                                    </p>
                                    <form 
                                        class="forms-sample row align-items-center" 
                                        method="POST"
                                        action={{route('admin.checkAff')}}
                                        >
                                        @csrf
                                        <div class="form-group col-12 col-sm-9 m-0">
                                            <input 
                                            type="text"                                       class="form-control form-control-lg @error('query') is-invalid @enderror"
                                            id="query" 
                                            placeholder="Masukan Nama Pelanggan atau Nomor WA Pelanggan" 
                                            name="query" required
                                            value={{ old('query') }}
                                        >
                                            @error('query')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                       
                                        <div class="col-12 col-sm-2">
                                            <button type="submit"
                                                class="btn btn-block btn-primary btn-xl font-weight-medium auth-form-btn">
                                                Cari
                                            </button>
                                        </div>
                                    </form>
                                    @if ($histories !== null)
                                        <div class="table-responsive pt-3 mb-4">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> No. </th>
                                                        <th> Nama Pelanggan </th>
                                                        <th> No Wa</th>
                                                        <th> Nama Sales </th>
                                                        <th> ID Sales </th>
                                                        <th> ID Property </th>
                                                        <th> Tanggal </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($histories as $index => $history)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$history->customer_name}}</td>
                                                        <td>{{$history->customer_wa}}</td>
                                                        <td>{{$history->sales->full_name}}</td>
                                                        <td>{{$history->user_id}}</td>
                                                        <td>{{$history->property_id}}</td>
                                                        <td>{{$history->created_at}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
