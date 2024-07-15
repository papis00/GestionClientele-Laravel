@extends("base")


@section("contenu")

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Edition d'un client</h3>

    <div class="mt-4">

        @if(session()->has("success"))
        <div class="alert alert-success">
            <h3>{{ session()->get('success') }}</h3>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger" <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <form class="row g-3" method="post" action="{{route('client.update', ['client'=>$client->id])}}">

            @csrf

            <input type="hidden" name="_method" value="put">

            <div class="col-md-6">
                <label for="nom" class="form-label">Nom du client</label>
                <input type="text" class="form-control" name="nom" value="{{$client->nom}}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{$client->email}}">
            </div>
            <div class="col-12">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" value="{{$client->adresse}}">
            </div>
            <div class="col-12">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" name="telephone" value="{{$client->telephone}}">
            </div>
            <div class="col-md-4">
                <label for="sexe" class="form-label">Sexe</label>
                <select id="inputState" class="form-select" name="sexe">
                    <option value="{{$client->sexe}}">Choisir...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="statut" class="form-label">Statut</label>
                <select id="inputState" class="form-select" name="statut">
                    <option value="{{$client->statut}}">Choisir...</option>
                    <option value="Actif">Actif</option>
                    <option value="Inactif">Inactif</option>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ route('client') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>

    </div>
</div>

@endsection
