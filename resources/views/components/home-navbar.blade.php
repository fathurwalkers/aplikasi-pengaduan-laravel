<div>
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary sticky-top">
        <a class="navbar-brand" href="{{ route('home') }}">
            <b>
                <span style="color: #fff;">
                    SISTEM INFORMASI PENGADUAN WARGA
                </span>
            </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if ($users !== null)
                    <li class="nav-item">
                        <button class="btn btn-sm btn-grey mr-1 my-auto nav-link text-dark" type="button"
                            onclick="location.href = '{{ route('dashboard') }}'">
                            <b>
                                Dashboard
                            </b>
                        </button>
                    </li>
                @else
                    <li class="nav-item">
                        <button class="btn btn-sm btn-grey mr-1 my-auto nav-link text-white" type="button"
                            onclick="location.href = '{{ route('login') }}'">
                            <b>
                                Login
                            </b>
                        </button>
                    </li>
                @endif
                @if ($users !== null)
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-danger mr-1 my-auto nav-link text-white" type="submit">
                                <b>
                                    Logout
                                </b>
                            </button>
                        </form>
                    </li>
                @endif
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-grey my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </nav>
</div>
