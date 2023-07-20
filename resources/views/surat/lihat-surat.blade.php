<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Invoice</title>

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
    <div class="row mx-4">
        <div class="col-sm-12 col-md-12 col-lg-12">
            {!! $surat->surat_isi !!}
            {{ $surat->surat_isi }}
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
