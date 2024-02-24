<div>
    <h3 class="mb-4">{{__('front.news_letter_title')}}</h3>
    <div class="{{$isSaved ? 'd-none' : ''}}">
        <p>{{__('front.news_letter_message')}}</p>
        <form class="form-subscribe" id="contactFormSocial" wire:submit.prevent="handleSubmit">
            <!-- Email address input-->
            <div class="row">
                <div class="col">
                    <input class="form-control rounded-0"
                           id="emailAddressBelow"
                           type="email"
                           placeholder="{{__('front.email_address')}}" data-sb-validations="required, email"
                           data-sb-can-submit="no"
                           wire:model="email"
                    >
                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:email">
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary rounded-0" id="submitButton" type="submit" aria-label="Envoyer">Envoyer</button>
                </div>
            </div>
        </form>    {{-- Because she competes with no one, no one can compete with her. --}}
    </div>
    <div class="{{!$isSaved ? 'd-none' : ''}}" style="background: rgba(79, 116, 13, 0.69); padding: 1rem;">
        <h4>{{__('front.news_letter_email_saved')}}</h4>
    </div>
</div>
