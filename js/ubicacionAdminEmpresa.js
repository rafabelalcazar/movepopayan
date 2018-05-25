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

var lat;
var lng;
var posicionOrigen;
var posicionDestino;
var waypts;
var pointsArray;
var parqueCaldas = { lat: 2.440985, lng: -76.606434 };
var pueblitoPatojo = { lat: 2.44354, lng: -76.6013199 };

function initMap() {
  /* Creación del mapa */
  var mapOpciones = {
    //center: { lat: 2.4466152, lng: -76.5981539 },
    center: parqueCaldas,
    zoom: 15,
    /* Nuevas opciones para manejo de controles sobre el mapa. */
    //panControl: false,
    mapTypeControl: true,
    streetViewControl: false,
    fullscreenControl: true,
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

  var cursorInfo = "¡Hola!";

  var markersOpciones = {
      draggable: true,
      animation: google.maps.Animation.DROP,
      cursor: cursorInfo
  }

  var myPolylineOptions = {
    strokeColor: '#00000F',
    strokeOpacity: 0.6,
    strokeWeight: 10
  };

  var directionsDisplay = new google.maps.DirectionsRenderer({
      draggable: true,
      map: map,
      markerOptions: markersOpciones,
      suppressPolylines: false,
      polylineOptions: myPolylineOptions,
      panel: document.getElementById('panel-google-directions'),
  });
  var infoWindow = new google.maps.InfoWindow({ map: map });

  directionsDisplay.setMap(map);

  document.getElementById('trazar').addEventListener('click', function () {
    //alert(posicionOrigen.lat + ', ' + posicionDestino.lng + ', ' + waypts[0].lat);
    //document.getElementById('info-pasos-seguir').innerHTML = '¡Ruta Desplegada!';
    calculateAndDisplayRoute(directionsService, directionsDisplay);
    document.getElementById("editaMarcadores").disabled = false;
  });

  directionsDisplay.addListener('directions_changed', function () {
    computeTotalDistance(directionsDisplay.getDirections());
  });

  function computeTotalDistance(result) {
    var total = 0;
    var myroute = result.routes[0];
    guardarRuta(result);
    for (var i = 0; i < myroute.legs.length; i++)
      total += myroute.legs[i].distance.value;
    total = total / 1000;
    document.getElementById('total').innerHTML = total + ' km';
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

/* Función que despliega un recuadro de confirmación a la acción de ELIMINAR RUTA. */
function eliminarConfirmacion() {
  var opcion = confirm("¿Seguro desea eliminar la ruta?");
  if (opcion == true) {
      document.getElementsByName("confirma-eliminar")[0].value = "true";
  } else {
      document.getElementsByName("confirma-eliminar")[0].value = "false";
  }
}

/* Función indispensable para extraer los waypoints de una Ruta modificada en el Mapa. */
function guardarRuta(result) {
  pointsArray = [];
  pointsArray = result.routes[0].overview_path;
  //arreglo = result.routes[0].overview_path;
  //alert(JSON.stringify(arreglo, null));

  //var escr = JSON.stringify(pointsArray, null);
  //alert(JSON.stringify(pointsArray, null));
  //document.getElementsByName("marcadores-text-tamaño")[0].value = pointsArray.length;
  
  //alert(pointsArray.length);
  wayptsLat = [];
  wayptsLng = [];

  for (x=0; x<pointsArray.length; x++){
      wayptsLat += pointsArray[x].lat() + "|";
      wayptsLng += pointsArray[x].lng() + "|";
  }
  //for (x=0; x<pointsArray.length; x++)
      //wayptsNuevo += '|' + pointsArray[x];
  //for(var x=0; x<pointsArray.length; x++) 
  document.getElementsByName("marcadores-text-lat")[0].value = JSON.stringify(wayptsLat, null);
  document.getElementsByName("marcadores-text-lng")[0].value = JSON.stringify(wayptsLng, null);
}