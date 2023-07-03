<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @stack('css')
</head>

<body>

    <div class="container fixed-top">
        @if ($users == null)
            <x-home-navbar :users=null />
        @else
            <x-home-navbar :users=$users />
        @endif
    </div>

    <br />
    <br />

    <div class="container">

        <div class="card border border-grey mt-4">
            <div class="card-body">
                <div class="row my-auto pt-4">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <h5 class="text-dark">RT 031 BATU AMPAR</h5>
                        <p class="text-dark">
                            Website Sistem Informasi ini menyediakan beberapa pelayanan seperti pembuatan surat,
                            informasi
                            KAS, berita kegiatan, pengaduan berbasis IOT dan lain sebagainya.
                        </p>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">
                        <img src="{{ asset('assets') }}/logo-rt.jpg" class="img img-fluid" width="150px"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-3" />
        <section id="main-content" class="">
            @yield('main-content')
        </section>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    @stack('js')
</body>

</html>
