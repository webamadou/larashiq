<div class="row justify-content-center prop-vignettes-wrapper">
    @foreach($properties as $key => $property)
        <livewire:property-vignette :property="$property"/>
    @endforeach
    <div class="pagination-wrapper">
        {{ $properties->links() }}
    </div>
</div>
