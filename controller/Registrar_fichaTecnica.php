
<?php
include "../model/conexion.php";
$user = new ApptivaDB();
$id_producto = $_POST["txtidFtModal"];
$tipo = $_POST["txttipoFTM"];
$modelo = $_POST["txtmodeloFTM"];
$tamPantalla = $_POST["txttamPantallaFTM"];
$definiPantalla = $_POST["txttdefiniPantallaFTM"];
$ResolPantalla = $_POST["txtresolucionPantFTM"];
$pantTactil = $_POST["txtpantTactilFTM"];
$alto = $_POST["txtaltoFTM"];
$ancho = $_POST["txtanchoFTM"];

$consul=$user->buscar("ficha_tecnica","ficha_tecnica.ID_PRODUCTO=".$id_producto);
if($consul){
	$actualiza = $user->actualizar(
		"ficha_tecnica",
		"tipo_fht='".$tipo."',modelo_fht='".$modelo."',tamPantalla_fht='".$tamPantalla."',
		definiPantalla_fht='".$definiPantalla."',resolPantalla_fht='".$ResolPantalla."',
		pantTactil_fht='".$pantTactil."',alto_fht='".$alto."',ancho_fht='".$ancho."'"
		,"ficha_tecnica.ID_PRODUCTO=".$id_producto);
	if ($actualiza) {
		$areglo['exito'] = 'Actualizacion corecta';
	} else {
		$areglo['error'] = 'Hubo un error en el registro';
	}
}else{
	$u = $user->insertar(
		"ficha_tecnica",
		"'$tipo','$modelo','$tamPantalla','$definiPantalla','$ResolPantalla',
		'$pantTactil','$alto','$ancho','$id_producto'"
	);
	if ($u) {
		$areglo['exito'] = 'Registro corecto';
	} else {
		$areglo['error'] = 'Hubo un error en el registro';
	}
}
echo json_encode($areglo);
//echo $html;
