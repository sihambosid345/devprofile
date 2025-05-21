<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV de {{ $user->name }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; line-height: 1.5; }
        h1, h2, h3 { color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->title }}</h2>
    <p>{{ $user->bio }}</p>

    <h3>Projets</h3>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Lien</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->link ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Compétences</h3>
    <table>
        <thead>
            <tr>
                <th>Nom de la compétence</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>