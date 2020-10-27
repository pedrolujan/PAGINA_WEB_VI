
<?php
sleep(1);
include "../model/conexion.php";
$user = new ApptivaDB();
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$dni = $_POST["dni"];
$telefono = $_POST["telefono"];
$pais = $_POST["pais"];
$provincia = $_POST["provincia"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$repclave = $_POST["repclave"];

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
	$u = $user->insertar(
		"usuarios",
		"'$nombre','$apellido','$dni','$telefono','$pais',
		'$provincia','$correo','$usuario','$clave','$repclave','NULL','foto'"
	);
	if ($u) {
		//$html.="registro correcto";	
		$areglo['exito'] = 'Registro corecto';
	} else {
		$areglo['error'] = 'Hubo un error en el registro';
		//$html.="registro correcto";
	}
}
echo json_encode($areglo);
//echo $html;
