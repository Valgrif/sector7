<div class="container-fluid ml-2">
    <form action="{{ route('create-employee') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
            <label for="name">Nombre: </label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}">
            <label for="short_description">Apellidos: </label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="dni" id="dni" placeholder="La letra del DNI en mayusculas" value="{{ old('dni') }}">
            <label for="short_description">DNI: </label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion" value="{{ old('direccion') }}">
            <label for="name">Direccion: </label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            <label for="name">Correo electronico: </label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Numero de Telefono" value="{{ old('telefono') }}">
            <label for="name">Teléfono: </label>
        </div>
        <div class="form-floating mb-3">
            <label for="foto" class="form-label"></label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        </div> <!-- FIN COLUMNAS -->


        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
</div>
