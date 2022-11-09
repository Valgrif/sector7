<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline"> <img src="{{ url('/images/circulo.png') }}" width="30"
                    alt="logo"> Sector 7</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

            <li class="nav-item">
                <a href="{{route('logeado')}}" class="nav-link align-middle px-0 text-white">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Inicio</span>
                </a>
            </li>
            <li>
                <a href="{{route('list-report')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Partes</span>
                </a>
                <ul class="collapse flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{route('new-report-form')}}" class="nav-link px-0"> <span
                                class="d-none d-sm-inline text-white">Crear</span>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="#" class="nav-link px-0"> <span
                                class="d-none d-sm-inline text-white">Buscar</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('calendar') }}" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Calendario</span></a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li>
                    <a href="{{route('list-employees')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                        <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Empleados</span></a>
                    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="{{route('new-employee-form')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Crear</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Buscar</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Contabilidad</span> </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link px-0 text-white"> <span
                                class="d-none d-sm-inline">Facturacion</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 text-white"> <span
                                class="d-none d-sm-inline">Proveedores</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 text-white"> <span
                                class="d-none d-sm-inline">Gasto</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 text-white"> <span
                                class="d-none d-sm-inline">Impuestos</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('list-customer')}}"  data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Clientes</span> </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{route('new-customer-form')}}"  class="nav-link px-0 text-white"> <span
                                class="d-none d-sm-inline">Crear</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 text-white"> <span
                                class="d-none d-sm-inline">Buscar</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                    class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">loser</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Check in.</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="">Desconectar</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>

        <!-- <div class="col py-3">
        </div>-->
    </div>
</div>
