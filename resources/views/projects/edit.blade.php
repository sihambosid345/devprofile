<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Modifier le projet</h2>
    </x-slot>

    <form method="POST" action="{{ route('projects.update', $project) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Titre :</label>
            <input type="text" name="title" class="border rounded w-full" value="{{ $project->title }}" required>
        </div>

        <div class="mb-4">
            <label>Description :</label>
            <textarea name="description" class="border rounded w-full" required>{{ $project->description }}</textarea>
        </div>

        <div class="mb-4">
            <label>Lien :</label>
            <input type="url" name="link" class="border rounded w-full" value="{{ $project->link }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</x-app-layout>