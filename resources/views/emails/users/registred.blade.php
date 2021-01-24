@component('mail::message')
# Votre compte à été bien crée

Bienvenu chez {{ config('app.name') }}.

@component('mail::button', ['url' => route("accueil")])
  Accéder à notre site
@endcomponent

Merci<br>
{{ config('app.name') }}
@endcomponent
