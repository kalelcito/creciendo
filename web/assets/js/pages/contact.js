(function ($) {

    function init() {
        var myLatlng = new google.maps.LatLng(-99.591128, 19.253196);
        // If document (your website) is wider than 767px, isDraggable = true, else isDraggable = false
        var isDraggable = $(document).width() > 767 ? true : false;
        var myOptions = {
            zoom: 14,
            //center: myMap,
            mapTypeControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            draggable: isDraggable,
            scrollwheel: false,

        };
        var contentString = '<div id="content">' +
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var map = new google.maps.Map(document.getElementById('map'), myOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'edugate',
            infowindow: infowindow
        });
        var contentString = '<div id="content">' +
            '<div class="text-center">' +
            '<h1 id="firstHeading" class="firstHeading">Empresa Responsable</h1>' +
            '<div class="g-address">Paseo San isidro 361</div>' +
            '<div class="g-phone-num">+52 xxxxxxxxx</div>' +
            '</div>' +
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        // infowindow.open(map, marker);
        map.setCenter({
            lat: -99.591128,
            lng: 19.253196
        });


        google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
        });
    }

    google.maps.event.addDomListener(window, 'load', init);

    //END GOOGLE MAP
})(jQuery);