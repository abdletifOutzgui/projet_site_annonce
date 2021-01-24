@extends('layouts.app')

@section("title","Demandes de stage - ".config("app.name"))

@section("styles")
    <style>
        body{ background-color:#fff}
        .jumbotron{padding: 22px 0 !important;border: 1px solid gray; width: 98%; background-color: #F5F6F8 !important;}
        .jumbotron:hover{ background-color: #fff; border: 1px solid gray; z-index:999 !important;  }
        .row{ margin-left: 0px !important;}
    </style>
@stop

@section('content')

    <div class="mesOffre" style="background-color: orange;">
        <h2 class="my-3 container text-center text-uppercase text-bold">Nos demandes de stage</h2>
    </div>

    <div class="container">
        <div class="row my-5">

            <span class="col-xs-12">{{ $demandes->count() }} DEMANDE(s) DE STAGES TROUVÉES</span>

            @forelse ($demandes as $demande)

                <div class="jumbotron my-2 offre-de-stage-block row" style="position: relative;">

                    <div class="align-self-center col-md-2 text-center col-sm-12" style="display:inline-block;vertical-align:middle;">
                        <div class="logo-wrapper" style="margin-bottom:15px;">
                            <span title="{{ $demande->user->full_name }}" class="">
                                <img src="{{ $demande->user->profile->path }}" alt="logo de l'entreprise" class="img-fluid entreprise-log">
                            </span>
                        </div>
                            <span class="date-publication d-flex d-md-block">Publiée le {{ $demande->created_at }}</span>
                    </div>
                    <div class="col-md-6 text-md-left text-center col-sm-12">
                        <h5 class="offre-stage-titre text-md-left text-center">
                            <a href="{{ route("demandes.show",$demande) }}">{{ $demande->title }}</a>
                        </h5>
                        <b>Publié par : {{ $demande->user->full_name }}</b>
                        <p class="offre-stage-parag">{{ Str::limit($demande->poste_recherche,170  ) }}</p>
                    <div style="position: relative;z-index: 2">
                        <span class="badge badge-pill badge-success py-2 px-3 h4">Type de stage : {{ $demande->type }}</span>
                    </div>
                    </div>

                    <div class="align-self-center col-md-2 col-sm-6 text-center" style="width:50%;">
                        <strong class="stage-duree">{{ $demande->duree }} mois</strong>
                    </div>

                    <div class="align-self-center col-md-2 col-sm-6 text-center" style="position:relative;width:50%;">
                        <strong class="stage-ville"><i class="fas fa-map-marker-alt"></i> {{ $demande->ville }}</strong>
                    </div>
                </div>

            @empty
                <h4 class="text-center">Aucune demande(s) de stage à été trouvées!</h4>
            @endforelse

            {{ $demandes->links("pagination::simple-bootstrap-4") }}

        </div>
    </div>

@endsection
