@component('mail::message')
# Vous avez crée une nouvelle offre

### Le titre de l'offre est : {{ Str::limit($offre->title, 20) }}

@component('mail::button', ['url' => route("offres.show", $offre)])
 Voir details d'offre
@endcomponent

Merci de votre collaboration,<br>
{{ config('app.name') }}
@endcomponent
