<x-layout-user>

    <div class="container m-4">
        <div class="container-fluid ml-2">
            <x-layout-user.errors />


            <form action="{{ route('update-report', $report->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('patch')
                <div class="form-floating mb-3">
                    <select name="customer_id" id="customer_id" class="form-select">
                        <option value="">--- Cliente ---</option>
                        @foreach ($customers as $customer)
                            <option
                                value="{{ $customer->id }}"{{ $customer->id == old('customer_id') ? 'selected' : '' }}>
                                {{ $customer->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <select name="responsable" id="responsable" class="form-select">
                        <option value="">--- Técnico encargado ---</option>
                        @foreach ($employees as $employee)
                            <option
                                value="{{ $employee->id }}"{{ $employee->id == old('responsable') ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-floating mb-1">
                    <input class="form-control" type="text" name="numeroDeSerie" id="numeroDeSerie"
                        placeholder="Número de serie del equipo" value="{{ $report->numeroDeSerie }}">
                    <label for="numeroDeSerie">Nº de serie: </label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="producto" id="producto"
                        placeholder="Tipo de producto" value="{{ $report->producto }}">
                    <label for="producto">Producto: </label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="incidencia" id="incidencia"
                        placeholder="Descripción del problema" value="{{ $report->incidencia }}">
                    <label for="incidencia">Incidencia: </label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="observaciones" id="observaciones"
                        placeholder="Observaciones del estado del equipo" value="{{ $report->observaciones }}">
                    <label for="observaciones">Observaciones: </label>
                </div>

                <div class="form-floating mb-3">
                    <select name="estado" id="estado" class="form-select" value="{{$report->estado}}">
                        <option value="En cola">En cola</option>
                        <option value="Diagnostico">En revisión</option>
                        <option value="Presupuestado">Presupuestado</option>
                        <option value="Pendiente de retirada">Pendiente de retirada</option>
                        <option value="Entregado">Entregado</option>

                    </select>
                </div>

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="fotos" id="fotos">
                </div>


                <button type="submit" class="btn btn-primary ms-auto">Actualizar</button>
                <a class="btn btn-danger" href="/app/report-list"><i class="bi bi-x-circle-fill"></i></a>

            </form>
        </div>
</x-layout-user>
