<x-layout-user>
    <?php //------------------------------------------------------ PESTAÑAS //------------------------------------------------------>
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
    </ul>

    <?php //------------------------------------------------------CONTENIDO PESTAÑAS //------------------------------------------------------>
    ?>
    <div class="tab-content" id="myTabContent">

        <?php  //------------------------------------------------------LISTA PARTES //------------------------------------------------------>
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
                            <tr onclick="window.location='{{ route('show-report', $report->slug) }}'">
                                <td scope="row">{{ $report->id }}</td>
                                <td>{{ $report->producto }}</td>
                                <td>{{ $report->incidencia }}</td>
                                <td>{{ $report->estado }}</td>
                                <td>
                                    <form action="{{ route('delete-report') }}" method="post">
                                        @csrf
                                        <a class="btn btn-primary" href="">
                                        <i class="bi bi-pencil"></i></a>
                                        <input type="hidden" name="id" value={{ $report->id }}>
                                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <?php //------------------------------------------------------ NUEVO REGISTRO //------------------------------------------------------>
        ?>
        <div class="tab-pane fade <?php echo $errors->any() ? ' show active' : ''; ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container m-4">
                <div class="container-fluid ml-2">
                    <x-layout-user.errors />
                    <form action="{{ route('create-report') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <select name="customer_id" id="customer_id" class="form-select">
                                <option value="">--- Cliente ---</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"{{$customer->id == old('customer_id') ? "selected" : ""}}>
                                        {{ $customer->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="responsable" id="responsable" class="form-select">
                                <option value="">--- Técnico encargado ---</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"{{$employee->id == old('responsable') ? "selected" : ""}}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="producto" id="producto"
                                placeholder="Producto" value="{{ old('producto') }}">
                            <label for="Producto">Nº de serie del producto: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="incidencia" id="incidencia"
                                placeholder="Describe el problema" value="{{ old('incidencia') }}">
                            <label for="incidencia">Incidencia: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="observaciones" id="observaciones"
                                placeholder="Observaciones de entrada" value="{{ old('observaciones') }}">
                            <label for="observaciones">Observaciones: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="estado" id="estado" class="form-select">
                                <option value="En cola">En cola</option>
                                <option value="Diagnostico">En revisión</option>
                                <option value="Presupuestado">Presupuestado</option>
                                <option value="Pendiente de retirada">Pendiente de retirada</option>
                                <option value="Entregado">Entregado</option>

                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="fotos" id="fotos">
                        </div>

                        <button type="submit" class="btn btn-primary ms-auto">Añadir</button>

                    </form>
                </div>
            </div>
</x-layout-user>
