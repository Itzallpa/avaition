<!DOCTYPE html>
<html>
<head>
    <title>Interactive Map</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Interactive Map</h1>
    <div id="map"></div>

    <script>
        // Initialize and display the map
        function initMap() {
            // Set the initial coordinates and zoom level
            var initialCoordinates = { lat: 37.7749, lng: -122.4194 };
            var initialZoom = 12;

            // Create a map object
            var map = new google.maps.Map(document.getElementById("map"), {
                center: initialCoordinates,
                zoom: initialZoom
            });

            // Allow user to move and explore the map
            map.setOptions({
                draggable: true,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: true,
                streetViewControl: false,
                rotateControl: true,
                fullscreenControl: true
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVDBDcjXbMBnXuKVaLva-xvnkfr_DGlGQ&callback=initMap" async defer></script>
</body>
</html>
