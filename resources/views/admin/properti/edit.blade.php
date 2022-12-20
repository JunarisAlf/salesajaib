@extends('layout.app')
@section('title', 'Update data Properti')

@section('body')
i   @include('admin.layout.update-baner-modal')
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
                                    <h4 class="card-title">Update Properti</h4>
                                    <form 
                                        class="forms-sample" 
                                        method="POST"
                                        action={{route('admin.updateProperty', ['prop' => $property->id])}} >
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <input 
                                            type="text"                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            id="name" 
                                            placeholder="Nama properti" 
                                            name="name" required
                                            value="{{ $property->name}}"
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
                                            value={{ $property->price }}
                                        >
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select 
                                                class="form-select form-select-lg mb-3 ps-4 tw-text-base py-2.5" 
                                                aria-label=".form-select-lg example"
                                                name="status">
                                                <option value="available" @if($property->status == 'available') selected @endif>available</option>
                                                <option value="sold" @if($property->status == 'sold')  selected @endif>sold</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="mt-3">
                                            <button 
                                                type="button"
                                                class="btn btn-block btn-warning btn-xl font-weight-medium auth-form-btn"
                                                data-bs-toggle="modal" data-bs-target="#updateBaner">
                                                Ubah Banner
                                            </button>
                                            <button type="submit"
                                                class="btn btn-block btn-primary btn-xl font-weight-medium auth-form-btn">
                                                Update
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
