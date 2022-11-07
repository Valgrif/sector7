<x-layout>
    <div class="container-fluid">
        <div class="row flex-nowap">
            <x-layout-user.sidebar />
            <div class="col-auto col-md-9 col-xl-10">
                {{ $slot }}
            </div>
        </div>

    </div>
</x-layout>
