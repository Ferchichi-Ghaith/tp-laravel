<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight">
            {{ __('Créer une nouvelle Épreuve') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-6">Créer une nouvelle épreuve</h3>
                    <form method="POST" action="{{ route('epreuve.store') }}">
                        @csrf

                        <!-- Date Field -->
                        <div class="mb-6">
                            <label for="date" class="block text-gray-600">Date</label>
                            <input type="date" id="date" name="date" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Time Begin Field -->
                        <div class="mb-6">
                            <label for="time_begin" class="block text-gray-600">Heure de début (AM uniquement)</label>
                            <input type="time" id="time_begin" name="time_begin" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required
                                   min="00:00" max="11:59">
                        </div>

                        <!-- Time End Field -->
                        <div class="mb-6">
                            <label for="time_end" class="block text-gray-600">Heure de fin (AM uniquement)</label>
                            <input type="time" id="time_end" name="time_end" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required
                                   min="00:00" max="11:59">
                        </div>

                        <!-- Classroom Field -->
                        <div class="mb-6">
                            <label for="classroom" class="block text-gray-600">Salle</label>
                            <input type="text" id="classroom" name="classroom" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Matière Field -->
                        <div class="mb-6">
                            <label for="matiere_id" class="block text-gray-600">Matière</label>
                            <select id="matiere_id" name="matiere_id" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                                @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->id }}">{{ $matiere->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Type of Épreuve Field (DS or DC) -->
                        <div class="mb-6">
                            <label for="type" class="block text-gray-600">Type d'Épreuve</label>
                            <select id="type" name="type" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="DS">DS</option>
                                <option value="DC">DC</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md shadow-md">
                                Créer l'épreuve
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
