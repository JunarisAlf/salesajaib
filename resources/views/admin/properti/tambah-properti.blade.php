@extends('layout.app')
@section('title', 'Tambah Properti')

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
                                    <h4 class="card-title">Tambah Properti</h4>
                                    <p class="card-description">
                                        Isi data properti yang akan ditambahkan dengan sesuai
                                    </p>
                                    <form 
                                        class="forms-sample" 
                                        method="POST"
                                        action={{route('admin.storeProperty')}}
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input 
                                            type="text"                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            id="name" 
                                            placeholder="Nama properti" 
                                            name="name" required
                                            value={{ old('name') }}
                                        >
                                            @error('name')
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
                                            @error('proce')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formFile">Upload gambar baner</label>
                                            <input class="form-control tw-h-auto" type="file" id="formFile" name="baner">
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
