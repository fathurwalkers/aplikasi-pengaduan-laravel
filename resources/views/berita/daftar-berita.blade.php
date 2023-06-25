@extends('layouts.dashboard-layouts')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    Kelola Informasi dan Berita
@endsection

@section('main-content')
    <div class="card">
        <div class="card-body">
            <div class="container">

                <form action="{{ route('post-pembuatan-kritiksaran') }}" method="post">
                    @csrf

                    <p class="text-dark">Silahkan masukkan Informasi atau Berita baru dengan format yang telah
                        ditentukan.
                    </p>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="kritiksaran_keterangan">
                                    <h6>Keterangan</h6>
                                </label>
                                <input type="text" class="form-control" id="kritiksaran_keterangan"
                                    placeholder="Masukkan keterangan pengaduan..." name="kritiksaran_keterangan">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="kritiksaran_tipe">
                                    <h6>Tipe</h6>
                                </label>
                                <select class="form-control" id="kritiksaran_tipe" name="kritiksaran_tipe">
                                    <option default value="Kritik">Kritik</option>
                                    <option value="Saran">Saran</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info btn-md">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h5 class="my-auto text-dark">Daftar Kritik dan Saran</h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Keterangan</th>
                                    <th>Tipe</th>
                                    <th>Pengirim</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($berita as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-dark">{{ $item->kritiksaran_keterangan }}</td>
                                        <td class="text-center text-dark">
                                            @switch($item->kritiksaran_tipe)
                                                @case('Saran')
                                                    <button type="button" class="badge badge-md border badge-warning">
                                                        {{ strtoupper($item->kritiksaran_tipe) }}
                                                    </button>
                                                @break

                                                @case('Kritik')
                                                    <button type="button" class="badge badge-md border badge-danger">
                                                        {{ strtoupper($item->kritiksaran_tipe) }}
                                                    </button>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="text-center text-dark">{{ $item->kritiksaran_pengirim }}</td>
                                        <td class="text-center text-dark">
                                            {{ date('d/m/Y', strtotime($item->kritiksaran_tanggal)) }}
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
