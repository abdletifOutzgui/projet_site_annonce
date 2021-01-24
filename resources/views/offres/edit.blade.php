@extends('layouts.app')


@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Mon Offre</h3>
    </div>

    <div class="container">
        <div class="row m-5">
            <div class="col-md-4">
                 @include('includes._sidebar')
            </div>

            <div class="col-md-8">

                <x-success success="success" type="success"></x-success>

                <div id="parametres">
                    <span class="add">Modifier offre</span>
                </div>

                <form method="POST" action="{{ route("offres.update",$offre) }}">

                    @csrf
                    @method("PATCH")

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="title">Titre de l'offre</label>
                            <input type="text" name="title" class="form-control @error("title") is-invalid @enderror" id="title" value="{{ $offre->title }}" required>
                        </div>
                        <x-error error="title"></x-error>

                    </div>
                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label>Période du stage</label>
                            <select name="duree" class="form-control @error("duree") is-invalid @enderror" required>
                                <?php for($i=1; $i<=6; $i++): ?>
                                    <option value="{{ $i }}" {{ $i==$offre->duree ? 'selected' : '' }}>{{ $i }} mois</option>
                                <?php endfor ?>
                            </select>
                        </div>
                    </div>
                    <x-error error="duree"></x-error>


                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="debut_stage">Date début de stage :</label>

                            <input type="date" name="debut_stage" value="{{ Carbon\Carbon::parse($offre->debut_stage)->format('Y-m-d') }}" class="form-control @error("debut_stage") is-invalid @enderror" min="<?php echo date('Y-m-d'); ?>" id="debut_stage" required>
                        </div>
                        <x-error error="debut_stage"></x-error>

                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">

                            <label for="lieu_stage">Lieu du stage :</label>

                            <select name="lieu" id="lieu_stage" class="form-control @error("lieu") is-invalid @enderror" required>

                                <option selected disabled>Selectionner une ville</option>

                                @foreach (config("static_arrays.villes") as $ville)
                                    <option value="{{ $ville }}" {{ ($ville==$offre->lieu) ? 'selected' : '' }}>{{ $ville }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-error error="lieu"></x-error>
                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">

                            <label for="fonction">Fonction :</label>

                            <select name="fonction" id="fonction" class="form-control @error("fonction") is-invalid @enderror" required>
                                <option selected disabled>Selectionner une fonction</option>

                                @foreach (config("static_arrays.fonctions") as $fonction)
                                    <option value="{{ $fonction }}" {{ ($fonction===$offre->fonction) ? 'selected' : '' }}>{{ $fonction }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-error error="fonction"></x-error>

                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="nbr_stagiaire">Nombre de Stagiaire(s)</label>
                            <input type="number" name="nbr_stagiaires" class="form-control @error("nbr_stagiaires") is-invalid @enderror" value="{{ $offre->nbr_stagiaires }}" id="nbr_stagiaire" placeholder="Ex: 2" required>
                        </div>

                        <x-error error="nbr_stagiaires"></x-error>

                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="type_stage">Type de stage :</label>

                            <select name="type" id="type_stage" class="form-control @error("type") is-invalid @enderror" required>

                                @foreach (config("static_arrays.type_stage") as $type)
                                    <option value="{{ $type }}" {{ $type===$offre->type ? 'selected': ''}}>{{ $type }}</option>
                                @endforeach

                            </select>
                        </div>

                        <x-error error="type"></x-error>

                    </div>
                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                             <label for="remuneration">Rémunération:</label>
                             <label>
                                 <input type="radio" name="remuneration"  value="1" {{ $offre->remuneration===1 ? 'checked': '' }}> Avec
                            </label>&nbsp;
                            <label>
                                <input type="radio" name="remuneration"  value="0" {{ $offre->remuneration===0 ? 'checked': '' }}> Sans
                            </label>
                        </div>
                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="mission">CONTEXTE ET MISSIONS</label>
                            <textarea name="mission" id="mission" rows="10" class="form-control @error("mission") is-invalid @enderror" required>
                                {{ $offre->mission }}
                            </textarea>
                        </div>

                        <x-error error="mission"></x-error>

                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="profile_rech">Profile recherché :</label>
                            <textarea name="profile_recherche" id="profile_rech" rows="10" class="form-control @error("profile_recherche") is-invalid @enderror" required>
                                {{ $offre->profile_recherche }}
                            </textarea>
                        </div>

                        <x-error error="profile_recherche"></x-error>

                    </div>
                    <div class="col-xs-12 col-md-9 mx-auto">
                        <button type="submit" class="btn btn-outline-dark btn-block buttonDark">modifier Offre</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
