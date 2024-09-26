<x-app-layout>
    <div class="container mt-4">
        <h1 class="text-center">Lista de Usuarios</h1>
        <div class="text-right mb-3">
            <a href="{{ route('roles.create') }}" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Crear Rol
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('roles.show', $role) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> {{-- Icono para visualizar --}}
                                </a>
                                
                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> {{-- Icono de edición --}}
                                </a>
                                <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
