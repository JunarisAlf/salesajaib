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
                        @include('admin.layout.basic-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
