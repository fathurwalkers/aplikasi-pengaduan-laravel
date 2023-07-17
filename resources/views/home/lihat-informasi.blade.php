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

    <div class="row mb-2">
        <div class="col-sm-7 col-md-7 col-lg-7">
            <h4>Informasi & Berita</h4>
        </div>
        <div class="col-sm-5 col-md-5 col-lg-5 d-flex justify-content-end">
            <button class="btn btn-sm btn-info mb-2" onclick="location.href = '{{ route('home') }}'">
                Kembali
            </button>
        </div>
    </div>



    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $berita->berita_judul, 40 }}</h5>
                    <p>
                        @switch($berita->berita_jenis)
                            @case('berita')
                                <button type="button" class="btn btn-warning btn-sm">
                                    {{ strtoupper($berita->berita_jenis) }}
                                </button>
                            @break

                            @case('pengumuman')
                                <button type="button" class="btn btn-primary btn-sm">
                                    {{ strtoupper($berita->berita_jenis) }}
                                </button>
                            @break
                        @endswitch
                    </p>

                    <p>
                        {!! $berita->berita_isi !!}
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
