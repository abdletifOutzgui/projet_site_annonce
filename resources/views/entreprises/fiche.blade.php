@extends('layouts.app')

@section("title","FICHE ENTREPRISE")

@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Fiche Entreprise</h3>
    </div>

    <div class="container">
        <div class="row m-5">
            <div class="col-md-4">
                 @include('includes._sidebar')
            </div>

            <div class="col-md-8">

                <x-success success="error" type="danger"></x-success>
                <x-success success="success" type="success"></x-success>

                <div id="parametres">fiche entreprise</div>

                    <!-- Form to update fiche company -->

                    <form role="form" method="POST" action="{{ route("fiche.store") }}" enctype="multipart/form-data">

                        @csrf

                        <div class="mt-4 form-group row">
                            <div class="col-xs-12 col-md-5">
                                <input type="text" value="{{ Auth::user()->profile->nom_societe }}" name="nom_societe" value="{{ old('nom_societe') }}" id="nom_societe" class="password form-control" placeholder="Nom de l'entreprise" required>
                            </div>
                            <x-error error="nom_societe"></x-error>
                        </div>

                        <div class="form-group row">

                            <div class="col-xs-12 col-md-5">
                                <label for="ville">Selectionner la ville</label>

                                <select name="ville" id="ville" class="AllVille form-control @error("ville") is-invalid @enderror" required>
                                    @foreach (config("static_arrays.villes")s as $ville)
                                        <option value="{{ $ville }}" {{ Auth::user()->profile->ville==$ville ? 'selected' : ''}}>{{ $ville }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-error error="ville"></x-error>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-12 col-md-5">
                                <input type="file" name="path" value="{{ old('path') }}" id="path" class="password form-control" required>
                            </div>
                            <x-error error="path"></x-error>
                        </div>

                        <button type="submit" class="modifie btn btn-warning">Modifier la fiche</button>
                    </form>
            </div>
        </div>
    </div>

@endsection
