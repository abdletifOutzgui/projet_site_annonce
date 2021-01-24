@extends('layouts.app')


@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Mes messages</h3>
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
                            <th>Message</th>
                            <th>Candidat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $message)
                            <tr>
                                <td scope="row">{{ $message->id }}</td>
                                <td>{{ Str::limit($message->title, 20) }}</td>
                                <td>{{ Str::limit($message->message, 30) }}</td>
                                <td>{{ $message->getDestinataire()->full_name }}</td>
                                <td>
                                    <form class="d-flex" action="{{ route("messages.destroy", $message) }}" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <button title="Supprimer ce message" type="submit" onclick="return confirm('Vous êtes sur de vouloir supprimé ce message ?')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="7" align="center">Aucun message(s) à votre actif !  </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
