
<div class="modal fade" id="postule-offre"  role="dialog">
    <div class="modal-dialog">

    <!-- Modal content if user is connected -->
    @auth
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Envoyer Ma Candidature</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            @if ($postules && $postules->contains('offre_id',$offre->id))
                <span class="h5 text-center text-danger alert-danger p-2">
                    <b>Vous avez déjà postulez à ce offre {{ $postules->count() }} fois.</b>
                </span>
            @endif

            <form action="{{ route("postules.store") }}" method="POST" enctype="multipart/form-data" name="postules">

                @csrf

                <input type="hidden" name="offre_id" value="{{ $offre->id }}">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Votre nom complet :</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->fullName }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">Votre E-mail :</label>
                        <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="numero_telephone">Votre Numéro de téléphone :</label>
                        <input type="text" name="numero_telephone" id="numero_telephone" value="0{{ Auth::user()->profile->GSM }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <span class="text-danger"><b>* Le CV doit être au format ()pdf ou docx)</b></span><br>
                        <label for="CV">Importer Votre CV :</label>
                        <input type="file" name="mon_cv" id="CV" class="form-control @error("CV") is-invalid @enderror" required>

                        <x-error error="mon_cv"></x-error>
                    </div>

                    <div class="form-group">
                        <label for="lettre_de_motivation">Lettre de motivation :</label>
                        <textarea name="lettre_de_motivation" id="lettre_de_motivation"  rows="6" class="form-control @error("lettre_de_motivation") is-invalid @enderror" required></textarea>

                        <x-error error="lettre_de_motivation"></x-error>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Postuler</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>


    <!-- Form to connect the user  -->
    @else
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Connectez-vous pour postulez à ce offre?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <form action="{{ route("login") }}" method="POST" name="login">

                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Votre E-mail :</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            <x-error error="email"></x-error>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe : </label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            <x-error error="password"></x-error>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">Souviens-moi</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary"> Se Connecter</button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Mot de passe oublié?
                                </a>
                            @endif
                        </div>
                    </div><hr>
                    <div class="text-center">
                        <a href="/register" class="text-center btn btn-link">Crée un compte gratuitement</a>
                    </div>
                </form>
            </div>
        </div>
    @endauth
    </div>
</div>
@if($errors->count()>0)

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script>
        $(function() {
           $('.modal').modal('show');
        })
    </script>
@endif


