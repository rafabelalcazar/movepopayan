<?php 

if (isset($_GET['editar1'])) {
	$editar_id = $_GET['editar1'];

	$consulta = "SELECT*FROM login WHERE id='$editar_id'";
	$ejecutar = mysqli_query($con, $consulta);

	$fila = mysqli_fetch_array($ejecutar);

	$nombre = $fila['nombre'];
	$apellido = $fila['apellido'];
	$mail = $fila['user'];
	$rol = $fila['rol'];
	$contrasena = $fila['passadmin'];

}
?>
 <br>
<div class="card">
	<div class="card-body">
		<form class="my-4" method="post" action="">
			
			<div class="md-form">
				<label for="<?php echo $nombre; ?>">Nombre</label>
				<input class="form-control" type="text" name="nombre" value="">
		   </div>	
		   <div class="md-form">
			   <label for="<?php echo $apellido; ?>">apellido</label>		
			   <input class="form-control" type="text" name="apellido" value="">
		   </div>
		   <div class="md-form">
			   <label for="<?php echo $apellido; ?>">Mail</label>	
			   <input class="form-control" type="text" name="correo" value="">
		   </div>
			   
		   <div class="md-form">
			   <label for="<?php echo $apellido; ?>">Rol</label>	
			   <input class="form-control" type="text" name="rol" value="">
		   </div>
		   <div class="md-form">
			   <label for="<?php echo $apellido; ?>">Contraseña</label>	
			   <input class="form-control" type="text" name="contrasena" value="">
		   </div>
	   
	   
		   <input class="btn btn-primary m-2" type="submit" name="actualizar" value="Actualizar Datos del administrador de la empresa">
	   
	   
		</form>

	</div>
</div>
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

 <?php
if (isset($_POST['actualizar'])) {
	$actualizar_nombre = $_POST['nombre'];
	$actualizar_apellido = $_POST['apellido'];
	$actualizar_correo = $_POST['correo'];
	$actualizar_rol = $_POST['rol'];
	$actualizar_contrasena = $_POST['contrasena'];



	$actualizar = "UPDATE login SET nombre = '$actualizar_nombre', apellido='$actualizar_apellido', user='$actualizar_correo',	 rol='$actualizar_rol', passadmin='$actualizar_contrasena' WHERE id = '$editar_id'";
	$ejecutar = mysqli_query($con, $actualizar);

	if ($ejecutar) {
		echo "<script> alert ('Datos actualizados')</script>";

		echo "<script> window.open ('adminsis.php', '_self')</script>";
	# code...
	}
}
?>