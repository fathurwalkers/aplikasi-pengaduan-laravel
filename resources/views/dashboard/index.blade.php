@extends('layouts.dashboard-layouts')
<!-- Section Stack CSS -->
@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    Beranda
@endsection

@section('main-content')
    <div class="container mt-2">

        <div class="card border border-grey">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h5 class="text-dark">RT 031 BATU AMPAR</h5>
                        <p class="text-dark">
                            Website Sistem Informasi ini menyediakan beberapa pelayanan seperti pembuatan surat, informasi
                            KAS, berita kegiatan, pengaduan berbasis IOT dan lain sebagainya.
                        </p>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-center">
                        <img src="{{ asset('assets') }}/logo-rt.jpg" class="img img-fluid" width="150px" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Pengaduan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengaduan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Kritik dan Saran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kritiksaran }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Surat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Informasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $berita }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
