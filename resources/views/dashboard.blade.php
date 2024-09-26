<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                <form action="{{ route('attendance.markEntry') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="user_ip" class="block text-gray-700 text-sm font-bold mb-2">Dirección IP</label>
                        <input type="text" name="user_ip" id="user_ip" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingresa tu dirección IP" required>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Marcar Entrada
                    </button>
                </form>
                @if (session('message'))
                    <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="mt-6"></div> 
                <form action="{{ route('attendance.markExit') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Marcar Salida
                    </button>
                </form>
                @if (session('error'))
                    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

<!-- <script>
    async function markEntry() {
        try {
        let response = await fetch('{{ route('attendance.markEntry') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        });

        if (!response.ok) {
            console.error('Error en la respuesta:', response.status, await response.text());
            return;
        }

        let data = await response.json();
        console.log('User IP:', data.user_ip);
        if (data.error) {
            console.error(data.error);
        } else {
            console.log(data.message);
        }
    } catch (error) {
        console.error('Error:', error);
    }
    }

    // Llama a la función para probar
    markEntry();
</script> -->
