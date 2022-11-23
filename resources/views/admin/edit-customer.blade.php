<x-layout-user>
    <div class="container">
        <div class="container m-4">
            <div class="container-fluid ml-2">
                <x-layout-user.errors />
            <form action="{{ route('update-customer', $customer->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('patch')
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre"
                        value="{{($customer->nombre) }}">
                    <label for="nombre">Nombre: </label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="direccion" id="direccion"
                        placeholder="Direccion" value="{{ ($customer->direccion) }}">
                    <label for="direccion">Direccion: </label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="cif" id="cif"
                        placeholder="La letra del CIF en mayusculas" value="{{ ($customer->cif) }}">
                    <label for="cif">CIF: </label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="mail" id="mail" placeholder="Email"
                        value="{{ ($customer->mail) }}">
                    <label for="mail">Correo electronico: </label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="telefono" id="telefono"
                        placeholder="Numero de Telefono" value="{{ ($customer->telefono) }}">
                    <label for="telefono">Teléfono: </label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="encargado" id="encargado"
                        placeholder="Encargado" value="{{ ($customer->encargado) }}">
                    <label for="encargado">Encargado: </label>
                </div>
                <button type="submit" class="btn btn-primary ms-auto">Actualizar</button>

            </form>
        </div>
    </div>
</x-layout-user>
