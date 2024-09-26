<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Reporte de Asistencias
        </h2>
    </x-slot>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="border px-4 py-2">User ID</th>
                    <th class="border px-4 py-2">Usuario</th>
                    <th class="border px-4 py-2">Hora de Entrada</th>
                    <th class="border px-4 py-2">Hora de Salida</th>
                    <th class="border px-4 py-2">IP del Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td class="border px-4 py-2">{{ $attendance->user_id }}</td>
                        <td class="border px-4 py-2">{{ $attendance->user_name }}</td>
                        <td class="border px-4 py-2">{{ $attendance->marked_at }}</td>
                        <td class="border px-4 py-2">{{ $attendance->left_at }}</td>
                        <td class="border px-4 py-2">{{ $attendance->user_ip }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>