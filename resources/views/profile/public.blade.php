<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
Profil de {{ $user->name }}
</h2>
</x-slot>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 bg-white border-b border-gray-200">
<h3 class="text-lg font-bold">{{ $user->title }}</h3>
<p>{{ $user->bio }}</p>
<h4 class="mt-4 font-semibold">Projets</h4>
<ul>
@foreach ($user->projects as $project)
<li>{{ $project->title }} - {{
$project->description }}</li>
@endforeach
</ul>
<h4 class="mt-4 font-semibold">Compétences</h4>
<ul>
@foreach ($user->skills as $skill)
<li>{{ $skill->name }}</li>
@endforeach
</ul>
<a href="{{ route('pdf.generate', $user->username) }}"
class="mt-4 inline-block bg-blue-500 text-white px-4 py-2
rounded">Télécharger CV</a>
</div>
</div>
</div>
</div>
</x-app-layout>