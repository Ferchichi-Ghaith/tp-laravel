<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight">
            {{ __('Épreuves') }}
        </h2>
    </x-slot>

    <div class="py-10">
        @if(session('success'))
            <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-lg mb-6 opacity-100 transition-opacity duration-1000 shadow-md mx-8" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-6">Liste des Épreuves</h3>
                    <div class="flex justify-between mb-6">
                        <button onclick="window.location='{{ route('epreuve.create') }}'" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-md shadow-md transition-transform transform hover:scale-105">
                            Créer une nouvelle épreuve
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-4 px-6 text-left text-gray-600 font-medium">ID</th>
                                    <th class="py-4 px-6 text-left text-gray-600 font-medium">Matiere</th>
                                    <th class="py-4 px-6 text-left text-gray-600 font-medium">Type</th>
                                    <th class="py-4 px-6 text-left text-gray-600 font-medium">Debut</th>
                                    <th class="py-4 px-6 text-left text-gray-600 font-medium">Fin</th>
                                    <th class="py-4 px-6 text-left text-gray-600 font-medium">Lieu</th>
                                    <th class="py-4 px-6 text-center text-gray-600 font-medium">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($epreuves as $epreuve)
                                    <tr class="hover:bg-gray-50 transition-all">
                                        <td class="py-4 px-6 border-b">{{ $epreuve->id }}</td>
                                        <td class="py-4 px-6 border-b">{{ $epreuve->matiere->name }}</td>
                                        <td class="py-4 px-6 border-b">{{ $epreuve->type }}</td>
                                        <td class="py-4 px-6 border-b">{{ $epreuve->time_begin }}</td>
                                        <td class="py-4 px-6 border-b">{{ $epreuve->time_end }}</td>
                                        <td class="py-4 px-6 border-b">{{ $epreuve->classroom }}</td>
                                        <td class="py-4 px-6 border-b">
                                            <div class="flex space-x-3 justify-center">
                                                <!-- Edit Button -->
                                                <button onclick="window.location='{{ route('epreuve.edit', $epreuve->id) }}'"
                                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition-transform transform hover:scale-105">
                                                    Edit
                                                </button>

                                                <!-- Delete Button -->
                                                <form action="{{ route('epreuve.destroy', $epreuve->id) }}" method="POST" onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition-transform transform hover:scale-105">
                                                        Delete
                                                    </button>
                                                </form>

                                              
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-10 text-center text-gray-500 font-medium">
                                            Aucun épreuve dans la base de données.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>

<script>
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer cette épreuve ? Cette action est irréversible.');
    }

    document.addEventListener("DOMContentLoaded", function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.classList.add('opacity-0');
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 1000);
            }, 2000);
        }
    });
</script>
