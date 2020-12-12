<?php
session_start();
$html="";
	include("../model/conexion.php");
	$user=new ApptivaDB();
	$u=$user->buscar("usuarios","1");
	?>
	<table class="table" border="1">
		<tr>
			<th>IMAGEN</th>
			<th>NOMBRE</th>
			<th>APELLIDO</th>
			<th>DNI</th>
			<th>TELEFONO</th>
		</tr>
		<?php foreach ($u as $v){?>
		<tr>
        <td> <img src="../<?php echo $v["imagen_usu"];?>" alt="" style=" width: 70px; border-radius: 50%; height: 70px;"> </td>
        <td><?php echo $v["nombre_usu"];?></td>
        <td><?php echo $v["apellido_usu"];?></td>
        <td><?php echo $v["dni_usu"];?></td>
        <td><?php echo $v["telefono_usu"];?></td>
	  </tr>
	  <?php	}	   ?>
	</table>


	
	<?php
echo $html;
   ?>