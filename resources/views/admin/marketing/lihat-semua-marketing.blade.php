@extends('layout.app')
@section('title', 'List Tim Marketing')

@section('body')
    <div class="container-scroller">
        @include('admin.layout.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">List Tim Marketing</h4>
                                    {{-- <p class="card-description">
                                        Add class <code>.table-striped</code>
                                    </p> --}}
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th> Foto </th>
                                                    <th> Name </th>
                                                    <th> No WA </th>
                                                    <th> Email </th>
                                                    <th> Klik </th>
                                                    <th> Submit </th>
                                                    <th> Penjualan </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sales as $s)
                                                <tr>
                                                    <td class="py-1">
                                                        <img src={{asset("storage/{$s->profile_filename}")}} alt="image" />
                                                    </td>
                                                    <td>
                                                        {{"{$s->full_name} [{$s->id}]"}}
                                                    </td>
                                                    <td>
                                                        {{$s->no_wa}}
                                                    </td>
                                                    <td>
                                                        {{$s->email}}
                                                    </td>
                                                    <td>
                                                        {{$s->histories->where('type', 'click')->count()}}
                                                    </td>
                                                    <td>
                                                        {{$s->histories->where('type', 'submit')->count()}}
                                                    </td>
                                                    <td>
                                                        10
                                                    </td>
                                                </tr> 
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $sales->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
