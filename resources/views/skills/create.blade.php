<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Ajouter une compétence</h2>
    </x-slot>

    <form method="POST" action="{{ route('skills.store') }}">
        @csrf

        <div class="mb-4">
            <label>Nom de la compétence :</label>
            <input type="text" name="name" class="border rounded w-full" required>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</x-app-layout>