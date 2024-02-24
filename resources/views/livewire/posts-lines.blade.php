<div class="d-md-flex post-entry-2 small-img mb-3 post-line">
  <div class="post-image">
      <a href="{{route('see-post', $post->slug)}}" class="me-4 thumbnail">
          <img src="{{asset($post->getDefaultImage())}}" alt="{{ $post->name }}" class="img-fluid">
      </a>
  </div>
  <div class="col-7 ps-4">
    <h5 class="post-title">
        <a href="{{route('see-post', $post->slug)}}">{{Str::words($post->name, 15, '...')}}</a>
    </h5>
    <div>{{ Str::words(strip_tags(html_entity_decode($post->content)), 45, '...') }}</div>
    <div class="d-flex align-items-center post-metas">
        <div class="post-meta">
            <a href="{{route('see-post-categories', $post?->category?->slug)}}">{{$post->category->name}}</a>
            <span class="mx-1">•</span> <span>{{$post->updated_at->diffForHumans()}}</span>
        </div>
    </div>
  </div>
</div>
