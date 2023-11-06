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
        </div>
    </div>
</x-layout-user>
