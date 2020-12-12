<?php
session_start();
$html="";
	include("../model/conexion.php");
	$user=new ApptivaDB();
	$u=$user->buscar("productos","productos.estado='1'");
	foreach ($u as $v)		
	if(isset($_SESSION['adminLogeado'])){		
		$html.="<div class='contenProductos' capturoid=".$v['id_pro'].">
					<div class='contenImgProBusq'>
						<div class='imgPro_buscados'>
							<img src='".$v['imagen_pro']."' class='imagenMosProductos' >
						</div>
					</div>
					<div class='contenDatos'>
						<div class='contenDatosProducto'>
							<label class='nombre_pro'>".$v["nombre_pro"]."</label></br>
						</div>
						<div class='marca_pro'>
							<label class='marca_pro'>".$v["marca_pro"]."</label></br>
						</div>
						<div class='precio_pro'>
							<label>S/ ".$v["precio_pro"]."</label>
						</div>
					</div>
				</div>"; 
	}else if(isset($_SESSION['usuarioLogeado'])){	
		$html.="<div class='contenProductos' capturoid=".$v['id_pro'].">
					<div class='contenImgProBusq'>
						<div class='imgPro_buscados'>
							<img src='".$v['imagen_pro']."' class='imagenMosProductos' >
						</div>
					</div>
					<div class='contenDatos'>
						<div class='contenDatosProducto'>
							<label class='nombre_pro'>".$v["nombre_pro"]."</label></br>
						</div>
						<div class='marca_pro'>
							<label class='marca_pro'>".$v["marca_pro"]."</label></br>
						</div>
						<div class='precio_pro'>
						<label>S/ ".$v["precio_pro"]."</label>
						</div>
					</div>
				</div>"; 
	}else{
		$html.="<div class='contenProductos' capturoid=".$v['id_pro'].">
					<div class='contenImgProBusq'>
						<div class='imgPro_buscados'>
							<img src='".$v['imagen_pro']."' class='imagenMosProductos' >
						</div>
					</div>
					<div class='contenDatos'>
						<div class='contenDatosProducto'>
							<label class='nombre_pro'>".$v["nombre_pro"]."</label></br>
						</div>
						<div class='marca_pro'>
							<label class='marca_pro'>".$v["marca_pro"]."</label></br>
						</div>
						<div class='precio_pro'>
						
						</div>
					</div>
				</div>"; 
	}
	
echo $html;
   ?>