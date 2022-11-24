<x-layout-user>
    <?php //-- PESTAÑAS -->
    ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? '' : 'active'; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                type="button" role="tab" aria-controls="home" aria-selected="true">Parte de trabajo</button>
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

    <?php //-- CONTENIDO PESTAÑAS -->
    ?>
    <div class="tab-content" id="myTabContent">

        <?php //-- LISTA PARTES -->
        ?>
        <div class="tab-pane fade show <?php echo $errors->any() ? '' : 'show active'; ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="table-responsive-sm m-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">PRODUCTO</th>
                            <th scope="col">AVERIA</th>
                            <th scope="col">ESTADO</th>
                            <th scrope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr class=""
                                onclick="window.location='{{ route('show-report', $report->slug) }}'">
                                <th scope="row">{{ $report->id }}</th>
                                <th>{{ $report->producto }}</th>
                                <th>{{ $report->incidencia }}</th>
                                <th>{{ $report->estado }}</th>
                                <th>
                                    <form action="{{ route('delete-report') }}" method="post">
                                        @csrf
                                        <a class="btn btn-primary" href="{{ route('edit-report', $report->id) }}">
                                        <i class="bi bi-pencil"></i></a>
                                        <input type="hidden" name="id" value={{ $report->id }}>
                                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <?php //-- NUEVO REGISTRO -->
        ?>
        <div class="tab-pane fade <?php echo $errors->any() ? ' show active' : ''; ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container m-4">
                <div class="container-fluid ml-2">
                    <x-layout-user.errors />
                    <form action="{{ route('create-report') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <span class="input-group-text">Categoría</span>
                            <select name="customer_id" id="customer_id" class="form-select">
                                <option value="">--- Slecciona una Empresa ---</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"{{$customer->id == old('customer_id') ? "selected" : ""}}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="producto" id="producto"
                                placeholder="Producto" value="{{ old('producto') }}">
                            <label for="Producto">Producto: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="observaciones" id="observaciones"
                                placeholder="La letra del CIF en mayusculas" value="{{ old('observaciones') }}">
                            <label for="observaciones">Observaciones: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="responsable" id="responsable" class="form-select">
                                <option value="">--- Slecciona unn Técnico ---</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"{{$employee->id == old('responsable') ? "selected" : ""}}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="telefono" id="telefono"
                                placeholder="Numero de Telefono" value="{{ old('telefono') }}">
                            <label for="telefono">Teléfono: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="encargado" id="encargado"
                                placeholder="Encargado" value="{{ old('encargado') }}">
                            <label for="encargado">Encargado: </label>
                        </div>
                        <button type="submit" class="btn btn-primary ms-auto">Añadir</button>

                    </form>
                </div>
            </div>

            <!-- BUSCAR -->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                12
            </div>
        </div>

</x-layout-user>
