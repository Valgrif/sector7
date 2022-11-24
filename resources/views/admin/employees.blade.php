<x-layout-user>
    <?php //-- PESTAÑAS -->
    ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? '' : 'active'; ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                type="button" role="tab" aria-controls="home" aria-selected="true">Empleados</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $errors->any() ? 'active' : ''; ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                type="button" role="tab" aria-controls="profile" aria-selected="false">Añadir</button>
        </li>
    </ul>

    <?php // CONTENIDO PESTAÑAS
    ?>
    <div class="tab-content" id="myTabContent">

        <?php //---------------------------------------- LISTA CLIENTES -------------------------------------------------------->
        ?>
        <div class="tab-pane fade  <?php echo $errors->any() ? '' : 'show active'; ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="table-responsive-sm m-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">AVATAR</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">EMAIL</th>
                            <th scrope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr onclick="window.location='{{ route('show-employee', $user->dni) }}'">
                                <td scope="row"><img src="{{ $user->foto }}" alt="{{ $user->name }}"
                                        width="30" height="30" class="rounded-circle"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('delete-employee') }}" method="post">
                                        @csrf
                                        <a class="btn btn-primary" href="{{ route('edit-employee', $user->id) }}">
                                            <i class="bi bi-pencil"></i></a>
                                        <input type="hidden" name="id" value={{ $user->id }}>
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

        <?php //----------------------------------------- NUEVO REGISTRO -------------------------------------------------------->
        ?>
        <div class="tab-pane fade <?php echo $errors->any() ? ' show active' : ''; ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container m-4">
                <div class="container-fluid ml-2">
                    <x-layout-user.errors />
                    <form action="{{ route('create-employee') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="name" id="name"
                                placeholder="Nombre" value="{{ old('nombre') }}">
                            <label for="nombre">Nombre: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="apellidos" id="apellidos"
                                placeholder="Apellidos" value="{{ old('apellidos') }}">
                            <label for="apellidos">Apellidos: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password" id="password"
                                placeholder="Password" value="{{ old('password') }}">
                            <label for="password">Password: </label>
                        </div>


                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password_confirmation"
                                id="password_confirmation" placeholder="Debe ser la misma"
                                value="{{ old('password_confirmation') }}">
                            <label for="password_confirmation">Password: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="dni" id="dni"
                                placeholder="La letra del DNI en mayusculas" value="{{ old('dni') }}">
                            <label for="dni">DNI: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="direccion" id="direccion"
                                placeholder="Direccion" value="{{ old('direccion') }}">
                            <label for="direccion">Direccion: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="email" id="email"
                                placeholder="Email" value="{{ old('email') }}">
                            <label for="email">Correo electronico: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="telefono" id="telefono"
                                placeholder="Numero de Telefono" value="{{ old('telefono') }}">
                            <label for="telefono">Teléfono: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>


                        <button type="submit" class="btn btn-primary ms-auto">Añadir</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout-user>
