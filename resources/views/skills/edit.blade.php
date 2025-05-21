<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Modifier la compétence</h2>
    </x-slot>

    <form method="POST" action="{{ route('skills.update', $skill) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nom :</label>
            <input type="text" name="name" class="border rounded w-full" value="{{ $skill->name }}" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</x-app-layout>