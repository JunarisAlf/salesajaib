@extends('layout.app')
@section('title', 'Daftar menjadi tim marketing kami')

@section('body')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light px-sm-5 py-5 px-4 text-left">
                            <div class="tw-w-full">
                                <img class="tw-mx-auto tw-block tw-w-[200px]" src={{ asset('images/logo.png') }}
                                    alt="logo">
                            </div>
                            <h4 class="tw-text-xl tw-font-bold">Hi!</h4>
                            <h6 class="fw-light my-2 tw-text-slate-500"> Ayo daftar dan menjadi bagian dari kami</h6>
                            <form class="pt-3" method="post" action={{ route('sales.register') }}>
                                @csrf
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-lg @error('noWa') is-invalid @enderror"
                                        id="noWa" placeholder="Nomor WA 628" name="noWa" required value={{old('noWa')}}>
                                    @error('noWa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email" name="email" required value={{old('email')}}>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-lg @error('full_name') is-invalid @enderror"
                                        id="fullName" placeholder="Nama Lengkap" name="fullName" required value={{old('fullName')}}>
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" name="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                        id="confirmPassword" placeholder="Konfirmasi password" name="password_confirmation"
                                        required>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Daftar
                                    </button>
                                </div>
                                <div class="fw-light mt-4 text-center">
                                    Sudah memiliki akun? <a href="/sales/masuk" class="text-primary">Masuk</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
