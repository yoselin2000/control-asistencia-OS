<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear permiso</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('permissions.store') }}" method="POST" class="bg-white p-4 shadow rounded">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre del permiso</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre del permiso" required>
                    </div>

                    <div class="d-grid text-center">
                        <button type="submit" class="btn btn-success">Crear</button>
                        <a href="{{ route('permissions.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>