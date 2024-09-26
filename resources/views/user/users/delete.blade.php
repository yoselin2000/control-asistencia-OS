<!-- creo que no es necesario esto ya esta en el index -->
<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Eliminar Usuario</h1>

        <div class="alert alert-warning" role="alert">
            ¿Estás segurooo de que deseas eliminar a "{{ $user->name }}"?
        </div>

        <form action="{{ route('users.destroy', $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>