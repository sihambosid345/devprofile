<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Mes compétences</h2>
    </x-slot>

    <a href="{{ route('skills.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter une compétence</a>

    <ul class="mt-4">
        @foreach ($skills as $skill)
            <li class="mb-2">
                {{ $skill->name }}
                <a href="{{ route('skills.edit', $skill) }}" class="text-blue-500">Modifier</a>
                <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-500" onclick="return confirm('Supprimer cette compétence ?')" type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>