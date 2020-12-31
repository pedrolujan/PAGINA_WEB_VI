<?php
session_start();
$html="";
	include("../model/conexion.php");
	$user=new ApptivaDB();
	
	$u=$user->buscar("productos","productos.estado='0'");
		
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
						<th colspan='3'>Mostrar</th>
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
						<span style='color:red;'>🔴 Inactivo</span>						
					</td>
					<td class='btnEliminarPro'>
						<span class='icon-eye' style='color: green;'></span>	
						
					</td>
					
				</tr>"; 
		}
	$html.="</tbody>
		</table>";
	}
	
echo $html;
   ?>

