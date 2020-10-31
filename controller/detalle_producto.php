<link rel="stylesheet" href="js/jquery.modal.min.css">
<script src="js/jquery.modal.min.js"></script>
<?php
session_start();
$html="";
if(isset($_POST['id']) && ($_POST['id']!="")){

	include("../model/conexion.php");
	$user=new ApptivaDB();
	$u=$user->buscar("productos"," productos.id_pro=".$_POST['id']);
	foreach ($u as $v)
	if(isset($_SESSION['adminLogeado'])){
		if(file_exists("../".$v['imagen_pro'] ) ){			
			$html.="<div class='contenDetPro' capturoid=".$v['id_pro']."><div class='imgDet_Pro'><span class='icon-undo2' id='icon-undo2'></span><img src=".$v['imagen_pro']." class='imagenDetPro' id='imagenDetPro'></div>
			<div class='contenDatosDetProMain'>
			<div class='contenDatosDetPro'><div class='DetProNombre_pro'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
								<div class='DetProMarca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
								<div class='DetProDescrip_pro'><label class='descripcion_pro'>".$v["descripcion_pro"]."</label></br></div>
								<div class='DetProPrecio_pro'>S/ <label class='precio_pro'>".$v["precio_pro"]."</label></div>
								<button class='btnAbreActualizaPro'><span class='icon-pencil'></span>Editar</button>
								<button class='btnAbreEliminarPro'><span class='icon-bin'></span>Eliminar</button></div></div></div>"; 
								
		}else{
			$html.="<div class='contenProductos'><div class='imgPro_buscados'><img src=imagenes/usuarioblanco.jpg class='imagenMosProductos' ></div>
			<div class='contenDatos'>
							<div class='contenDatosProducto'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
							<div class='DetProMarca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
							<div class='DetProPrecio_pro'><label>".$v["precio_pro"]."</label></div>
							<button class='btnAdicionarCar'>Añadir a carrito</button></div></div>"; 

		}	
	}elseif(isset($_SESSION['usuarioLogeado'])){
		if(file_exists("../".$v['imagen_pro'] ) ){
			
			$html.="<div class='contenDetPro' capturoid=".$v['id_pro']."><div class='imgDet_Pro'><img src=".$v['imagen_pro']." class='imagenDetPro'></div>
			<div class='contenDatosDetProMain'>
			<div class='contenDatosDetPro'><div class='DetProNombre_pro'><label>".$v["nombre_pro"]."</label></br></div>
								<div class='DetProMarca_pro'><label>".$v["marca_pro"]."</label></br></div>
								<div class='DetProDescrip_pro'><label>".$v["descripcion_pro"]."</label></br></div>
								<div class='DetProPrecio_pro precio_pro'><label>S/ ".$v["precio_pro"]."</label></div>
								<button class='btnAdicionarCar'>Añadir a carrito</button></div></div>"; 
		}else{
			$html.="<div class='contenProductos'><div class='imgPro_buscados'><img src=imagenes/usuarioblanco.jpg class='imagenMosProductos' ></div>
			<div class='contenDatos'>
							<div class='contenDatosProducto'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
							<div class='DetProMarca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
							<div class='DetProPrecio_pro'><label>".$v["precio_pro"]."</label></div>
							<button class='btnAdicionarCar'>Añadir a carrito</button></div></div>"; 

		}	
	}else{
		if(file_exists("../".$v['imagen_pro'] ) ){
			
			$html.="<div class='contenDetPro' capturoid=".$v['id_pro']."><div class='imgDet_Pro'><img src=".$v['imagen_pro']." class='imagenDetPro'></div>
			<div class='contenDatosDetProMain'>
			<div class='contenDatosDetPro'><div class='DetProNombre_pro'><label>".$v["nombre_pro"]."</label></br></div>
								<div class='DetProMarca_pro'><label>".$v["marca_pro"]."</label></br></div>
								<div class='DetProDescrip_pro'><label>".$v["descripcion_pro"]."</label></br></div>
								<div class='DetProPrecio_pro precio_pro'><label>S/ ".$v["precio_pro"]."</label></div>
								<button class='btnAdicionarCar' id='btnAdLogeate'>Añadir a carrito</button></div></div>"; 
		}else{
			$html.="<div class='contenProductos'><div class='imgPro_buscados'><img src=imagenes/usuarioblanco.jpg class='imagenMosProductos' ></div>
			<div class='contenDatos'>
							<div class='contenDatosProducto'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
							<div class='DetProMarca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
							<div class='DetProPrecio_pro'><label>".$v["precio_pro"]."</label></div>
							<button class='btnAdicionarCar' id='btnAdLogeate'>Añadir a carrito</button></div></div>"; 

		}	
	}
}else{
	$html.="<div class='msgResulDatos'>no se encontraron datos</div>";
}
echo $html;
?>
<a href="#login-form" rel="modal:open"> abrirrrrr</a>
<form action="#" method="post" id="login-form" class="modal">
<h1>Inicia session</h1>
<input type="text" name="" id=""><br>
<input type="password" name="" id=""><br>
<input type="submit" value="ACCEDER">
</form>
  