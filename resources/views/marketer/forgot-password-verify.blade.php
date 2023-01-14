@extends('layout.app')
@section('title', 'Verifikasi bahwa ini adalah akun anda')

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
                            <h4 class="tw-text-xl tw-font-bold">Masukan kode OTP!</h4>
                            <h6 class="fw-light tw-text-slate-500 tw-leading-6">
                                Kami telah mengirim kode OTP ke nomor WhasApp anda
                                <strong class="tw-font-semibold">({{$no_wa}}), </strong>
                                dan Email anda 
                                <strong class="tw-font-semibold">({{$email}}), </strong>
                                <br> 
                                Silahkan periksa dan isi kode OTP dibawah ini.
                            </h6>
                            <form class="pt-3" method="post" action={{route('sales.forgotPwVerify')}}>
                                @csrf
                                <div class="form-group">
                                    <input type="email"
                                    class="form-control form-control-lg"
                                    id="email" placeholder="Email" name="email" required hidden 
                                    value="{{$email}}">
                                </div>

                                <div class="form-group">
                                    <input type="text"
                                    class="form-control form-control-lg"
                                    id="otp" placeholder="6 Digit Kode OTP" name="otp" required >
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Verifikasi
                                    </button>
                                </div>

                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <div class="form-check">
                                    </div>
                                    <a href="{{route('sales.sendOTP', ['identifier' => $email])}}" class=" tw-text-blue-600 tw-text-base"> Kirim ulang kode OTP</a>
                                </div>
                                <div class="mb-2">
                                </div>
                                <div class="fw-light mt-4 text-center">
                                    Nomor WhatsApp dan Email salah? <a href={{route('sales.verifyUpdateView')}} class="text-primary">Ubah</a>
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
