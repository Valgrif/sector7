<x-layout-user>
    <div class="col-auto col-md-9 col-xl-10 px-sm-2 px-2 py-2 ">

        <h1>Bienvenido {{ auth()->user()->name }}</h1>
        <p> Hoy es {{ now()->toDateString() }}</p>
        <p>Tienes X partes pendientes</p>

        @foreach ($events as $event)
            @if ($event->end == now()->toDateString())
                <div class="row mb-2">
                    <div class="col-12 col-md-3">
                        {{ $event->start }}
                    </div>
                    <div class="col-12 col-md-2">
                        {{ $event->title }}
                    </div>
                </div>
            @endif
        @endforeach


    </div>
</x-layout-user>
