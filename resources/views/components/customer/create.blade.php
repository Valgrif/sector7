<div class="container-fluid ml-2">

    <form action="{{ route('create-customer') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre"
                value="{{ old('nombre') }}">
            <label for="nombre">Nombre: </label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion"
                value="{{ old('direccion') }}">
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
            <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Numero de Telefono"
                value="{{ old('telefono') }}">
            <label for="telefono">Teléfono: </label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="encargado" id="encargado" placeholder="Encargado"
                value="{{ old('encargado') }}">
            <label for="encargado">Encargado: </label>
        </div>
        <button type="submit" class="btn btn-primary ms-auto">Añadir</button>

    </form>

</div>
