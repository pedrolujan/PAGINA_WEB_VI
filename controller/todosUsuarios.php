<?php
session_start();
$html = "";
include("../model/conexion.php");
$user = new ApptivaDB();
$u = $user->buscar("usuarios", "1");
?>
<button>activos </button>
<button>inactivos</button>
<table class="table" border="1">
	<thead>
		<tr class="headerTabla">
			<th colspan="3">Usuario</th>
			<th>DNI</th>
			<th>TELEFONO</th>
			<th colspan="2">ACCIONES</th>
		</tr>
	</thead>
	<?php foreach ($u as $v) { ?>
		<tr capturoId="<?php echo $v["id_usu"]; ?>">
			<td> <img src="../<?php echo $v["imagen_usu"]; ?>" alt="" style=" width: 50px; border-radius: 50%; height: 50px;"> </td>
			<td><?php echo $v["nombre_usu"]; ?></td>
			<td><?php echo $v["apellido_usu"]; ?></td>
			<td><?php echo $v["dni_usu"]; ?></td>
			<td><?php echo $v["telefono_usu"]; ?></td>
			<td> <span style='color:#000;'>🟢</span></td>
			<td class='btnEliminarPro'><span class='icon-eye-blocked'></span></td>
		</tr>
	<?php	}	   ?>
</table>



<?php
echo $html;
?>