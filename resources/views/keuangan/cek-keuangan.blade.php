@extends('layouts.dashboard-layouts')
<!-- Section Stack CSS -->
@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    Informasi Keuangan - {{ strtoupper($anggaran->anggaran_tipe) }}
@endsection

@section('main-content')
    <div class="container mt-2">

        @if ($users->login_level == 'admin')
            <div class="card">
                <div class="card-body">
                    <div class="container">

                        <form action="{{ route('tambah-data-keuangan', $anggaran->id) }}" method="post">
                            @csrf

                            <p class="text-dark">
                                Silahkan masukkan Data Anggaran baru yang akan ditambahkankan.</p>

                            <div class="row">

                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="data_anggaran_deskripsi">
                                            <h6>Keterangan</h6>
                                        </label>
                                        <input type="text" class="form-control" id="data_anggaran_deskripsi"
                                            placeholder="Masukkan keterangan pengaduan..." name="data_anggaran_deskripsi">
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="data_anggaran_tanggal">
                                            <h6 class="text-dark">Tanggal Terbit</h6>
                                        </label>
                                        <input type="date" class="form-control" id="data_anggaran_tanggal"
                                            name="data_anggaran_tanggal" required>
                                    </div>
                                </div>

                                @switch($anggaran->anggaran_tipe)
                                    @case('PENERIMAAN')
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label for="data_anggaran_debet">
                                                    <h6>Jumlah Debet (Penerimaan)</h6>
                                                </label>
                                                <input type="number" class="form-control" id="data_anggaran_debet"
                                                    placeholder="Masukkan keterangan pengaduan..." name="data_anggaran_debet">
                                            </div>
                                        </div>
                                    @break

                                    @case('PENGELUARAN')
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label for="data_anggaran_kredit">
                                                    <h6>Jumlah Kredit (Pengeluaran)</h6>
                                                </label>
                                                <input type="number" class="form-control" id="data_anggaran_kredit"
                                                    placeholder="Masukkan keterangan pengaduan..." name="data_anggaran_kredit">
                                            </div>
                                        </div>
                                    @break
                                @endswitch

                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info btn-md">
                                        Proses Kritik dan Saran
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
                            <h5 class="my-auto text-dark">Data Anggaran - {{ $anggaran->anggaran_nama }}</h5>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="table-responsive">
                            <table id="example" class="display table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        @if ($users->login_level == 'admin')
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data_anggaran as $item)
                                        <tr>
                                            <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                            <td class="text-dark">
                                                {{ date('d/M/Y', strtotime($item->data_anggaran_tanggal)) }}
                                            </td>
                                            <td class="text-dark">{{ $item->data_anggaran_deskripsi }}</td>
                                            <td class="text-dark">
                                                {{ 'Rp ' . number_format($item->data_anggaran_debet, 2, ',', '.') }}
                                            </td>
                                            <td class="text-dark">
                                                {{ 'Rp ' . number_format($item->data_anggaran_kredit, 2, ',', '.') }}
                                            </td>

                                            @if ($users->login_level == 'admin')
                                                <td class="d-flex justify-content-center">
                                                    <button type="button" id="buttonlihat{{ $item->id }}"
                                                        class="btn btn-sm btn-info text-dark mr-1" data-toggle="modal"
                                                        data-target="#modalubah{{ $item->id }}">
                                                        <b>
                                                            Ubah
                                                        </b>
                                                    </button>
                                                    <button type="button" id="buttonlihat{{ $item->id }}"
                                                        class="btn btn-sm btn-danger text-dark" data-toggle="modal"
                                                        data-target="#modalhapus{{ $item->id }}">
                                                        <b>
                                                            Hapus
                                                        </b>
                                                    </button>
                                                </td>
                                            @endif

                                            <!-- Modal Ubah -->
                                            <div class="modal fade" id="modalubah{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Ubah Anggaran
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('ubah-data-keuangan', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="anggaran_id"
                                                                value="{{ $anggaran->id }}">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="data_anggaran_deskripsi">
                                                                                <h6>Keterangan</h6>
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                id="data_anggaran_deskripsi"
                                                                                placeholder="Masukkan keterangan pengaduan..."
                                                                                name="data_anggaran_deskripsi"
                                                                                value="{{ $item->data_anggaran_deskripsi }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="data_anggaran_tanggal">
                                                                                <h6 class="text-dark">Tanggal Terbit</h6>
                                                                            </label>
                                                                            <input type="date" class="form-control"
                                                                                id="data_anggaran_tanggal"
                                                                                name="data_anggaran_tanggal"
                                                                                value="{{ $item->data_anggaran_tanggal }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    @switch($anggaran->anggaran_tipe)
                                                                        @case('PENERIMAAN')
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="data_anggaran_debet">
                                                                                        <h6>Jumlah Debet (Penerimaan)</h6>
                                                                                    </label>
                                                                                    <input type="number" class="form-control"
                                                                                        id="data_anggaran_debet"
                                                                                        placeholder="Masukkan keterangan pengaduan..."
                                                                                        name="data_anggaran_debet"
                                                                                        value="{{ $item->data_anggaran_debet }}">
                                                                                </div>
                                                                            </div>
                                                                        @break

                                                                        @case('PENGELUARAN')
                                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="data_anggaran_kredit">
                                                                                        <h6>Jumlah Kredit (Pengeluaran)</h6>
                                                                                    </label>
                                                                                    <input type="number" class="form-control"
                                                                                        id="data_anggaran_kredit"
                                                                                        placeholder="Masukkan keterangan pengaduan..."
                                                                                        name="data_anggaran_kredit"
                                                                                        value="{{ $item->data_anggaran_kredit }}">
                                                                                </div>
                                                                            </div>
                                                                        @break
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batalkan</button>
                                                                <button type="submit" class="btn btn-success">Ubah
                                                                    Data</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Modal Ubah -->

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="modalhapus{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Kritik
                                                                dan
                                                                Saran
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('hapus-data-keuangan', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus Data Anggaran
                                                                ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batalkan</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Modal Hapus -->
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
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
