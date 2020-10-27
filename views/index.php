<?php
error_reporting(0);
?>

<!doctype html>
<html>
<head lang="es">
	<meta charset="utf-8">
	<meta name="Description" content="pejatec servis te ofrece una atencion garantizada">
	<title>PEJATEC SERVIS</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estttilos.cuss" type="text/css">
	<link rel="icon" href="imagenes/monitor.png" type="image/png">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->

</head>

<body>
	<header class="align-self-center toast-header">
		<div class="logo">
		</div>
		<div class="busqueda">
			<input class="searchBuscar" id="searchBuscar" type="search" placeholder="buscar producto" style="width: 80%; padding: 10px;border-radius: 7px;">
			<div class="contengif"></div>
		</div>
		<div class="divCarrito">
			<span class="icon-cart"><p>1</p></span>
		</div>
		<div class="datos_usuario">
			<?php
				include("controller/datos_usuario.php");
			?>
		<a href="views/login.php"><button class="btnlogin">Login</button></a>	
	  	</div>
	</header>
	<main>
		<div class="nav_menu" id="nav_menu">
			<?php
				include("controller/menu.php");
			?>
		</div>
		<div class="area_trabajo">
		
		</div>
	</main>
	<footer>
	</footer>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/principal.js"></script>
	
</body>
</html>