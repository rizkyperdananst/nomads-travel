<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ url('frontend/images/logo-nomads.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Paket Travel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Testimonial</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    
                    @guest
                        <!-- Mobile Button -->
                    <form class="form-inline d-sm-block d-md-none">
                        <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                            Masuk
                        </button>
                    </form>
                    <!-- Mobile Button -->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                            Masuk
                        </button>
                    </form>
                    <!-- Desktop Button -->
                    @endguest

                    @auth
                    <!-- Mobile Button -->
                    <form action="{{ route('logout.user') }}" method="POST" class="form-inline d-sm-block d-md-none">
                        @csrf
                        <button class="btn btn-login my-2 my-sm-0">
                            Keluar
                        </button>
                    </form>
                    <!-- Mobile Button -->
                    <form action="{{ route('logout.user') }}" method="POST" class="form-inline my-2 my-lg-0 d-none d-md-block">
                        @csrf
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                            Keluar
                        </button>
                    </form>
                    <!-- Desktop Button -->
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</div>