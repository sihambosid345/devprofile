<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Ajouter un projet</h2>
    </x-slot>

    <form method="POST" action="{{ route('projects.store') }}">
        @csrf

        <div class="mb-4">
            <label>Titre :</label>
            <input type="text" name="title" class="border rounded w-full" required>
        </div>

        <div class="mb-4">
            <label>Description :</label>
            <textarea name="description" class="border rounded w-full" required></textarea>
        </div>

        <div class="mb-4">
            <label>Lien (optionnel) :</label>
            <input type="url" name="link" class="border rounded w-full">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</x-app-layout>