<!DOCTYPE html>
<html>
<head>
    <title>The Reds Virtual - Flight Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/custom.css">
</head>
<!-- <body>
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
                   
                </select>

                <input type="submit" id="search-button" value="Search">
            </form>
        </div>

        <div class="booking-results">
            <h2>Available Flights</h2>
            <div class="booking-item">
                
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
</body> -->

<body>
    <div class="header p-5 bg-purple">
        <h1 class="text-white text-center">The Reds Virtual - Flight Booking</h1>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card shadow-1">
                    <div class="card-body">
                        <h5 class="card-title">Schedule Search</h5>
                        <hr>
                        <div class="card bg-black text-white">
                            <div class="card-body">
                                <p class="card-text">Departing from Bangkok - Don Mueang International Airport (VTBD)</p>
                            </div>
                        </div>

                        <label for="selectairline" class="form-label mt-1" >Select An Airline</label>
                        <select name="selectairline" class="form-select" id="">
                            <option value="">Thai Airways International</option>
                            <option value="">Thai Smile</option>
                        </select>

                        <label for="selectairtype" class="form-label mt-1" >Select An Aircraft Type</label>
                        <select name="selectairtype" class="form-select" id="">
                            <option value="">Airbus A320-200</option>
                            <option value="">Airbus A330-300</option>
                            <option value="">Boeing 777-300ER</option>
                            <option value="">Boeing 787-8</option>
                        </select>

                        <label for="selectarr" class="form-label mt-1" >Select Arrival Airfield</label>
                        <select name="selectarr" class="form-select" id="select_arr">
                            <option value="VTCC">Chiang Mai International Airport (VTCC)</option>
                            <option value="VTSP">Phuket International Airport (VTSP)</option>
                            <option value="VTSB">Surat Thani International Airport (VTSB)</option>
                            <option value="VTSS">Hat Yai International Airport (VTSS)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-1">
                    <div class="card-body">
                        <h5 class="card-title">MAP</h5>
                        <div id="map">
                            <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="../../js/map.js"></script>

</html>

