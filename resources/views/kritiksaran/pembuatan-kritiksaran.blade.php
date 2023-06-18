@extends('layouts.dashboard-layouts')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    Kritik dan Saran
@endsection

@section('main-content')
    <div class="card">
        <div class="card-body">
            <div class="container">

                <form action="{{ route('post-pembuatan-kritiksaran') }}" method="post">
                    @csrf

                    <p class="text-dark">Silahkan masukkan kritik dan saran yang ingin anda sampaikan pada beberapa
                        form pengajuan
                        dibawah.</p>

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
                            <button type="button" class="btn btn-info btn-md">
                                Proses Kritik dan Saran
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

                                <tr>
                                    <td>1</td>
                                    <td>Ketua RT Tidak menghadiri rapat hari ini.</td>
                                    <td>Kritik</td>
                                    <td>Surya Lana</td>
                                    <td>2022/12/21</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Sebaiknya lapangan di area kompleks B dapat direlokasikan untuk pembuatan kantor
                                        RT baru.</td>
                                    <td>Saran</td>
                                    <td>Ade Rinjani</td>
                                    <td>2023/04/14</td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Bak sampah ditempatkan di tiap jenjang ruas perumahan daripada ditempatkan di
                                        depan kompleks</td>
                                    <td>Saran</td>
                                    <td>Irfan Sanjaya</td>
                                    <td>2019/09/30</td>
                                </tr>

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
