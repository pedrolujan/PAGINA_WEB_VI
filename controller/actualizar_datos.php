<?php
session_start();
include("../model/conexion.php");
$user=new ApptivaDB();
$id=$_POST["txtid"];
$idVar="";
$nombre=$_POST["txtnombre"];
$apellido=$_POST["txtapellido"];
$dni=$_POST["txtdni"];
$telefono=$_POST["txttelefono"];
$pais=$_POST["cbo_pais"];
$provincia=$_POST["cbo_provincia"];
$correo=$_POST["txtcorreo"];
$imagenUsuActual=$_POST["txtimagen"];
$tmp_name="";
$carpeta="";
$rutabd="";
$usuLogeado="";
$tabla="";
$datos="";
$aux="";
$arreglo=[];
$tipoImagen=["image/jpeg", "image/png", "image/gif"];

if(isset($_POST["txtid"])){
	$imagenUsu=$_FILES["imagenUsuario"];
		$tmp_name=$imagenUsu["tmp_name"];
		$name=$imagenUsu["name"];
		$ZonaHoraria= date_default_timezone_set('America/lima'); 
		$fecha_actual=date("dmyGi");
		$n_aleatorio = rand(10, 99);			
		$carpeta="../imagenes/usuarios/".$fecha_actual.$id."_".$n_aleatorio.$name;
		$rutabd="imagenes/usuarios/".$fecha_actual.$id."_".$n_aleatorio.$name;
	
	if(isset($_SESSION["usuarioLogeado"])){
		$usuLogeado=$_SESSION["usuarioLogeado"];
		$idVar="usuarios.id_usu=";
		$tabla="usuarios";
		if(empty($name) || !in_array($imagenUsu["type"],$tipoImagen)){
			$datos="nombre_usu='".$nombre."',apellido_usu='".$apellido."', dni_usu='".$dni."', telefono_usu='".$telefono."', 
			pais_usu='".$pais."', provincia_usu='".$provincia."', correo_usu='".$correo."', imagen_usu='".$imagenUsuActual."'";
			$aux.="pero no la imagen";
		}else{
		$datos="nombre_usu='".$nombre."',apellido_usu='".$apellido."', dni_usu='".$dni."', telefono_usu='".$telefono."', 
				pais_usu='".$pais."', provincia_usu='".$provincia."', correo_usu='".$correo."', imagen_usu='".$rutabd."'";
				$aux.="";
		}
	}elseif(isset($_SESSION["adminLogeado"])){
		$usuLogeado=$_SESSION["adminLogeado"];
		$idVar="usuarios.id_usu=";
		$tabla="usuarios";
		if(empty($name) || !in_array($imagenUsu["type"],$tipoImagen)){
			$datos="nombre_usu='".$nombre."',apellido_usu='".$apellido."', dni_usu='".$dni."', telefono_usu='".$telefono."', 
			pais_usu='".$pais."', provincia_usu='".$provincia."', correo_usu='".$correo."', imagen_usu='".$imagenUsuActual."'";
			$aux.="pero no la imagen";
		}else{
			$datos="nombre_usu='".$nombre."',apellido_usu='".$apellido."', dni_usu='".$dni."', telefono_usu='".$telefono."', 
				pais_usu='".$pais."', provincia_usu='".$provincia."', correo_usu='".$correo."', imagen_usu='".$rutabd."'";
				$aux.="";
		}
	}


	$sql=$user->actualizar($tabla,$datos,$idVar.$_POST["txtid"]);
	if($sql){
		$arreglo["exito"]="Se actualizo con exito ".$aux;
		move_uploaded_file($tmp_name,$carpeta);
	}else{
		$arreglo["error"]="No se pudo atualizar";
	}

}
echo(json_encode($arreglo));


?>