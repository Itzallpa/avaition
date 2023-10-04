$(document).ready(function () {
  // Create a map instance and specify the center and zoom level
  var map = L.map("map-route").setView([51.505, -0.09], 13);

  // Add a tile layer from OpenStreetMap
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);
  //get text #flp_dep
  var flp_dep = $("#flp_dep").text();
  var flp_arr = $("#flp_arr").text();

  //split text #flp_dep Deaprture:
  var flp_dep_name = flp_dep.split(": ");
  var flp_arr_name = flp_arr.split(": ");

  var dep_icao = flp_dep_name[1];
  var dep_airport = `https://nominatim.openstreetmap.org/search?q=${dep_icao}&format=json`;

  var arr_icao = flp_arr_name[1];
  var arr_airport = `https://nominatim.openstreetmap.org/search?q=${arr_icao}&format=json`;

  var depMarker, arrMarker;

  var dep_lat, dep_lon, arr_lat, arr_lon;

  fetch(dep_airport)
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      //get lat and lon
      var lat = data[0].lat;
      var lon = data[0].lon;

    dep_lat = lat;
    dep_lon = lon;

      //set view
      map.setView([lat, lon], 13);

      //add marker
      depMarker = L.marker([lat, lon])
        .addTo(map)
        .bindPopup("Departure Airport");
    });

  fetch(arr_airport)
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      //get lat and lon
      var lat = data[0].lat;
      var lon = data[0].lon;

      arr_lat = lat;
      arr_lon = lon;

      //set view
      map.setView([lat, lon], 13);

      //add marker
      arrMarker = L.marker([lat, lon]).addTo(map).bindPopup("Arrival Airport");

      var polyline = L.polyline([
        [depMarker.getLatLng().lat, depMarker.getLatLng().lng],
        [arrMarker.getLatLng().lat, arrMarker.getLatLng().lng],
      ]).addTo(map);

      //get distance between two markers

        var distance = calculateDistance(dep_lat, dep_lon, arr_lat, arr_lon);

    $("#distance_").text("Distance: " + distance.toFixed(2) + " nm");

      map.fitBounds(polyline.getBounds());
    });
});



function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 3440.065; // Radius of the Earth in nautical miles
    const dLat = (lat2 - lat1) * (Math.PI / 180);
    const dLon = (lon2 - lon1) * (Math.PI / 180);
    const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * (Math.PI / 180)) *
        Math.cos(lat2 * (Math.PI / 180)) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    const distance = R * c;
    return distance;
}
