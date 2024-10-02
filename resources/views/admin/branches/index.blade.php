<x-app-layout>
    <div class="container mt-4">
    <h1 class="text-center">Configuracion de redes y IP</h1>
        <div class="text-right mb-3">
            <a href="{{ route('branches.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> 
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                 <tr class="table-dark">
                        <th>Nombre de sucursal</th>
                        <th>SSID</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                        <tr>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $branch->ssid }}</td>
                            <td class="text-center">
                                <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
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