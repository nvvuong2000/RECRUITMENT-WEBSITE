<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/style3.css')}}">

</head>

<body style='border:0; margin: 0'>
    <div id='map'></div>
    <div class="formBlock">
        <!-- <form id="form">
            <input type="text" name="start" class="input" id="start" placeholder="Choose starting point" />
            <input type="text" name="end" class="input" id="destination" placeholder="Choose starting point" />
            <button style="display: none;" type="submit">Get Directions</button>
        </form> -->
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>

    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=S8d7L47mdyAG5nHG09dUnSPJjreUVPeC"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=S8d7L47mdyAG5nHG09dUnSPJjreUVPeC"></script>

    <!-- <script src="{{asset('public/frontend/script/bando.js')}}"></script> -->
    <script>
        // default map layer
        let map = L.map('map', {
            layers: MQ.mapLayer(),
            center: [10.762622, 106.660172],
            zoom: 12
        });
        // var map = L.map('map').setView([10.762622, 106.660172], 9);

        L.tileLayer('https://api.maptiler.com/maps/basic/{z}/{x}/{y}.png?key=5IMHQG4mTZls9iLfxWeW', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
        }).addTo(map);
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                console.log('--- Your Position: ---');
                console.log('Lat: ' + position.coords.latitude);
                latit = position.coords.latitude;
                console.log('Long: ' + position.coords.longitude);
                longit = position.coords.longitude;
                var vitri = {
                    'kinhdo': position.coords.latitude,
                    'vido': position.coords.longitude
                }
                localStorage.setItem('vitri', JSON.stringify(vitri));
                console.log('---------------------');
                var abc = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);

            })
        }
        // function onGeoSuccess(position) {
        //     // $("#lat").innerHTML = position.coords.latitude;
        //     // $("#lon").innerHTML = position.coords.longitude;
        //     console.log(position.coords.latitude)
        // }

        // function onGeoError(error) {
        //     let detailError;

        //     if (error.code === error.PERMISSION_DENIED) {
        //         detailError = "User denied the request for Geolocation.";
        //     } else if (error.code === error.POSITION_UNAVAILABLE) {
        //         detailError = "Location information is unavailable.";
        //     } else if (error.code === error.TIMEOUT) {
        //         detailError = "The request to get user location timed out."
        //     } else if (error.code === error.UNKNOWN_ERROR) {
        //         detailError = "An unknown error occurred."
        //     }

        //     // $("#error").innerHTML = `Error: ${detailError}`;
        // }
        // let geolocation = navigator.geolocation;
        // if (geolocation) {
        //     // console.log('có');
        //     let options = {
        //         enableHighAccuracy: true,
        //         timeout: 5000,
        //         maximumAge: 0
        //     };
        //     geolocation.getCurrentPosition(onGeoSuccess, onGeoError, options);
        // } else {
        //     // Không hỗ trợ geolocation
        // }

        function runDirection(start, end) {

            // recreating new map layer after removal
            map = L.map('map', {
                layers: MQ.mapLayer(),
                center: [10.762622, 106.660172],
                zoom: 12
            });

            var dir = MQ.routing.directions();

            dir.route({
                locations: [
                    start,
                    end
                ]
            });


            CustomRouteLayer = MQ.Routing.RouteLayer.extend({
                createStartMarker: (location) => {
                    var custom_icon;
                    var marker;

                    custom_icon = L.icon({
                        iconUrl: 'img/red.png',
                        iconSize: [20, 29],
                        iconAnchor: [10, 29],
                        popupAnchor: [0, -29]
                    });

                    marker = L.marker(location.latLng, {
                        icon: custom_icon
                    }).addTo(map);

                    return marker;
                },

                createEndMarker: (location) => {
                    var custom_icon;
                    var marker;

                    custom_icon = L.icon({
                        iconUrl: 'img/blue.png',
                        iconSize: [20, 29],
                        iconAnchor: [10, 29],
                        popupAnchor: [0, -29]
                    });

                    marker = L.marker(location.latLng, {
                        icon: custom_icon
                    }).addTo(map);

                    return marker;
                }
            });

            map.addLayer(new CustomRouteLayer({
                directions: dir,
                fitBounds: true
            }));
        }
        window.onload = function() {
           setValue();
        };

        // function that runs when form submitted
        function setValue() {
            // event.preventDefault();
            var batdau = JSON.parse(localStorage.getItem('vitri'));
            console.log(batdau);
            var start = batdau.kinhdo + ',' + batdau.vido;

            // delete current map layer
            map.remove();

            // getting form data
            // start = document.getElementById("start").value;
            end = <?php echo $_SESSION['kinhdo'] ?> + ',' + <?php echo $_SESSION['vido'] ?>

            console.log(end);

            // run directions function
            runDirection(start, end);

            // reset form
            //document.getElementById("form").reset();
        }

        // asign the form to form variable
        // const form = document.getElementById('form');

        // call the submitForm() function when submitting the form
        // form.addEventListener('submit', submitForm);
    </script>
</body>

</html>