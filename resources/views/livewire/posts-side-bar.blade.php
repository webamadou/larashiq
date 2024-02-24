<div class="sidebar-posts-wrapper accordion px-5" id="accordionPostsSidebar">
  <div class="accordion-item rounded-0" style="border: none;">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#firstPostCategoryCollapse" aria-expanded="true" aria-controls="firstPostCategoryCollapse" aria-label="{{ $firstCategory?->name }}">
        {{ $firstCategory?->name }}
      </button>
    </h2>
    <div id="firstPostCategoryCollapse" class="accordion-collapse collapse show" data-bs-parent="#accordionPostsSidebar">
      <div class="accordion-body post-list mx-1">
          @foreach($firstCategory->posts->take(4) as $post)
          <div class="post-wrapper mb-1">
              <div class="post-content">
                  <img src="{{asset($post->getDefaultImage())}}" alt="{{ $post->name }}" class="img-fluid">
                  <p>
                      <a href="{{ route('see-post', $post->slug) }}">{{Str::words($post->name, 8, '...')}}</a>
                  </p>
              </div>
          </div>
          @endforeach
      </div>
    </div>
  </div>
  @foreach($otherCategory as $category)
  <div class="accordion-item rounded-0" style="border: none;">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$category->slug}}Collapsable" aria-expanded="false" aria-controls="{{$category->slug}}Collapsable" aria-label="{{ $category?->name }}">
        {{ $category?->name }}
      </button>
    </h2>
    <div id="{{$category->slug}}Collapsable" class="accordion-collapse collapse" data-bs-parent="#accordionPostsSidebar">
      <div class="post-list mx-1 accordion-body">
          @foreach($category->posts->take(4) as $post)
          <div class="post-wrapper mb-3">
              <div class="post-content">
                  <img src="{{asset($post->getDefaultImage())}}" alt="{{ $post->name }}" class="img-fluid">
                  <p>
                      <a href="{{ route('see-post', $post->slug) }}">{{Str::words($post->name, 8, '...')}}</a>
                  </p>
              </div>
          </div>
          @endforeach
          <div class="read-more-posts">
              <a href="{{route('see-post-categories', $category->slug)}}">
                  {{ __('front.read_more_posts') }} {{ strtolower($category->name) }} <span class="mdi mdi-chevron-double-right"></span>
              </a>
          </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
