@extends('layouts.app')


@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Crée votre ddd</h3>
    </div>

    <div class="container">
        <div class="row m-5">
            <div class="col-md-4">
                 @include('includes._sidebar')
            </div>

            <div class="col-md-8">

                <x-success success="success" type="success"></x-success>

                <div id="parametres">
                    <span class="add">Modifier la demande</span>
                </div>

                <form method="POST" action="{{ route("demandes.update", $demande) }}">

                    @csrf
                    @method("PATCH")

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="title">Titre de poste : </label>
                            <input type="text" name="title" value="{{ $demande->title }}" class="form-control @error("title") is-invalid @enderror" id="title" placeholder="Ex: Titre de poste..." required>
                        </div>
                        <x-error error="title"></x-error>

                    </div>


                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">

                            <label for="ville">Lieu du stage :</label>
                            <select name="ville" id="ville" class="form-control @error("ville") is-invalid @enderror" required>

                                <option selected disabled>Selectionner votre ville</option>

                                @foreach (config("static_arrays.villes") as $ville)
                                    <option value="{{ $ville }}" {{ ($demande->ville === $ville) ? 'selected' : '' }}>{{ $ville }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-error error="ville"></x-error>
                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label>Période du stage</label>

                            <select name="duree" class="form-control @error("duree") is-invalid @enderror" required>
                                <?php for($i=1; $i<=6; $i++): ?>
                                    <option value="{{ $i }}" {{ ($demande->duree == $i) ? 'selected' : '' }}>{{ $i }} mois</option>
                                <?php endfor ?>
                            </select>
                        </div>
                    </div>
                    <x-error error="duree"></x-error>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="type_stage">Type de stage :</label>

                            <select name="type" id="type_stage" class="form-control @error("type") is-invalid @enderror" required>

                                <option selected disabled>Selectionner Type de stage</option>

                                @foreach (config("static_arrays.type_stage") as $type)
                                    <option value="{{ $type }}" {{ ($demande->type == $type) ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <x-error error="type"></x-error>

                    </div>

                    <div class="mt-4 form-group row">
                        <div class="col-xs-12 col-md-9 mx-auto">
                            <label for="poste_recherche">Poste recherché :</label>
                            <textarea name="poste_recherche" id="poste_recherche" rows="10" class="form-control @error("poste_recherche") is-invalid @enderror" placeholder="30 caracter(s) au minimum" required>
                                {{ $demande->poste_recherche }}
                            </textarea>
                        </div>

                        <x-error error="poste_recherche"></x-error>

                    </div>

                    <div class="col-xs-12 col-md-9 mx-auto">
                       <button type="submit" class="btn btn-primary btn-block text-uppercase">Modifier la demande</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
