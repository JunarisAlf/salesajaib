@extends('layout.app')
@section('title', 'Dashboard')

@section('body')
    <div class="container-scroller">
        @include('admin.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="tab-content tab-content-basic">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview">
                                        @include('admin.layout.overview')
                                        <div class="row">
                                            @include('admin.layout.line-chart')
                                            @include('admin.layout.status-summary')
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8 d-flex flex-column">
                                                @include('admin.layout.bar-chart')
                                                @include('admin.layout.banner')
                                            </div>
                                            <div class="col-lg-4 d-flex flex-column">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
