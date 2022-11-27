@props(['events'])
@if (count($events) != 0)
    @foreach ($events as $event)
        <div class="col-12 col-md-8">
            {{ $event->title }}
        </div>

    @endforeach
@else
    <div>No hay nada programado para hoy</div>
@endif
