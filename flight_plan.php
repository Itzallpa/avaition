<!DOCTYPE html>
<html>
<head>
    <title>The Reds Virtual - Flight Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        /* Your custom CSS styling can be added here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #b52e31;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .flight-search {
            flex: 1;
            max-width: 400px;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-right: 20px;
        }

        .flight-search h2 {
            margin-top: 0;
            color: #b52e31;
        }

        .flight-search form {
            margin-bottom: 20px;
        }

        .flight-search label {
            margin-right: 10px;
        }

        .flight-search input[type="text"],
        .flight-search select {
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 10px;
        }

        .flight-search input[type="submit"] {
            padding: 10px 20px;
            background-color: #b52e31;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #map {
            height: 400px;
            width: 50%;
            border-radius: 5px;
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
        }

        /* Additional styles for the flight booking results section */
        .booking-results {
            flex: 1;
            max-width: 600px;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .booking-results h2 {
            margin-top: 0;
            color: #b52e31;
        }

        .booking-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .booking-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>The Reds Virtual - Flight Booking</h1>
    </div>

    <div class="container">
        <div class="flight-search">
            <h2>Search for Flights</h2>
            <form onsubmit="handleFormSubmit(event)">
                <label for="departure">Departure:</label>
                <input type="text" id="departure" name="departure" placeholder="Enter departure..." autocomplete="off" onchange="onDepartureChange()" required>

                <label for="destination">Destination:</label>
                <select id="destination" name="destination" onchange="updateFlightOptions(document.getElementById('departure').value.toLowerCase())" required>
                    <option value="" disabled selected>Select destination</option>
                    <option value="vtcc">Chiang Mai (VTCC)</option>
                    <option value="vtsp">Phuket (VTSP)</option>
                    <option value="vtsb">Surat Thani (VTSB)</option>
                    <option value="vtss">Hat Yai (VTSS)</option>
                </select>

                <label for="flight-number">Flight Number:</label>
                <select id="flight-number" name="flight-number" onchange="updatePlaneType()" required>
                    <option value="" disabled selected>Select flight number</option>
                </select>

                <label for="aircraft-type">Aircraft Type:</label>
                <input type="text" id="aircraft-type" name="aircraft-type" readonly required>

                <label for="arrival-airfield">Arrival Airfield:</label>
                <select id="arrival-airfield" name="arrival-airfield" required>
                    <!-- Arrival airfields will be dynamically populated here -->
                </select>

                <input type="submit" id="search-button" value="Search">
            </form>
        </div>

        <div class="booking-results">
            <h2>Available Flights</h2>
            <div class="booking-item">
                <!-- Flight booking results can be dynamically populated here using JavaScript -->
            </div>
        </div>
    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Your JavaScript code for map initialization and flight search functionality can be added here
        var map;
        var departureMarker;
        var destinationMarker;
        var line;

        function initMap() {
            // Set the initial coordinates and zoom level
            var initialCoordinates = [13.689999, 100.750111]; // Bangkok
            var initialZoom = 12;

            // Create a map object
            map = L.map('map').setView(initialCoordinates, initialZoom);

            // Add a tile layer to the map
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18
            }).addTo(map);
        }

        // Function to handle form submission
        function handleFormSubmit(event) {
            event.preventDefault();
            // Your flight search logic can be added here
        }

        // Call the initMap function when the window has finished loading
        window.onload = function() {
            initMap();
        };
    </script>
</body>
</html>
