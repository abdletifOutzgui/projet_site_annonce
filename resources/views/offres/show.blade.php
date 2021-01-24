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
                    <a href="/all/offres" class="px-4 py-1 rounded-pill btnStage text-white">
                        <i style="font-style:normal;margin-right:5px;transition:all .2s ease;">←</i>
                         toutes les offres de stage
                    </a>
                </div>
                <div class="col-md-8 text-right">
                    <b class="h4 text-white">OFFRE DE STAGE</b>
                </div>
           </div>
       </div>
    </div>

    <div class="container">
        <div class="row my-5">

            <div class="container demande-stage-container" style="margin-bottom:20px;">

                <x-success success="success" type="success"></x-success>

                <div class="text-right" style="margin-top:50px;"><span style="font-size:13px;font-style:italic;color:grey;">Publiée le {{ $offre->created_at }}</span></div>
                <div style="border:1px solid #e1e1e1;">
                    <div class="row" style="padding:30px 15px;">
                        <div class="col-md-2" style="display:flex;align-items:center;justify-content:center;">

                            <div class="logo-wrapper">
                                <a href="#" title="Anonyme" class="">
                                  <img src="{{ $offre->user->profile->path }}" alt="" class="img-fluid" style="max-width:100px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-left text-center">
                            <div class="mt-4 d-sm-none d-block"></div>

                            <div style="padding:8px 0 14px 0;">
                                <h3 class="offre-stage-titre text-md-left text-center" style="font-weight:600;">Stage en {{ $offre->title }}</h3>
                                <div style="margin-top:10px;">
                                    <label class="badge-stage stage-marketing" data-toggle="tooltip" title="" data-html="true" data-original-title="<span style='font-size:11px;'>Opérationnel</span>">{{ $offre->type }}, </label>
                                    <label class="badge-stage stage-remunere" data-toggle="tooltip" title="" data-html="true" data-original-title="<span style='font-size:11px;'>Ce stage est  rémunéré</span>">{{ $offre->remuneration ? 'Stage Rémunéré' : 'Stage non Rémunéré'}},</label>
                                    <label class="badge-stage stage-pre-embauche" data-toggle="tooltip" title="" data-html="true" data-original-title="<span style='font-size:11px;'</span>">fonction : {{ $offre->fonction }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 text-center" style="padding-top:35px;width:50%;"><strong class="stage-duree">6 mois</strong>
                            <br><span class="stage-depart">A partir du {{ $offre->date_debut }}</span>
                        </div>
                        <div class="col-md-2 col-sm-6 text-center" style="padding-top:45px;position:relative;width:50%;"><i class="icon-stage-map" style="font-size:20px;"></i>
                            <strong class="stage-ville"><i class="fas fa-map-marker-alt"></i> {{ $offre->lieu }}</strong>
                        </div>
                    </div>
                </div>
                <div style="border:1px solid #e1e1e1;border-top:0;background:#f9f9f9;">

                    <div class="row" style="padding:0 14px;">
                        <ul class="list-inline col-md-8 text-sm-left" style="margin-bottom:0;text-align:center;padding-top:20px;padding-left:40px;">
                            <li class="list-inline-item aos-init" data-aos="fade" data-aos-duration="1500" data-aos-delay="100" style="margin-bottom:15px;">
                                <span class="demande-info"><i class="fas fa-user-friends" style="color:#fd6225;font-size:18px;"></i>&nbsp;Stagiaires demandés : &nbsp;
                                    <strong>{{ $offre->nbr_stagiaires }}</strong>
                                </span>
                            </li>
                            <li class="list-inline-item aos-init ml-2" data-aos="fade" data-aos-duration="1500" data-aos-delay="200">
                                <span class="demande-info"><i class="fas fa-dollar-sign" style="color:#1cd252;font-size:14px;"></i>&nbsp;Rémunération: &nbsp;
                                    <strong> {{ $offre->remuneration ? 'Avec' : 'Sans' }}</strong>
                                </span>
                            </li>
                        </ul>

                        <div data-aos="fade" data-aos-duration="1500" data-aos-delay="300" class="col-md-2 text-center aos-init" style="padding-top:17px;padding-bottom:17px;display:inline-flex;align-items:center;">
                            <span style="font-size:13px;margin:0 auto;">
                                <i class="icon-stage-eye01" style="color:#7478a5;font-size:16px;"></i>&nbsp;&nbsp;
                                <em  style="font-weight: bold; font-size:16px; color: rgb(248, 105, 10)"><i class="fas fa-eye"></i> {{ $offre->nbr_vue }} vues </em>
                            </span>
                        </div>
                        <div data-aos="fade" data-aos-duration="1500" data-aos-delay="400" class="col-md-2 text-center mt-4 ">
                            <span class="uppercase"><i class="fas fa-pen-alt"></i> DISPONIBLE</span>
                        </div>
                    </div>
                </div>
                <div style="border:1px solid #e1e1e1;padding-top:60px;/*margin-top:25px;*/border-top:0;">

                    <div class="row" style="padding:0 14px;">
                        <div class="col-md-8" style="padding:0 40px;">

                            <h6 class="uppercase" style="font-weight:600;">Description entreprise</h6>
                            <p class="text-justify" style="line-height:32px;font-size:15px;margin-bottom:50px;">Ulili est une marque marocaine de création et de fabrication de bougies parfumées et de parfums d’ambiance haut de gamme. Notre marque est désormais présente aussi bien au Maroc qu’en Europe,  en Amérique du Nord et aux Emirats Arabe Unis. <br><br>
                            <h6 class="uppercase" style="font-weight:600;">Contexte &amp; Mission</h6>
                            <p class="text-justify" style="line-height:32px;font-size:15px;margin-bottom:50px;">{{ $offre->mission }}</p>
                            <p class="text-justify" style="line-height:32px;font-size:15px;margin-bottom:50px;">{{ $offre->profile_recherche }}</p>
                        </div>
                    @auth
                        @if (Auth::id() !== $offre->user_id && !Auth::user()->role)
                            <div class="col-md-4 pinme" style="padding:0 30px;">
                                <div id="pin">
                                    <a  data-target="#postule-offre" data-toggle="modal" title="Postulez à ce offre" class="text-decoration-none btn btn-block btn-success py-3 text-uppercase">
                                        <i class="fas fa-envelope"></i> &nbsp; Envoyer votre CV
                                    </a>
                                </div>

                                <!-- Our Modal -->
                                @include('modals._postule_offre')
                            </div>

                        @else
                            <div class="col-md-4 pinme" style="padding:0 30px;">
                                <div id="pin">
                                    <button title="Vous ne pouvez pas postuler à votre offre" disabled class="notAllow btn btn-block btn-success py-3 text-uppercase">
                                        <i class="fas fa-envelope"></i> &nbsp; Envoyer votre CV
                                    </button>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-md-4 pinme" style="padding:0 30px;">
                            <div id="pin">
                                <a  data-target="#postule-offre" data-toggle="modal" title="Postulez à ce offre" class="text-decoration-none btn btn-block btn-success py-3 text-uppercase">
                                    <i class="fas fa-envelope"></i> &nbsp; Envoyer votre CV
                                </a>
                            </div>

                            <!-- Our Modal -->
                            @include('modals._postule_offre')
                        </div>
                    @endauth
                    </div>
                </div>
           </div>
        </div>
    </div>

@endsection






