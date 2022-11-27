<x-layout-user>
    <div class="container m-4">
        <div class="rowfeaturette">
            <div class="col">
                <h1>Bienvenido <span class="text-muted">{{ auth()->user()->name }}</span></h1>
                <p> Hoy es {{ now()->toDateString() }}</p>
            </div>
            <hr>
            <h3>Eventos programados para hoy</h3>
            <p>Recuerda siempre revisar el calendario para ver las actividades de la semana</p>
            <x-calendar.event :events="$events" />
            <hr>
            <div class="col">
                <h3>Partes abiertos</h3>
            </div>
        </div>
    </div>
</x-layout-user>
