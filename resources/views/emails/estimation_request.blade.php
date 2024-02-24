<x-mail::message>
<div class="container px-4 py-5">

<div class="row g-5 py-5">
<div class="col d-flex flex-column align-items-start gap-2">
<h1 class="pb-2 border-bottom fs-1 fw-bold">Suite a votre demande d'estimation sur <a href="">{{ env('APP_NAME') }}</a></h1>
<p class="text-body-secondary">Nous vous remercions d'avoir utilisé notre service d'estimation en ligne. Nous avons bien reçu votre demande et nous vous confirmons que nous sommes en train de l'examiner attentivement.</p>
<p class="mt-4 text-body-secondary">Nous vous recontacterons prochainement avec une réponse complète et détaillée a vôtre demande d'estimation.</p>
</div>

<div class="col">
<div class="row-cols-1">
<div class="col d-flex flex-column gap-2">
<img src="https://immoplussablux.com/images/logo-small.png" />
</div>
<div class="col d-flex flex-column gap-2">
<img src="{{ asset('images/fill-out-form.png')}}" class="img-fluid"/>
</div>
</div>
</div>
</div>
</x-mail::message>
