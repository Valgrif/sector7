<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline"> <img src="{{ url('/images/circulo.png') }}" width="30"
                    alt="logo"> Sector 7</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0 text-white">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('calendar') }}" class="nav-link align-middle px-0 text-white">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Calendario</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('list-report') }}" class="nav-link align-middle px-0 text-white">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Partes</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('list-customer') }}" class="nav-link align-middle px-0 text-white">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Clientes</span>
                </a>
            </li>
            <!-- SECCION EMPLEADOS SOLO PARA ADMIN-->
            <li class="nav-item">
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('list-employees') }}" class="nav-link align-middle px-0 text-white">
                        <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Empleados</span>
                    </a>
                @endif
            </li>
        </ul>
        <hr>

        <!-----------------------------------------MENU USUARIO ------------------------------------------>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{auth()->user()->foto}}" alt="hugenerd" width="30" height="30"
                    class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"> Desconectar</button>
                </li>
                </form>
                <li><a class="dropdown-item" href="#">Check in</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
            </ul>
        </div>

        <!-- <div class="col py-3">
                       <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0 text-white">
                    <i class="fs-4 bi bi-currency-exchange"></i> <span class="ms-1 d-none d-sm-inline">Facturación</span>
                </a>
            </li>
        </div>-->
    </div>
</div>
