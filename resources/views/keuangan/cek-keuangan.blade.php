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
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th>Aksi</th>
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
                                            <td class="text-dark">{{ $item->data_anggaran_debet }}</td>
                                            <td class="text-dark">{{ $item->data_anggaran_kredit }}</td>

                                            <td class="d-flex justify-content-center">
                                                <button type="button" id="buttonlihat{{ $item->id }}"
                                                    class="btn btn-sm btn-info text-dark mr-1"
                                                    onclick="location.href='{{ route('cek-keuangan', $item->id) }}'">
                                                    <b>
                                                        Lihat
                                                    </b>
                                                </button>

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
                                                            <form action="{{ route('hapus-keuangan', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    Apakah anda yakin ingin menghapus data Kritik dan Saran
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
