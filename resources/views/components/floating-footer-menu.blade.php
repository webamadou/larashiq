<div class="corner-container">
	<div class="menu-toggle">
		<span class="mdi mdi-whatsapp toggle-widget"></span>

        <div id="wa-btn">
            <a href="#" id="backToTop" class="btn animate__animated animate__slideOutDown"><span class="mdi
        mdi-chevron-up"></span></a>
        </div>
	</div>

	<div class="menu-line">
            @foreach(config('whatsapp.agents') as $agent)
                <div class="btn-app">
                    <span class="txt">
                        <a href="{{config('whatsapp.url')}}{{str_replace(' ', '', $agent['num'])}}" target="_blank">
                            {{$agent['message']}} +{{$agent['num']}}
                        </a>
                    </span>
                    <span class="mdi mdi-whatsapp"></span>
                </div>
            @endforeach
		<div class="btn-app">
			<span class="txt">par téléphone {{ $configuration->official_phone_nums }}</span>
			<span class="mdi mdi-phone"></span>
		</div>
		<div class="btn-app">
            <span class="txt">
                <a href="mailto:{{ $configuration->official_email_address }}">
                    par email {{ $configuration->official_email_address }}</a>
            </span>
			<span class="mdi mdi-email-outline"></span>
		</div>

        <div class="btn-app widget-title">
            <strong>{{__('front.wa_contact_us')}}</strong>
        </div>
	</div>
</div>
