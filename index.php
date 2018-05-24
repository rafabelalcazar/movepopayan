
<?php
$hostDb="localhost";
$nombreDb="sistransporte";
$usuario="root";
$clave="";
$conexion=mysqli_connect($hostDb, $usuario, $clave ,$nombreDb);
if (!$conexion){//Solo si no se conect? a la Bd
  echo "Error al conectar a la Base de datos";
  exit();

}
else { echo "conectado"; 

//$conexion=mysqli_connect('localhost','root','','ultima');
}?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MOVEPOPAYÁN</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 766px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
      .sm-text {
        font-size: 2rem;
      }

      .sm-text-1 {
        font-size: 1rem;
      }

    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 700px;
      }

    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #1C2331 !important;
      }

    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="#">
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

  </div>

  </div>
  </nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view full-page-intro " style="background-image: url('https://blog.ryanair.com/wp-content/uploads/2016/02/city-apps.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container mt-5">

        <!--Grid row-->
        <div class="row wow mt-5 fadeIn">

          <!--Grid column-->
          <div class="col-md-7 mb-4 mt-2 pt-3 white-text text-center text-md-left">
            <hr class="hr-light">
            <h1 class="display-4 sm-text font-weight-bold text-center">MOVEPOPAYÁN</h1>

            <hr class="hr-light">

            <p class="text-center sm-text-1 h4 m-3">
              <strong>DA FIN A LA INCERTIDUMBRE CONOCIENDO DONDE VIENE TU AUTOBUS Y ACABA CON LOS LARGOS MINUTOS DE ESPERA REGISTRANDOTE</strong>
            </p>

            <p class="mb-4 d-none d-md-block text-center p-3">
              <div class="w-100 d-flex justify-content-center">

                Si ya estás registrado puedes iniciar sesión
              </div>
              <a data-toggle="modal" data-target="#exampleModal" href="#" class="btn btn-warning btn-lg align-items-center justify-content-center  d-flex w-100">Iniciar sesión
              </a>

            </p>


          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-xl-5 mb-5 mt-2 pt-3">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

               <?php include "registrarse.php"?>

              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inicia sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card">
                  <!--Card content-->
                  <div class="card-body">
                   <?php include "login.php" ?>
                  
                </div>
              </div>


              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Content -->

  </div>
  <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->

  <!--Main layout-->
  <main id="nosotros"
    <div class="container">

      <!--Section: Main info-->
      <p class="text-center h2 text-warning m-4 ">NOSOTROS</p>
      <section class="mt-4">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-6 mb-4 wow fadeInLeft">

            <img src="img/pic01.jpg" class="img-fluid z-depth-1-half" alt="">

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-0 d-flex align-items-center flex-wrap wow fadeIn">

            <!-- Main heading -->
            <h3 class="h4 text-center mb-2 ">PUEDES ESTAR EN CUALQUIER PARTE DE LA CIUDAD</h3>
            <p class="h5 dark-grey-text">Selecciona tu punto de origen y destino e inmediatamente podras ver las rutas sugeridas que más te convienen.</p>
            <!-- Main heading -->
            <hr>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <hr>

      <section class="mt-4">

        <!--Grid row-->
        <div class="row flex-row-reverse ">

          <!--Grid column-->
          <div class="col-md-6 mb-4 wow fadeInRight">

            <img src="img/pic02.jpg" class="img-fluid z-depth-1-half" alt="">

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-0 d-flex align-items-center flex-wrap wow fadeIn">

            <!-- Main heading -->
            <h3 class="h4 text-center mb-2 ">PUEDES VER DONDE VIENE TU AUTOBUS</h3>
            <p class="h5 dark-grey-text ">Al seleccionar tu ruta preferida, podras ver su posición en el mapa.</p>
            <!-- Main heading -->
            <hr>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <hr>

      <section class="mt-4 wow fadeIn">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-6 mb-4 wow fadeInLeft">

            <img src="img/pic03.jpg" class="img-fluid z-depth-1-half" alt="">

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-0 d-flex align-items-center flex-wrap">

            <!-- Main heading -->
            <h3 class="h4 text-center mb-2 ">MÁS INFORMACIÓN DEL AUTOBUS</h3>
            <p class="h5 dark-grey-text">Podras ver otro tipo de información como el numero de pasajeros, con el fin de que no hagas una espera improductiva
              de un autobus con cupo lleno.</p>
            <p>Y otros datos como: Temperatura, humedad y velocidad aproximada</p>
            <!-- Main heading -->
            <hr>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <hr>
      <!--Section: Main info-->






      <!--Section: Not enough-->
      <section>

        <h2 class="my-5 h3 text-center text-warning">¿Qué se viene con MOVEPOPAYÁN?</h2>

        <!--First row-->
        <div class="row features-small mb-5 mt-3 wow fadeIn">

          <!--First column-->
          <div class="col-md-4">
            <!--First row-->
            <div class="row">
              <div class="col-2">
                <i class="fa fa-check-circle fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Ver la posicion del autobus en tiempo real</h6>
                <p class="dark-grey-text">En el mapa de Google maps puedes ver la posición del autobus de tu interes.
                </p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row">
              <div class="col-2">
                <i class="fa fa-check-circle fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Geolocalización</h6>
                <p class="dark-grey-text">Si no conoces la ciudad, solo activa el GPS de tu móvil y podras saber en que punto te encuentras.
                </p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Second row-->

            <!--Third row-->
            <div class="row">
              <div class="col-2">
                <i class="fa fa-check-circle fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">¿A donde vas?</h6>
                <p class="dark-grey-text">Puedes seleccionar tu destino en el mapa</p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Third row-->

            <!--Fourth row-->
            <div class="row">
              <div class="col-2">
                <i class="fa fa-check-circle fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">¿El autobus tiene cupo?</h6>
                <p class="dark-grey-text">Al sellecionar el autobus de tu interes, puedes ver el numero de pasajeros. Asi sabrás si el cupo esta lleno
                  o aun hay sillas disponibles
                </p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Fourth row-->
          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-md-4 flex-center">
            <!-- <img src="https://mdbootstrap.com/img/Others/screens.png" alt="MDB Magazine Template displayed on iPhone" class="z-depth-0 img-fluid"> -->
          </div>
          <!--/Second column-->

          <!--Third column-->
          <div class="col-md-4 mt-2">
            <!--First row-->
            <div class="row">
              <div class="col-2">
                <i class="fa fa-check-circle fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Temperatura y Humedad</h6>
                <p class="grey-text">Puedes ver la temperatura y la humedad del Autobus, para garantizar el confort de los viajeros
                </p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row">
              <div class="col-2">
                <i class="fa fa-check-circle fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">La ruta más conveniente</h6>
                <p class="grey-text">MOVEPOPAYÁN te muestra la ruta más cercana y conveniente para que tu la puedas tomar si asi lo deseas.
                </p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Second row-->

            <!--Third row-->
            <div class="row">
              <div class="col-2">
                <i class="fa fa-check-circle fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">El momento preciso</h6>
                <p class="grey-text">Toma tu autobus autobus en el momento preciso, y evita los largos minutos de espera
                </p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Third row-->

            <!--Fourth row-->
            <div class="row">
              <div class="col-2">
                <i class="fa fa-check-circle fa-2x indigo-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Haz de tu ciudad una ciudad inteligente</h6>
                <p class="grey-text">Apuntate y sumate a la comunidad de personas que quiere vivir en un mundo mejor</p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Fourth row-->
          </div>
          <!--/Third column-->

        </div>
        <!--/First row-->

      </section>
      <!--Section: Not enough-->

      <hr class="mb-5">

      <!--Section: More-->

      <!--Section: More-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn container-fluid">



    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4 row">
      <p class="col-12 h4">Developers</p>
      <div class="col-12 col-md-4">
        <p>Rafael Alejandro Belalcázar Burbano</p>
        <p>Edinson David Leon Chilito</p>
      </div>
      <div class="col-12 col-md-4">
        <p>Israel Andres Muñoz Hinestrosa</p>
        <p>Jhonatan Tobar</p>
      </div>
      <div class="col-12 col-md-4">
        Luis Felipe Bastidas Torres
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
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
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
  <script src="js/smooth-scroll.polyfills.min.js"></script>
  <script>
    var scroll = new SmoothScroll('a[href*="#"]');
  </script>
</body>

</html>