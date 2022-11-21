<x-layout-user>
    <div class="col-auto col-md-9 col-xl-10 px-sm-2 px-2 py-2 ">

        <h1>Bienvenido {{ auth()->user()->name }}</h1>
        <p> Hoy es {{ now()->toDateString() }}</p>
        <p>Tienes X partes pendientes</p>

    </div>
</x-layout-user>
