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
                                                    class="btn btn-sm btn-info text-dark mr-1"
                                                    onclick="location.href='{{ route('cek-keuangan', $item->id) }}'">
                                                    <b>
                                                        Cek Data Anggaran
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
