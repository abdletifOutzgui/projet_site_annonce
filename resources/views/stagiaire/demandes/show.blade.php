@extends('layouts.app')

@section("title","Details Offre")

@section("styles")
    <style>
        .mesOffre{ background-color: #3a3d54 !important ;}
        .notAllow:hover{ cursor: not-allowed;}
        .btnStage{ text-decoration: none; background-color: #f01057;}
        .btnStage:hover i { text-decoration: none; margin-right:15px !important;  -webkit-transition:all .2s ease; transition:all .2s ease; }
    </style>
@stop

@section('content')

    <div class="mesOffre">
       <div class="container">
           <div class="row">
                <div class="col-md-4">
                    <a href="/espace/all/demandes" class="px-4 py-1 rounded-pill btnStage text-white">
                        <i style="font-style:normal;margin-right:5px;transition:all .2s ease;">←</i>
                         Toutes les demandes de stage
                    </a>
                </div>
                <div class="col-md-8 text-right">
                    <b class="h4 text-white">DEMANDE DE STAGE</b>
                </div>
           </div>
       </div>
    </div>

    <div class="container">
        <div class="row mt-5">

            <div class="container demande-stage-container" style="margin-bottom:20px;">

                <x-success success="success" type="success"></x-success>

                <div class="text-right" style="margin-top:50px;">
                    <span style="font-size:13px;font-style:italic;color:grey;">
                         Publiée le {{ $demande->created_at }}
                    </span>
                </div>

                <div style="border:1px solid #e1e1e1;">
                    <div class="row" style="padding:30px 15px;">
                        <div class="col-md-2" style="display:flex;align-items:center;justify-content:center;">

                            <div class="logo-wrapper">
                                <a href="#" title="Anonyme" class="">
                                  <img src="{{ $demande->user->profile->path }}" alt="{{ $demande->user->name }}" class="img-fluid" style="max-width:100px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-left text-center">
                            <div class="mt-4 d-sm-none d-block"></div>

                            <div style="padding:8px 0 14px 0;">
                                <h3 class="offre-stage-titre text-md-left text-center" style="font-weight:600;">Stage en {{ $demande->title }}</h3>
                                <div style="margin-top:10px;">
                                    <label class="badge-stage stage-marketing" data-toggle="tooltip" title="" data-html="true" data-original-title="<span style='font-size:11px;'>owner </span>">
                                        <span class="badge badge-pill badge-dark py-2 px-3">Candidat : {{ $demande->user->full_name }}</span>
                                    </label>
                                    <label class="badge-stage stage-marketing" data-toggle="tooltip" title="" data-html="true" data-original-title="<span style='font-size:11px;'>Opérationnel</span>">
                                        <span class="badge badge-pill badge-primary py-2 px-3">Type : {{ $demande->type }}</span>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-6 text-center" style="padding-top:45px;position:relative;width:50%;"><i class="icon-stage-map" style="font-size:20px;"></i>
                            <strong class="stage-ville"><i class="fas fa-map-marker-alt"></i> {{ $demande->ville }}</strong>
                        </div>
                    </div>
                </div>
                <div style="border:1px solid #e1e1e1;border-top:0;background:#f9f9f9;">

                    <div class="row" style="padding:0 14px;">

                        <div data-aos="fade" class="col-md-12 text-center text-justify my-4">
                            {{ $demande->poste_recherche }}
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Recruteur peux envoyer un message au candidat -->
    @if (Auth::check() && Auth::user()->role)
        <div class="container">
            <div class="row mb-4">
                <div style="border:1px solid #e1e1e1;" class="p-5 col-md-6 mx-auto">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-dark ">
                            <a data-target="#user-email" data-toggle="modal" class="text-white text-decoration-none">
                                <span><i class="fas fa-paper-plane mr-2"></i> Voir e-mail</span>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="user-email"  role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body text-center">
                                            Email : {{ $demande->user->email }}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">D'accord</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-warning">
                            <a data-target="#user-gsm" data-toggle="modal" class="text-dark text-decoration-none">
                                <span><i class="fas fa-phone-volume mr-2"></i> Voir numéro de telephone</span>
                            </a>
                            <div class="modal fade" id="user-gsm"  role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body text-center">
                                            Numéro de téléphone : 0{{ $demande->user->profile->GSM }}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">D'accord</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-success">
                            <a data-target="#user-message" data-toggle="modal" class="text-white text-decoration-none">
                                <span><i class="fas fa-envelope mr-2"></i> Envoyer message</span>
                            </a>
                            <div class="modal myModal fade" id="user-message"  role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Envoyer message</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <form action="{{ route("messages.store") }}" method="post">

                                            @csrf
                                            <input type="hidden" name="destinataire_id" value="{{ $demande->user->id }}">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="title">Titre de message : </label>
                                                  <input type="text" name="title" id="title" class="form-control @error("title") is-invalid @enderror" placeholder="Titre de message" required>
                                                </div>
                                                  <x-error error="title"></x-error>

                                                <div class="form-group">
                                                    <label for="message">Message : </label>
                                                    <textarea name="message" id="message" class="form-control @error("message") is-invalid @enderror" rows="6" placeholder="Message ..." required></textarea>
                                                </div>
                                                <x-error error="message"></x-error>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-paper-plane mr-2"></i>Envoyer
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                      </ul>
                </div>
            </div>
        </div>
    @endif

@endsection
@if($errors->count()>0)

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script>
        $(function() {
           $('.myModal').modal('show');
        })
    </script>
@endif
