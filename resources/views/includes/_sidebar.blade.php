

    <ul class="list-unstyled" style="font-size:14px;text-transform:uppercase;">

        <li class="list-group-item mb-3" aria-current="true">
            <a href="{{ route("home") }}" class="text-decoration-none">
                <i class="fas fa-tachometer-alt mr-2"></i> <b>Tableau de bord</b>
            </a>
        </li>

        @if(Auth::user()->role)
            <li class="list-group-item mb-3">
                <a href="{{ route("fiche.index") }}" class="text-decoration-none">
                    <i class="fas fa-paragraph mr-2"></i> <b>Fiche entreprise</b>
                </a>
            </li>
            <li class="list-group-item mb-3">
                <a href="{{ route("offres.index") }}" class="text-decoration-none">
                    <i class="fas fa-map mr-2"></i> <b>Mes offres</b>
                </a>
            </li>
            <li class="list-group-item mb-3">
                <a href="{{ route("messages.index") }}" class="text-decoration-none">
                    <i class="fas fa-comments mr-2"></i> <b>Messages</b>
                </a>
            </li>
        @else
            <li class="list-group-item mb-3">
                <a href="{{ route("demandes.index") }}" class="text-decoration-none">
                    <i class="fas fa-clipboard mr-2"></i> <b>Mes Demandes</b>
                </a>
            </li>
            <li class="list-group-item mb-3">
                <a href="{{ route("candidatures.index") }}" class="text-decoration-none">
                    <i class="fas fa-address-card mr-2"></i> <b>Mes candidatures</b>
                </a>
            </li>
            <li class="list-group-item mb-3">
                <a href="{{ route("messages.index") }}" class="text-decoration-none">
                    <i class="fas fa-comments mr-2"></i> <b>Messages</b>
                </a>
            </li>
        @endif

        <li class="list-group-item mb-3">
            <a href="{{ route("profile") }}" class="text-decoration-none">
                <i class="fas fa-cogs mr-2"></i> <b>Paramètres</b>
            </a>
        </li>

        <div class="mt-5">
            <form action="{{ route("profile.destroy", Auth::user()->profile) }}" method="POST">

                @csrf
                @method("DELETE")

                <button class="btn btn-danger btn-block text-uppercase p-3" onclick="return confirm('Vous êtes sûr de vouloir supprimer définitivement votre compte ?')">
                    <i class="fas fa-trash mr-2"></i><b>Supprimer mon compte</b>
                </button>
            </form>
        </div>

    </ul>
