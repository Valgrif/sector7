<div class="container-fluid ml-2">

    <form action="{{ route('create-employee') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre"
                value="{{ old('nombre') }}">
            <label for="nombre">Nombre: </label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos"
                value="{{ old('apellidos') }}">
            <label for="apellidos">Apellidos: </label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="dni" id="dni"
                placeholder="La letra del DNI en mayusculas" value="{{ old('dni') }}">
            <label for="dni">DNI: </label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion"
                value="{{ old('direccion') }}">
            <label for="direccion">Direccion: </label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="email" id="email" placeholder="Email"
                value="{{ old('email') }}">
            <label for="email">Correo electronico: </label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Numero de Telefono"
                value="{{ old('telefono') }}">
            <label for="telefono">Teléfono: </label>
        </div>

        <div class="form-floating mb-3">
            <input type="file" class="form-control" name="foto" id="foto">
        </div>


        <button type="submit" class="btn btn-primary ms-auto">Añadir</button>

    </form>

</div>

