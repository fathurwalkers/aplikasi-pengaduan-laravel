@extends('layouts.dashboard-layouts')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    @switch($users->login_level)
        @case('user')
            Pembuatan Pengaduan
        @break

        @case('admin')
            Kelola Pengaduan
        @break
    @endswitch
@endsection

@section('main-content')
    @if ($users->login_level == 'user')
        <div class="card">
            <div class="card-body">
                <div class="container">

                    <form action="{{ route('post-pembuatan-pengaduan') }}" method="POST">
                        @csrf

                        <p class="text-dark">Silahkan masukkan pengaduan dan keluhan yang ingin anda sampaikan pada beberapa
                            form pengajuan
                            dibawah. Pengaduan anda akan diproses setelah status pengaduan anda telah diverifikasi oleh
                            Admin. </p>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="pengaduan_keterangan">
                                        <h6>Keterangan</h6>
                                    </label>
                                    <input type="text" class="form-control" id="pengaduan_keterangan"
                                        placeholder="Masukkan keterangan pengaduan..." name="pengaduan_keterangan">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="pengaduan_jenis">
                                        <h6>Jenis Pengaduan</h6>
                                    </label>
                                    <select class="form-control" id="pengaduan_jenis" name="pengaduan_jenis">
                                        <option default value="Kerusakan">Kerusakan</option>
                                        <option value="Kehilangan">Kehilangan</option>
                                        <option value="Masalah Keluarga">Masalah Keluarga</option>
                                        <option value="Masalah">Masalah</option>
                                        <option value="Pencurian">Pencurian</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info btn-md">
                                    Kirim Pengaduan
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h5 class="my-auto text-dark">Daftar Pengaduan</h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center text-dark">No.</th>
                                    <th class="text-center text-dark">Keterangan</th>
                                    <th class="text-center text-dark">Jenis Pengaduan</th>
                                    <th class="text-center text-dark">Pengirim</th>
                                    <th class="text-center text-dark">Status</th>
                                    <th class="text-center text-dark">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pengaduan as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->pengaduan_keterangan }}</td>
                                        <td class="text-center text-dark">{{ $item->pengaduan_jenis }}</td>
                                        <td class="text-center text-dark">{{ $item->pengaduan_pengirim }}</td>
                                        <td class="text-center text-dark">

                                            <div class="container">
                                                <div class="row">
                                                    @switch($users->login_level)
                                                        @case('admin')
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                            @break

                                                            @case('user')
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                @break
                                                            @endswitch

                                                            @switch($item->pengaduan_status)
                                                                @case('PENDING')
                                                                    <button class="btn btn-sm btn-warning text-dark">
                                                                        <b>{{ $item->pengaduan_status }}</b>
                                                                    </button>
                                                                @break

                                                                @case('DITERIMA')
                                                                    <button class="btn btn-sm btn-success">
                                                                        <b>{{ $item->pengaduan_status }}</b>
                                                                    </button>
                                                                @break

                                                                @case('DITOLAK')
                                                                    <button class="btn btn-sm btn-danger text-white">
                                                                        <b>{{ $item->pengaduan_status }}</b>
                                                                    </button>
                                                                @break
                                                            @endswitch
                                                        </div>
                                                        @if ($users->login_level == 'admin')
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-info dropdown-toggle"
                                                                        type="button" id="dropdownMenuButton"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        Proses
                                                                    </button>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton">
                                                                        <form action="{{ route('konfirmasi-pengaduan') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id_pengaduan"
                                                                                value="{{ $item->id }}">
                                                                            <button class="dropdown-item btn" type="submit"
                                                                                value="diterima"
                                                                                name="buttonkonfirmasi">Terima</button>
                                                                            <button class="dropdown-item btn" type="submit"
                                                                                value="ditolak"
                                                                                name="buttonkonfirmasi">Tolak</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    {{-- <div class="row mt-1">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="dropdown">
                                                            <button class="btn btn-info dropdown-toggle" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Proses
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else
                                                                    here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                </div>
                                        </td>
                                        <td class="text-center text-dark">
                                            {{ date('d/m/Y', strtotime($item->pengaduan_tanggal)) }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
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
