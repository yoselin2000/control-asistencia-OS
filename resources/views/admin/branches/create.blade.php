<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('branches.store') }}" method="POST" class="bg-white p-4 shadow rounded">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre de la sucursal</label>
                        <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="ssid" class="form-label">Nombre de la Red (SSID)</label>
                        <input type="text" class="form-control" name="ssid" id="ssid" required value="{{ old('ssid') }}">
                    </div>
                    <div class="d-grid text-center">
                        <button type="submit" class="btn btn-success">Crear</button>
                        <a href="{{ route('branches.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>