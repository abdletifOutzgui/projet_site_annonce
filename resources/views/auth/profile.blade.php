@extends('layouts.app')


@section('content')

    <div class="mon-profile d-flex">
        <h3 class="mt-2 container profileName">Salam, {{ Auth::user()->name }}</h3>
        <h3 class="mt-2 container profile">Mon Profile</h3>
    </div>

    <div class="container">
        <div class="row m-5">
            <div class="col-md-4">
                 @include('includes._sidebar')
            </div>

            <div class="col-md-8">
                <div id="parametres">PARAMÈTRES</div>

                        <x-success success="error" type="danger"></x-success>
                        <x-success success="success" type="success"></x-success>

                        <!-- Form to update profile -->
                        <form role="form" method="POST" action="{{ route("profile.update", Auth::user()->profile) }}">

                            @csrf
                            @method("PATCH")

                            <div class="mt-4 form-group row">
                                <div class="col-xs-12 col-md-5">
                                    <input type="password" name="old_password" value="{{ old('old_password') }}" id="old_password" class="password form-control" placeholder="Ancien Mot de passe" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-12 col-md-5">
                                    <input type="password" name="password" value="{{ old('password') }}" id="password" class="password form-control" placeholder="Nouveau Mot de passe" required>
                                </div>
                                <x-error error="password"></x-error>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-12 col-md-5">
                                    <input type="password" name="password_confirmation"  id="password_confirmation" class="password form-control" placeholder="Confirmer votre Mot de passe">
                                </div>
                            </div>

                            <button type="submit" class="modifie btn btn-primary">Modifier le mot de passe</button>
                        </form>
                    </div>

                </div>
        </div>
    </div>

@endsection
