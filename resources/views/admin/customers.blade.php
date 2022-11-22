<x-layout-user>

    <?php //-- PESTAÑAS -->?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? "" : "active"?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">Clientes</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? "active" : ""?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                role="tab" aria-controls="profile" aria-selected="false">Añadir</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                role="tab" aria-controls="contact" aria-selected="false">Buscar</button>
        </li>
    </ul>

    <?php //-- CONTENIDO PESTAÑAS --> ?>
    <div class="tab-content" id="myTabContent">

        <?php //-- LISTA CLIENTES --> ?>
        <div class="tab-pane fade show <?php echo $errors->any() ? "" : "show active"?>" id="home" role="tabpanel" aria-labelledby="home-tab">
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

                    @foreach ($customers as $customer)
                        <div class="row mb-2">
                            <div class="col-12 col-md-3">
                                {{ $customer->nombre }}
                            </div>
                            <div class="col-12 col-md-2">
                                {{ $customer->encargado }}
                            </div>
                            <div class="col-12 col-md-2">
                                {{ $customer->telefono }}
                            </div>
                            <div class="col-12 col-md-3">
                                {{ $customer->mail }}
                            </div>
                            <div class="col-12 col-md-1">
                                <a class="btn btn-primary" href="{{ route('edit-customer', $customer->id) }}">
                                    Editar</a>
                            </div>
                            <div class="col-12 col-md-1">
                                <form action="{{ route('delete-customer') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value={{$customer->id}}>
                                    <button class="btn btn-danger" type="submit">Borrar </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <?php //-- NUEVO REGISTRO --> ?>
        <div class="tab-pane fade <?php echo $errors->any() ? " show active" : ""?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container m-4">
                <div class="container-fluid ml-2">
                    <div>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                <form action="{{ route('create-customer') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre"
                            value="{{ old('nombre') }}">
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

        <!-- BUSCAR -->
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            12
        </div>
    </div>

</x-layout-user>
