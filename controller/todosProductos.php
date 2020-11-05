<?php

sleep(1);
session_start();
$html="";
	include("../model/conexion.php");
	$user=new ApptivaDB();
	$u=$user->buscarTodo("productos");
	foreach ($u as $v)		
	if(isset($_SESSION['adminLogeado'])){		
		$html.="<div class='contenProductos' capturoid=".$v['id_pro'].">
					<div class='contenImgProBusq'>
						<div class='imgPro_buscados'>
							<img src=".$v['imagen_pro']." class='imagenMosProductos' >
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
							<img src=".$v['imagen_pro']." class='imagenMosProductos' >
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
	}
	
echo $html;
   ?>