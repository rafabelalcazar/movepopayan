 
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




  <!-- Form -->
                    <form action="validar.php" method="post">
                      <!-- Heading -->
                      <h3 class="dark-grey-text text-center">
                        <strong>Inicia sesión</strong>
                    
                      </h3>
                      <hr>

                      <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input required type="email" name="log"  id="demo-email" value="" class="form-control" required>
                        <label for="loginname">Correo</label>
                      </div>

                      <div class="md-form">
                        <i class="fa fa-unlock-alt prefix grey-text"></i>
                        <input required type="password" id="pass" name="pass" value="" required class="form-control"></input>
                        <label for="loginpass">Contraseña</label>
                      </div>
                      <button type="submit"  class="btn btn-primary">Login</button>
                      <hr>
                      </form>
                  

                  
                  <!-- Form -->
