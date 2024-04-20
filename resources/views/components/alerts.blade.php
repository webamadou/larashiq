<div>
    <!-- SUCCESS MESSAGE-->
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            <span class="mdi mdi-check-circle"></span>
            <span class="mr-1 ">{{ session()->get('success') }}</span>
        </div>
    @endif
    @if (! $errors->isEmpty())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <span class="mdi mdi-close-octagon"></span>
                <span class="mr-1 ">{!! $error !!}</span>
            </div>
        @endforeach
    @endif
    <!-- ERROR MESSAGES-->
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            <span class="mdi mdi-close-octagon"></span>
            <span class="mr-1 ">{!! session()->get('error') !!}</span>
        </div>
    @endif
    <!-- INFOS MESSAGE-->
    @if (session()->has('infos'))
        <div class="alert alert-info" role="alert">
            <span class="mdi mdi-information"></span>
            <span class="mr-1 ">{{ session()->get('infos') }}</span>
        </div>
    @endif
    <!-- WARNING MESSAGE-->
    @if (session()->has('warning'))
        <div class="alert alert-warning" role="alert">
            <span class="mdi mdi-alert"></span>
            <span class="mr-1 ">{{ session()->get('warning') }}</span>
        </div>
    @endif
    <!-- MESSAGES-->
    @if (session()->has('messages'))
        <div class="alert alert-light" role="alert">
            <span class="mdi mdi-message-alert"></span>
            <span class="mr-1 ">{{ session()->get('warning') }}</span>
        </div>
    @endif
</div>
