@extends('layouts.home-layouts')

@section('title', 'Homepage')

@push('css')
    <style>
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
        }

        .card {
            flex: 1 0 auto;
        }
    </style>
@endpush

@section('main-content')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h4>Informasi & Berita</h4>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="row">

                <div class="card-deck">
                    @foreach ($berita as $item)
                        <div class="col-sm-6 col-md-6 col-lg-6 d-flex align-items-stretch">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ Str::limit($item->berita_judul, 40) }}</h5>
                                    <p>
                                        @switch($item->berita_jenis)
                                            @case('berita')
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    {{ strtoupper($item->berita_jenis) }}
                                                </button>
                                            @break

                                            @case('pengumuman')
                                                <button type="button" class="btn btn-primary btn-sm">
                                                    {{ strtoupper($item->berita_jenis) }}
                                                </button>
                                            @break
                                        @endswitch
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ date('d/m/Y', strtotime($item->berita_tanggal)) }}</small>
                                    <button type="button" class="btn btn-success btn-sm float-right"
                                        onclick="location.href = '{{ route('lihat-informasi', $item->id) }}'">
                                        Selengkapnya
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

        {{-- <div class="col-sm-4 col-md-4 col-lg-4 border border-dark mb-4">

            <div class="container">

                <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                    <h5>
                        Kategori
                    </h5>
                </div>

                <hr style="margin-top:0rem!important;margin-bottom:0rem!important;" />

                <div class="row mt-2 mx-auto">
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                        <button type="button" class="btn btn-primary btn-md col-12 px-auto">
                            Berita
                        </button>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                        <button type="button" class="btn btn-primary btn-md col-12 px-auto">
                            Pengumuman
                        </button>
                    </div>
                </div>
            </div>

        </div> --}}

    </div>
@endsection
