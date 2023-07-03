@extends('layouts.home-layouts')

@section('title', 'Homepage')

@section('main-content')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h4>Informasi & Berita</h4>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-8 col-md-8 col-lg-8">

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="card-deck">
                        <div class="card mb-3">
                            <img class="card-img-top" src="{{ asset('assets/download.svg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional
                                    content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="card-deck">
                        <div class="card mb-3">
                            <img class="card-img-top" src="{{ asset('assets/download.svg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional
                                    content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-4 col-md-4 col-lg-4 border border-dark mb-4">

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
                            Pengumuman
                        </button>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                        <button type="button" class="btn btn-primary btn-md col-12 px-auto">
                            Pengumuman
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
