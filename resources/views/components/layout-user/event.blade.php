@props(['events'])
@if (count($events) != 0)
@foreach ($events as $event)
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
@endforeach
@else <div>No hay nada programado para hoy</div>

@endif
