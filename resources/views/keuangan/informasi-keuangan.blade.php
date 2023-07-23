@extends('layouts.dashboard-layouts')
<!-- Section Stack CSS -->
@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    Informasi Keuangan
@endsection

@section('main-content')
    <div class="container mt-2">

        <div class="card mb-3">
            <div class="card-body">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <h5 class="my-auto text-dark">Daftar Kritik dan Saran</h5>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal"
                                data-target="#tambahanggaran">
                                Tambah Data Anggaran
                            </button>
                        </div>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="tambahanggaran" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Tambah Data Anggaran
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('tambah-keuangan') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            Silahkan mengisi informasi anggaran yang akan ditambah.
                                            <br />
                                            <div class="row mt-2">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <input type="text" class="form-control" id="anggaran_nama"
                                                        placeholder="..." name="anggaran_nama">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batalkan</button>
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END Modal Hapus -->

                    </div>
                    <hr />
                    <div class="row">
                        <div class="table-responsive">
                            <table id="example" class="display table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Anggaran</th>
                                        <th>Tipe</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($anggaran as $item)
                                        <tr>
                                            <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                            <td class="text-dark">{{ $item->anggaran_nama }}</td>
                                            <td class="text-dark">{{ $item->anggaran_tipe }}</td>

                                            <td class="d-flex justify-content-center">
                                                <button type="button" id="buttonlihat{{ $item->id }}"
                                                    class="btn btn-sm btn-warning text-dark mr-1"
                                                    onclick="location.href='{{ route('cek-keuangan', $item->id) }}'">
                                                    <b>
                                                        Cek Data Anggaran
                                                    </b>
                                                </button>
                                                <button type="button" id="buttonlihat{{ $item->id }}"
                                                    class="btn btn-sm btn-success text-dark mr-1"
                                                    onclick="location.href='{{ route('lihat-keuangan', $item->id) }}'">
                                                    <b>
                                                        Lihat
                                                    </b>
                                                </button>
                                                @if ($users->login_level == 'admin')
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
                                                            <form action="{{ route('ubah-keuangan', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    Silahkan mengisikan informasi yang akan diubah pada Data
                                                                    Anggaran
                                                                    <div class="row mt-2">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                                            <input type="text" class="form-control"
                                                                                id="anggaran_nama" placeholder="..."
                                                                                name="anggaran_nama"
                                                                                value="{{ $item->anggaran_nama }}">
                                                                        </div>
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
                                                <div class="modal fade" id="modalhapus{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                                    Kritik
                                                                    dan
                                                                    Saran
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('hapus-keuangan', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    Apakah anda yakin ingin menghapus data Anggaran
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
