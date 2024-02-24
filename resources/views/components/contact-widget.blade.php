<div id="whatsapp-widget-wrapper">
    <div id="wa-widget">
        <div id="widget-header">
            <h1>{{__('front.wa_contact_us')}}</h1>
            <div>{{__('front.wa_sub_header')}}</div>
        <!-- <div class="close">X</div>-->
        </div>
        <div id="widget-body">
           @foreach(config('whatsapp.agents') as $agent)
            <div class="wa-agent">
                <div>
                    <div class="agent-pix">
                        <span class="mdi mdi-account-circle"></span>
                    </div>
                </div>
                <div>
                    <div class="wa-bubble">
                        <p class="m-0">
                            <a href="{{config('whatsapp.url')}}{{str_replace(' ', '', $agent['num'])}}" target="_blank">
                                {{$agent['message']}} <br><b>+{{$agent['num']}}</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="wa-agent">
                <div>
                    <div class="agent-pix">
                        <span class="mdi mdi-account-circle"></span>
                    </div>
                </div>
                <div>
                    <div class="wa-bubble">
                        <p class="m-0">
                            <a href="#">
                                par téléphone <b>{{ $configuration->official_phone_nums }} </b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="wa-agent">
                <div>
                    <div class="agent-pix">
                        <span class="mdi mdi-account-circle"></span>
                    </div>
                </div>
                <div>
                    <div class="wa-bubble">
                        <p class="m-0">
                            <a href="#">
                                par email <b>{{ $configuration->official_email_address }} </b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
                    <div id="widget-footer">-</div>
    </div>
    <div id="wa-btn">
        <a href="#" id="backToTop" class="btn animate__animated animate__slideOutDown"><span class="mdi
        mdi-chevron-up"></span></a>
        <button  aria-label="Whatsapp">
            <span class="mdi mdi-whatsapp"></span>
        </button>
    </div>
</div>
