@extends('layouts.dashboard-layouts')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    Kelola Informasi dan Berita
@endsection

@section('main-content')
    <div class="card">
        <div class="card-body">
            <div class="container">

                <form action="{{ route('post-berita') }}" method="POST">
                    @csrf

                    <p class="text-dark">Silahkan masukkan Informasi atau Berita baru dengan format yang telah
                        ditentukan.
                    </p>

                    <div class="row">

                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="berita_judul">
                                    <h6 class="text-dark">Judul Informasi</h6>
                                </label>
                                <input type="text" class="form-control" id="berita_judul"
                                    placeholder="Masukkan keterangan pengaduan..." name="berita_judul" required>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="berita_jenis">
                                    <h6 class="text-dark">Jenis Informasi</h6>
                                </label>
                                <select class="form-control" id="berita_jenis" name="berita_jenis" required>
                                    <option default value="pengumuman">Pengumuman</option>
                                    <option value="berita">Berita</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="berita_tanggal">
                                    <h6 class="text-dark">Tanggal Terbit</h6>
                                </label>
                                <input type="datetime-local" class="form-control" id="berita_tanggal" name="berita_tanggal"
                                    required>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="berita_isi">
                                <h6 class="text-dark">Isi Informasi / Pengumuman</h6>
                            </label>
                            <textarea id="berita_isi" name="berita_isi" required></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
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
                        <h5 class="my-auto text-dark">Daftar Informasi</h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Judul Informasi</th>
                                    <th>Jenis Informasi</th>
                                    <th>Kode</th>
                                    <th>Pengirim</th>
                                    <th>Tanggal & Waktu Terbit</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($berita as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-dark">{{ $item->berita_judul }}</td>
                                        <td class="text-center text-dark">
                                            @switch($item->berita_jenis)
                                                @case('pengumuman')
                                                    <button type="button" class="badge badge-sm border badge-success">
                                                        {{ strtoupper($item->berita_jenis) }}
                                                    </button>
                                                @break

                                                @case('berita')
                                                    <button type="button" class="badge badge-sm border badge-info">
                                                        {{ strtoupper($item->berita_jenis) }}
                                                    </button>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="text-dark">{{ $item->berita_kode }}</td>
                                        <td class="text-center text-dark">
                                            @if ($item->login->login_nama == null)
                                                None
                                            @else
                                                {{ $item->login->login_nama }}
                                            @endif
                                        </td>
                                        <td class="text-center text-dark">
                                            {{ date('d/m/Y', strtotime($item->berita_tanggal)) }}
                                        </td>
                                        <td class="text-center text-dark">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <button type="button" id="buttonlihat{{ $item->id }}"
                                                        class="btn btn-sm btn-success mr-1" data-toggle="modal"
                                                        data-target="#modallihat{{ $item->id }}">
                                                        Lihat
                                                    </button>
                                                    <button type="button" id="buttonlihat{{ $item->id }}"
                                                        class="btn btn-sm btn-warning mr-1" data-toggle="modal"
                                                        data-target="#modalubah{{ $item->id }}">
                                                        Ubah
                                                    </button>
                                                    <button type="button" id="buttonlihat{{ $item->id }}"
                                                        class="btn btn-sm btn-danger mr-1" data-toggle="modal"
                                                        data-target="#modalhapus{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Ubah -->
                                    <div class="modal fade" id="modalubah{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Berita</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('update-berita', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="berita_judul">
                                                                        <h6 class="text-dark">Judul Informasi</h6>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="berita_judul"
                                                                        placeholder="Masukkan keterangan pengaduan..."
                                                                        name="berita_judul"
                                                                        value="{{ $item->berita_judul }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="berita_jenis">
                                                                        <h6 class="text-dark">Jenis Informasi</h6>
                                                                    </label>
                                                                    <select class="form-control" id="berita_jenis"
                                                                        name="berita_jenis">
                                                                        <option default value="{{ $item->berita_jenis }}">
                                                                            (Terpilih)
                                                                            {{ $item->berita_jenis }}
                                                                        </option>
                                                                        <option value="pengumuman">Pengumuman</option>
                                                                        <option value="berita">Berita</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="berita_tanggal">
                                                                        <h6 class="text-dark">Tanggal Terbit</h6>
                                                                    </label>
                                                                    <input type="datetime-local" class="form-control"
                                                                        id="berita_tanggal" name="berita_tanggal"
                                                                        value="{{ $item->berita_tanggal }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label for="berita_isi">
                                                                    <h6 class="text-dark">Isi Informasi / Pengumuman</h6>
                                                                </label>
                                                                <textarea id="" class="summernoteclass" name="berita_isi" required>
                                                                    {{ $item->berita_isi }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batalkan</button>
                                                        <button type="submit" class="btn btn-warning">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Modal Ubah -->

                                    <!-- Modal Lihat -->
                                    <div class="modal fade" id="modallihat{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Lihat Berita</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label for="berita_judul">
                                                                    <p class="" style="text-size:50px;">
                                                                        <b>Judul Informasi : </b>
                                                                        <br />
                                                                        {{ $item->berita_judul }}
                                                                    </p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label for="berita_judul">
                                                                    <p class="" style="text-size:50px;">
                                                                        <b>Pengirim : </b>
                                                                        <br />
                                                                        <b>{{ $item->login->login_nama }}</b>
                                                                    </p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <label for="berita_judul">
                                                                    <p class="" style="text-size:50px;">
                                                                        <b>Isi Informasi : </b>
                                                                        <br />
                                                                        {!! $item->berita_isi !!}
                                                                    </p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Modal Lihat -->

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="modalhapus{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Berita</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('hapus-berita', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data berita ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batalkan</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Modal Hapus -->
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#berita_isi').summernote();
            $('.summernoteclass').summernote();
        });
    </script>
@endpush
