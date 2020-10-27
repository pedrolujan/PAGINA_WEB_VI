<?php
include("../model/conexion.php");
$activ=new ApptivaDB();
if(!$_POST){
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<link rel="stylesheet" href="../css/registro_usuario.css">
</head>

<body> 
	<div class="contenedor_grad_sec_cur">		
		<form method="post" id="form_regis_grado" class="form_regis _grado" action="#">
			<label>Registra tus Datos</label><br>
			<input type="text" name="txtNombre"  placeholder="Nombre" required><br>
			<input type="text" name="txtApellido" placeholder="Apellidos" required><br>
			<input type="email" name="txtCorreo" placeholder="Correo@electronico.com" required><br>
			<div class="selectores">
			<select name="cbo_departamentos" id="cbo_departamentos">
				<option>Seleccione Departamento</option>
				<?php
				$departamentos=$activ->buscar("departamento","1");
				foreach($departamentos as $dep):
				?>
				<option value="<?php echo $dep['id_dep'] ?>"><?php
				echo $dep['nombre_dep'] ?></option>
				<?php
				endforeach;
				?>	
			 </select>
					<select name="cbo_provincia" id="cbo_provincia">
				<option value="0">Seleccione Provincia</option>
			</select>
			</div> 
			<input type="text" name="txtClave" placeholder="Contraseña"><br>
			<input type="text" name="txtConfClave" placeholder="Conf. Contraseña" required><br>
			<div id="error"></div><br>
			<input type="submit" name="btnRegistrar" value="Registrar" class="btnregistroadmin">			
		</form>
			
	</div>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="../js/pincipal.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
<?php
	}else{
		$nombre=$_POST["txtNombre"];
		$apellido=$_POST["txtApellido"];
		$correo=$_POST["txtCorreo"];	
		$clave=$_POST["txtClave"];
		$confClave=$_POST["txtConfClave"];
	
		if($clave==$confClave){
		$tabla=  "usuarios (id_usu,nombre_usu,apellido_usu,correo_usu,clave_usu)";
		$datos="'$nombre','$apellido','$correo','$clave'";
		
		$activ-> insertar($tabla,$datos);			
		}else{
			
			header("location: registroN_usuario.php");
			echo'<script type="text/javascript"> Swal.fire({
				title: "las contraseñas no",
				icon: "error"
				});
			</script>';
		}
}
?>

