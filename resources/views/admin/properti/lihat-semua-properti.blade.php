@extends('layout.app')
@section('title', 'Dashboard')

@section('body')
    @include('admin.layout.delete-modal')
      
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
                                                    <th> Harga</th>
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
                                                        <td>{{ "Rp. " . number_format($property->price, 2, ",", ".")}}</td>
                                                        <td> 
                                                            @if ($property->status == "available")
                                                            <button 
                                                                type="button" 
                                                                class="btn btn-inverse-success btn-fw btn-sm">
                                                                available
                                                            </button>
                                                            @else
                                                            <button 
                                                                type="button" 
                                                                class="btn btn-inverse-info btn-fw btn-sm">
                                                                sold
                                                            </button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{$property->histories->where('type', 'click')->count()}}
                                                        </td>
                                                        <td>
                                                            {{$property->histories->where('type', 'submit')->count()}}
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-md">
                                                                Buat
                                                            </button>
                                                            <a href={{"/properti/{$property->id}"}} target="_blank" class="btn btn-success btn-md" >
                                                                Preview
                                                            </a>
                                                            <button type="button" class="btn btn-info btn-md">
                                                                Edit
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-md">
                                                                Edit
                                                            </button>
                                                            <form 
                                                                class="tw-inline-block"
                                                                method="POST"
                                                                action={{route('admin.deleteProperty', ['prop' => $property->id])}}>
                                                                @method('DELETE')
                                                                @csrf
                                                                <button 
                                                                    type="submit" 
                                                                    class="btn btn-danger btn-md"
                                                                    onclick="return confirm('Apakah anda yakin akan menghapus data properti ini?')" 
                                                                    >
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                           
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
