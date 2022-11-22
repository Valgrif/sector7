<x-layout-user>
    <?php //--------------------------------------------------------- PESTAÑAS ------------------------------->?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? '' : 'active'; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                type="button" role="tab" aria-controls="home" aria-selected="true">Partes de trabajo</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? 'active' : ''; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                type="button" role="tab" aria-controls="profile" aria-selected="false">Añadir</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                role="tab" aria-controls="contact" aria-selected="false">Buscar</button>
        </li>
    </ul>

    <?php //-------------------------------------------- CONTENIDO PESTAÑAS -------------------------------------> ?>
    <div class="tab-content" id="myTabContent">

        <?php //-- LISTA CLIENTES --> ?>
        <div class="tab-pane fade show <?php echo $errors->any() ? '' : 'show active'; ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container m-4">
                <div class="container mb-3">
                    <div class="row row-cols-auto">
                        <div class="col-12 col-md-3">
                            EMPRESA
                        </div>
                        <div class="col-12 col-md-2">
                            ENCARGADO
                        </div>
                        <div class="col-12 col-md-2">
                            TELEFONO
                        </div>
                        <div class="col-12 col-md-3">
                            EMAIL
                        </div>
                        <div class="col-12 col-md-2">
                            ACCIONES
                        </div>
                    </div>
                    <hr>

                    @foreach ($reports as $report)
                        <div class="row mb-2">
                            <div class="col-12 col-md-3">
                                {{ $report->cliente }}
                            </div>
                            <div class="col-12 col-md-2">
                                {{ $report->incidencia }}
                            </div>
                            <div class="col-12 col-md-2">
                                {{ $report->responsable }}
                            </div>
                            <div class="col-12 col-md-3">
                                {{ $report->estado }}
                            </div>
                            <div class="col-12 col-md-1">
                                <a class="btn btn-primary" href="{{ route('calendar') }}">Editar</a>
                            </div>
                            <div class="col-12 col-md-1">
                                <form action="{{ route('delete-report') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value={{ $customer->id }}>
                                    <button class="btn btn-danger" type="submit">Borrar </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <?php //-- NUEVO REGISTRO --> ?>
        <div class="tab-pane fade <?php echo $errors->any() ? ' show active' : ''; ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container m-4">
                <form action="{{ route('new-report') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="customer_id" id="customer_id"
                            placeholder="Cliente" value="{{ old('customer_id') }}">
                        <label for="customer_id">Nombre Cliente: </label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="producto" id="producto" placeholder="Producto"
                            value="{{ old('producto') }}">
                        <label for="producto">Producto: </label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="incidencia" id="incidencia"
                            placeholder="Describa brevemente el problema" value="{{ old('incidencia') }}">
                        <label for="incidencia">Incidencia: </label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="observaciones" id="observaciones"
                            placeholder="Observaciones" value="{{ old('observaciones') }}">
                        <label for="observaciones">Observaciones: </label>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Estado: </span>
                        <select name="encargado" id="encargado" class="form-select">
                            <option value="Pendiente">Pendiente</option>
                            <option value="En curso">En curso</option>
                            <option value="Finalizado">Finalizado</option>

                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <select name="responsable" id="responsable" class="form-select">
                            <option value=""> Técnico responsable </option>
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"{{ $employee->id == old('encargado') ? 'selected' : '' }}>
                                {{ $employee->nombre }}
                            </option>
                        @endforeach

                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="fotos" id="fotos">
                    </div>

                    <button type="submit" class="btn btn-primary ms-auto">Añadir</button>

                </form>
            </div>
        </div>

        <?php //-- BUSCAR --> ?>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            12
        </div>
    </div>

</x-layout-user>
