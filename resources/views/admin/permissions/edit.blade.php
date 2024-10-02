<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Actualizar Rol</h1>
        <form action="{{ route('permissions.update', $permission) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre del permiso</label>
                <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-success">Actualizar Rol</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>