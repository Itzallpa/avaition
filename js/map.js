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



$(document).ready(function() {



});