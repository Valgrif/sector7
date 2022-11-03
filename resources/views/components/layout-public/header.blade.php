<header class="p-3 text-bg-dark">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-secondary">INICIO</a></li>
                <li><a href="#" class="nav-link px-2 text-white">SERVICIOS</a></li>
                <li><a href="#" class="nav-link px-2 text-white">SOBRE NOSOTROS</a></li>
                <li><a href="#" class="nav-link px-2 text-white">CONTACTO</a></li>
                <li><a href="#" class="nav-link px-2 text-white">UBICACION</a></li>
            </ul>

            <div class="text-end">
                @guest
                    <!--Usuarios sin registrar-->
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                @endguest
                @auth
                    <!--Usuarios registrados-->
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-outline-light me-2" value="logout">
                    </form>
                @endauth
            </div>
            @auth
            <div class="ms-2">
                <a class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight"><i class="bi bi-cart"></i></a>
            </div>
            @endauth
        </div>
    </div>
</header>
