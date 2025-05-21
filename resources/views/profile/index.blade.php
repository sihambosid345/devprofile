<x-app-layout>




    <x-slot name="header">
        @if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded my-2">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded my-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h2 class="text-xl font-semibold">Mon Profil</h2>
    </x-slot>

    <h3 class="text-lg font-bold mt-4">Mes informations</h3>
    <p><strong>Nom :</strong> {{ $user->name }}</p>
    <p><strong>Titre :</strong> {{ $user->title }}</p>
    <p><strong>Bio :</strong> {{ $user->bio }}</p>
    <h4 class="mt-4 font-bold">Modifier mes informations</h4>
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nom"
           class="border rounded w-full my-1">
    <input type="text" name="title" value="{{ old('title', $user->title) }}" placeholder="Titre"
           class="border rounded w-full my-1">
    <textarea name="bio" placeholder="Bio"
              class="border rounded w-full my-1">{{ old('bio', $user->bio) }}</textarea>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">Mettre à jour</button>
</form>

    <a href="{{ route('pdf.generate', $user->username) }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">
        Télécharger mon CV
    </a>

    <hr class="my-6">

    <h3 class="text-lg font-bold">Mes Projets</h3>
    <a href="{{ route('projects.create') }}" class="bg-green-500 text-white px-3 py-1 rounded">Ajouter un projet</a>
    <ul class="mt-2">
        @foreach ($projects as $project)
            <li class="mt-1">
                <strong>{{ $project->title }}</strong> - {{ $project->description }}
                @if ($project->link) (<a href="{{ $project->link }}" target="_blank">Lien</a>) @endif
                <a href="{{ route('projects.edit', $project) }}" class="text-blue-500 ml-2">Modifier</a>
                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Supprimer ce projet ?')">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>

    <hr class="my-6">

    <h3 class="text-lg font-bold">Mes Compétences</h3>
    <a href="{{ route('skills.create') }}" class="bg-green-500 text-white px-3 py-1 rounded">Ajouter une compétence</a>
    <ul class="mt-2">
        @foreach ($skills as $skill)
            <li class="mt-1">
                {{ $skill->name }}
                <a href="{{ route('skills.edit', $skill) }}" class="text-blue-500 ml-2">Modifier</a>
                <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Supprimer cette compétence ?')">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>