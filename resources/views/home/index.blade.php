@extends('layouts.home-layouts')

@section('title', 'Homepage')

@section('main-content')
    <div class="card border border-grey">
        <div class="card-body">
            <div class="row my-auto pt-4">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <h5 class="text-dark">RT 031 BATU AMPAR</h5>
                    <p class="text-dark">
                        Website Sistem Informasi ini menyediakan beberapa pelayanan seperti pembuatan surat, informasi
                        KAS, berita kegiatan, pengaduan berbasis IOT dan lain sebagainya.
                    </p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">
                    <img src="{{ asset('assets') }}/logo-rt.jpg" class="img img-fluid" width="150px" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
