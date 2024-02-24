<div>
   <!--   -->
</div>
<script type="module">
    const mapStyle = @js($mapStyle);
    const key = @js(env('MAP_TAILER_KEY'));
    const markerURL = @js($markerURL);
    const geojson = @json($geoJson);
    const map = new maplibregl.Map({
        container: @js($container), // container's id or the HTML element in which MapLibre GL JS will render the map
        style: `${mapStyle}?key=${key}`, // style URL
        center: @json($mapCenter), // starting position [lng, lat]
        zoom: @js($mapZoom), // starting zoom
        width: 'inherit',
        height: 'inherit'
    });
    map.addControl(new maplibregl.NavigationControl(), 'top-right');
    if (geojson.features) {
        // add markers to map
        geojson?.features?.forEach(function (marker) {
            // create a DOM element for the marker
            let el = document.createElement('div');
            el.className = 'marker';
            el.style.backgroundImage = `url(${markerURL})`;
            el.style.backgroundRepeat = 'no-repeat';
            /*el.style.width = marker.properties.iconSize[0] + 'px';
            el.style.height = marker.properties.iconSize[1] + 'px';*/
            el.style.width = '32px';
            el.style.height = '32px';

            /*el.addEventListener('click', function () {
                window.alert(marker.properties.message);
            });*/

            // add marker to map
            new maplibregl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new maplibregl.Popup().setHTML(marker.properties.message))
                .addTo(map);
        });
        $(".map-center").click(function(e) {
            e.preventDefault()
            const coordinates = $(this).data('coordinate');
            console.log(coordinates);
            map.flyTo({
                center: coordinates.split(',')
            });
        })
    } else {
        console.log("c'est maintenant vide.")
    }
</script>
