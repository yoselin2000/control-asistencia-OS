<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear Rol</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('roles.store') }}" method="POST" class="bg-white p-4 shadow rounded">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre del rol</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre del rol" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="permissions" class="form-label">Permisos</label>
                        <div class="form-check">
                            @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" id="permission_{{ $permission->id }}">
                                    <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-grid text-center">
                        <button type="submit" class="btn btn-success">Crear Rol</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>