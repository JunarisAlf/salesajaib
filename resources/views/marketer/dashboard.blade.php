@extends('layout.app')
@section('title', 'Dashboard')

@section('body')
    @include('layout.alert')
    <div class="container-scroller">
        @include('marketer.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('marketer.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="tab-content tab-content-basic">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview">
                                        @include('marketer.layout.overview')
                                        <div class="row">
                                            @include('marketer.layout.line-chart')
                                            @include('marketer.layout.status-summary')
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8 d-flex flex-column">
                                                {{-- @include('marketer.layout.bar-chart') --}}
                                                @include('marketer.layout.banner')
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
