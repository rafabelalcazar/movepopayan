var pos;
var image;
var map;
var contador;
var iconoBusesito;
var parqueCaldas = { lat: 2.440985, lng: -76.606434 };

function initMap() {
  /* Creación del mapa */
  var mapOpciones = {
    //center: { lat: 2.4466152, lng: -76.5981539 },
    center: parqueCaldas,
    zoom: 15,
    /* Nuevas opciones para manejo de controles sobre el mapa. */
    //panControl: false,
    //mapTypeControl: false,
    streetViewControl: false,
    fullscreenControl: false,
    zoomControl: true,
    //noClear: true,
    zoomControlOptions: {
      position: google.maps.ControlPosition.TOP_LEFT
    },
    //mapTypeId: 'roadmap',
    styles: [
      {
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#ebe3cd"
          }
        ]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#523735"
          }
        ]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#f5f1e6"
          }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#c9b2a6"
          }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#dcd2be"
          }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#ae9e90"
          }
        ]
      },
      {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#a4a29b"
          }
        ]
      },
      {
        "featureType": "landscape.natural",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dfd2ae"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dfd2ae"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#93817c"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#a5b076"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#447530"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#f5f1e6"
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#fdfcf8"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#f8c967"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#e9bc62"
          }
        ]
      },
      {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#e98d58"
          }
        ]
      },
      {
        "featureType": "road.highway.controlled_access",
        "elementType": "geometry.stroke",
        "stylers": [
          {
            "color": "#db8555"
          }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#806b63"
          }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dfd2ae"
          }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#8f7d77"
          }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#ebe3cd"
          }
        ]
      },
      {
        "featureType": "transit.station",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dfd2ae"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#7daeff"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#92998d"
          }
        ]
      }
    ]
  };
  map = new google.maps.Map(document.getElementById('map'), mapOpciones);

  var infoWindow = new google.maps.InfoWindow({ map: map });

  /* Geolocalización */
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
        speed: position.coords.speed,
        acc: position.coords.accuracy
      };
      map.setCenter({ lat: pos.lat, lng: pos.lng });
      map.setZoom(14);

      /* Da diseño al ícono de bus. */
      iconoBusesito = { url: 'img/busmarker.svg',
        // This marker is 20 pixels wide by 32 pixels high.
        size: new google.maps.Size(30, 30),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(15, 15),
        scaledSize: new google.maps.Size(30, 30)
      };

      /* Incicializa el Contador en 0. */
      contador = 0;

      /* Imprime en consola */
      console.log(pos)


      /* Función Refresh Marker */
        function refreshMarker() {
            if (navigator.geolocation) {
                /* Comprueba si hay un marcador. Si lo hay, lo elimina. */
                if (marker != null) {
                    marker.setMap(null);
                    marker = null;
                }
                /* Extrae -en la variable pos- la latitud, lognitud, velocidad y precición de medida de la Geolocation API */
                navigator.geolocation.getCurrentPosition(function (position) {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                        speed: position.coords.speed,
                        acc: position.coords.accuracy
                    };
                });

                /* Crea marcador */
                marker = new google.maps.Marker({
                    position: {
                        lat: pos.lat,
                        lng: pos.lng
                    },
                    map: map,
                    draggable: false,
                    icon: iconoBusesito,
                    title: 'Mi ubicación'
                });
                map.setCenter({ lat: pos.lat, lng: pos.lng });
                map.setZoom(17);

                /* Evento click. Ventana de Información al darle Click al Marcador */
                marker.addListener('click', function () {
                    //posicionMarker = marker.getPosition();
                    var markerString = '<div class="infoWindow"><p>Latitud: ' + pos.lat + ',<br>Longitud:' + pos.lng + ',<br>Velocidad: ' + pos.speed + ',<br>Conteo: ' + contador + ',<br>Accuracy: ' + pos.acc + '</div>';
                    var markerInfoWindow = new google.maps.InfoWindow({
                        content: markerString,
                        maxWidth: 800
                    });
                    markerInfoWindow.open(map, marker);
                    setTimeout(function () {
                        markerInfoWindow.setMap(null);
                    }, 2500);
                });
            }
            /* Imprime en consola */
            console.log(pos)
            console.log(contador)
            setTimeout(function () { 
                var vehId = document.getElementById('numeroVehiculo').value;
                window.open('https://127.0.0.1/GitHub/movepopayan/conductor.php?numeroVehiculo=' + vehId + '&latitud=' + pos.lat + '&longitud=' + pos.lng, '_self');
            }, 5000);
        }
    },
    function () {
      handleLocationError(true, infoWindow, map.getCenter());
    });

  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  alert("Por favor vaya a configuraciones y encienda su GPS.");
  alert("Recargue la página.");
  infoWindow.setContent(browserHasGeolocation ?
    'Error: The Geolocation service failed.' :
    'Error: Your browser doesn\'t support geolocation.');
}
