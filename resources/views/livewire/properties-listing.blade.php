<section class="long-height position-relative py-0">

    @include('layouts/partial/filter-form')

    <div class="container">
        <h1 class="page-title">{{ $filterTitle }}</h1>
        <div class="row justify-content-center prop-vignettes-wrapper py-4">
            @forelse($properties as $key => $property)
                @include('partials.property-vignette-array')
            @empty
                @include('layouts.partial.no-property-found')
            @endforelse
        </div>
        <div class="row">
            @if (! empty(count($properties)) && count($properties) % $perPage === 0)
                <button wire:click="loadMore" class="btn btn-primary rounded-0 btn-sm my-2">Voir plus <i class="mdi mdi-plus"></i></button>
            @else
                <p class="text-center">-</p>
            @endif
        </div>
    </div>
</section>
