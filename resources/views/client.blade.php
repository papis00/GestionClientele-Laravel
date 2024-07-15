@extends("base")

@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm pf-2">
    <h3 class="border-bottom pb-2 mb-4">Liste des clients</h3>

    <form method="GET" action="{{ url('/search') }}" class="d-flex " role="search">
        <input class="form-control me-2" type="search" placeholder="Recherche Client" aria-label="Search" name="search">
        <button class="btn btn-primary" type="submit">Recherche</button>
    </form>


    <div>
        <div class="d-flex justify-content-between mb-4 mt-3">
            {{$client->links()}}

            <div><a href="{{ route('client.create')}}" class="btn btn-primary d-flex ">Ajouter un client</a></div>
        </div>
        <div class="d-flex  mb-3">
            <a href="{{ route('generatePDF')}}" class="btn btn-primary d-flex ">Exporter en PDF</a>
        </div>



        @if(session()->has("successDelete"))
        <div class="alert alert-success">
            <h3>{{ session()->get('successDelete') }}</h3>
        </div>
        @endif

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
                    <th scope="row">{{ $loop->index + 1 }}</th>
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

    </div>

</div>
@endsection
