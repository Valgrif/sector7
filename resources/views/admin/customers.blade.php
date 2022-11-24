<x-layout-user>

    <?php //-- PESTAÑAS -->?>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? '' : 'active'; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                type="button" role="tab" aria-controls="home" aria-selected="true">Clientes</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? 'active' : ''; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                type="button" role="tab" aria-controls="profile" aria-selected="false">Añadir</button>
        </li>
    </ul>

    <?php //-- CONTENIDO PESTAÑAS -- ?>

    <div class="tab-content" id="myTabContent">

        <?php //-- LISTA CLIENTES -->
        ?>
        <div class="tab-pane fade show <?php echo $errors->any() ? '' : 'show active'; ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="table-responsive-sm m-4">
                <form action="{{route('list-customer')}}" method="get">
                    <div class="col-x1-12">
                        <form action="">
                            <div class="form-now">
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="texto" id="">
                                </div>
                                <div class="col-auto">
                                   <input type="submit" class="btn btn-primary" value="Buscar">
                                </div>
                            </div>
                        </form>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">EMPRESA</th>
                            <th scope="col">ENCARGADO</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">EMAIL</th>
                            <th scrope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr class=""
                                onclick="window.location='{{ route('show-customer', $customer->slug) }}'">
                                <th scope="row">{{ $customer->nombre }}</th>
                                <th>{{ $customer->encargado }}</th>
                                <th>{{ $customer->telefono }}</th>
                                <th>{{ $customer->mail }}</th>
                                <th>
                                    <form action="{{ route('delete-customer') }}" method="post">
                                        @csrf
                                        <a class="btn btn-primary" href="{{ route('edit-customer', $customer->id) }}">
                                            <i class="bi bi-pencil"></i></a>
                                        <input type="hidden" name="id" value={{ $customer->id }}>
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

                    <form action="{{ route('create-customer') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="nombre" id="nombre"
                                placeholder="Nombre" value="{{ old('nombre') }}">
                            <label for="nombre">Nombre: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="direccion" id="direccion"
                                placeholder="Direccion" value="{{ old('direccion') }}">
                            <label for="direccion">Direccion: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="cif" id="cif"
                                placeholder="La letra del CIF en mayusculas" value="{{ old('cif') }}">
                            <label for="cif">CIF: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="mail" id="mail" placeholder="Email"
                                value="{{ old('mail') }}">
                            <label for="mail">Correo electronico: </label>
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


        </div>

</x-layout-user>
