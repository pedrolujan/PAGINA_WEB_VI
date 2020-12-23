<?php
session_start();
session_destroy();
/* sleep(1); */
$arreglo=array();
if($_POST["id"] !=null){
	$arreglo['redirec']=$_POST["id"];
}if($_POST["usuario"] ==null){
$arreglo['error']="Ingrese Usuario";
}elseif($_POST["clave"]== null){
	$arreglo['error']="Ingrese Clave";
}else{
	include("../model/conexion.php");
	$user= new ApptivaDB();

	$usuario=$_POST["usuario"] ;
	$clave=$_POST["clave"];
	$sql1=$user->buscar("usuarios","usuario_usu='".$usuario."'");
	$sql2=null;
	if($sql1){
	$arreglo['error']="Clave Incorrecta";
		
	}else{
		$sql2=$user->buscar("usuarios","clave_usu='".$clave."'");
		if($sql2){
		
			$arreglo['error']="Usuario Incorrecto";
			
		}else{
			$arreglo['error']="Usuario no Registrado";
		}
	}
	$usuario=$user->buscar("usuarios","usuario_usu='".$usuario."' AND clave_usu='".$clave."'");
	if($usuario){
		session_start();
		foreach($usuario as $us){
			if($us['rol']==2){			
				$_SESSION['adminLogeado']=$us['id_usu'];
				$arreglo['exito']=" ✔ Administrad@r ".$us['nombre_usu'];
			}else{
				$_SESSION['usuarioLogeado']=$us['id_usu'];
				$arreglo['exito']="✔ bienvenid@ ".$us['nombre_usu'];
			}
		}
	}
	
}
echo json_encode($arreglo);
?>