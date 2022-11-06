<x-layout>
    <x-layout-user.sidebar />

    <h1>Cliente Nuevo</h1>
    <form action="{{ route('newCustomer') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="name" id="name" placeholder="Nombre del Producto" value="{{ old('name') }}">
            <label for="name">Nombre: </label>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <!-- COLUMNA IZQ -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" style="height: 50rem" name="content" id="content" placeholder="Descripción:">{{ old('content') }}</textarea>
                    <label for="content">Descripción:</label>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <!-- COLUMNA DERECHA -->
                <div class="form-floating mb-3">
                    <label for="picture" class="form-label"></label>
                    <input type="file" class="form-control" name="picture" id="picture">
                </div>
                <div class="input-group mb3">
                    <div class="form-floating">
                        <input class="form-control" type="number" name="price" id="price"
                            placeholder="Precio:" min="0" step="0.01" value="{{ old('price') }}">
                        <label for="price">Precio:</label>
                    </div>
                    <span class="input-group-text">€</span>
                </div>
                <div class="input-group mb3">
                    <div class="form-floating">
                        <input class="form-control" type="number" name="stock" id="stock"
                            placeholder="Stock:" min="0" value="{{ old('stock') }}">
                        <label for="stock">Stock:</label>
                    </div>
                    <span class="input-group-text">Uds</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Categoría</span>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">--- Slecciona una categoría ---</option>

                    </select>
                </div>
                <div class="mb-3">
                    <h6>Etiquetas</h6>
                    <div class="row">

                    </div>
                </div>
            </div>
        </div> <!-- FIN COLUMNAS -->


        <button type="submit" class="btn btn-primary">Crear producto</button>
    </form>
</x-layout>
