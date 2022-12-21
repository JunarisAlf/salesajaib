@extends('layout.app')
@section('title', 'Update Foto Profil')

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
                                    <img src="/storage/{{$pict}}" alt="profile picture" class="tw-max-h-[300px] tw-w-auto">

                                    <form 
                                        class="forms-sample" 
                                        method="POST"
                                        action={{route('admin.profile.updatePict')}} 
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3 mt-3">
                                            <label class="form-label" for="formFile">Upload Foto Profil</label>
                                            <input class="form-control tw-h-auto" type="file" id="formFile" name="pict">
                                            @error('pict')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit"
                                                class="btn btn-block btn-primary btn-xl font-weight-medium auth-form-btn">
                                                Update Foto
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
