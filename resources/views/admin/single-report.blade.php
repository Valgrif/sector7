<x-layout-user>
    <div class="container">
        <div class="col-lg4">
            <img src="{{$report->fotos}}" alt="foto recepcion" class="bd-placeholder-img rounded-circle" width="140" height="140">
            <h2>Parte de incidendia Nº{{$report->id}}</h2>
            <h3>Cliente:</h3>
            <p>Ténico encargado </p>
            <p>Producto: {{$report->producto}}</p>
            <p>Incidencia: {{$report->incidencia}}</p>
            <p>Observaciones: {{$report->observaciones}}</p>
            <p>Estado: {{$report->estado}}</p>
            <p>Fecha de entrada: {{$report->timestamps}}</p>
        </div>
    </div>

    </x-layout-user>
