@extends('layout.app')
@section('title', 'Tambah Data Penjualan')

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
                                    <h4 class="card-title">Tambah Data Penjualan</h4>
                                    <p class="card-description">
                                        Isi data penjualan yang akan ditambahkan dengan sesuai
                                    </p>
                                    <form 
                                        class="forms-sample" 
                                        method="POST"
                                        action={{route('admin.storeTransaction')}} >
                                        @csrf

                                        <div class="form-group">
                                            <input 
                                            type="number"                                       class="form-control form-control-lg @error('property_id') is-invalid @enderror"
                                            id="property_id" 
                                            placeholder="ID Properti" 
                                            name="property_id" required
                                            value={{ old('property_id') }}
                                        >
                                            @error('property_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input 
                                            type="number"                                       class="form-control form-control-lg @error('sales_id') is-invalid @enderror"
                                            id="sales_id" 
                                            placeholder="ID Marketing/Sales" 
                                            name="sales_id" required
                                            value={{ old('sales_id') }}
                                        >
                                            @error('sales_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input 
                                            type="number"                                       class="form-control form-control-lg @error('price') is-invalid @enderror"
                                            id="price" 
                                            placeholder="Harga Properti" 
                                            name="price" required
                                            value={{ old('price') }}
                                        >
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input 
                                            type="text"                                       class="form-control form-control-lg @error('customer_name') is-invalid @enderror"
                                            id="customer_name" 
                                            placeholder="Nama Customer" 
                                            name="customer_name" required
                                            value={{ old('customer_name') }}
                                        >
                                            @error('customer_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input 
                                            type="number"                                       class="form-control form-control-lg @error('customer_wa') is-invalid @enderror"
                                            id="customer_wa" 
                                            placeholder="Nomor Wa Customer" 
                                            name="customer_wa" required
                                            value={{ old('customer_wa') }}
                                        >
                                            @error('customer_wa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input 
                                            type="text"                                       class="form-control form-control-lg @error('note') is-invalid @enderror"
                                            id="note" 
                                            placeholder="Catatan" 
                                            name="note" required
                                            value={{ old('note') }}
                                        >
                                            @error('note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                       
                                        <div class="mt-3">
                                            <button type="submit"
                                                class="btn btn-block btn-primary btn-xl font-weight-medium auth-form-btn">
                                                Tambah
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
