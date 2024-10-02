<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar</h1>
        <form action="{{ route('branches.update', $branch) }}" method="POST">
            @csrf
            @method('PUT') 
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nombre de la Red (SSID)</label>
                <input type="text" name="name" class="form-control" value="{{ $branch->name }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="ssid" class="form-label">Nombre de la Red (SSID)</label>
                <input type="text" name="ssid" class="form-control" value="{{ $branch->ssid }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Actualizar registro</button>
                <a href="{{ route('branches.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
