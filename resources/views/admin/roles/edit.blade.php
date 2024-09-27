<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Actualizar Rol</h1>
        <form action="{{ route('roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre del rol</label>
                <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="permissions" class="form-label">Permisos</label>
                <div class="form-check">
                    @foreach($permissions as $permission)
                        <div class="form-check">
                            {{-- Marcar los permisos que ya tiene el rol como seleccionados --}}
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                class="form-check-input" id="permission_{{ $permission->id }}"
                                {{-- Verifica si el rol tiene este permiso y lo marca --}}
                                @if($role->permissions->contains($permission->id)) checked @endif
                            >
                            <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-success">Actualizar Rol</button>
                <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>