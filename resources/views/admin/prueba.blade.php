

<div class="container mb-3">
    <div class="row row-cols-auto">
        <div class="col-12 col-md-3">
            EMPRESA
        </div>
        <div class="col-12 col-md-2">
            ENCARGADO
        </div>
        <div class="col-12 col-md-2">
            TELEFONO
        </div>
        <div class="col-12 col-md-3">
            EMAIL
        </div>
        <div class="col-12 col-md-2">
            ACCIONES
        </div>
    </div>
    <hr>

    @foreach ($customers as $customer)
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                {{ $customer->nombre }}
            </div>
            <div class="col-12 col-md-2">
                {{ $customer->encargado }}
            </div>
            <div class="col-12 col-md-2">
                {{ $customer->telefono }}
            </div>
            <div class="col-12 col-md-3">
                {{ $customer->mail }}
            </div>
            <div class="col-12 col-md-1">
                <a class="btn btn-primary" href="{{ route('edit-customer', $customer->id) }}">
                    Editar</a>
            </div>
            <div class="col-12 col-md-1">
                <form action="{{ route('delete-customer') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value={{$customer->id}}>
                    <button class="btn btn-danger" type="submit">Borrar </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
