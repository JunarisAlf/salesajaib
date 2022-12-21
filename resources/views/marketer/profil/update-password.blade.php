@extends('layout.app')
@section('title', 'Update Password')

@section('body')
    <div class="container-scroller">
        @include('marketer.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('marketer.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Password</h4>
                                    <form 
                                        class="forms-sample" 
                                        method="POST"
                                        action={{route('sales.profile.updatePW')}} >
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="name">Masukan Password Sebelumnya</label>
                                            <input 
                                            type="password"                                       class="form-control form-control-lg @error('old_pw') is-invalid @enderror"
                                            id="old_pw" 
                                            placeholder="Password lama" 
                                            name="old_pw" required
                                            value="{{old('old_pw')}}"
                                        >
                                            @error('old_pw')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Masukan Password Baru</label>
                                            <input 
                                            type="password"                                       class="form-control form-control-lg @error('new_pw') is-invalid @enderror"
                                            id="new_pw" 
                                            placeholder="Password baru" 
                                            name="new_pw" required
                                            value="{{old('new_pw')}}"
                                        >
                                            @error('new_pw')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Konfirmasi Password Baru</label>
                                            <input 
                                            type="password"                                       class="form-control form-control-lg @error('confirmation_new_pw') is-invalid @enderror"
                                            id="confirmation_new_pw" 
                                            placeholder="Konfirmasi Password Baru" 
                                            name="new_pw_confirmation" required
                                            value="{{old('confirmation_new_pw')}}"
                                        >
                                            @error('confirmation_new_pw')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit"
                                                class="btn btn-block btn-primary btn-xl font-weight-medium auth-form-btn">
                                                Update Password
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
