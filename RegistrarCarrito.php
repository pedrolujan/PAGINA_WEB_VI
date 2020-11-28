
<?php
session_start();
include("model/conexion.php");
$user = new ApptivaDB();

$data = json_decode($_POST['jObject'], true);
$cantidad=count($data);

$id_usuario=$_SESSION["usuarioLogeado"];

$ZonaHoraria= date_default_timezone_set('America/lima'); 
$fecha_actual=date("d-m-Y H:i:s");
$result="";
$msg="";

for($i=0;$i<$cantidad;$i++){
/* $consul=$user->buscar("carrito","carrito.ID_PRODUCTOS=".$data[$i][0][0]); */
$consul=$user->buscar("carrito","carrito.ID_PRODUCTOS=".$data[$i][0][0]." AND carrito.ID_USUARIOS=".$_SESSION["usuarioLogeado"]);
if($consul){
	$actualiza = $user->actualizar(
        "carrito"        
        ,"unidades_car='".$data[$i][3][0]."',
        fecha_car='".$fecha_actual."',
        subTotal_car='".$data[$i][5][0]."'"        
		,"carrito.ID_PRODUCTOS=".$data[$i][0][0]." AND carrito.ID_USUARIOS=".$id_usuario);
	if ($actualiza) {
		$msg.=  'Actualizacion corecta';
	} else {
		$msg.= 'Hubo un error en la Actualizacion';
	}
}else{
	$u = $user->insertar(
		"carrito",
		"'$id_usuario','".$data[$i][0][0]."','".$data[$i][3][0]."','".$fecha_actual."','".$data[$i][5][0]."'");
	if ($u) {
		$result= 'Registro corecto';
	} else {
		$result= 'Hubo un error en el registro';
	}
}
}

/* 
for($i=0;$i<$cantidad;$i++){
	$consul=$user->buscar("carrito","carrito.ID_PRODUCTOS=".$data[$i][0][0]."and carrito.ID_USUARIOS=".$_SESSION["usuarioLogeado"]);
	if($consul){
		$actualiza = $user->actualizar(
			"carrito"        
			,"unidades_car='".$data[$i][3][0]."',fecha_car='".$fecha_actual."',subTotal_car='".$data[$i][5][0]."'"        
			,"carrito.ID_PRODUCTOS=".$data[$i][0][0]."and carrito.ID_USUARIOS=".$_SESSION["usuarioLogeado"]);
		if ($actualiza) {
			$msg.=  'Actualizacion corecta';
		} else {
			$msg.= 'Hubo un error en la Actualizacion';
		}
	}else{
		$u = $user->insertar(
			"carrito",
			"'$id_usuario','".$data[$i][0][0]."','".$data[$i][3][0]."','".$fecha_actual."','".$data[$i][5][0]."'");
		if ($u) {
			$result= 'Registro corecto';
		} else {
			$result= 'Hubo un error en el registro';
		}
	}
  
}
 */
/* 
$id_pro=$_POST['id'];
$id_usuario=2;
$unidades=$_POST['cantidad'];
$subTotal=$_POST['subTotal'];
$ZonaHoraria= date_default_timezone_set('America/lima'); 
$fecha_actual=date("d-m-Y H:i:s");
$result="";

$consul=$user->buscar("carrito","carrito.ID_PRODUCTOS=".$id_pro);
if($consul){
	$actualiza = $user->actualizar(
        "carrito"        
        ,"ID_USUARIOS='".$id_usuario."',
        unidades_car='".$unidades."',
        fecha_car='".$fecha_actual."',
        subTotal_car='".$subTotal."'"        
		,"carrito.ID_PRODUCTOS=".$id_pro);
	if ($actualiza) {
		$result=  'Actualizacion corecta';
	} else {
        $result= 'Hubo un error en la Actualizacion';
	}
}else{
	$u = $user->insertar(
		"carrito",
		"'$id_usuario','$id_pro','$unidades','$fecha_actual','$subTotal'");
	if ($u) {
		$result= 'Registro corecto';
	} else {
		$result= 'Hubo un error en el registro';
	}
}

 */