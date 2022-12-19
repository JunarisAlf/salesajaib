@extends('layout.app')
@section('title', 'Dashboard')

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
                                    <h4 class="card-title">Daftar Properti</h4>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> No. </th>
                                                    <th> Nama Properti </th>
                                                    <th> Harga(Rp) </th>
                                                    <th> Status </th>
                                                    <th> Klik </th>
                                                    <th> Submit </th>
                                                    <th> Landing Page </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($properties as $index => $property)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$property->name}}</td>
                                                        <td>{{$property->price}}</td>
                                                        <td> 
                                                            <button 
                                                                type="button" 
                                                                class="btn btn-inverse-success btn-fw btn-sm">
                                                                available
                                                            </button>
                                                        </td>
                                                        <td>545</td>
                                                        <td>15</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-md">
                                                                Buat
                                                            </button>
                                                            <button type="button" class="btn btn-success btn-md">
                                                                Preview
                                                            </button>
                                                            <button type="button" class="btn btn-info btn-md">
                                                                Edit
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-md">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-md">
                                                                Hapus
                                                            </button>
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
