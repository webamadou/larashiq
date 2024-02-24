@props(['url'])
<tr>
<td class="header">
<a href="{{ route('home-page') }}" style="display: inline-block;">
@if (trim($slot) !== 'Laravel')
<img src="https://immoplussablux.com/images/logo-small.png"
class="logo"
alt="Immoplus Sablux"
style="height: auto !important; width: 100% !importtant;"
>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
