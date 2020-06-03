jQuery(document).ready(function($) {
    "use strict";
    jQuery('.rating-tooltip-manual').rating({
        extendSymbol: function() {
            var title;
            $(this).tooltip({
                container: 'body',
                placement: 'bottom',
                trigger: 'manual',
                title: function() {
                    return title;
                }
            });
            $(this).on('rating.rateenter', function(e, rate) {
                    title = rate;
                    $(this).tooltip('show');
                })
                .on('rating.rateleave', function() {
                    $(this).tooltip('hide');
                });
        }
    });

    /*-------- Filter By Price -----------*/

    jQuery("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    jQuery("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));

});

/////////

jQuery(document).ready(function($) {
    "use strict";


    /*----------- Google Map - with support of gmaps.js ----------------*/
    function isMobile() {
        return ('ontouchstart' in document.documentElement);
    }

    function init_gmap() {
        if (typeof google == 'undefined') return;
        var options = {
            center: { lat: -37.834812, lng: 144.963055 },
            zoom: 15,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            navigationControl: true,
            scrollwheel: false,
            streetViewControl: true,
            styles: [{ "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#444444" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "color": "#f2f2f2" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "saturation": -100 }, { "lightness": 45 }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "color": "#cdcdcd" }, { "visibility": "on" }] }]
        }

        if (isMobile()) {
            options.draggable = false;
        }

        $('#googleMaps').gmap3({
            map: {
                options: options
            },
            marker: {
                latLng: [-37.834812, 144.963055],
                options: { icon: 'images/map-icon.png' }
            }
        });
    }

    init_gmap();

});