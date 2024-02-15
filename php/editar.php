<?php
	include("conexion.php");
	 session_start();
if(!isset($_SESSION['usuario'])){
	header("location:index.php");
}
?>


<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>EDITAR</title>
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">
    <script src="https://kit.fontawesome.com/174eea58dd.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/editar.css">


</head>
<body>

	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="../imagen/avatar/Avatar.png" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
					<h1><?php
					echo $_SESSION['usuario'];
					?>	</h1>
					<br><h6 class="roboto-condensed-light">Administrador</h6>
					<br><b><a class="btn-salir" href="logout.inc.php"><i class="fa-solid fa-house-chimney"></i>Salir del sistema</a></b></br>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
                <ul>
						<li>
							<a href="interfazAdmin.php"><i class="fa-solid fa-house-chimney"></i>&nbsp; Inicio</a>
						</li>
						<li>
							<a href="administrador.php"><i class="fa-solid fa-address-book"></i> &nbsp; Administradores</a>
						</li>
						<li>
							<a href="registrocliente.php"><i class="fa-solid fa-user-pen"></i>&nbsp; Registro de Clientes</a>
						</li>
                        <li>
							<a href="registroclienteConfirmados.php"><i class="fa-solid fa-user-check"></i>&nbsp; Clientes Confirmados</a>
						</li>                     
					</ul>
				</nav>
			</div>
		</section>

		<!-- Page content -->
		<section class="full-box page-content">

			<!-- Page header -->
			<div class="full-box page-header">
                                                        
				<h3 class="text-left">
					<i class="fa-solid fa-house-chimney"></i> &nbsp; EDITAR ALUMNO
				</h3>
				<p class="text-justify">
					 Datos del alumno para su modificación.
				</p>
			</div>



	<?php
		if(isset($_POST['enviar'])){
			//aqui entra cuando se presiona el boton de enviar
			$id=$_POST['id'];
			$nombres=$_POST["nombres"];
			$apellidopaterno=$_POST["apellidopaterno"];
			$apellidomaterno=$_POST["apellidomaterno"];
			$dni=$_POST["dni"];
			$correoapoderado=$_POST["correoapoderado"];
			$telefonoapoderado=$_POST["telefonoapoderado"];
			$seccion=$_POST["seccion"];
			$grado=$_POST["gradointeres"];

			//update alumnos set nombre=$nombres, apellidopaterno=$apellidopaterno, apellidomaterno=$apellidomaterno, dni=$dni, correoapoderado=$correoapoderado, telefonoapoderado=$telefonoapoderado, gradointeres=$gradointeres,seccion=$seccion where id=$id
			$sql = "UPDATE datos_matricula SET 
      		  nombres='".$nombres."',
      		  apellidopaterno='".$apellidopaterno."' ,
   		     apellidomaterno='".$apellidomaterno."',
   		     dni='".$dni."',
   		     correoapoderado='".$correoapoderado."',
    		    telefonoapoderado='".$telefonoapoderado."',
				seccion='".$seccion."',
				gradointeres='".$grado."'
    		    WHERE id = '".$id."'";

			$resultado=mysqli_query($conexion, $sql);

			if($resultado){
				echo "<script language='JavaScript'>
					alert('Los datos se actualizaron correctamente');
					location.assign('registrocliente.php');
					</script>";
			} else {
				echo "<script language='JavaScript'>
					alert('Los datos no se guardaron');
					location.assign('registrocliente.php');
					</script>";
			}
			
			mysqli_close($conexion);

		}else{
			//aqui entra si no se ha presionado el boton guardar
			$id=$_GET['id'];
			$sql="select*from datos_matricula where id='".$id."'";
			$resultado=mysqli_query($conexion,$sql);

			$mostrar= mysqli_fetch_assoc($resultado);
			$nombres=$mostrar["nombres"];
			$apellidopaterno=$mostrar["apellidopaterno"];
			$apellidomaterno=$mostrar["apellidomaterno"];
			$dni=$mostrar["dni"];
			$correoapoderado=$mostrar["correoapoderado"];
			$telefonoapoderado=$mostrar["telefonoapoderado"];
			$seccion=$mostrar["seccion"];
			$grado=$mostrar["gradointeres"];

			mysqli_close($conexion);
	?>
<div class="container">
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label><b>Nombres:</b></label>
        <input type="text" name="nombres" 
		value="<?php echo $nombres; ?>"><br>

		<label><b>Apellido Paterno:</b></label>
        <input type="text" name="apellidopaterno" 
		value="<?php echo $apellidopaterno; ?>"><br>

		<label><b>Apellido Materno:</b></label>
        <input type="text" name="apellidomaterno" 
		value="<?php echo $apellidomaterno; ?>"><br>

		<label><b>DNI:</b></label>
        <input type="text" name="dni" 
		value="<?php echo $dni; ?>"><br>

		<label><b>Correo Electronico del Apoderado:</b></label>
        <input type="text" name="correoapoderado" 
		value="<?php echo $correoapoderado; ?>"><br>

		<label><b>Telefono del Apoderado:</b></label>
        <input type="text" name="telefonoapoderado" 
		value="<?php echo $telefonoapoderado; ?>"><br>

		<label><b>Nivel Educativo:</b></label>
        <input type="text" name="gradointeres" 
		value="<?php echo $grado; ?>"><br>

		<label><b>Seccion:</b></label>
        <input type="text" name="seccion" 
		value="<?php echo $seccion; ?>"><br>

		<input type="hidden" name="id"
		value="<?php echo $id; ?>"> <br>

        <input type="submit" name= "enviar" value="Actualizar">
        <a class="regresar" href="registrocliente.php">Regresar</a>
    </form>
		
</div>

	 <?php
		}
	 ?>
   

</body>
</html>