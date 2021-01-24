
@extends('layouts.app')


@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Mes demandes</h3>
    </div>

    <div class="container">
        <div class="row m-5">
            <div class="col-md-3">
                 @include('includes._sidebar')
            </div>

            <div class="col-md-9">

                <x-success success="success" type="success"></x-success>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Durée</th>
                            <th>Type</th>
                            <th>Ville</th>
                            <th>Résumé</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($demandes as $demande)
                            <tr>
                                <td scope="row">{{ $demande->id }}</td>
                                <td>{{ Str::limit($demande->title,20) }}</td>
                                <td>{{ $demande->duree }} mois</td>
                                <td>{{ $demande->type }}</td>
                                <td>{{ $demande->ville }}</td>
                                <td>{{ Str::limit($demande->poste_recherche,30) }}</td>
                                <td>
                                    <form class="d-flex" action="{{ route("demandes.destroy",$demande) }}" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <a title="Editer ma demande" href="{{ route("demandes.edit", $demande) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>&nbsp;
                                        <button title="Supprimer cette demande" type="submit" onclick="return confirm('Vous êtes de vouloir supprimé cette demande ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">Aucune demande(s) à votre actif !
                                    <a href="/espace/offres/create">Créer offre</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
