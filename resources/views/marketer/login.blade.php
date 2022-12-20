@extends('layout.app')
@section('title', 'Masuk Sebagai Marketer')

@section('body')
    @include('layout.alert')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light px-sm-5 py-5 px-4 text-left">
                            <div class="tw-w-full">
                                <img class="tw-block tw-w-[200px] tw-mx-auto" src={{asset("images/logo.png")}} alt="logo">
                            </div>
                            <h4 class="tw-text-xl tw-font-bold">Hello! let's get started</h4>
                            <h6 class="fw-light tw-text-slate-500 my-2">Sign in untuk melanjutkan!</h6>
                            <form class="pt-3" method="post" action={{route('sales.login')}}>
                                @csrf
                                <div class="form-group">
                                    <input type="text"
                                    class="form-control form-control-lg"
                                    id="noWa" placeholder="Nomor WA 628" name="noWa" required
                                    value={{ old('noWa') }}>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Masuk
                                    </button>
                                </div>
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <div class="form-check">
                                        {{-- <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label> --}}
                                    </div>
                                    <a href="#" class=" tw-text-blue-600 tw-text-base">Lupa password?</a>
                                </div>
                                <div class="mb-2">
                                </div>
                                <div class="fw-light mt-4 text-center">
                                    Belum memiliki akun? <a href={{route('sales.registerView')}} class="text-primary">Daftar sekarang</a>
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
