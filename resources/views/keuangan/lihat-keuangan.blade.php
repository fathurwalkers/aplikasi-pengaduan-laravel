<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Anggaran</title>
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <div class="header mt-5 px-5 mb-5">
                    <h5 class="fw-light mb-5">LAPORAN PERTANGGUNG JAWABAN KEUANGAN KAS RT.31 KEL, BATU AMPAR KEC,
                        BALIKPAPAN UTARA TAHUN 2021 (JANUARI - DESEMBER 2021)</h5>

                    <h6>{{ $anggaran->anggaran_nama }}</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="content">

                    <div class="pengeluaran-2021 mb-3">
                        <p class="text-start fw-bold">
                            {{ $anggaran->anggaran_tipe }}
                        </p>
                        <table class="table table-bordered border border-1 border-dark">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Uraian Penjelasan</th>
                                    <th scope="col">Debet</th>
                                    <th scope="col">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data_anggaran as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ date('d/M/Y', strtotime($item->data_anggaran_tanggal)) }}</td>
                                        <td class="text-start">{{ $item->data_anggaran_deskripsi }}</td>
                                        <td>{{ 'Rp ' . number_format($item->data_anggaran_debet, 2, ',', '.') }}</td>
                                        <td>{{ 'Rp ' . number_format($item->data_anggaran_kredit, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                    <br />
                    <br />
                    <br />
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
