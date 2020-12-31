
<?php
sleep(1);
include "../model/conexion.php";
$user = new ApptivaDB();
$nombre = $_POST["txtnombre"];
$apellido = $_POST["txtapellido"];
$dni = $_POST["txtdni"];
$telefono = $_POST["txttelefono"];
$pais = $_POST["cbo_pais"];
$provincia = $_POST["cbo_provincia"];
$correo = $_POST["txtcorreo"];
$usuario = $_POST["txtusuario"];
$clave = $_POST["txtclave"];
$repclave = $_POST["txtconfclave"];
$ZonaHoraria= date_default_timezone_set('America/lima');
	$fecha=date("y-m-d");

if (empty($nombre)) {
	$areglo['error'] = "Complete el campo Nombre ";
} elseif (empty($apellido)) {
	$areglo['error'] = "Complete el campo Apellido";
	/*echo"<script>
	$('#txtapellido').focus();
	</script>";*/
} elseif (empty($dni)) {
	$areglo['error'] = "Complete el campo DNI";
	/* echo"<script>
	$('#txtdni').focus();
	</script>"; */
} elseif (empty($telefono)) {
	$areglo['error'] = "Complete el campo Telefono";
	/* echo"<script>
	$('#txttelefono').focus();
	</script>"; */
} elseif ($pais == "Seleccione Pais") {
	$areglo['error'] = "Seleccione su pais";
	/* echo"<script>
	$('#cbo_pais').focus();
	</script>"; */
} elseif ($provincia == "Seleccione Ciudad") {
	$areglo['error'] = "Selecione ciudad";
	/* echo"<script>
	$('#cbo_provincia').focus();
	</script>"; */
} elseif (empty($correo)) {
	$areglo['error'] = "Complete el campo Correo";
	/* echo"<script>
	$('#txtcorreo').focus();
	</script>"; */
} elseif (empty($usuario)) {
	$areglo['error'] = "Complete el campo Usuario";
	/* echo"<script>
	$('#txtusuario').focus();
	</script>"; */
} elseif (empty($clave)) {
	$areglo['error'] = "Complete el campo Clave";
	/* echo"<script>
	$('#txtclave').focus();
	</script>"; */
} elseif (empty($repclave)) {
	$areglo['error'] = "Complete el campo Rep: clave";
	/* echo"<script>
	$('#txtconfclave').focus();
	</script>"; */
} elseif ($repclave != $clave) {
	$areglo['error'] = "Las contraseñas no coinciden";
} elseif (strlen($clave) < 4) {
	$areglo['error'] = "contraseña muy corta ";
} else {
	
	$consulDni=$user->buscarFech("usuarios.dni_usu","usuarios","usuarios.dni_usu='".$dni."'");
	$consulCorreo=$user->buscarFech("usuarios.correo_usu","usuarios","usuarios.correo_usu='".$correo."'");
	$consulUsuario=$user->buscarFech("usuarios.usuario_usu","usuarios","usuarios.usuario_usu='".$usuario."'");
	$result=mysqli_num_rows($consulDni);
	$resultCorreo=mysqli_num_rows($consulCorreo);
	$resultCUsuario=mysqli_num_rows($consulUsuario);
	if($result>=1){
		$areglo['error'] = 'Este dni ya esta registrado';
	}elseif ($resultCorreo>=1) {
		$areglo['error'] = 'Este correo ya esta registrado';
	}elseif ($resultCUsuario>=1) {
		$areglo['error'] = 'Este Usuario ya esta registrado';
	}else{
		$u = $user->insertar(
			"usuarios",
			"'$nombre','$apellido','$dni','$telefono','1',
			'1','$correo','$usuario','$clave','$repclave','foto','1','$fecha','1'");
		if ($u) {
			
			$areglo['exito'] = 'Registro corecto';
		} else {
			$areglo['error'] = 'Hubo un error en el registro';
			
		}
	}
	
}
echo json_encode($areglo);
