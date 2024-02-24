<div>
    <!-- SUCCESS MESSAGE-->
    @if (session()->has('success'))
        <div class="alert bg-green-100 py-1 px-6 mb-3 text-base font-normal text-green-700 inline-flex items-center w-full
            alert-dismissible fade show" role="alert">
                <span class="mr-1 ">{{ session()->get('success') }}</span>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none rounded-none
                opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-green-900 hover:opacity-75
                hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (! $errors->isEmpty())
        @foreach($errors->all() as $error)
            <div class="alert bg-red-100 py-1 px-6 mb-3 text-base font-normal text-red-700 inline-flex items-center w-full
                alert-dismissible fade show" role="alert">
                <span class="mr-1 ">{!! $error !!}</span>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-red-900 border-none rounded-none
                    opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-red-900 hover:opacity-75
                    hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <!-- ERROR MESSAGES-->
    @if (session()->has('error'))
        <div class="alert bg-red-100 py-1 px-6 mb-3 text-base font-normal text-red-700 inline-flex items-center w-full
            alert-dismissible fade show" role="alert">
            <span class="mr-1 ">{!! session()->get('error') !!}</span>
            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-red-900 border-none rounded-none
                opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-red-900 hover:opacity-75
                hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- INFOS MESSAGE-->
    @if (session()->has('infos'))
        <div class="alert bg-blue-100 py-1 px-6 mb-3 text-base font-normal text-blue-700 inline-flex items-center w-full
            alert-dismissible fade show" role="alert">
                <span class="mr-1 ">{{ session()->get('infos') }}</span>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-blue-900 border-none
                rounded-none
                opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-blue-900 hover:opacity-75
                hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- WARNING MESSAGE-->
    @if (session()->has('warning'))
        <div class="alert bg-yellow-100 py-1 px-6 mb-3 text-base font-normal text-yellow-700 inline-flex items-center w-full
            alert-dismissible fade show" role="alert">
                <span class="mr-1 ">{{ session()->get('warning') }}</span>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none
                rounded-none
                opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75
                hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- MESSAGES-->
    @if (session()->has('messages'))
        <div class="alert bg-yellow-100 py-1 px-6 mb-3 text-base font-normal text-yellow-700 inline-flex items-center w-full
            alert-dismissible fade show" role="alert">
                <span class="mr-1 ">{{ session()->get('warning') }}</span>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none
                rounded-none
                opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75
                hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
