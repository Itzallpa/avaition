$(document).ready(function () {
    var map = L.map('map').setView([51.505, -0.09], 13); // ตำแหน่งและการซูมเริ่มต้น
    var marker;

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    $('#sel_airport').change(function () {
        var selectedAirport = $(this).val();
        // ดำเนินการตรวจสอบค่า selectedAirport และกำหนดตำแหน่งใหม่ของแผนที่
        if (selectedAirport === 'YOUR_AIRPORT_ID_1') {
            map.setView([LATITUDE_1, LONGITUDE_1], ZOOM_LEVEL);
        } else if (selectedAirport === 'YOUR_AIRPORT_ID_2') {
            map.setView([LATITUDE_2, LONGITUDE_2], ZOOM_LEVEL);
        }
        // ลบมาร์คเก่า (ถ้ามี) และสร้างมาร์คใหม่
        if (marker) {
            marker.remove();
        }
        marker = L.marker([NEW_LATITUDE, NEW_LONGITUDE]).addTo(map);
    });
});