@extends('layout.app')
@section('title', 'Update Profil')

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
                                    <h4 class="card-title">Update Profil</h4>
                                    <form 
                                        class="forms-sample" 
                                        method="POST"
                                        action={{route('admin.profile.update')}} >
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input 
                                            type="text"                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            id="name" 
                                            placeholder="Nama" 
                                            name="name" required
                                            value="{{$user->full_name}}"
                                        >
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="noWa">Nomor WA</label>
                                            <input 
                                            type="number"                                       class="form-control form-control-lg @error('no_wa') is-invalid @enderror"
                                            id="no_wa" 
                                            placeholder="Nomor WA 628XX" 
                                            name="no_wa" required
                                            value={{$user->no_wa}}
                                        >
                                            @error('no_wa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input 
                                            type="email"                                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            id="email" 
                                            placeholder="Nomor WA 628XX" 
                                            name="email" required
                                            value="{{$user->email}}"
                                        >
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit"
                                                class="btn btn-block btn-primary btn-xl font-weight-medium auth-form-btn">
                                                Simpan Perubahan
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
