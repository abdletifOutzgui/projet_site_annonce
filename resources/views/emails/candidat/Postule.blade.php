@component('mail::message')

<div align="center">

## Vous avez postuler à une nouvelle offre.

</div>

@component('mail::button', ['url' => route("candidatures.index")])
  Votre candidature
@endcomponent

<div align="center">
    Merci de votre visite,<br>
    {{ config('app.name') }}
</div>
@endcomponent
