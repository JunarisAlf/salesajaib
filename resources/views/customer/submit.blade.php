@extends('layout.app')
@section('title', 'Isi Data Diri')

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
                            <h4 class="tw-text-xl tw-font-bold">Hi!</h4>
                            <h6 class="fw-light tw-text-slate-500 my-2">Isi data diri terlebih dahulu untuk melanjutkan</h6>
                            <form class="pt-3" method="post" action={{route('customer.submit', ['prop' => $prop_id])}}>
                                @csrf
                                <div class="form-group">
                                    <input type="text"
                                    class="form-control form-control-lg"
                                    id="noWa" placeholder="Nomor WA 628" name="noWa" required
                                    value={{ old('noWa') }}>
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                    class="form-control form-control-lg"
                                    id="full_name" placeholder="Nama Lengkap" name="full_name" required
                                    value={{ old('full_name') }}>
                                </div>

                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Lanjutkan
                                    </button>
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
