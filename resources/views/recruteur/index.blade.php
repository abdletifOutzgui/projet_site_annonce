@extends('layouts.app')

@section("title","Dashboard - ". config("app.name"))

@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Espace Recruteur</h3>
    </div>

    <div class="container">
        <div class="row m-5">
            <div class="col-md-4">
                @include('includes._sidebar')
            </div>

            <div class="col-md-8">

                <!-- When the user is connected -->
                <x-success success="connected" type="info"></x-success>

                <!-- When the user create a new account -->
                <x-success success="compte.created" type="success"></x-success>

                <div id="parametres">
                    <div class="row d-flex">

                       <div class="col-md-8 mt-1">Dashboard</div>
                       <div class="col-md-4">
                          <a href="/espace/offres/create" class="btn btn-success float-right">Publier offre</a>
                       </div>
                   </div>
                </div>

                <div class="row my-5">
                    <div class="col-md-4 mt-3">
                       <span class="p-5 text-bold" style="background-color: #ECEFF4">
                          <b>Offre(s)</b>
                        </span>
                    </div>
                    <div class="col-md-4 mt-3">
                        <span class="p-5 text-bold" style="background-color: #ECEFF4">
                            <b>Message(s)</b>
                        </span>
                    </div>
                    <div class="col-md-4 mt-3">
                        <span class="p-5 text-bold" style="background-color: #ECEFF4">
                            <b>Contact</b>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="m-3 col-md-12 jumbotron">
                        <div class="row recruteur-top-bar no-gutters" style="padding:15px 0 10px 0;">
                            <div class="align-self-center col-md-2">
                                <div class="logo-wrapper" style="padding:10px;">
                                    <img src="/storage/images/default.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="mt-4 d-md-none"></div>
                            </div>
                            <div class="col-md-10" style="padding:0 15px;">
                                <span class="uppercase" style="font-size:18px;">Mon entreprise -&nbsp;</span>
                                <a href="{{ route("fiche.index") }}" style="font-size:14px;text-decoration:underline;">Modifier fiche entreprise</a>
                                <div class="row no-gutters" style="padding-top:15px;">
                                    <div class="col-md-6">
                                        <div>
                                            <ul class="list-unstyled" style="margin:0;">
                                                <li style="margin-bottom:10px;"><span style="font-size:13px;">Société:</span>
                                                      <span>- - - -</span>
                                                </li>
                                                <li style="margin-bottom:10px;"><span style="font-size:13px;">Ville:</span><strong>&nbsp;- - - -</strong></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <ul class="list-unstyled" style="margin:0;">
                                                <li style="margin-bottom:10px;"><span style="font-size:13px;">Type Société:</span><strong>&nbsp;- - - -&nbsp;</strong></li>
                                                <li><span style="font-size:13px;">Site web:</span><strong>&nbsp;- - - -</strong></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection
