<x-layout-user>
    <div class="col-auto col-md-9 col-xl-10 px-sm-2 px-2 py-2 ">
        <h2>{{$customer->nombre}}</h2>
        <div class="col-12 col-md-8">
            <h3 class="text-muted">Encargado: {{$customer->encargado}}</h3>
            <p >Direccion: {{$customer->direccion}}</p>
            <p >Telefono: {{$customer->telefono}}</p>
            <p >Correo: {{$customer->mail}}</p>
        </div>
        <h3>Partes</h3>

    </div>
</x-layout-user>
