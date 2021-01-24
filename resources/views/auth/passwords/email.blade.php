@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card">
                <div class="card-header bg-dark text-center text-white">Réinitialiser mot de passe </div>

                <div class="card-body">

                    <x-success success="status" type="success"></x-success>

                    <form method="POST" action="{{ route('password.email') }}">

                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6 mx-auto">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Saisir votre email" autofocus>

                                <x-error error="email"></x-error>

                            </div>
                        </div>

                        <div class="form-group row mb-5 text-center">
                            <div class="col-md-6 mx-auto ">
                                <button type="submit" class="btn btn-primary btn-block form-control">Réinitialiser le mot de passe </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
