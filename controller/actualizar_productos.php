<?php
session_start();
include("../model/conexion.php");
include("../model/url.php");
$user=new ApptivaDB();
$id=$_POST["capIdPro"];
$idVar="";
$nombre=$_POST["txtnombre"];
$descripcion=$_POST["txtdescripcion"];
$marca=$_POST["txtmarca"];
$precio=$_POST["txtprecio"];
$stok=$_POST["txtstok"];
$categoria=$_POST["cbocategoria"];
$imagenProActual=$_POST["txtimagen"];
$tmp_name="";
$carpeta="";
$rutabd="";
$tabla="";
$datos="";
$aux="";
$tipoImagen=["image/jpeg", "image/png", "image/gif"];

if(isset($_POST["capIdPro"])){
	$imagenActPro=$_FILES["imagenActProducto"];
		$tmp_name=$imagenActPro["tmp_name"];
		$name=$imagenActPro["name"];
		$ZonaHoraria= date_default_timezone_set('America/lima'); 
		$fecha_actual=date("dmyGi");
		$fecha=date("Y-m-d");
		$n_aleatorio = rand(10, 99);
		$carpeta="../imagenes/productos/".$fecha_actual.$categoria."_".$n_aleatorio.$name;
		$rutabd=$urlProyecto."imagenes/productos/".$fecha_actual.$categoria."_".$n_aleatorio.$name;
	
		$tabla="productos";
		if(empty($name) || !in_array($imagenActPro["type"],$tipoImagen)){
			$datos="nombre_pro='".$nombre."', descripcion_pro='".$descripcion."',
			marca_pro='".$marca."', precio_pro='".$precio."', stok_pro='".$stok."', ID_CATEGORIA='".$categoria."', imagen_pro='".$imagenProActual."',estado='1',fecha_registro_pro='".$fecha."'";
			
			$aux.="pero no la imagen";
			
			$sql=$user->actualizar($tabla,$datos,"productos.id_pro='".$_POST["capIdPro"]."'");
			if($sql){
				$arreglo["ok"]="Se actualizo con exito ".$aux;
			}else{
				$arreglo["error"]="No se pudo atualizar";
			}
			
		}else{
			$datos="nombre_pro='".$nombre."',descripcion_pro='".$descripcion."',
			marca_pro='".$marca."', precio_pro='".$precio."',stok_pro='".$stok."', ID_CATEGORIA='".$categoria."', imagen_pro='".$rutabd."'";
			$aux.="";
			
			$sql=$user->actualizar($tabla,$datos,"productos.id_pro='".$_POST["capIdPro"]."'");
			if($sql){
				$arreglo["ok"]="Se actualizo con exito ".$aux;
				move_uploaded_file($tmp_name,$carpeta);
			}else{
				$arreglo["error"]="No se pudo atualizar";
			}
		
		}
		echo json_encode($arreglo);
	

	
	
}



?>