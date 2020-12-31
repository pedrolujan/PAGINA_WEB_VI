<?php
session_start();
session_destroy();
/* sleep(1); */
include("../model/conexion.php");
$user = new ApptivaDB();

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$idPro = $_POST["id"];


$arreglo = array();
if ($idPro!=="") {
	$arreglo['redirec']=$idPro;
}
if ($usuario == null) {
	$arreglo['error'] = "ingrese Usuario";
} elseif ($clave == null) {
	$arreglo['error'] = "ingrese Clave";
} else {
	$sql1 = $user->buscarFech("*", "usuarios", "usuario_usu='" . $usuario . "' AND clave_usu='" . $clave . "'");
	$res1 = mysqli_num_rows($sql1);
	if ($res1 >= 1) {
		$usuario = $user->buscar("usuarios", "usuario_usu='" . $usuario . "' AND clave_usu='" . $clave . "' AND estado_usu='1'");
		if ($usuario) {
			session_start();
			foreach ($usuario as $us) {
				if ($us['rol'] == 2) {
					$_SESSION['adminLogeado'] = $us['id_usu'];
					$arreglo['exito'] = " ✔ Administrad@r " . $us['nombre_usu'];
				} else {
					$_SESSION['usuarioLogeado'] = $us['id_usu'];
					$arreglo['exito'] = "✔ bienvenid@ " . $us['nombre_usu'];
				}
			}
		} else {
			$arreglo['error'] = "Cuenta deshabilitada";
		}
	} else {
		$arreglo['error'] = "usuario o clave incorrectos";
	}
}
echo json_encode($arreglo);
