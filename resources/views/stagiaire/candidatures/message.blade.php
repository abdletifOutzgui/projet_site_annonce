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
                            <th>Recruteur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $message)
                            <tr>
                                <td scope="row">{{ $message->id }}</td>
                                <td>{{ Str::limit($message->title, 20) }}</td>
                                <td>{{ Str::limit($message->message, 30) }}</td>
                                <td>{{ $message->user->full_name }}</td>
                                <td>
                                    <a  data-target="#message-details" data-toggle="modal" title="Voir plus de details" class="text-decoration-none text-uppercase">
                                        <i class="fas fa-plus ml-2 text-dark" style="font-size: 30px"></i>
                                    </a>

                                    <!-- details -->
                                    <div class="modal fade" id="message-details" tabindex="-1" aria-labelledby="message-details" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="message-details">Details</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <strong>Titre de message : </strong>
                                                            <h5>{{ $message->title }}</h5>

                                                            <strong>Message : </strong>
                                                            <h5>{{ $message->message }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="7" align="center">Aucun message(s) à votre actif ! </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
