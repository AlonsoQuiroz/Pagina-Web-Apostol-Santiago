<?php session_start();
if(!isset($_SESSION['usuario'])){
	header("location:index.php");
}

?>
<?php
$conexion=mysqli_connect('localhost','root','','matricula');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>RegistroCliente</title>
	<script type="text/javascript">
		function confirmar(){
			return confirm('¿Estas Seguro?, se eliminaran los datos');

		}
	</script>
	
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">
                    <script src="https://kit.fontawesome.com/174eea58dd.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/registrocliente.css">



</head>
<body>
	
<?php
		if(isset($POST['enviar'])){
			//aqui entra cuando se presiona el boton de enviar
		}else{
			//aqui entra si no ha presionado el boton de enviar
		}
		?>

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
					<i class="fa-solid fa-house-chimney"></i> &nbsp; CLIENTES
				</h3>
				<p class="text-justify">
					 Lista de los clientes registrados para la matrícula.
				</p>
			</div>
			
		       
			<br>
				<table class="table" >
					<tr>
 			 			<td class="highlight-cell"><b>ID</b></td>
 			 			<td class="highlight-cell"><b>Nombres</b></td>
						<td class="highlight-cell"><b>Apellido Paterno</b></td>
			  			<td class="highlight-cell"><b>Apellido Materno</b></td>
			  			<td class="highlight-cell"><b>DNI</b></td>
			  			<td class="highlight-cell"><b>Correo Apoderado</b></td>
 			 			<td class="highlight-cell"><b>Teléfono Apoderado</b></td>
 			 			<td class="highlight-cell"><b>Nivel</b></td>
						<td class="highlight-cell"><b>Grado</b></td>
 			 			<td class="highlight-cell"><b>Acciones</b></td>
					</tr>


					<?php
    					$sql = "SELECT * from datos_matricula";
    					$result = mysqli_query($conexion, $sql);

    					while ($mostrar = mysqli_fetch_array($result)) {
							$id = $mostrar['id'];
					?>
    				<tr>
        				<td class="highlight-cell"><b><?php echo $mostrar['id'] ?></b></td>
        				<td><?php echo $mostrar['nombres'] ?></td>
        				<td><?php echo $mostrar['apellidopaterno'] ?></td>
        				<td><?php echo $mostrar['apellidomaterno'] ?></td>
        				<td><?php echo $mostrar['dni'] ?></td>
        				<td><?php echo $mostrar['correoapoderado'] ?></td>
        				<td><?php echo $mostrar['telefonoapoderado'] ?></td>
						<td><?php echo $mostrar['gradointeres'] ?></td>
						<td><?php echo $mostrar['seccion'] ?></td>
						
						
        				<td>
            			<div class="input">
                		<?php echo "<a class='btn-editar' href='editar.php?id=" . $mostrar['id'] . "'>EDITAR</a>"; ?>
						<?php echo "<a class='btn-eliminar' href='eliminar.php?id=" . $mostrar['id'] . "' onclick='return confirmar()'>ELIMINAR</a>"; ?>
						<?php echo "<form action='copiar_datos.php' method='post'>";?>
    					<?php echo "<input type='hidden' name='id' value='$id'>";?>
    					<?php echo "<input type='hidden' name='nombres' value='" . $mostrar['nombres'] . "'>";?>
    					<?php echo "<input type='hidden' name='apellidopaterno' value='" . $mostrar['apellidopaterno'] . "'>";?>
    					<?php echo "<input type='hidden' name='apellidomaterno' value='" . $mostrar['apellidomaterno'] . "'>";?>
    					<?php echo "<input type='hidden' name='dni' value='" . $mostrar['dni'] . "'>";?>
    					<?php echo "<input type='hidden' name='correoapoderado' value='" . $mostrar['correoapoderado'] . "'>";?>
    					<?php echo "<input type='hidden' name='telefonoapoderado' value='" . $mostrar['telefonoapoderado'] . "'>";?>
    					<?php echo "<button type='submit' name='copiar' class='btn-editar'>CONFIRMAR</button>";?>
						<?php echo "</form>";?>
            			</td>
    				</tr>
					<?php
    					}
					?>
				</table>
		</section>
	</main>
</body>
</html>