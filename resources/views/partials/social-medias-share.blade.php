<div id="social-links" style="background: var(--immogray1); padding: 0">
    <h6><span class="mdi mdi-share-variant"></span>Partagez!</h6>
	<ul class="d-flex justify-between">
    @foreach($shareButtons as $key => $buttonUrl)
		<li class="p-0">
            <a href="{{ $buttonUrl }}" class="social-button " id="social-{{$key}}" target="_blank">
                <span class="mdi mdi-{{$key}}"></span>
            </a>
        </li>
    @endforeach
	</ul>
</div>
