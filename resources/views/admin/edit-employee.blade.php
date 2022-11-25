<x-layout-user>

    <div class="container m-4">
        <div class="container-fluid ml-2">
            <x-layout-user.errors />


        <form action="{{ route('update-employee', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('patch')
            <div class="form-floating mb-1">
                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre"
                    value="{{($user->name) }}">
                <label for="name">Nombre: </label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="apellidos" id="apellidos"
                    placeholder="Encargado" value="{{ ($user->apellidos) }}">
                <label for="apellidos">Apellidos: </label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="dni" id="dni"
                    placeholder="La letra del CIF en mayusculas" value="{{ ($user->dni) }}">
                <label for="dni">DNI: </label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="direccion" id="direccion"
                    placeholder="Direccion" value="{{ ($user->direccion) }}">
                <label for="direccion">Direccion: </label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="email" id="email" placeholder="Eemail"
                    value="{{ ($user->email) }}">
                <label for="email">Correo electronico: </label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="telefono" id="telefono"
                    placeholder="Numero de Telefono" value="{{ ($user->telefono) }}">
                <label for="telefono">Teléfono: </label>
            </div>

            <div class="form-floating mb-3">
                <input type="file" class="form-control" name="foto" id="foto">
            </div>

            <button type="submit" class="btn btn-primary ms-auto">Actualizar</button>
            <a  class="btn btn-danger" href="/app/employee-list"><i class="bi bi-x-circle-fill"></i></a>

        </form>
    </div>
</x-layout-user>
