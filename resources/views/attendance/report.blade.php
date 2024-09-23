<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Reporte de Asistencias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">User ID</th>
                            <th class="border px-4 py-2">Nombre de Usuario</th>
                            <th class="border px-4 py-2">Hora de Entrada</th>
                            <th class="border px-4 py-2">Hora de Salida</th>
                            <th class="border px-4 py-2">IP del Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td class="border px-4 py-2">{{ $attendance->id }}</td>
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
        </div>
    </div>
</x-app-layout>