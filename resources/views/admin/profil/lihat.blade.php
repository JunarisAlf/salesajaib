@extends('layout.app')
@section('title', 'Profil')

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
                                    <form  class="forms-sample"   >
                                        <img src="/storage/{{$user->profile_filename}}" alt="profile picture" class="tw-max-h-[300px] tw-w-auto">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input 
                                            type="text"                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            id="name" 
                                            placeholder="Nama" 
                                            name="name" required disabled
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
                                            type="text"                                       class="form-control form-control-lg @error('noWa') is-invalid @enderror"
                                            id="noWa" 
                                            placeholder="Nomor WA 628XX" 
                                            name="noWA" required disabled
                                            value="{{$user->no_wa}}"
                                        >
                                            @error('noWa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input 
                                            type="text"                                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            id="email" 
                                            placeholder="Nomor WA 628XX" 
                                            name="email" required disabled
                                            value="{{$user->no_wa}}"
                                        >
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
