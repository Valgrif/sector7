<x-layout-user>
    <div class="container m-4">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">{{ $employee->name }}
                    <span class="text-muted"> {{ $employee->apellidos }}
                    </span>
                </h2>
                <p class="lead">Direccion: {{ $employee->direccion }}
                    <br>DNI: {{ $employee->dni }}
                    <br>Telefono: {{ $employee->telefono }}
                    <br>Correo: {{ $employee->email }}
                </p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto float-md-end"
                    src="{{ $employee->foto }}" alt="{{ $employee->name }}" width="60%" height="auto">
            </div>
        </div>
        <hr>
        <div class="row featurette">
            <h2>Trabajos realizados</h2>
        </div>
        <div class="table-responsive-sm m-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">AVERIA</th>
                        <th scope="col">ESTADO</th>
                        <th scrope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td onclick="window.location='{{ route('show-report', $report->slug) }}'" scope="row">{{ $report->id }}</td>
                            <td onclick="window.location='{{ route('show-report', $report->slug) }}'">{{ $report->producto }}</td>
                            <td onclick="window.location='{{ route('show-report', $report->slug) }}'">{{ $report->incidencia }}</td>
                            <td onclick="window.location='{{ route('show-report', $report->slug) }}'">{{ $report->estado }}</td>
                            <td>
                                <form action="{{ route('delete-report') }}" method="post" class="formEliminar">
                                    @csrf
                                    <a class="btn btn-primary" href="{{route('edit-report', $report->slug)}}">
                                        <i class="bi bi-pencil"></i></a>
                                    <input type="hidden" name="id" value={{ $report->id }}>
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-layout-user>
