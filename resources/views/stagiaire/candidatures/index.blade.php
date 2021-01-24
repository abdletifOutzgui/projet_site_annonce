
@extends('layouts.app')


@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Mes Candidatures</h3>
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
                            <th>Lettre de motivation</th>
                            <th>CV</th>
                            <th>Offre</th>
                            <th>Date de dépôt</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($candidatures as $candidature)
                            <tr>
                                <td scope="row">{{ $candidature->id }}</td>
                                <td>{{ Str::limit($candidature->lettre_de_motivation,25) }}</td>
                                <td>
                                    <a href="/storage/{{ $candidature->CV }}" title="Mon CV" target="_blank" class="text-dark" style="font-size: 25px"><i class="fas fa-file-download"></i></a>
                                </td>
                                <td>{{ $candidature->offre->title }}</td>
                                <td>{{ $candidature->created_at->format("d-m-Y") }}</td>
                                <td>
                                    <form class="d-flex" action="{{ route("postules.destroy",$candidature) }}" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <a title="Editer ma candidature" href="{{ route("postules.edit", $candidature) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>&nbsp;
                                        <button title="Supprimer cette candidature" type="submit" onclick="return confirm('Vous êtes de vouloir supprimé cette candidature à ce offre?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">Aucune candidature(s) !</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="pagination justify-content-center flex">
                    {{ $candidatures->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>

@endsection
