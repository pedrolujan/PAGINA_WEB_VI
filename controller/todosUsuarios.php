<?php
session_start();
$html="";
	include("../model/conexion.php");
	$user=new ApptivaDB();
	$u=$user->buscar("usuarios","1");
	?>
	<table class="table" border="1">
		<tr class="headerTabla">
			<th colspan="3">Usuario</th>
			<th>DNI</th>
			<th>TELEFONO</th>
			<th colspan="2">ACCIONES</th>
		</tr>
		<?php foreach ($u as $v){?>
		<tr capturoId="<?php echo $v["id_usu"];?>">
        <td> <img src="../<?php echo $v["imagen_usu"];?>" alt="" style=" width: 50px; border-radius: 50%; height: 50px;"> </td>
        <td><?php echo $v["nombre_usu"];?></td>
        <td><?php echo $v["apellido_usu"];?></td>
        <td><?php echo $v["dni_usu"];?></td>
        <td><?php echo $v["telefono_usu"];?></td>
        <td><img src="../imagenes/fuentes/iconos/eliminar.svg" alt="" srcset=""></td>
        <td><img src="../imagenes/fuentes/iconos/eliminar.svg" alt="" srcset=""></td>
	  </tr>
	  <?php	}	   ?>
	</table>


	
	<?php
echo $html;
   ?>