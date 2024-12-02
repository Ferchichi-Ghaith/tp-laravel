<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight">
            {{ __('Modifier la Matière') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    <h3 class="text-xl font-semibold mb-6">Modifier Matière</h3>

                    <form method="POST" action="{{ route('matiere.update', $matiere->id) }}">
                        @csrf
                        @method('PUT') <!-- Specify the PUT method -->

                        <!-- Name Field -->
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nom de la Matière</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $matiere->name) }}" required
                                class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>

                        <!-- Coefficient Field -->
                        <div class="mb-6">
                            <label for="coefficient" class="block text-gray-700 font-medium mb-2">Coefficient</label>
                            <input type="number" step="0.1" name="coefficient" id="coefficient" value="{{ old('coefficient', $matiere->coefficient) }}" required
                                class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        </div>

                        <!-- Description Field -->
                        <div class="mb-6">
                            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                            <textarea name="description" id="description" rows="4" required
                                class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition">{{ old('description', $matiere->description) }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md shadow-md transition-transform transform hover:scale-105">
                                Mettre à Jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
