@extends('base')


@section('contenu')

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Email</th>
            <th scope="col">Sexe</th>
            <th scope="col">Statut</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($client as $clients)
        <tr>
            <th scope="row">{{ $clients->id }}</th>
            <td>{{ $clients->nom }}</td>
            <td>{{ $clients->adresse }}</td>
            <td>{{ $clients->telephone }}</td>
            <td>{{ $clients->email }}</td>
            <td>{{ $clients->sexe }}</td>
            <td>{{ $clients->statut }}</td>
            <td class="col-3">
                <a href="{{route('client.modifier', ['client'=>$clients->id])}}" class="btn btn-info ">Modifier</a>
                <a href="#" class="btn btn-danger " onclick="if(confirm('Voulez-vous vraiment supprimer ce client ?')){document.getElementById('form-{{$clients->id}}').submit() }">Supprimer</a>
                <form id="form-{{$clients->id}}" action="{{route('client.supprimer', ['client'=>$clients->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
