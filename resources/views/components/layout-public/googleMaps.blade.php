<style>
    #map {
        height: 300px;
        width: 100%;
    }
</style>

<div id="map">
    <script defer>
        let map;

        function initMap() {
            const myLatLng = {
                lat: 28.445056,
                lng: -16.284875

            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Aquí estamos!!!",
            });

        }

        window.initMap = initMap;
    </script>
</div>
