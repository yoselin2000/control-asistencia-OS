<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Permisos</h1>
        <div class="text-right mb-3">
            <a href="{{ route('permissions.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Crear Permiso
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este permiso?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $permissions->links() }} <!-- Paginación -->
    </div>
</x-app-layout>