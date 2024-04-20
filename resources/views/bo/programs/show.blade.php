@extends('layouts.tw_admin_v2')

@section('content')
    <a href="{{route('bo.posts.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> {{ __('common_terms.backToList') }}
    </a>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Right Side -->
            <div class="w-full mx-2 h-64">
                <h1 class="text-2xl">{{ $post->name }}</h1>
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    {!! $post->content !!}
                </div>
                <!-- End of about section -->

                <div class="my-5 block">
                    <a href="{{route('bo.posts.edit', $post)}}"
                       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
                        <i class="fa fa-pencil"></i> Editer
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
