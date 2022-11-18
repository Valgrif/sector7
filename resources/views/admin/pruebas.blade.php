@foreach ($events as $event)
@if ($event->end == now()->toDateString())
    <div class="row mb-2">
        <div class="col-12 col-md-2">
            {{ $event->start }}
        </div>
        <div class="col-12 col-md-2">
            {{ $event->end }}
        </div>
        <div class="col-12 col-md-8">
            {{ $event->title }}
        </div>
    </div>
@else
    <p>No hay nada programado en el Calendario para hoy</p>
@endif
@endforeach
