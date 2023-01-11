@extends('layout.app')
@section('title', 'List Properti')

@section('body')
    <div class="container-scroller">
        @include('marketer.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('marketer.layout.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Daftar Properti</h4>
                                    <div class="table-responsive pt-3 mb-4">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> No. </th>
                                                    <th> Nama Properti </th>
                                                    <th> Harga</th>
                                                    <th> Status </th>
                                                    <th> Klik </th>
                                                    <th> Submit </th>
                                                    <th> Landing Page </th>
                                                    <th> Salin Affiliate Link </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($properties as $index => $property)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$property->name}}</td>
                                                        <td>{{ "Rp. " . number_format($property->price, 2, ",", ".")}}</td>
                                                        <td> 
                                                            @if ($property->status == "available")
                                                            <button 
                                                                type="button" 
                                                                class="btn btn-inverse-success btn-fw btn-sm">
                                                                available
                                                            </button>
                                                            @else
                                                            <button 
                                                                type="button" 
                                                                class="btn btn-inverse-danger btn-fw btn-sm">
                                                                sold
                                                            </button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{$property->histories->where('user_id', Auth::user()->id)->where('type', 'click')->count()}}
                                                        </td>
                                                        <td>
                                                            {{$property->histories->where('user_id', Auth::user()->id)->where('type', 'submit')->count()}}
                                                        </td>
                                                        <td>
                                                            <a href={{"https://property.salesajaib.com/" . Auth::user()->id . 
                                                                "/{$property->slug}"}} target="_blank" class="btn btn-success btn-md" >
                                                                    Preview
                                                                </a>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary btn-md"
                                                                onclick="
                                                                    navigator.clipboard.writeText('{{$base_url_form.Auth::user()->id.'/'.$property->slug }}')
                                                                    .then(function(){alert('Link Berhasil disalin di clipboard')});
                                                                    " >
                                                                Landing Page
                                                            </button>
                                                            <button  class="btn btn-warning btn-md" 
                                                                onclick="
                                                                    navigator.clipboard.writeText('{{route('affiliateForm', ['sales' => Auth::user()->id, 'prop' => $property->id])}}')
                                                                    .then(function(){alert('Link Berhasil disalin di clipboard')});
                                                                     ">
                                                                Form
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $properties->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
