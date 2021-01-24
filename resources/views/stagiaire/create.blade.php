@extends('layouts.app')


@section('content')

    <div class="espace-stagiaire">
        <h3 class="container text-right">Espace Stagiaire</h3>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="h3 text-center message">pas encore inscrit?</div>
                <div class="card my-card">

                    <div class="card-body">
                        <form method="POST" action="{{ route("stagiaire.store") }}">
                            @csrf


                            <div class="form-group text-center">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" id="Mme">
                                        <input class="form-check-input" type="radio" name="civilite" value="Mme" id="Mme" checked> Mme
                                    </label>
                                    <label class="form-check-label ml-2" id="Mlle">
                                        <input class="form-check-input" type="radio" name="civilite" value="Mme" id="Mlle"> Mlle
                                    </label>
                                    <label class="form-check-label ml-2" id="M">
                                        <input class="form-check-input" type="radio" name="civilite" value="M" id="M"> M
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control {{ $errors->stagiaire->first('name') ? 'is-invalid' : ''}}" name="name" value="{{ old('name') }}" placeholder="Nom..." autofocus>
                                    @if($errors->stagiaire->first('name'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->stagiaire->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control {{ $errors->stagiaire->first('last_name') ? 'is-invalid' : ''}} " name="last_name" value="{{ old('last_name') }}"  placeholder="Prenom...">
                                    @if($errors->stagiaire->first('last_name'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->stagiaire->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control {{ $errors->stagiaire->first('email') ? 'is-invalid' : ''}}" name="email" value="{{ old('email') }}"  placeholder="E-mail..." autocomplete="email">
                                    @if($errors->stagiaire->first('email'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->stagiaire->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email_confirmation" type="email" class="form-control {{ $errors->stagiaire->first('email_confirmation') ? 'is-invalid' : ''}}" name="email_confirmation" placeholder="Confirmation e-mail" value="{{ old('email_confirmation') }}"  autocomplete="Email confirmation">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="GSM" type="text" placeholder="Numéro de telephone.." class="form-control {{ $errors->stagiaire->first('GSM') ? 'is-invalid' : ''}}" name="GSM" value="{{ old('GSM') }}"  autocomplete="GSM">
                                    @if($errors->stagiaire->first('GSM'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->stagiaire->first('GSM') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="Mot de passe ..." class="form-control {{ $errors->stagiaire->first('password') ? 'is-invalid' : ''}}" name="password"  autocomplete="new-password">
                                    @if($errors->stagiaire->first('password'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->stagiaire->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" placeholder="Confirmation de mot de passe .." class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-4">
                                    <div class="d-flex captcha">
                                        <span class="pr-2">{!! captcha_img() !!}</span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input id="captcha" type="text" class="form-control {{ $errors->stagiaire->first('captcha') ? 'is-invalid' : ''}}" placeholder="Enter Captcha" name="captcha">
                                    @if($errors->stagiaire->first('captcha'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->stagiaire->first('captcha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <button type="submit" class="form-control btn btn-primary inscrir" name="stagiaire">
                                    <i class="fas fa-user-plus"></i> &nbsp;S'inscrir
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="offset-2">
                    @include("includes._form_login")
                </div>
            </div>
        </div>
    </div>
@endsection
