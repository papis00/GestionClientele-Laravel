<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>{{ $title }}</title>

</head>

<body>

    <h2>{{ $title }}</h2>
    <h2>{{ $date }}</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Sexe</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->nom }}</td>
                <td>{{ $client->adresse }}</td>
                <td>{{ $client->telephone }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->sexe }}</td>
                <td>{{ $client->statut }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
