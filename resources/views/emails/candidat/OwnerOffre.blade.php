@component('mail::message')

    <div align="center">

## Félicitation ! Un nouveau candidat à postulé à votre offre

* Titre de l'offre : {{ $postule->offre->title }}
    </div>

@component('mail::button', ['url' => route("offres.show", $postule->offre)])
  Voir l'offre
@endcomponent

<div align="center">
    Merci de votre visite,<br>
    {{ config('app.name') }}
</div>
@endcomponent
