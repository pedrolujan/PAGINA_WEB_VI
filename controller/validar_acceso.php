<?php
session_start();
session_destroy();
sleep(1);
if($_POST["usuario"] ==null){
$arreglo['error']="Ingrese usuario";
}elseif($_POST["clave"]== null){
	$arreglo['error']="Ingrese clave";
}else{
	include("../model/conexion.php");
	$user= new ApptivaDB();

	$usuario=$_POST["usuario"] ;
	$clave=$_POST["clave"];

	$sql=$user->buscar("usuarios","usuario_usu='".$usuario."'AND clave_usu='".$clave."'");
	if($sql){
		session_start();
		foreach($sql as $v)
		if(isset($v['id_usu'])){	
			
			$_SESSION['usuarioLogeado']=$v['id_usu'];
			$arreglo['exito']="Bienvenido ".$v['nombre_usu'];
		}
		
	}else{
		$sql2=$user->buscar("administrador","usuario_admin='".$usuario."' AND clave_admin='".$clave."'");
		session_start();
		foreach($sql2 as $v2)
		if(isset($v2['id_admin'])){
			$_SESSION['adminLogeado']=$v2['id_admin'];
			$arreglo['exito']="Administrador ".$v2['nombre_admin'];
		}else{
		$arreglo['error']="Datos incorrectos";
		}
	}
	
}
echo json_encode($arreglo);
?>