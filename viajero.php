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
    <link href="css/styledivfloating.css" rel="stylesheet">
    <!-- Estilos para el mapa -->
    <link rel="stylesheet" href="css/stylemap.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="index.html">
                <i class="fab fa-accusoft"></i>
                <strong class="d-none d-md-inline">MOVEPOPAYÁN</strong>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#form">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Div para mostrar el mapa -->
    <div id="map"></div>

    <!-- Div para mostrar las direcciones del Google Directions. Actualmente invisible
    <div id="panel-google-directions"></div> -->

    <!-- PHP Consulta de rutas cercanas -->
    <?php
        
    ?>

    <!--#floating-panel 1. Div para mostrar contenedor flotante a la derecha -->
    <div id="floating-panel-1">
        <!--#encabezado-floating-panel-1-->
        <div id="encabezado-floating-panel-1">
            <h2>Usuario Viajero</h2>
            <p>Bienvenido, <?php echo "Andrés" ?>.</p>
            <br>
            <h3 id="info-pasos-seguir">Hola, a continuación puedes buscar las rutas cercanas a ti.</h3>
            <form method="post" id="formulario-ubicacion-actual">
                <input type='hidden' id='marcadores-text-lat' name='marcadores-text-lat'>
                <input type='hidden' id='marcadores-text-lng' name='marcadores-text-lng'>
                <input type="submit" name="buscaRutas" id="buscaRutas" value="Busca rutas!">
            </form><br>
            <button id='trazar' disabled="true">trazar!</button>&ensp;&ensp;
            <button onclick="reiniciarMapa()">Reinicia mapa</button>&ensp;&ensp;
            <button onclick="encuentrame()">Encuéntrame</button>&ensp;&ensp;
            <button onclick="personalizaPolylinea()">Personaliza</button><br><br>
            
        </div>
        <div id="contenedor-rutas">
            <!--#seccion-tabla-rutas-->
            <section id="seccion-tabla-rutas"> 
                <?php
                if(isset($_POST['buscaRutas'])) {
                    $latitudActual = $_POST['marcadores-text-lat'];
                    $longitudActual = $_POST['marcadores-text-lng'];
                    //$latitudActual = $_GET['lat'];
                    //$longitudActual = $_GET['lng'];

                    //$latitud=2.440985;
                    //$longitud=-76.606434;
                    echo "<script>document.getElementById('info-pasos-seguir').innerHTML = 'Ahora puedes darle click a una ruta de la tabla, y el botón trazar se habilitará.'</script>";
                    
                    require("db_config.php");
                    $arreglo[][]="";
                    $idRutasSeleccionadas[] = "";
                    $i=0;
                    // 3959: Millas - 6371: Kilómetros.
                    $radio = 1.0; // 10 metros
                    //echo $radio . "<br>";
                    $sql = "SELECT r.rutId, m.marcId, ( 6371 * acos( cos( radians( " . $latitudActual . " ) ) * cos( radians( marcLatitud ) ) * cos( radians( marcLongitud ) - radians( " . $longitudActual . " ) ) + sin( radians( " . $latitudActual . " ) ) * sin( radians( marcLatitud ) ) ) ) AS Distancia, rutNombre AS Nombre, rutEstado AS Estado, marcLatitud AS Latitud, marcLongitud AS Longitud FROM marcadorWayPoint m, ruta r WHERE rutEstado = 'disponible' HAVING Distancia < " . $radio . " ORDER BY rutId, Distancia ASC LIMIT 0 , 10";
                    //$sql = "SELECT marcId AS ID, rutId, ( 6371 * acos( cos( radians(" . $latitud . ") ) * cos( radians( marcLatitud ) ) * cos( radians( marcLongitud ) - radians(" . $longitud . ") ) + sin( radians(" . $latitud . ") ) * sin( radians( marcLatitud ) ) ) ) AS Distancia FROM marcadorWayPoint HAVING Distancia < 0.3 ORDER BY Distancia LIMIT 0 , 20;";
                    //$sql = "SELECT rutId AS ID, rutNombre AS Nombre, rutNombreCorto AS NomCorto, rutEstado AS Estado, rutFechaCreacion AS FechaCreacion FROM ruta";

                /* Ejecuta consulta a la base datos */
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
                        } while ($mbd->next_result());
                    }
                    else {
                        echo "Error: " . $mbd->error . "<br>";
                    }
                    mysqli_close($mbd);

                /* Comprueba si encontró resultados. Si es así, cre auna tabla. */
                    if(isset($arreglo[0]['rutId'])) {
                        echo "<table class=tabla id='tabla-rutas'>";
                        echo "<caption><span>Tabla 1.</span> Resumen de Rutas</caption>";
                        echo "<thead>";
                        for($x=0;$x<$tamañoColumnas;$x++){
                            $metadatos = array_keys($arreglo[0]);
                            echo "<th>" . $metadatos[$x] . "</th>";
                        }
                        echo "</thead>";
                        echo "<tbody style=" . "cursor:pointer" . ">";
                        for($x=0;$x<$tamañoFilas;$x++){
                            echo "<tr>";
                                for($y=0; $y<count($metadatos); $y++) {
                                    echo "<td>" . $arreglo[$x][$metadatos[$y]] . "</td>";
                                }
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table><br><br><br>";

                        for($x=0; $x<$tamañoFilas; $x++)
                            echo "<script>document.getElementById('tabla-rutas').rows[" . ($x+1) . "].onclick = function() { window.open('https://localhost/GitHub/movepopayan/viajero.php?rutId=" . $arreglo[$x]['rutId'] . "', '_self'); };</script>";

                    /* Selecciono los Id de las rutas encontradas. */
                        for($x=0; $x<$tamañoFilas; $x++){
                            $idRutasSeleccionadas[$x] = $arreglo[$x]['rutId'];
                            //echo "<script>agregaMarkerWay(" . $arreglo[$x]['Latitud'] . ", " . $arreglo[$x]['Longitud'] . ", 'Marcador: " . ($x) . "');</script>";
                        }
                        $idRutasSeleccionadas = array_values(array_unique($idRutasSeleccionadas));
                    }
                    else {
                        echo "<p>No hay Rutas no disponibles.</p><br><br><br>";
                    }
                }

                /* Trazo todas la ruta escogida. */
                if(isset($_GET['rutId'])) {
                    echo "<script>document.getElementById('trazar').disabled = false;</script>";
                    echo "<script>document.getElementById('info-pasos-seguir').innerHTML = '¡Despliega la Ruta!'</script>";
            
                    $rutId = $_GET['rutId'];
                    require("db_config.php");
                    $sql = "SELECT r.rutId AS ID, rutNombre AS Nombre, rutNombreCorto AS NomCorto, rutDescripcion AS Descripcion, rutEstado AS Estado, rutFechaCreacion AS FechaCreacion, marcId AS IDMarc, marcOrden AS Orden, marcLatitud AS Latitud, marcLongitud AS Longitud FROM ruta r , marcadorWayPoint m WHERE r.rutId = m.rutId AND r.rutId = " . $rutId;
                    
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
                        } while ($mbd->next_result());
                    }
                    else
                        echo "Error: " . $mbd->error . "<br>";
                    
                    mysqli_close($mbd);
                    
                    for($x=0;$x<$tamañoColumnas;$x++)
                        $metadatos = array_keys($arreglo[0]);
                    
                    unset($tamañoColumnas);
                    $tamañoColumnas="";

                    echo "<script>posicionOrigen = {lat: " . $arreglo[0]["Latitud"] . ", lng: " . $arreglo[0]["Longitud"] . "};</script>";
    
                    echo "<script>posicionDestino = {lat: " . $arreglo[$tamañoFilas-1]["Latitud"] . ", lng: " . $arreglo[$tamañoFilas-1]["Longitud"] . "};</script>";
                    
                    echo "<script>var waypts = [];";
                    for ($z = 1; $z < $tamañoFilas-1; $z++)
                        echo "waypts.push({location: {lat:" . $arreglo[$z]["Latitud"] . ", lng:" . $arreglo[$z]["Longitud"] . "}, stopover: false});";
                    echo "</script>";
                    
                    unset($tamañoFilas);
                    $tamañoFilas="";
                    
                    //echo "<script>alert(posicionOrigen.lat + ', ' + posicionDestino.lng + ', ' + waypts[0].lat);</script>";
                    //echo "<script>alert(JSON.stringify(waypts, null));</script>";
                    //echo "<script>alert(JSON.stringify(posicionOrigen, null));</script>";
                    
                    //echo "<script>document.getElementById('trazar').disabled = false;</script>";
                }
                ?>
            </section>
            <!--#seccion-rutas-seleccionadas-->
            <section>
                <h3>Ruta Seleccionada</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, aspernatur et! Optio deleniti, laboriosam quibusdam temporibus delectus sequi alias fugiat officia doloribus impedit sit nemo ab deserunt veniam expedita. Aliquam.</p>
                
            </section>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <script src="js/ubicacionUsuarioViajero.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDofv40C3A72DWtGGWNr3abXR0uA3p5KP4&callback=initMap">
    </script>
    <script>
        /* Función de refrescar la página. */
        function reiniciarMapa(){
            window.open ('https://localhost/GitHub/movepopayan/viajero.php', '_self');
        }
    </script>
</body>

</html>