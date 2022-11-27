<x-layout-user>
    <div class="container m-4">
        <div class="row">
            <div class="col-md-7">
                <h2>{{$customer->nombre}}</h2>
                <h3>Encargado: <span class="text-muted">{{$customer->encargado}}</span></h3>
                <p>Cif: {{$customer->cif}}</p>
                <p >Direccion: {{$customer->direccion}}</p>
                <p >Telefono: {{$customer->telefono}}</p>
                <p >Correo: {{$customer->mail}}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <h3> Partes de trabajo</h3>
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
                            <tr onclick="window.location='{{ route('show-report', $report->slug) }}'">
                                <td scope="row">{{ $report->id }}</td>
                                <td>{{ $report->producto }}</td>
                                <td>{{ $report->incidencia }}</td>
                                <td>{{ $report->estado }}</td>
                                <td>
                                    <form action="{{ route('delete-report') }}" method="post">
                                        @csrf
                                        <a class="btn btn-primary" href="">
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
</x-layout-user>






