<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movepopayán Viajero</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Estilos para el mapa -->
    <link rel="stylesheet" href="css/stylemap.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="index.html">
                <i class="fab fa-accusoft"></i>
                <strong class="d-none d-md-inline nav-item-over">MOVEPOPAYÁN</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right del Navbar -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <h3 id="estadoRecorrido" style="color: #FFFFFF">OFF</h3>
                    </li>&ensp;&ensp;&ensp;
                    <li class="nav-item">
                        <input type="text" id="numeroVehiculo" style="max-width:35px" name="numeroVehiculo" placeholder="123">
                    </li>
                    <li class="nav-item">
                        <button id="iniciarRecorridoBoton" class="nav-link btn-sm btn rounded btn-info">
                            ¡Iniciar recorrido!
                        </button>
                    </li>
                    <li class="nav-item">
                        <p  class="btn-sm btn d-none d-md-block btn-primary">
                            <!-- Aqui va el nombre de usuario maestro -->
                            Username
                        </p>
                    </li>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link btn-sm btn rounded btn-info">
                            Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Div para mostrar el mapa -->
    <div id="map"></div>

    


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <script src="js/ubicacionConductor.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDofv40C3A72DWtGGWNr3abXR0uA3p5KP4&callback=initMap">
    </script>

    <script>
        var marker;;
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

        document.getElementById('iniciarRecorridoBoton').addEventListener('click', function() {
            if (document.getElementById('estadoRecorrido').innerHTML == "OFF") {
                if (document.getElementById('numeroVehiculo').value.length > 0) {
                    var vehId = document.getElementById('numeroVehiculo').value;
                    window.open('https://127.0.0.1/GitHub/movepopayan/conductor.php?numeroVehiculo=' + vehId, '_self');
                }
                else
                    alert('Ingrese un número de vehículo (ID_TARJ).');
            }
            else
                window.open('https://127.0.0.1/GitHub/movepopayan/conductor.php', '_self');
        });
    </script>
    
    <!-- Envío de latitud y longitud a la base de datos. -->
    <?php
        if (isset($_GET['numeroVehiculo'])) {
            echo "<script>document.getElementById('estadoRecorrido').innerHTML = 'LIVE';</script>";
            echo "<script>document.getElementById('iniciarRecorridoBoton').innerHTML = '¡Apagar Recorrido!';</script>";
            $numeroVehiculo = $_GET['numeroVehiculo'];
            echo "<script>document.getElementById('numeroVehiculo').value = " . $numeroVehiculo . ";</script>";
            //echo "<script>document.getElementById('numeroVehiculo').disabled = true;</script>";
            
            if (isset($_GET['latitud']) && isset($_GET['longitud'])) {
                $sql = "SELECT recId FROM recorrido WHERE recHoraFinal IS null AND vehId = " . $numeroVehiculo;
    
                require("db_config.php");
                $arreglo[][]="";
                $i=0;
                if ($mbd->multi_query($sql)) {
                    do {
                        // primero almacenar el conjunto de resultados
                        if ($resultado = $mbd->use_result()) {
                            // Al usar MYSQLI_BOTH las columnas se duplican por que trae cada atributos con 2 etiquetas.
                            // MYSQLI_BOTH: nombre, número. MYSQLI_ASSOC: nombre. MYSQLI_NUM: numero.
                            while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
                                $tamañoColumnas = count($fila,0)/1;
                                $arreglo[$i] = $fila;
                                $i++;
                            }
                            $tamañoFilas = mysqli_num_rows($resultado);
                            $resultado->close();
                        }
                        /* imprimir un separador
                        if ($mbd->more_results()) {
                            printf("-----------------\n");
                        }*/
                    } while ($mbd->next_result());
                }
                else
                    echo "Error: " . $mbd->error . "<br>";
                
    
                for($x=0;$x<$tamañoColumnas;$x++)
                    $metadatos = array_keys($arreglo[0]);
                
                unset($tamañoColumnas);
                $tamañoColumnas="";
                
                $latitud = $_GET['latitud'];
                $longitud = $_GET['longitud'];
                
                //var_dump($tamañoColumnas);
                //echo "<script>alert('" . $arreglo[0]['recId'] . "');</script>";
    
                date_default_timezone_set("America/Bogota");
                $sql = "INSERT INTO coordenadasBusRecorrido(coordBusHora, coordBusLatitud, coordBusLongitud, recId) VALUES (" . date("Y-m-d H:i:s") . ", " . $latitud . ", " . $longitud . ", " . $arreglo[0]['recId'] . ")";
                require("db_config.php");
                $arreglo[][]="";
                $i=0;
    
                if ($mbd->multi_query($sql)) {
                    echo "<script> alert ('Reporte de localización creado.')</script>";
                }
                else
                    echo "Error: " . $mbd->error . "<br>";
                mysqli_close($mbd); 
            }
            //echo "<script>window.open('https://127.0.0.1/GitHub/movepopayan/conductor.php?numeroVehiculo=' + " . $numeroVehiculo . " + '&latitud=' + pos.lat + '&longitud=' + pos.lng, '_self');</script>";
            //echo "<script>alert ('refresh')</script>";
            echo "<script>refreshMarker();</script>";
            alert('!!');
            
        }
        //else {
            //echo "<script>document.getElementById('estadoRecorrido').innerHTML = 'OFF';</script>";
            //echo "<script>document.getElementById('iniciarRecorridoBoton').innerHTML = '¡Inicia Recorrido!';</script>";
            //echo "<script>document.getElementById('numeroVehiculo').disabled = false;</script>";
        //}
    ?>



</body>

</html>