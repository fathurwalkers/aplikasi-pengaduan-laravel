@extends('layouts.dashboard-layouts')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    @switch($users->login_level)
        @case('user')
            Pembuatan Surat
        @break

        @case('admin')
            Kelola Surat
        @break
    @endswitch
@endsection

@section('main-content')
    @if ($users->login_level == 'user')
        <div class="card">
            <div class="card-body">
                <div class="container">

                    <form action="{{ route('post-pembuatan-surat') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <p class="text-dark">
                            Silahkan melakukan pengisian sesuai format surat yang telah ditentukan untuk melakukan
                            pengiriman surat.
                        </p>

                        <hr />
                        <div class="row">
                            <div class="col-12">
                                <p class="text-dark">Isikan informasi Pengajuan Surat : </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_perihal">
                                        <h6>Perihal</h6>
                                    </label>
                                    <input type="text" class="form-control" id="surat_perihal"
                                        placeholder="Masukkan Perihal lampiran surat..." name="surat_perihal">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_lampiran">
                                        <h6>Lampiran</h6>
                                    </label>
                                    <input type="text" class="form-control" id="surat_lampiran"
                                        placeholder="Masukkan lampiran surat..." name="surat_lampiran">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_nomor">
                                        <h6>Nomor Surat</h6>
                                    </label>
                                    <input type="text" class="form-control" id="surat_nomor"
                                        placeholder="Masukkan keterangan pengaduan..." name="surat_nomor">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_jenis">
                                        <h6>Jenis Keperluan</h6>
                                    </label>
                                    <select class="form-control" id="surat_jenis" name="surat_jenis">
                                        <option default value="surat_usaha">Surat Usaha</option>
                                        <option value="surat_kematian">Surat Kematian</option>
                                        <option value="surat_domisili">Surat Domisili</option>
                                        <option value="surat_pengantar_nikah">Surat Pengantar Nikah</option>
                                        <option value="surat_izin_keramaian">Surat Izin Keramaian</option>
                                        <option value="surat_keterangan_ahli_waris">Surat Keterangan Ahli Waris</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Dokumen Pendukung</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="surat_dokumen">
                                        <label class="custom-file-label" for="surat_dokumen">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />
                        <div class="row">
                            <div class="col-12">
                                <p class="text-dark">Isikan informasi Data Diri Pelampir : </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="pengaduan_keterangan">
                                        <h6>Pengirim</h6>
                                    </label>
                                    <input type="text" class="form-control" id="pengaduan_keterangan"
                                        placeholder="Masukkan keterangan pengaduan..." name="surat_pengirim"
                                        value="{{ $users->login_nama }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_pelampir_statusperkawinan">
                                        <h6>Status Pekawinan</h6>
                                    </label>
                                    <select class="form-control" id="surat_pelampir_statusperkawinan"
                                        name="surat_pelampir_statusperkawinan">
                                        <option default value="menikah">Menikah</option>
                                        <option value="belum menikah">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_pelampir_pekerjaan">
                                        <h6>Pekerjaan</h6>
                                    </label>
                                    <input type="text" class="form-control" id="surat_pelampir_pekerjaan"
                                        placeholder="Masukkan keterangan pengaduan..." name="surat_pelampir_pekerjaan">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_pelampir_statusperkawinan">
                                        <h6>Status Pekawinan</h6>
                                    </label>
                                    <select class="form-control" id="surat_pelampir_statusperkawinan"
                                        name="surat_pelampir_statusperkawinan">
                                        <option default value="menikah">Menikah</option>
                                        <option value="belum menikah">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_pelampir_jenkel">
                                        <h6>Jenis Kelamin</h6>
                                    </label>
                                    <select class="form-control" id="surat_pelampir_jenkel" name="surat_pelampir_jenkel">
                                        <option default value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_pelampir_statusperkawinan">
                                        <h6>Kewarganegaraan</h6>
                                    </label>
                                    <select class="form-control" id="surat_pelampir_statusperkawinan"
                                        name="surat_pelampir_statusperkawinan">
                                        <option default value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_pelampir_pekerjaan">
                                        <h6>Pekerjaan</h6>
                                    </label>
                                    <input type="text" class="form-control" id="surat_pelampir_pekerjaan"
                                        placeholder="Masukkan keterangan pengaduan..." name="surat_pelampir_pekerjaan">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="surat_pelampir_statusperkawinan">
                                        <h6>Status Pekawinan</h6>
                                    </label>
                                    <select class="form-control" id="surat_pelampir_statusperkawinan"
                                        name="surat_pelampir_statusperkawinan">
                                        <option default value="menikah">Menikah</option>
                                        <option value="belum menikah">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label for="berita_isi">
                                    <h6 class="text-dark">Isi Surat</h6>
                                </label>
                                <textarea id="berita_isi" name="berita_isi" required></textarea>
                            </div>
                        </div>

                        <div class="row mt-1 mb-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info btn-md">
                                    Proses Surat
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
                        <h5 class="my-auto text-dark">Daftar Surat</h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center text-dark">No.</th>
                                    <th class="text-center text-dark">Pengirim</th>
                                    <th class="text-center text-dark">Perihal</th>
                                    <th class="text-center text-dark">Keperluan</th>
                                    <th class="text-center text-dark">Kode Surat</th>
                                    <th class="text-center text-dark">Status</th>
                                    <th class="text-center text-dark">Tanggal</th>
                                    <th class="text-center text-dark">Kelola</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($surat as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->surat_pengirim }}</td>
                                        <td class="text-center text-dark">{{ $item->surat_perihal }}</td>
                                        <td class="text-center text-dark">
                                            {{ ucwords(str_replace('_', ' ', $item->surat_jenis)) }}
                                        </td>
                                        <td class="text-center text-dark">{{ $item->surat_kode }}</td>
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

                                                            @switch($item->surat_status)
                                                                @case('diproses')
                                                                    <button class="btn btn-sm btn-warning text-dark">
                                                                        <b>{{ strtoupper($item->surat_status) }}</b>
                                                                    </button>
                                                                @break

                                                                @case('diterima')
                                                                    <button class="btn btn-sm btn-success">
                                                                        <b>{{ strtoupper($item->surat_status) }}</b>
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
                                                                        <form action="{{ route('konfirmasi-surat') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id_surat"
                                                                                value="{{ $item->id }}">
                                                                            <button class="dropdown-item btn"
                                                                                type="submit" value="diterima"
                                                                                name="buttonkonfirmasi">Terima</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center text-dark">
                                            {{ date('d/m/Y', strtotime($item->surat_tanggal)) }}
                                        </td>
                                        <td>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#berita_isi').summernote();
        });
    </script>
@endpush
