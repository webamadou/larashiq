<div class="col-lg-4 col-md-6 col-sm-12 position-relative prop-vignette-wrapper post-vignette-wrapper {{$carousel ? 'w-100 px-2' : ''}} my-4">
    <div class="prop-vignette">
        <div class="prop-vignette-body-wrapper">
            <div class="prop-image">
                <a href="{{route('see-post', $post->slug)}}" class="prop-image d-block"
                   style="background: url({{asset($post->getDefaultImage())}});
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: center;"
                aria-label="Image du bien"
                >
                </a>
            </div>
            <ul class="prop-badges">
                <li class="bg-red-600 bg-immopurple category">
                    <a href="{{route('see-post-categories', $post?->category?->slug)}}" aria-label="{{$post->category->name}}">{{$post->category->name}}</a>
                </li>
            </ul>
        </div>
        <div class="post-vignette-footer-wrapper">
            <div class="title-price">
                <div class="title">
                    <a href="{{route('see-post', $post->slug)}}" aria-label="{{Str::words($post->name, 20, '...')}}">
                        {{Str::words($post->name, 20, '...')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
