<x-mail::message>
<div class="container">
<div class="row featurette">
<table class="table">
<tbody>
<tr>
<td>
<h2 class="featurette-heading fw-normal lh-1">
<a href="{{route('show-property', $property->slug)}}" class="text-decoration-none text-center">{{$property->name}}</a>
</h2>
<p class="lead">{!! $property->description !!}</p>
</td>
<td>
<a href="{{route('show-property', $property->slug)}}" class="text-decoration-none text-center">
<img src="{{asset($property?->getDefaultImage())}}" class="card-img-top img-fluid" alt="{{$property?->name}}">
</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="container">
<div class="row">
<table class="table">
<tbody>
<tr>
@foreach($similarProps as $prop)
<td>
<img src="{{asset($prop?->getDefaultImage())}}" class="card-img-top" alt="{{$prop?->name}}">
<p>{!! $prop->name !!}</p>
<p><a class="btn btn-secondary rounded-0" href="{{route('show-property', $prop->slug)}}">Voir le bien »</a></p>
</td>
@endforeach
</tr>
</tbody>
</table>
</div>
</div>
<div class="col">
<hr>
<a href="{{route('delete-my-alert', $alert->ref)}}" title="{{__('alerts.want_to_delete_alert_in_mail')}}" class="text-decoration-none text-center" style="font-size: 0.8rem">
{{__('alerts.want_to_delete_alert_in_mail')}}
</a>
</div>
</x-mail::message>
