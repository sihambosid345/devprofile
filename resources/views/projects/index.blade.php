<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Mes projets</h2>
    </x-slot>

    <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter un projet</a>

    <ul class="mt-4">
        @foreach ($projects as $project)
            <li class="mb-2">
                <strong>{{ $project->title }}</strong> - {{ $project->description }}
                <br>
                <a href="{{ route('projects.edit', $project) }}" class="text-blue-500">Modifier</a>
                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-500" onclick="return confirm('Supprimer ce projet ?')" type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>