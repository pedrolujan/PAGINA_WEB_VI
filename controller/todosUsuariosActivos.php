<?php
session_start();
$html="";
	include("../model/conexion.php");
	$user=new ApptivaDB();
	
	$u=$user->buscar("usuarios",
					"usuarios.estado_usu='1'
					AND usuarios.rol='1'");
		
		$html.="<table class='table' border='1'>
				<thead>
					<tr>
						<th clospan='3'>Usuario</th>
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
		$html.="<tr capturoIdUsu=".$v['id_usu'].">
					<td>
						<div class='img_Productos'>
							<img src='../".$v['imagen_usu']."' class='imagenProductoAdmin'>
						</div>
					</td>
					<td>
						<label class='nombre_pro'>".$v["apellido_usu"]."</label></br>
					</td>
					<td>
						<label class='marca_pro'>".$v["nombre_usu"]."</label></br>
					</td>
					<td>
						<label class='marca_pro'>".$v["dni_usu"]."</label></br>
						
					</td>
					<td>
						<label>".$v["telefono_usu"]."</label>				
					</td>
					<td>
						<span style='color:green;'>🟢 Activo</span>						
					</td>
					<td class='btnEliminarUsuario'>
						<span class='icon-eye-blocked'></span>	
						
					</td>
					
				</tr>"; 
			}
	$html.="</tbody>
		</table>";
	
	
echo $html;
   ?>

