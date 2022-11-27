<x-layout-user>
    <div class="container m-4">
        <div class="row">
            <div class="col-md-7">
                <h2>Cliente: <span class="text-muted">{{ $customer->nombre }}</span></h2>
                <div class="container m-2">
                    <h4 class="mt-3">Técnico encargado: <span class="text-muted">{{ $employee->name }}</span></h4>
                    <p>Parte de incidendia Nº{{ $report->id }}</p>
                    <p>Nº de sere del producto: {{ $report->numeroDeSerie }}</p>
                    <p>Incidencia: {{ $report->incidencia }}</p>
                    <p>Observaciones: {{ $report->observaciones }}</p>
                    <p>Fecha de entrada: {{ $report->created_at->toDateString() }}</p>
                    <p>Reparacion: {{$report->reparacion}}</p>
                </div>
            </div>
            <div class="col-md-5">
                <img src="{{ $report->fotos }}" alt="foto recepcion"
                    class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto float-md-end"
                    width="80%" height="auto">

            </div>
            <hr>
            <div class="col">
                <h2>Diagnostico y reparación</h2>

                @if ($report['estado'] != 'Entregado')
                    <form action="{{ route('repair-report', $report->id) }}" method=post>
                        @csrf @method('patch')
                        <div class="form-floating mb-3">
                            <select name="estado" id="estado" class="form-select">
                                <option value="En cola">En cola</option>
                                <option value="Diagnostico">En revisión</option>
                                <option value="Presupuestado">Presupuestado</option>
                                <option value="Pendiente de retirada">Pendiente de retirada</option>
                                <option value="Entregado">Entregado</option>

                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="reparacion" id="reparacion" placeholder="reparacion" style="height: 300px">
                                {{$report->reparacion}}
                            </textarea>
                            <label for="reparacion">Diagnostico y reparación aplicada: </label>
                        </div>

                        <button type="submit" class="btn btn-primary ms-auto">Actualizar</button>
                    </form>
                @else
                    <div class="container ">
                        <p>Estado: {{$report->estado}}</p>
                        <p>Diagnosis: {{$report->reparacion}}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout-user>
