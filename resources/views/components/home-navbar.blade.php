<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <b>
                SISTEM INFORMASI PENGADUAN WARGA
            </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="btn btn-sm btn-info mr-1 my-auto nav-link text-white" type="button"
                        onclick="location.href = '{{ route('dashboard') }}'">
                        <b>
                            Dashboard
                        </b>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-sm btn-info mr-1 my-auto nav-link text-white" type="button">
                        <b>
                            Features
                        </b>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-sm btn-info mr-1 my-auto nav-link text-white" type="button">
                        <b>
                            Pricing
                        </b>
                    </button>
                </li>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0 mr-1" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </nav>
</div>
