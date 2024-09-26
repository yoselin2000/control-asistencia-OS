<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear Usuario</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('users.store') }}" method="POST" class="bg-white p-4 shadow rounded">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Ingresa el nombre" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Ingresa el email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Ingresa la contraseña" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirma la contraseña" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="role" class="form-label">Asignar Rol</label>
                        <select name="role" class="form-control" required>
                            <option value="">Selecciona un rol</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="d-grid text-center">
                        <button type="submit" class="btn btn-success">Crear Usuario</button>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>