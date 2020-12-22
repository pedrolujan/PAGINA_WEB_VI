<?php
session_start();
include("../model/conexion.php");
$user=new ApptivaDB();
$dato=$_POST["dato"];
$u=null;
switch ($dato) {
	case 0:
		$u=$user->buscar("productos,categorias","productos.ID_CATEGORIA=categorias.id_cat AND categorias.nombre_cat='laptop'");
		break;
	case 1:
		$u=$user->buscar("productos,categorias","productos.ID_CATEGORIA=categorias.id_cat AND categorias.nombre_cat='celular'");
		break;
	case 2:
		$u=$user->buscar("productos,categorias","productos.ID_CATEGORIA=categorias.id_cat AND categorias.nombre_cat='mouse'");
		break;
	case 3:
		$u=$user->buscar("productos,categorias","productos.ID_CATEGORIA=categorias.id_cat AND categorias.nombre_cat LIKE 'disc%'");
		break;
	case 4:
		$u=$user->buscar("productos,categorias","productos.ID_CATEGORIA=categorias.id_cat AND categorias.nombre_cat='televisores'");
		break;
	case 5:
		$u=$user->buscar("productos,categorias","productos.ID_CATEGORIA=categorias.id_cat AND categorias.nombre_cat='teclado'");
		break;
	case 6:
		$u=$user->buscar("productos,categorias","productos.ID_CATEGORIA=categorias.id_cat AND categorias.nombre_cat='equipos'");
		break;
	
	default:
		# code...
		break;
}
$html="";
	foreach ($u as $v){
		$html.="<div class='contenProductos contenProductosDetalle' capturoid=".$v['id_pro'].">
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
	}
echo $html;
   ?>