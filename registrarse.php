 <?php
$hostDb="localhost";
$nombreDb="move_popayan";
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




 <form action="" method="post">
                  <hr>

                  <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input required type="text" name="nombre" id="demo-name" value="" class="form-control" required>
                    <label for="form1">Nombres</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input  required type="text"  name="apellido" id="apellido" value=""  class="form-control" required>
                    <label for="form2">Apellidos</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input required type="email" name="demo-email" id="demo-email" value=""  class="form-control" required>
                    <label for="form3">Correo</label>
                  </div>

                  <div class="md-form">
                    <i class="fa fa-unlock-alt prefix grey-text"></i>
                    <input required type="password" name="password" id="password" value="" required class="password form-control"></input>
                    <label for="form4">Contraseña</label>
                  </div>

                  <div class="text-center">
                    <fieldset class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label for="checkbox1" class="form-check-label dark-grey-text disabled required">He leido y acepto las condiciones</label>
                    </fieldset>
                    <input class="btn btn-indigo" type="submit" name= "submit" ></input>
                    <hr>
                  </div>


                  <?php
        if(isset($_POST['submit'])){
            require("registro.php");
        }
    ?>
                </div>

                </form>
                <!-- Form -->