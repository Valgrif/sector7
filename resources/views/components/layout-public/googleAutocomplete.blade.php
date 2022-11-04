<div class="container mt-5">
    <script type="text/javascript">

        function initMap() {

          const myLatLng = { lat: 22.2734719, lng: 70.7512559 };

          const map = new google.maps.Map(document.getElementById("map"), {

            zoom: 5,

            center: myLatLng,

          });



          new google.maps.Marker({

            position: myLatLng,

            map,

            title: "Hello Rajkot!",

          });

        }



        window.initMap = initMap;

    </script>



    <script type="text/javascript"

        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
</div>
