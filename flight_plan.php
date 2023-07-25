<!DOCTYPE html>
<html>
<head>
    <title>Flight Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #333333;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .content {
            display: flex;
            justify-content: center;
        }

        .flight-search {
            flex: 0 0 300px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        .flight-search h2 {
            margin-top: 0;
        }

        .flight-search form {
            margin-bottom: 20px;
        }

        .flight-search label {
            margin-right: 10px;
        }

        .flight-search input[type="text"],
        .flight-search select {
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .flight-search input[type="submit"] {
            padding: 5px 20px;
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #map {
            height: 400px;
            width: 100%;
            border-radius: 5px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Flight Booking</h1>
    </div>

    <div class="content">
        <div class="flight-search">
            <h2>Search for Flights</h2>
            <form onsubmit="handleFormSubmit(event)">
                <label for="departure">Departure:</label>
                <input type="text" id="departure" name="departure" placeholder="Enter departure..." autocomplete="off">

                <label for="destination">Destination:</label>
                <select id="destination" name="destination">
                    <option value="" disabled selected>Select destination</option>
                </select>

                <input type="submit" value="Search">
            </form>
        </div>

        <div id="map"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize and display the map
        var map;
        var departureMarker;
        var destinationMarker;
        var line;

        function initMap() {
            // Set the initial coordinates and zoom level
            var initialCoordinates = [37.7749, -122.4194];
            var initialZoom = 12;

            // Create a map object
            map = L.map('map').setView(initialCoordinates, initialZoom);

            // Add a tile layer to the map
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18
            }).addTo(map);
        }

        // Handle form submission
        function handleFormSubmit(event) {
            event.preventDefault();

            var departureInput = document.getElementById('departure');
            var departure = departureInput.value.toLowerCase();
            var destinationSelect = document.getElementById('destination');
            var destination = destinationSelect.value;

            // Clear previous markers and line
            if (departureMarker) {
                map.removeLayer(departureMarker);
            }
            if (destinationMarker) {
                map.removeLayer(destinationMarker);
            }
            if (line) {
                map.removeLayer(line);
            }

            // Clear previous options
            destinationSelect.innerHTML = '';

            // Populate destination options based on the selected departure
            if (departure === 'vtbs') {
            addDestinationOption('vtcc', 'Chiang Mai (VTCC)');
            addDestinationOption('vtsp', 'Phuket (VTSP)');
            addDestinationOption('vtsb', 'Surat Thani (VTSB)');
            addDestinationOption('vtss', 'Hat Yai (VTSS)');
        } else if (departure === 'vtcc') {
            addDestinationOption('vtbs', 'Bangkok (VTBS)');
            addDestinationOption('vtsp', 'Phuket (VTSP)');
            addDestinationOption('vtsb', 'Surat Thani (VTSB)');
            addDestinationOption('vtss', 'Hat Yai (VTSS)');
        }
// Add more conditions for different departure options as needed

            // Helper function to add destination options
            function addDestinationOption(value, label) {
                var option = document.createElement('option');
                option.value = value;
                option.textContent = label;
                destinationSelect.appendChild(option);
            }

            // Create markers for departure and destination
            var departureCoordinates = getCoordinates(departure);
            var destinationCoordinates = getCoordinates(destination);

            if (departureCoordinates) {
                departureMarker = L.marker(departureCoordinates).addTo(map);
            }

            if (destinationCoordinates) {
                destinationMarker = L.marker(destinationCoordinates).addTo(map);
            }

            // Draw a line between the markers
            if (departureCoordinates && destinationCoordinates) {
                var lineCoordinates = [departureCoordinates, destinationCoordinates];
                line = L.polyline(lineCoordinates).addTo(map);

                // Fit map bounds to show all markers and the line
                var bounds = L.latLngBounds([departureCoordinates, destinationCoordinates]);
                map.fitBounds(bounds);
            }
        }

        // Helper function to get coordinates based on ICAO code
        function getCoordinates(icao) {
            var coordinates = null;
            if (icao === 'vtbs') {
                coordinates = [13.689999, 100.750111]; // Bangkok
            } else if (icao === 'vtcc') {
                coordinates = [18.766847, 98.962174]; // Chiang Mai
            } else if (icao === 'vtsp') {
                coordinates = [8.1132, 98.3167]; // Phuket
            } else if (icao === 'vtsb') {
                coordinates = [9.1333, 99.3333]; // Surat Thani
            } else if (icao === 'vtss') {
                coordinates = [7.0129, 100.4782]; // Hat Yai
            }
            // Add more coordinates for different locations as needed
            return coordinates;
        }

        // Call the initMap function when the window has finished loading
        window.onload = function() {
            initMap();
        };
    </script>
</body>
</html>
