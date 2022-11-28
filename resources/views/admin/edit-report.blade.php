<x-layout-user>

    <div class="container m-4">
        <div class="container-fluid ml-2">
            <x-layout-user.errors />


            <form action="{{ route('update-report', $report->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('patch')
                <div class="form-floating mb-3">
                    <select name="customer_id" id="customer_id" class="form-select">
                        @foreach ($customers as $customer)
                            <option
                                value="{{ $customer->id }}"{{ $customer['id'] == $report['customer_id'] ? 'selected' : '' }}>
                                {{ $customer->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <select name="responsable" id="responsable" class="form-select">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $employee['id'] == $report['responsable'] ? 'selected' : '' }}>
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
                    <select name="estado" id="estado" class="form-select">
                        <option value="En cola" {{$report['estado'] == 'En cola' ? 'selected' : ''}}>En cola</option>
                        <option value="Diagnostico" {{$report['estado']== 'Diagnostico' ? 'selected' : ''}}>En revisión</option>
                        <option value="Presupuestado" {{$report['estado'] == 'Presupuestado' ? 'selected' : ''}}>Presupuestado</option>
                        <option value="Pendiente de retirada" {{$report['estado'] == 'Pendiente de retirada' ? 'selected' : ''}}>Pendiente de retirada</option>
                        <option value="Entregado" {{$report['estado'] == 'Entregado' ? 'selected' : ''}}>Entregado</option>
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" name="reparacion" id="reparacion" placeholder="reparacion" style="height: 300px"><?php echo $report->reparacion; ?></textarea>
                    <label for="reparacion">Diagnostico y reparación aplicada: </label>
                </div>


                <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="fotos" id="fotos">
                </div>


                <button type="submit" class="btn btn-primary ms-auto">Actualizar</button>
                <a class="btn btn-danger" href="/app/report-list"><i class="bi bi-x-circle-fill"></i></a>

            </form>
        </div>
</x-layout-user>
