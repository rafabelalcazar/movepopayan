//Este codigo de pruba lo tome de Google maps.
//Se ha modificado e zoom para hacer enfasis en la ciudad.
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

var marker;
var markersWay;
var pos;
var posicionOrigen; // Funcionamiento del directionsService
var posicionDestino; // Funcionamiento del directionsService
var waypts; // Funcionamiento del directionsService
var image;
var map;
var parqueCaldas = { lat: 2.440985, lng: -76.606434 };
var radio = 1000; // En Metros

function initMap() {
  /* Creación del mapa */
  var mapOpciones = {
    //center: { lat: 2.4466152, lng: -76.5981539 },
    center: parqueCaldas,
    zoom: 15,
    /* Nuevas opciones para manejo de controles sobre el mapa. */
    //panControl: false,
    //mapTypeControl: false,
    // streetViewControl: false, Darle más opciones
    // fullscreenControl: false,
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

  /* Directions API. Funciones que permiten trazar las rutas */
  var directionsService = new google.maps.DirectionsService;

  var cursorInfo = "No me puedo mover";

  var markersOpciones = {
      draggable: false,
      animation: google.maps.Animation.DROP,
      cursor: cursorInfo
  }

  var myPolylineOptions = {
    strokeColor: '#000000',
    strokeOpacity: 0.8,
    strokeWeight: 10
  };

  var directionsDisplay = new google.maps.DirectionsRenderer({
      draggable: false,
      map: map,
      markerOptions: markersOpciones,
      suppressPolylines: false,
      polylineOptions: myPolylineOptions,
      panel: document.getElementById('panel-google-directions'),
  });
  //var infoWindow = new google.maps.InfoWindow({ map: map });

  directionsDisplay.setMap(map);

  document.getElementById('trazar').addEventListener('click', function () {
    //alert(posicionOrigen.lat + ', ' + posicionDestino.lng + ', ' + waypts[0].lat);
    document.getElementById('info-pasos-seguir').innerHTML = '¡Ruta Desplegada!';
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  });

  /* Geolocalización */
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
        speed: position.coords.speed,
        acc: position.coords.accuracy
      };

      /* Diseño Icono Marcador */
      image = {
        url: 'img/marker-b.svg',
        // This marker is 20 pixels wide by 32 pixels high.
        size: new google.maps.Size(30, 30),
        // The origin for this image is (0, 0).
        origin: new google.maps.Point(0, 0),
        // The anchor for this image is the base of the flagpole at (0, 32).
        anchor: new google.maps.Point(15, 15),
        scaledSize: new google.maps.Size(30, 30)
      };

      /* Crea marcador */
      marker = new google.maps.Marker({
        position: {
          lat: pos.lat,
          lng: pos.lng
        },
        map: map,
        draggable: false,
        icon: image,
        animation: google.maps.Animation.DROP,
        title: 'Estoy Aquí'
      });
      
      /* Efecto al iniciar la página */
      setTimeout(function () {
        map.setCenter(pos);
        map.setZoom(18);
        toggleBounce();
        circulo(radio);
      }, 1000);

      /* Envía las coordenadas de ubicación a cuadros de texto ocultos. */
      document.getElementsByName("marcadores-text-lat")[0].value = pos.lat;
      document.getElementsByName("marcadores-text-lng")[0].value = pos.lng;
      //window.open('https://localhost/GitHub/movepopayan/viajero.php?lat=' + pos.lat + ",lng=" + pos.lng, '_self');

      /* Imprime en consola */
      console.log(pos)
    },
    function () {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  }
  else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

/* Directions API. función que pinta la ruta en el mapa. */
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  //alert(posicionOrigen.lat + ', ' + posicionDestino.lng + ', ' + waypts[0].lat);
  //alert(JSON.stringify(waypts, null));
  var ruta = directionsService.route({
      origin: posicionOrigen,
      destination: posicionDestino,
      optimizeWaypoints: true,
      waypoints: waypts,
      travelMode: google.maps.TravelMode['DRIVING']
  }, function(response, status) {
      if (status == 'OK') {
          //alert(posicionOrigen.lat + ', ' + posicionDestino.lng + ', ' + waypts[0].lat);
          directionsDisplay.setDirections(response);
          //var route = response.routes[0];
      }
      else
          window.alert('Directions request failed due to ' + status);
  });
}

/* Función de crear marcadores. /
function agregaMarkerWay(latitud, longitud, titulo) {
  var markerWay = new google.maps.Marker({
    position: {
      lat: latitud,
      lng: longitud
    },
    map: map,
    draggable: false,
    title: titulo
  });
  markersWay.push(markerWay);
}*/

/* Función que lanza error al no poder acceder a la ubicacion del usuario. */
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  alert("Por favor vaya a configuraciones y encienda su GPS.");
  alert("Recargue la página.");
  infoWindow.setContent(browserHasGeolocation ?
    'Error: The Geolocation service failed.' :
    'Error: Your browser doesn\'t support geolocation.');
}

/* Función para hacer un círculo alrededor de la ubicación. */
function circulo(radio) {
  var markerCirculo = new google.maps.Circle({
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35,
    map: map,
    center: { lat: pos.lat, lng: pos.lng },
    //center: parqueCaldas,
    radius: radio
  });
  //markerCirculo.setMap(null);
}

/* Función ToggleBounce. */
function toggleBounce() {
  if (marker.getAnimation() != null) {
    marker.setAnimation(null);
  }
  else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
    setTimeout(function () {
      marker.setAnimation(null);
    }, 2000);
  }
}

/* Función Ecuéntrame */
function encuentrame () {
  map.setCenter(pos);
  map.setZoom(16);
  toggleBounce();
}
