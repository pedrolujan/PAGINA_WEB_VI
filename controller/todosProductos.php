<?php
session_start();
$html="";
	include("../model/conexion.php");
	$user=new ApptivaDB();
	
	$u=$user->buscar("productos","productos.estado='1'");
		
	if(isset($_SESSION['adminLogeado'])){
		$html.="<table class='table tableProductos' border='1'>
				<thead>
					<tr>
						<th>foto</th>
						<th>Nombre</th>
						<th>Marca</th>
						<th>Stock</th>
						<th>Precio</th>
						<th>Estado</th>
						<th colspan='3'>Ocultar</th>
					</tr>
				</thead>
				<tbody>";
		foreach ($u as $v){			
		$html.="<tr capturoIdProd=".$v['id_pro'].">
					<td>
						<div class='img_Productos'>
							<img src='".$v['imagen_pro']."' class='imagenProductoAdmin'>
						</div>
					</td>
					<td>
						<label class='nombre_pro'>".$v["nombre_pro"]."</label></br>
					</td>
					<td>
						<label class='marca_pro'>".$v["marca_pro"]."</label></br>
					</td>
					<td>
						<label class='marca_pro'>".$v["stok_pro"]."</label></br>
						</div>		
					</td>
					<td>
						<label>S/ ".$v["precio_pro"]."</label>				
					</td>
					<td>
						<span style='color:#000;'>🟢</span>						
					</td>
					<td class='btnEliminarPro'>
						<span class='icon-eye-blocked'></span>	
						
					</td>
					
				</tr>"; 
		}
	$html.="</tbody>
		</table>";
	}else if(isset($_SESSION['usuarioLogeado'])){
		foreach ($u as $v){	
		$html.="<div class='contenProductos contenProductosDetalle' id='contenProductos' capturoid=".$v['id_pro'].">
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
	}else{
		foreach ($u as $v){	
		$html.="<a id='btnLogearse'  capturoid=".$v['id_pro']." href='#login-form' rel='modal:open'>
		<div class='abrirLogeoMId contenProductos'>
		
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
				</div> </a>"; 
		}
	}
	
echo $html;
   ?>

