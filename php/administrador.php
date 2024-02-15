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
	<title>Home</title>
	
	
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">
                    <script src="https://kit.fontawesome.com/174eea58dd.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/administrador.css">


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
					<i class="fa-solid fa-house-chimney"></i> &nbsp; ADMINISTRADORES
				</h3>
				<p class="text-justify">
					 Lista de administradores de la interfaz.
				</p>
			</div>
			
		       
			<br>

			<table class="table" >

			<tr>
    			<td class="highlight-cell"><b>ID</b></td>
   				<td class="highlight-cell"><b>Usuario</b></td>
    			<td class="highlight-cell"><b>Correo Electronico</b></td>
			</tr>

					<?php
						$sql="SELECT * from t_usuarios";
						$result=mysqli_query($conexion,$sql);

						while($mostrar=mysqli_fetch_array($result)){
					?>
					<tr>
					<td class="highlight-cell"><b><?php echo $mostrar['id_usuario'] ?></b></td>
   					<td class="highlight-cell2"><?php echo $mostrar['usuario'] ?></td>
    				<td class="highlight-cell2"><?php echo $mostrar['email'] ?></td>
						<?php
						}
						?>
					</tr>
				</table>

		</section>
			         
                        
		</section>
	</main>
