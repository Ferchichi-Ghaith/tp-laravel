<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight">
            {{ __('Modifier l\'Épreuve') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-6">Modifier l'épreuve - {{ $epreuve->name }}</h3>
                    <form method="POST" action="{{ route('epreuve.update', $epreuve->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Date Field -->
                        <div class="mb-6">
                            <label for="date" class="block text-gray-600">Date de l'épreuve</label>
                            <input type="date" id="date" name="date" value="{{ old('date', $epreuve->date->format('Y-m-d')) }}" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Time Begin Field -->
                        <div class="mb-6">
                            <label for="time_begin" class="block text-gray-600">Heure de début</label>
                            <input type="time" id="time_begin" name="time_begin" value="{{ old('time_begin', $epreuve->time_begin) }}" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Time End Field -->
                        <div class="mb-6">
                            <label for="time_end" class="block text-gray-600">Heure de fin</label>
                            <input type="time" id="time_end" name="time_end" value="{{ old('time_end', $epreuve->time_end) }}" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Classroom Field -->
                        <div class="mb-6">
                            <label for="classroom" class="block text-gray-600">Salle</label>
                            <input type="text" id="classroom" name="classroom" value="{{ old('classroom', $epreuve->classroom) }}" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Type of Épreuve Field (DS or DC) -->
                        <div class="mb-6">
                            <label for="type" class="block text-gray-600">Type d'Épreuve</label>
                            <select id="type" name="type" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="DS" {{ old('type', $epreuve->type) == 'DS' ? 'selected' : '' }}>DS</option>
                                <option value="DC" {{ old('type', $epreuve->type) == 'DC' ? 'selected' : '' }}>DC</option>
                            </select>
                        </div>

                        <!-- Matière Field -->
                        <div class="mb-6">
                            <label for="matiere_id" class="block text-gray-600">Matière</label>
                            <select id="matiere_id" name="matiere_id" class="mt-2 w-full border-gray-300 rounded-md shadow-sm" required>
                                @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->id }}" {{ $epreuve->matiere_id == $matiere->id ? 'selected' : '' }}>
                                        {{ $matiere->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md shadow-md">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
