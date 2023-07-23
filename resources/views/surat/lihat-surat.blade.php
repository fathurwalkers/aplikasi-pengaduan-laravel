<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Surat - {{ $surat->surat_kode }}</title>

    <style>
        .table-content thead {
            background-color: #63a1fe;
        }

        .table-content tbody tr:nth-child(even) {
            background-color: #abe9f8;
        }

        .footer .dialog-box p {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container col-xl-10">
        <!-- title -->
        <div class="title d-flex justify-content-center">
            <div class="wrapper d-flex justify-content-between align-items-center me-0 position-relative px-3">
                <div class="logo-1" style="width: auto">
                    <img src="{{ asset('kop') }}/img/logo.jpg" alt="ruanglab"
                        style="margin-right: 30px; width: 110px" />
                </div>
                <div class="content-title mt-3">
                    <div class="company-name text-center">
                        <h3 class="mb-0">KECAMATAN BALIKPAPAN UTARA</h3>
                        <h3 class="mb-0">KELURAHAN BATU AMPAR</h3>
                        <h3 class="mb-0">RUKUN TETANGGA 031</h3>
                    </div>
                    <div class="company-address text-center">
                        <p class="mb-1" style="font-size: 0.8rem">Jln. A. Wahab Syahrani Gg.Argowilis No.49 Telp. 0852
                            4638 4158</p>
                        <h4 class="mb-0">BALIKPAPAN</h4>
                    </div>
                </div>
                <div class="logo-2">
                    <img src="{{ asset('kop') }}/img/logo1.jpg" alt="ruanglab" style="width: 110px" />
                </div>
                <div class="garis position-relative"></div>
                <hr class="d-block position-absolute"
                    style="width: 100%; height: 1.5px; opacity: 1; background-color: #000000; left: 0; bottom: -26px" />
                <hr class="d-block position-absolute"
                    style="width: 100%; height: 1.5px; opacity: 1; background-color: #000000; left: 0; bottom: -23px" />
            </div>
        </div>
        <!-- end of title -->
    </div>
    <br />
    <br />
    <div class="container px-5" style="width: 70%">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="date text-end">
                    <p>Balikpapan,.............-............-20</p>
                </div>
            </div>
            <div class="col-12">
                <div class="box d-flex justify-content-between">
                    <div class="number">
                        <table class="">
                            <tr>
                                <td>Nomor</td>
                                <td class="">:</td>
                                <td class="ps-3">/SP/RT.031/BA/ /20</td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                <td class="">:</td>
                                <td class="fw-bold"></td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td class="">:</td>
                                <td class="">Surat Pengantar</td>
                            </tr>
                        </table>
                    </div>
                    <div class="nama" style="padding-right: 115px">
                        <p class="mb-0">Kepada</p>
                        <p class="mb-0">Yth :</p>
                        <p class="mb-0">Di : Tempat</p>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <p>Bersama ini kami memberikan surat pengantar kepada :</p>
                <div class="content">
                    <div class="content-box">
                        <table class="table">
                            <tr>
                                <td>1.</td>
                                <td>Nama</td>
                                <td>:</td>
                                <td>......................................................................................
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1" /> Laki-Laki</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2" /> Perempuan</label>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Tempat Tgl. Lahir</td>
                                <td>:</td>
                                <td>......................................................................................
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Status Perkawinan</td>
                                <td>:</td>
                                <td>
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1" /> Menikah</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2" /> Belum Menikah</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="option3" /> Duda</label>/ <label> <input class="form-check-input"
                                            type="checkbox" id="inlineCheckbox4" value="option4" /> Janda</label>/
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Golongan Darah</td>
                                <td>:</td>
                                <td>
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1" /> A</label>/ <label> <input class="form-check-input"
                                            type="checkbox" id="inlineCheckbox2" value="option2" /> B</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="option3" /> O</label>/ <label> <input class="form-check-input"
                                            type="checkbox" id="inlineCheckbox4" value="option4" /> AB</label>/
                                </td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                                <td>
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1" /> WNI</label>/ <label> <input class="form-check-input"
                                            type="checkbox" id="inlineCheckbox2" value="option2" /> WNI </label>
                                </td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td>......................................................................................
                                </td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>Agama</td>
                                <td>:</td>
                                <td>
                                    @php
                                        $array_agama = ['islam', 'kristen', 'Protestan', 'katolik', 'Hindu', 'Buddha', 'konghucu', 'lainnya'];
                                    @endphp

                                    @foreach ($array_agama as $item)
                                        <label>
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" @if ($surat->surat_pelampir_agama == $item) checked @endif />
                                            {{ $item }}
                                        </label>/
                                    @endforeach
                                    {{-- <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1" /> Islam</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2" /> Kristen</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="option3" /> Katholik</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                            value="option4" /> Hindu</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox5"
                                            value="option5" /> Budha</label>/
                                    <label> <input class="form-check-input" type="checkbox" id="inlineCheckbox6"
                                            value="option6" /> Konghucu</label> --}}
                                </td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>......................................................................................
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>Untuk Mengurus</td>
                                <td style="padding-left: 85px">:</td>
                                <td>
                                    <ol class="mb-0">

                                        @if ($surat->surat_jenis == 'surat_usaha')
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled checked />
                                                    Surat Izin Usaha
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Kematian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Domisili
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Pengantar Nikah
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Keramaian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Keterangan Ahli Waris
                                                </label>
                                            </li>
                                        @endif

                                        @if ($surat->surat_jenis == 'surat_kematian')
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Usaha
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled checked />
                                                    Surat Kematian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Domisili
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Pengantar Nikah
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Keramaian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Keterangan Ahli Waris
                                                </label>
                                            </li>
                                        @endif

                                        @if ($surat->surat_jenis == 'surat_domisili')
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Usaha
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Kematian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled checked />
                                                    Surat Domisili
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Pengantar Nikah
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Keramaian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Keterangan Ahli Waris
                                                </label>
                                            </li>
                                        @endif

                                        @if ($surat->surat_jenis == 'surat_pengantar_nikah')
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Usaha
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Kematian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Domisili
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled checked />
                                                    Surat Pengantar Nikah
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Keramaian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Keterangan Ahli Waris
                                                </label>
                                            </li>
                                        @endif

                                        @if ($surat->surat_jenis == 'surat_izin_keramaian')
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Usaha
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Kematian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Domisili
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Pengantar Nikah
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled checked />
                                                    Surat Izin Keramaian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Keterangan Ahli Waris
                                                </label>
                                            </li>
                                        @endif

                                        @if ($surat->surat_jenis == 'surat_keterangan_ahli_waris')
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Usaha
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Kematian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Domisili
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Pengantar Nikah
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled />
                                                    Surat Izin Keramaian
                                                </label>
                                            </li>
                                            <li>
                                                <label> <input class="form-check-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1" disabled checked />
                                                    Surat Keterangan Ahli Waris
                                                </label>
                                            </li>
                                        @endif

                                    </ol>
                                </td>
                            </tr>
                        </table>
                        <p>
                            Demikian surat pengantar ini diberikan sebagai bahan proses berikutnya, terimakasih.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('.checkedinput').addClass('checked');
        });
    </script>
</body>

</html>
