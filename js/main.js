


//when on page load
$(document).ready(function() {

    var map = L.map('map').setView([51.505, -0.09], 13); // ตำแหน่งและการซูมเริ่มต้น
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    $('#sel_airport').change(function() {


        //setViem on map
        var map = L.map('map').setView([51.505, -0.09], 13); // ตำแหน่งและการซูมเริ่มต้น
            var airport = $(this).val();
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/search?query=vtbs">OpenStreetMap</a> contributors'
        }).addTo(map);

        
        

    });

});

