<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Actualizar Permiso</h1>

        <form action="{{ route('permissions.store') }}" method="POST" class="bg-white p-4 shadow rounded">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="name">Nombre del Permiso</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre del permiso" required>
            </div>

            <div class="d-grid text-center">
                <button type="submit" class="btn btn-success">Crear Permiso</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>