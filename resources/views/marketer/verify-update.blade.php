@extends('layout.app')
@section('title', 'Update Nomor WhatsApp dan Email')

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
                            <h4 class="tw-text-xl tw-font-bold">Update Data </h4>
                            <h6 class="fw-light tw-text-slate-500 my-2">Masukan Nomor WhatsApp dan Email dengan sesuai</h6>
                            <form class="pt-3" method="post" action={{route('sales.verifyUpdate')}}>
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="text"
                                    class="form-control form-control-lg"
                                    id="noWa" placeholder="Nomor WA 628" name="noWa" required
                                    value={{ Auth::user()->no_wa}}>
                                </div>

                                <div class="form-group">
                                    <input type="email"
                                    class="form-control form-control-lg"
                                    id="email" placeholder="Email" name="email" required
                                    value={{ Auth::user()->email }}>
                                </div>
                                
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Ubah
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
