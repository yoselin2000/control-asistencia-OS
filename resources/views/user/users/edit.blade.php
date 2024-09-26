<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Usuario</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT') <!-- Esto le dice a Laravel que es una solicitud PUT -->
            
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            
            <div class="form-group">
                <label for="password">Nueva Contraseña (opcional)</label>
                <input type="password" name="password" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>