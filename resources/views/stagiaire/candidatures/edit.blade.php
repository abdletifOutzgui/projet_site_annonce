@extends('layouts.app')


@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Ma Candidature</h3>
    </div>

    <div class="container">
        <div class="row m-5">
            <div class="col-md-4">
                 @include('includes._sidebar')
            </div>

            <div class="col-md-8">

                <x-success success="success" type="success"></x-success>

                <div id="parametres">
                    <span class="add">Modifier ma candidature</span>
                </div>

                <form action="{{ route("postules.update", $postule) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method("PATCH")

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="name">Votre nom complet :</label>
                             <input type="text" name="name" id="name" value="{{ Auth::user()->fullName }}" class="form-control" readonly>
                        </div>

                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="email">Votre E-mail :</label>
                            <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
                        </div>
                        <x-error error="title"></x-error>

                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="numero_telephone">Votre Numéro de téléphone :</label>
                            <input type="text" name="numero_telephone" id="numero_telephone" value="0{{ Auth::user()->profile->GSM }}" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <h4 class="text-bold">
                                voir votre CV :
                                <a href="/storage/{{ $postule->CV }}" style="text-decoration: underline;" title="Mon CV" target="_blank">&rarr; click ici </a>
                            </h4><hr>
                            <label for="mon_cv">Modifier mon CV :</label>
                            <input type="file" name="mon_cv" id="mon_cv" class="form-control @error("mon_cv") is-invalid @enderror">
                        </div>

                        <x-error error="mon_cv"></x-error>
                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="lettre_de_motivation">Lettre de motivation :</label>
                            <textarea name="lettre_de_motivation" id="lettre_de_motivation"  rows="6" class="form-control @error("lettre_de_motivation") is-invalid @enderror" required>
                                {{ $postule->lettre_de_motivation }}
                            </textarea>
                        </div>

                        <x-error error="mon_cv"></x-error>
                    </div>

                    <div class="col-xs-12 col-md-9 mx-auto">
                       <button type="submit" class="btn btn-dark btn-block text-uppercase">Modifier ma candidature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
