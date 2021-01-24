@extends('layouts.app')


@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Mes offres</h3>
    </div>

    <div class="container">
        <div class="row m-5">
            <div class="col-md-3">
                 @include('includes._sidebar')
            </div>

            <div class="col-md-9">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Durée</th>
                            <th>Lieu</th>
                            <th>Fonction</th>
                            <th>Mission</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offres as $offre)
                            <tr>
                                <td scope="row">{{ $offre->id }}</td>
                                <td>{{ Str::limit($offre->title,20) }}</td>
                                <td>{{ $offre->duree }} mois</td>
                                <td>{{ $offre->lieu }}</td>
                                <td>{{ Str::limit($offre->fonction,30) }}</td>
                                <td>{{ Str::limit($offre->mission,30) }}</td>
                                <td>
                                    <form class="d-flex" action="{{ route("offres.destroy",$offre) }}" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <a title="Editer ce offre" href="{{ route("offres.edit",$offre) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>&nbsp;
                                        <button title="Supprimer ce offre" type="submit" onclick="return confirm('Vous êtes de vouloir supprimé ce offre ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        <button title="Mes candidatures pour ce offre" type="submit" class="ml-1 btn btn-sm btn-warning"><i class="fas fa-users"></i></button>

                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" align="center">Aucune offre(s) à votre actif !  <a href="/espace/offres/create">Créer offre</a></td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
