


    <div class="all">
        <div class="h3 text-center title">Se Connecter ?</div>
        <div class="card se-connecter">

            <form action="{{ route("login") }}" name="login" method="POST">

                @csrf

                <div class="form-group">
                    <input type="email" name="email" class="form-control @error("email") is-invalid @enderror"   value="{{ old("email") }}" placeholder="Saisissez votre e-mail">
                    <x-error error="email"></x-error>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control @error("password") is-invalid @enderror"  placeholder="Saisissez votre mot de passe">
                    <x-error error="password"></x-error>
                </div>

                <button type="submit" class="form-control btn btn-success connecter" name="login"><i class="fas fa-sign-in-alt"></i> &nbsp;Se Connecter</button>
            </form>
        </div>
    </div>
