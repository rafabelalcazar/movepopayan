<!DOCTYPE html>
<?php
	session_start();
	if (@!$_SESSION['nombre']) {
		header("Location:index.php");

	}elseif ($_SESSION['rol']==1) {
		header("Location:adminsis.php");
	
	}
	?>


<html>
<head>
	<title>Pagina de usuario</title>

	

</head>
<body>
	<h1>Esta es la pagina para el usuario Viajero	</h1>



</body>
</html>