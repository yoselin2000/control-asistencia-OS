<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Detalles del Rol</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="bg-white p-4 shadow rounded">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre del rol</label>
                        <input type="text" class="form-control" value="{{ $role->name }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="permissions" class="form-label">Permisos Asignados</label>
                        <ul class="list-group">
                            @foreach($rolePermissions as $permission)
                                <li class="list-group-item">{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="d-grid text-center mt-4">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Volver a la lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>