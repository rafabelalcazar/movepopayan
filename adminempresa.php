<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Administrador Empresa</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/styleempresa.css" rel="stylesheet">
    <!-- Estilos de Mapa -->
    <link rel="stylesheet" href="css/stylemap.css">
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg bg-dark navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="index.html">
                    <i class="fab fa-accusoft text-white"></i>
                    <strong class="text-white">MOVEPOPAYÁN</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white"></i>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item nav-item-over">
                            <a class="nav-link waves-effect text-white" href="#tabla">Tablas
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item nav-item-over">
                            <a class="nav-link waves-effect text-white" href="#mapcard">Mapa</a>
                        </li>
                        <li class="nav-item nav-item-over">
                            <a class="nav-link waves-effect text-white" href="#" data-toggle="modal" data-target="#modalConductores">Conductores</a>
                        </li>
                        <li class="nav-item nav-item-over">
                            <a class="nav-link waves-effect text-white" href="#">Crear rutas</a>
                        </li>
                        <li class="nav-item nav-item-over">
                            <a class="nav-link waves-effect text-white" href="#">Autobus</a>
                        </li>
                        <li class="nav-item nav-item-over">
                            <a class="nav-link waves-effect text-white" href="#">Reportes</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <p class="btn-sm btn d-none d-md-block btn-primary">
                                <!-- Aqui va el nombre de usuario maestro -->
                                Username
                            </p>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link btn-sm btn rounded btn-info">
                                Cerrar sesión
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed bg-dark">

            <a class="waves-effect m-0 justify-content-center d-flex">
                <h1 class="text-white bg-primary waves-circle m-4">
                    <i class="fas fa-camera-retro"></i>

                    <!-- <img src="" class="img-fluid" alt="foto en futuras actualizaciones"> -->
                </h1>
            </a>

            <div class="list-group list-group-flush">
                <a href="#" class=" disabled list-group-item list-group-item-action waves-effect nav-item-over  bg-dark text-white">
                    <i class="fa fa-user mr-3"></i>Perfil</a>
                <a href="#tabla" class=" list-group-item list-group-item-action waves-effect bg-dark  nav-item-over text-white">
                    <i class="fa fa-table mr-3"></i>Tablas</a>
                <a href="#mapcard" class=" list-group-item list-group-item-action waves-effect bg-dark  nav-item-over text-white">
                    <i class="fa fa-map mr-3"></i>Mapa</a>
                <a href="gestcond.php" class=" list-group-item list-group-item-action waves-effect bg-dark  nav-item-over text-white" data-toggle="modal"
                    data-target="#modalConductores">
                    <i class="fas fa-user-friends mr-3"></i>Conductores</a>
                <a href="#" class=" list-group-item list-group-item-action waves-effect bg-dark  nav-item-over text-white">
                    <i class="fas fa-road mr-3"></i>Crear rutas</a>
                <a href="#" class=" list-group-item list-group-item-action waves-effect bg-dark  nav-item-over text-white">
                    <i class="fas fa-bus mr-3"></i>Autobus</a>
                <a href="#" class=" list-group-item list-group-item-action waves-effect bg-dark  nav-item-over text-white">
                    <i class="fas fa-chart-area mr-3"></i>Reportes</a>
                <a href="#" class=" disabled list-group-item list-group-item-action waves-effect nav-item-over  bg-dark text-white">
                    <i class="fas fa-coins  mr-3"></i>Facturación</a>
            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mx-lg-5 p-content">
        <div class="container-fluid">

            <!--Grid row-->
            <div id="mapcard" class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header">Ver autobuses en mapa</div>

                        <!--Card content-->
                        <div class="card-body">

                            <div class="text-center">
                                <button class="btn btn-indigo" id="trazar" disabled="true">¡Traza la ruta!</button>&ensp;
                            </div>
                            
                            <!--Google map-->
                            <div id="map" class="z-depth-1" style="height: 500px"></div>

                            <!-- Tabla de rutas -->
                            <div class="row wow fadeInRight ">

                                <!--Grid column-->
                                <div class="col-md-12 my-4">

                                    <!--Card-->
                                    <div class="card">

                                        <!--Card content-->
                                        <div class="card-body">
                                            <h1 class="btn btn-outline-primary d-flex justify-content-center text-center">Gestión rutas</h1>
                                            <!-- Table -->
                                            <?php
                                            
                                                require("db_config.php");
                                                $arreglo[][]="";
                                                $i=0;
                                                $sql = "SELECT rutId AS ID, rutNombre AS Nombre, rutNombreCorto AS 'Nombre Corto', rutDescripcion AS Descripcion, rutEstado AS Estado, rutFechaCreacion AS FechaCreacion FROM ruta";
                                                
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

                                            /* Crea una tabla. */
                                                echo "<table class='table table-hover text-center table-sm table-responsive-sm' id='tabla-rutas'>";
                                                //echo "<caption><span>Tabla 1.</span> Resumen de Rutas</caption>";
                                                // Table head
                                                echo "<thead class='blue-grey lighten-4'>";
                                                for($x=0;$x<$tamañoColumnas;$x++){
                                                    $metadatos = array_keys($arreglo[0]);
                                                    echo "<th>" . $metadatos[$x] . "</th>";
                                                }
                                                echo "</thead>";
                                                //echo "<tbody style=" . "cursor:pointer" . ">";
                                                echo "<tbody>";
                                                for($x=0;$x<$tamañoFilas;$x++){
                                                    echo "<tr>";
                                                        for($y=0; $y<count($metadatos); $y++) {
                                                            echo "<td>" . $arreglo[$x][$metadatos[$y]] . "</td>";
                                                        }
                                                        echo "<td><a href='https://localhost/GitHub/movepopayan/adminempresa.php?rutId=" . $arreglo[$x]['ID'] . "'>e</td>";
                                                        echo "<td><a href='https://localhost/GitHub/movepopayan/adminempresa.php?rutId=" . $arreglo[$x]['ID'] . "&banderaEliminar=1'>x</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</tbody>";
                                                echo "</table><br><br><br>";
                                                //for($x=0; $x<$tamañoFilas; $x++)
                                                //echo "<script>document.getElementById('tabla-rutas').rows[" . ($x+1) . "].onclick = function() { window.open('https://localhost/GitHub/movepopayan/adminempresa.php?rutId=" . $arreglo[$x]['ID'] . "', '_self'); };</script>";
                                            
                                            
                                            ?>

                                            <!--Card-->
                                            <div class="card my-2">
                                                <!--Card content-->
                                                <div class="card-body">
                                                    <?php 
                                                    /* LEE RUTA */
                                                        if (isset($_GET['rutId'])){
                                                            echo "<script>document.getElementById('trazar').disabled = false;</script>";
                                                            $rutIdEditar = $_GET['rutId'];

                                                            // Recupera los datos -de la base de datos-, respectivos, a la ruta y sus marcadores.
                                                            $sql = "SELECT r.rutId AS ID, rutNombre AS Nombre, rutNombreCorto AS NombreCorto, rutDescripcion AS Descripcion, rutEstado AS Estado, rutFechaCreacion AS FechaCreacion, marcId AS IDMarc, marcOrden AS Orden, marcLatitud AS Latitud, marcLongitud AS Longitud FROM ruta r , marcadorWayPoint m WHERE r.rutId = m.rutId AND r.rutId = " . $rutIdEditar;
                                                            
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
                                                            
                                                            mysqli_close($mbd);

                                                            for($x=0;$x<$tamañoColumnas;$x++)
                                                                $metadatos = array_keys($arreglo[0]);
                                                            
                                                            unset($tamañoColumnas);
                                                            $tamañoColumnas="";
                                                            //var_dump($tamañoColumnas);
                                                            
                                                            echo "<script>posicionOrigen = {lat: " . $arreglo[0]["Latitud"] . ", lng: " . $arreglo[0]["Longitud"] . "};</script>";
                                                            echo "<script>posicionDestino = {lat: " . $arreglo[$tamañoFilas-1]["Latitud"] . ", lng: " . $arreglo[$tamañoFilas-1]["Longitud"] . "};</script>";
                                                            echo "<script>var waypts = [];";
                                                            for ($z = 1; $z < $tamañoFilas-1; $z++)
                                                                echo "waypts.push({location: {lat:" . $arreglo[$z]["Latitud"] . ", lng:" . $arreglo[$z]["Longitud"] . "}, stopover: false});";
                                                            echo "</script>";
                                                            
                                                            unset($tamañoFilas);
                                                            $tamañoFilas="";
                                                            //var_dump($tamañoFilas);
                                                        }
                                                    /* ELIMINA RUTA */
                                                        // Si se va a eliminar, consulta todos los marcadores pertenecientes al ID de ruta escogido.
                                                        if (isset($_GET['rutId']) && isset($_GET['banderaEliminar'])){
                                                            $rutIdEditar = $_GET['rutId'];
                                                            // Recupera los datos -de la base de datos-, respectivos, a la ruta y sus marcadores.
                                                            $sql = "SELECT r.rutId AS ID, rutNombreCorto AS NomCorto, rutEstado AS Estado, rutFechaCreacion AS FechaCreacion, marcId AS IDMarc, marcOrden AS Orden FROM ruta r , marcadorWayPoint m WHERE r.rutId = m.rutId AND r.rutId = " . $rutIdEditar;
                                                            
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
                                                            // Comprueba que los marcadores a eliminar sean todos los disponibles
                                                            mysqli_close($mbd);
                                                            
                                                            // Consulta todos los marcadores, con las ID correspondientes, para contarlos.
                                                            $i=0;
                                                            for($x=0;$x<$tamañoFilas;$x++){
                                                                $sql="SELECT * FROM marcadorWayPoint WHERE marcId=" . $arreglo[$x]["IDMarc"] . ";";
                                                                //echo $sql;
                                                                require("db_config.php");
                                                                if ($mbd->multi_query($sql))
                                                                    $i++;
                                                                    //echo $i;
                                                                else
                                                                    echo "Error: " . $mbd->error . "<br>";
                                                            }
                                                            $rest = $arreglo[$tamañoFilas-1]["IDMarc"]-$arreglo[0]["IDMarc"]+1;
                                                            //echo $i . ", se elmina con: " . $rest;

                                                            if($rest==$i && !isset($_GET['confirmacionEliminar'])){
                                                                //echo "Si se da ";
                                                                //echo "<script>eliminarConfirmacion();</script>";
                                                                echo "<script>var opcion = confirm('¿Seguro desea eliminar la ruta?');if (opcion == true) {window.open('https://localhost/GitHub/movepopayan/adminempresa.php?rutId=" . $rutIdEditar . "&banderaEliminar=1&confirmacionEliminar=1', '_self');} else {window.open('https://localhost/GitHub/movepopayan/adminempresa.php?rutId=" . $rutIdEditar . "&banderaEliminar=1&confirmacionEliminar=0', '_self');}</script>";
                                                                //echo $confirm;
                                                            }
                                                            
                                                            // Si la función anterior es "true", procede a eliminar.
                                                            if($_GET['confirmacionEliminar']==1) {
                                                                $y=0;
                                                                for($x=0;$x<$tamañoFilas;$x++){
                                                                    $sql="DELETE FROM marcadorWayPoint WHERE marcID=" . $arreglo[$x]["IDMarc"] . ";";
                                                                    //echo $sql;
                                                                    require("db_config.php");
                                                                    if ($mbd->multi_query($sql))
                                                                        $y++;
                                                                        //echo $i;
                                                                    else
                                                                        echo "Error: " . $mbd->error . "<br>";
                                                                }
                                                                $sql="DELETE FROM ruta WHERE rutID=" . $arreglo[0]["ID"] . ";";
                                                                //echo $sql;
                                                                if ($mbd->multi_query($sql)){
                                                                    echo "<script> alert ('" . $y . " marcadores eliminados. Ruta eliminada.')</script>";
                                                                    echo "<script> window.open('https://localhost/GitHub/movepopayan/adminempresa.php', '_self')</script>";
                                                                }
                                                                else
                                                                    echo "Error: " . $mbd->error . "<br>";
                                                            }
                                                            if($_GET['confirmacionEliminar']==0) {
                                                                    echo "<script> alert ('Proceso abortado.')</script>";
                                                                    echo "<script> window.open('https://localhost/GitHub/movepopayan/adminempresa.php', '_self')</script>";
                                                            }
                                                        }
                                                    ?>

                                                <!-- Utiliza los datos recogidos de las Rutas, y los refleja en los textfiles. -->
                                                    <form method="post" id="formulario-update-ruta">
                                                        <h3 class="dark-grey-text text-center">
                                                            <strong>Gestión de rutas</strong>
                                                        </h3>
                                                        <hr>
                                                        <div class="md-form">
                                                            <!-- <i class="fas fa-bus prefix grey-text"></i> -->
                                                            <input type="text" id="<?php echo $metadatos[0]; ?>" name="<?php echo $metadatos[0]; ?>" value="<?php echo $arreglo[0][$metadatos[0]]; ?>" readonly="readonly" class="form-control" min="1" max="3000">
                                                            <label for="<?php echo $metadatos[0]; ?>"><?php echo $metadatos[0] . ":";?>&ensp;&ensp;</label>
                                                        </div>
                                                        <div class="md-form">
                                                            <!-- <i class="fas fa-bus prefix grey-text"></i> -->
                                                            <input type="text" id="<?php echo $metadatos[1]; ?>" name="<?php echo $metadatos[1]; ?>" value="<?php echo $arreglo[0][$metadatos[1]]; ?>" class="form-control" min="1" max="3000">
                                                            <label for="<?php echo $metadatos[1]; ?>"><?php echo $metadatos[1] . ":";?>&ensp;&ensp;</label>
                                                        </div>
                                                        <div class="md-form">
                                                            <!-- <i class="fas fa-bus prefix grey-text"></i> -->
                                                            <input type="text" id="<?php echo $metadatos[2]; ?>" name="<?php echo $metadatos[2]; ?>" value="<?php echo $arreglo[0][$metadatos[2]]; ?>" class="form-control" min="1" max="3000">
                                                            <label for="<?php echo $metadatos[2]; ?>"><?php echo $metadatos[2] . ":";?>&ensp;&ensp;</label>
                                                        </div>
                                                        <div class="md-form">
                                                            <!-- <i class="fas fa-bus prefix grey-text"></i> -->
                                                            <input type="text" id="<?php echo $metadatos[3]; ?>" name="<?php echo $metadatos[3]; ?>" value="<?php echo $arreglo[0][$metadatos[3]]; ?>" class="form-control" min="1" max="3000">
                                                            <label for="<?php echo $metadatos[3]; ?>"><?php echo $metadatos[3] . ":";?>&ensp;&ensp;</label>
                                                        </div>
                                                        <div class="md-form">
                                                            <!-- <i class="fas fa-bus prefix grey-text"></i> -->
                                                            <input type="text" id="<?php echo $metadatos[4]; ?>" name="<?php echo $metadatos[4]; ?>" value="<?php echo $arreglo[0][$metadatos[4]]; ?>" readonly="readonly" class="form-control" min="1" max="3000">
                                                            <label for="<?php echo $metadatos[4]; ?>"><?php echo $metadatos[4] . ":";?>&ensp;&ensp;</label>
                                                        </div>
                                                        <div class="md-form">
                                                            <!-- <i class="fas fa-bus prefix grey-text"></i> -->
                                                            <input type="text" id="<?php echo $metadatos[5]; ?>" name="<?php echo $metadatos[5]; ?>" value="<?php echo $arreglo[0][$metadatos[5]]; ?>" readonly="readonly" class="form-control" min="1" max="3000">
                                                            <label for="<?php echo $metadatos[5]; ?>"><?php echo $metadatos[5] . ":";?>&ensp;&ensp;</label>
                                                        </div>
                                                        <input type="checkbox" id="editaMarcadores" name="editaMarcadores" value='true' disabled> ¿Editar Marcadores?
                                                        <!-- input text invisibles para segmentar el Objeto '$pointsArray' extraido de la funcion 'result.routes[0].overview_path;' -->
                                                        <!-- <input type='text' id='marcadores-text-tamaño' name='marcadores-text-tamaño'><br> -->
                                                        <input type='hidden' id='marcadores-text-lat' name='marcadores-text-lat'>
                                                        <input type='hidden' id='marcadores-text-lng' name='marcadores-text-lng'>

                                                        <div class="text-center">
                                                            <br>
                                                            <input type="submit" class="btn btn-indigo" name="actualizarRuta" onclick="computeTotalDistance(directionsDisplay.getDirections())" value="Actualizar Información de la Ruta">&ensp;&ensp;
                                                            <input type="submit" class="btn btn-indigo" name="crearRuta" id="crearRuta" value="Crea una nueva Ruta!">                              
                                                            <hr>
                                                        </div>

                                                    </form><!--#formulario-update-ruta-->
                                                    <!-- Form -->

                                                    <?php
                                                        unset($arreglo);
                                                        $arreglo[][]="";

                                                    /* CREAR RUTA */
                                                        if(isset($_POST['crearRuta'])){
                                                            require("db_config.php");
                                                            // Consulta el último ID de los elementos de las rutas, y crea el objeto justo en el siguiente.
                                                            $sql = "SELECT MAX(rutId) FROM ruta";
                                                            $i=0;
                                                            if ($mbd->multi_query($sql)) {
                                                                do {
                                                                    if ($resultado = $mbd->use_result()) {
                                                                        // Al usar MYSQLI_BOTH las columnas se duplican por que trae cada atributos con 2 etiquetas.
                                                                        // MYSQLI_BOTH: nombre, número. MYSQLI_ASSOC: nombre. MYSQLI_NUM: numero.
                                                                        while ($fila = $resultado->fetch_array(MYSQLI_NUM)) {
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
                                                            
                                                            //mysqli_close($mbd);

                                                            unset($tamañoColumnas);
                                                            $tamañoColumnas="";
                                                            unset($tamañoColumnas);
                                                            $tamañoFilas="";
                                                            $rutId=$arreglo[0][0]+1;
                                                            unset($arreglo);
                                                            $arreglo[][]="";
                                                            

                                                            // ********* Inserta la nueva Ruta ***********
                                                            date_default_timezone_set("America/Bogota");
                                                            $sql1 = "INSERT INTO ruta VALUES (" . $rutId . ", 'Ruta #', 'R#', 'Añada una descripción', 'disponible', '" . date("Y-m-d H:i:s") . "');";
                                                            
                                                            require("db_config.php");
                                                            if ($mbd->multi_query($sql1)){
                                                                $marcadorId = $rutId * 100;

                                                                //********* Inserta los marcadores de la nueva Ruta ***********
                                                                $sql2 = "INSERT INTO marcadorWayPoint VALUES (" . ($marcadorId + 0) . "," . 1 . ",2.44354,-76.6013199," . $rutId . "); INSERT INTO marcadorWayPoint VALUES (" . ($marcadorId + 1) . "," . 2 . ",2.440995,-76.608534," . $rutId . "); INSERT INTO marcadorWayPoint VALUES (" . ($marcadorId + 2) . "," . 3 . ",2.441985,-76.606434," . $rutId . ");";
                                                                echo $sql1;
                                                                require("db_config.php");
                                                                if ($mbd->multi_query($sql2)){
                                                                    //if($x==2){
                                                                        echo "<script> alert ('Ruta creada.')</script>";
                                                                        echo "<script> window.open('https://localhost/GitHub/movepopayan/adminempresa.php?rutId=" . $rutId . "', '_self')</script>";
                                                                        $rutId = 0;
                                                                    //}
                                                                }
                                                                else
                                                                    echo "Error: " . $mbd->error . "<br>";
                                                            }
                                                            else
                                                                echo "Error: " . $mbd->error . "<br>";
                                                            mysqli_close($mbd);
                                                        }
                                                    /* ACTUALIZAR RUTA */
                                                        if(isset($_POST['actualizarRuta'])){
                                                            $rutIdEditar = $_POST[$metadatos[0]];
                                                            $actualizar_rutNombre = $_POST[$metadatos[1]];
                                                            $actualizar_rutNombreCorto = $_POST[$metadatos[2]];
                                                            $actualizar_rutDescripcion = $_POST[$metadatos[3]];
                                                            $actualizar_rutEstado = $_POST[$metadatos[4]];
                                                            $actualizar_rutFechaCreacion = $_POST[$metadatos[5]];
                                                            $actualizar_marcadores = "";
                                                            $actualizar_marcadoresLat = $_POST['marcadores-text-lat'];
                                                            $actualizar_marcadoresLng = $_POST['marcadores-text-lng'];
                                                            if(isset($_POST['editaMarcadores']))
                                                                $actualizar_marcadores = $_POST['editaMarcadores'];

                                                            unset($metadatos);
                                                            $metadatos[][]="";
                                                            //var_dump($metadatos);

                                                            if($actualizar_marcadores == 'true') {
                                                                require("db_config.php");
                                                                // Recupera los datos -de la base de datos-, respectivos, a la ruta y sus marcadores.
                                                                $sql = "SELECT marcId FROM ruta r , marcadorWayPoint m WHERE r.rutId = m.rutId AND r.rutId = " . $rutIdEditar;
                                                                $i=0;
                                                                if ($mbd->multi_query($sql)) {
                                                                    do {
                                                                        // primero almacenar el conjunto de resultados
                                                                        if ($resultado = $mbd->use_result()) {
                                                                            // Al usar MYSQLI_BOTH las columnas se duplican por que trae cada atributos con 2 etiquetas.
                                                                            // MYSQLI_BOTH: nombre, número. MYSQLI_ASSOC: nombre. MYSQLI_NUM: numero.
                                                                            while ($fila = $resultado->fetch_array(MYSQLI_NUM)) {
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
                                                                //mysqli_close($mbd);

                                                                unset($tamañoColumnas);
                                                                $tamañoColumnas="";
                                                                unset($tamañoColumnas);
                                                                $tamañoFilas="";
                                                                //var_dump($tamañoColumnas);
                                                                //var_dump($tamañoFilas);
                                                                //echo "<br><br>";
                                                                
                                                                //var_dump($arreglo);
                                                                //echo "<br><br>";
                                                                /* Función para cambiar de columnas a filas. */
                                                                $idMarcador = array();
                                                                foreach ($arreglo as $key => $subarr) {
                                                                    foreach ($subarr as $subkey => $subvalue) {
                                                                        $idMarcador[$subkey][$key] = $subvalue;
                                                                    }
                                                                }
                                                                unset($arreglo);
                                                                $arreglo[][] = "";
                                                                //var_dump($arreglo);
                                                                //echo "<br><br>";
                                                                //var_dump($idMarcador);
                                                                //echo "<br><br>";

                                                                unset($wayptsLatNuevo);
                                                                unset($wayptsLngNuevo);
                                                                $wayptsLatNuevo[][] = "";
                                                                $wayptsLngNuevo[][] = "";

                                                                $wayptsLatNuevo = explode('|', $actualizar_marcadoresLat);
                                                                $wayptsLngNuevo = explode('|', $actualizar_marcadoresLng);
                                                                //var_dump($wayptsLngNuevo);
                                                                //var_dump($idMarcador);
                                                                if (count($wayptsLatNuevo,0)>23) {
                                                                    echo "<script> alert ('La ruta tiene más de 25 Waypoints. Marcadores NO actualizados.')</script>";
                                                                }
                                                                else {
                                                                    // Elimina marcadores registrador anteriormente, para introducir nueva ruta en los mismos.
                                                                    for($x=0;$x<count($idMarcador[0],0);$x++){
                                                                        $sql = "DELETE FROM marcadorWayPoint WHERE marcId='" . $idMarcador[0][$x] . "';";
                                                                        require("db_config.php");
                                                                        $mbd = mysqli_query($mbd, $sql);
                                                                    }
                                                                    for($x=0;$x<count($wayptsLatNuevo,0);$x++){
                                                                        $sumaId = $idMarcador[0][0] - 1 + $x;
                                                                        $sql = "INSERT INTO marcadorWayPoint VALUES (" . $sumaId . "," . $x . "," . $wayptsLatNuevo[$x] . "," . $wayptsLngNuevo[$x] . "," . $rutIdEditar . ");";
                                    
                                                                        require("db_config.php");
                                                                        $mbd = mysqli_query($mbd, $sql);
                                                                        //echo $sql . "<br>";
                                                                    }
                                                                    $actualizar_rutEstado = "disponible";
                                                                    echo "<script> alert ('Marcadores actualizados.')</script>";
                                                                }
                                                            }
                                                            unset($actualizar_marcadores);
                                                            $actualizar_marcadores=""; 

                                                            $sql = "UPDATE ruta SET rutNombre='" . $actualizar_rutNombre . "',rutNombreCorto='" . $actualizar_rutNombreCorto . "', rutDescripcion='" . $actualizar_rutDescripcion . "', rutEstado='" . $actualizar_rutEstado . "', rutFechaCreacion='" . $actualizar_rutFechaCreacion . "' WHERE rutId='" . $rutIdEditar . "';";
                                                            //echo "<p>" . $sql ."</p>";
                                                            require("db_config.php");
                                                            $mbd = mysqli_query($mbd, $sql);
                                                            if ($mbd) {
                                                                echo "<script> alert ('Datos actualizados')</script>";
                                                                echo "<script> document.getElementById('editaMarcadores').disabled = true; </script>;";
                                                                echo "<script> window.open('https://localhost/GitHub/movepopayan/adminempresa.php', '_self')</script>";
                                                            }
                                                        }
                                                    ?>

                                                </div>
                                            </div>
                                            <!--/.Card-->

                                        <!-- Form de gestion de conductores -->
                                            <!--Grid row-->
                                            <div class="row wow fadeIn">

                                                <!--Grid column-->
                                                <div class="col-md-12 mb-4">

                                                    <!--Card-->
                                                    <div class="card">

                                                        <!--Card content-->
                                                        <div class="card-body">
                                                            <h1 class="btn btn-outline-primary d-flex justify-content-center text-center">Editar Conductores</h1>
                                                            <!-- Table  -->
                                                            <table class="table table-hover text-center table-sm table-responsive-sm">
                                                                <!-- Table head -->
                                                                <thead class="blue-grey lighten-4">
                                                                    <tr>
                                                                        <th>Id</th>
                                                                        <th>Nombres</th>
                                                                        <th>Apelidos</th>
                                                                        <th>Temperatura</th>
                                                                        <th>AutoAsignado</th>
                                                                        <th>Estado</th>
                                                                        <th>Editar</th>
                                                                    </tr>
                                                                </thead>
                                                                <!-- Table head -->

                                                                <!-- Table body -->
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Cell 1</td>
                                                                        <td>Cell 2</td>
                                                                        <td>Cell 3</td>
                                                                        <td>dfgh</td>
                                                                        <td>dfg</td>
                                                                        <td>dfg</td>
                                                                    </tr>

                                                                </tbody>
                                                                <!-- Table body -->
                                                            </table>
                                                            <!-- Table  -->

                                                        </div>

                                                    </div>
                                                    <!--/.Card-->

                                                </div>
                                                <!--Grid column-->

                                            </div>
                                            <!--Grid row-->








                                        </div>
                                    </div>
                                    <!--/.Card-->
                                </div>
                                <!--Grid column-->


                            </div>
                            <!-- Fin Tabla rutas -->

                            <!-- Tabla de mediciones -->
                            <!--Grid row-->
                            <div class="row wow fadeInLeft">

                                <!--Grid column-->
                                <div class="col-md-12 mb-4">

                                    <!--Card-->
                                    <div class="card">

                                        <!--Card content-->
                                        <div class="card-body">
                                            <h1 class="btn btn-outline-primary d-flex justify-content-center text-center">Tabla de medidas</h1>

                                            <!-- Table  -->
                                            <table class="table table-hover text-center table-sm table-responsive-sm">
                                                <!-- Table head -->
                                                <thead class="blue-grey lighten-4">
                                                    <tr>
                                                        <th>Vehiculo</th>
                                                        <th>Fecha</th>
                                                        <th>Hora</th>
                                                        <th>Temperatura</th>
                                                        <th>Humedad</th>
                                                        <th>Up pass</th>
                                                        <th>Down pass</th>
                                                    </tr>
                                                </thead>
                                                <!-- Table head -->

                                                <!-- Table body -->
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Cell 1</td>
                                                        <td>Cell 2</td>
                                                        <td>Cell 3</td>
                                                        <td>dfgh</td>
                                                        <td>dfg</td>
                                                        <td>dfg</td>
                                                    </tr>

                                                </tbody>
                                                <!-- Table body -->
                                            </table>
                                            <!-- Table  -->

                                        </div>

                                    </div>
                                    <!--/.Card-->

                                </div>
                                <!--Grid column-->


                            </div>
                            <!--Grid row-->
                            <!-- Fin Tabla de mediciones -->


                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Section: Modals-->
                        <section>
                            <!--Modal Large para conductores-->
                            <div class="modal fade" id="modalConductores" tabindex="-7" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
                                    <!--Content-->
                                    <div class="modal-content">
                                        <!--Header-->
                                        <div class="modal-header">
                                            <p class="heading lead">Gestion de conductores</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>

                                        <!--Body-->
                                        <div class="modal-body mb-2">
                                            <div class="text-center">
                                                <i class="fa fa-check fa-4x m-0 p-0 animated rotateIn"></i>
                                            </div>
                                            <!--Card-->
                                            <div class="card">
                                                <!--Card content-->
                                                <div class="card-body">
                                                    <!-- Form -->
                                                    <form id="form">
                                                        <!-- Heading -->
                                                        <h3 class="dark-grey-text text-center">
                                                            <strong>Conductores</strong>
                                                        </h3>
                                                        <hr>
                                                        <div class="md-form">
                                                            <i class="fa fa-user prefix grey-text"></i>
                                                            <input type="text" id="formNameDriver" class="form-control" required autofocus autocomplete>
                                                            <label for="form1">Nombres</label>
                                                        </div>
                                                        <div class="md-form">
                                                            <i class="fa fa-user prefix grey-text"></i>
                                                            <input type="text" id="formLastNameDriver" class="form-control" required>
                                                            <label for="form2">Apellidos</label>
                                                        </div>
                                                        <div class="md-form">
                                                            <i class="fas fa-bus prefix grey-text"></i>
                                                            <input type="number" id="formBusDriver" class="form-control" required min="1" max="3000">
                                                            <label for="form3">Vehiculo Nº</label>
                                                        </div>


                                                        <div class="text-center">
                                                            <fieldset class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="checkbox1" required>
                                                                <label for="checkbox1" class="form-check-label dark-grey-text disabled required">Conductor Activo</label>
                                                            </fieldset>
                                                            <button class="btn btn-indigo" type="submit">Registrar</button>
                                                            <hr>
                                                            <!-- Tabla de gestion de conductores -->
                                                            <!--Grid row-->
                                                            <div class="row wow fadeIn">

                                                                <!--Grid column-->
                                                                <div class="col-md-12 mb-4">

                                                                    <!--Card-->
                                                                    <div class="card">

                                                                        <!--Card content-->
                                                                        <div class="card-body">
                                                                            <h1 class="btn btn-outline-primary d-flex justify-content-center text-center">Editar Conductores</h1>
                                                                            <!-- Table  -->
                                                                            <table class="table table-hover text-center table-sm table-responsive-sm">
                                                                                <!-- Table head -->
                                                                                <thead class="blue-grey lighten-4">
                                                                                    <tr>
                                                                                        <th>Id</th>
                                                                                        <th>Nombres</th>
                                                                                        <th>Apelidos</th>
                                                                                        <th>Temperatura</th>
                                                                                        <th>AutoAsignado</th>
                                                                                        <th>Estado</th>
                                                                                        <th>Editar</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <!-- Table head -->

                                                                                <!-- Table body -->
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">1</th>
                                                                                        <td>Cell 1</td>
                                                                                        <td>Cell 2</td>
                                                                                        <td>Cell 3</td>
                                                                                        <td>dfgh</td>
                                                                                        <td>dfg</td>
                                                                                        <td>dfg</td>
                                                                                    </tr>

                                                                                </tbody>
                                                                                <!-- Table body -->
                                                                            </table>
                                                                            <!-- Table  -->

                                                                        </div>

                                                                    </div>
                                                                    <!--/.Card-->

                                                                </div>
                                                                <!--Grid column-->


                                                            </div>
                                                            <!--Grid row-->


                                                        </div>

                                                    </form>
                                                    <!-- Form -->
                                                </div>
                                            </div>
                                            <!--/.Card-->



                                        </div>

                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <a role="button" class="btn btn-info">Get it now
                                                <i class="fa fa-diamond ml-1"></i>
                                            </a>
                                            <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No, thanks</a>
                                        </div>
                                    </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                            <!--Modal Large para conductores-->
                        </section>
                        <!--Section: Modals-->
                    </div>
                    <!--/.Card-->
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn container-fluid">
        <hr class="my-4">
        <!-- Social icons -->
        <div class="pb-4 row">
            <p class="col-12 h4">Developers</p>
            <div class="col-12 col-md-4">
                <a class="d-block" href="mailto:rafaelb@unicauca.edu.co">
                    Rafael Alejandro Belalcázar Burbano
                </a>
                <a class="d-block" href="mailto:leoc@unicauca.edu.co">
                    Edinson David Leon Chilito
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a class="d-block" href="mailto:misrael@unicauca.edu.co">
                    Israel Andres Muñoz Hinestrosa
                </a>
                <a class="d-block" href="mailto:tjhonatan@unicauca.edu.co">
                    Jhonatan Alexander Tobar Trujillo
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a class="d-block" href="mailto:">
                    Luis Felipe Bastidas Torres
                </a>
            </div>
        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright:
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
    <!--Google Maps-->
    <script src="js/ubicacionAdminEmpresa.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDofv40C3A72DWtGGWNr3abXR0uA3p5KP4&callback=initMap">
    </script>
</body>

</html>