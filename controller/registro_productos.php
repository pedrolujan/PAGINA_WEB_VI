<?php 
include "../model/conexion.php";
$user = new ApptivaDB();
 $areglo=[];
	$nombre=$_POST['txtnombre'];
	$descripcion=$_POST['txtdescripcion'];
	$marca=$_POST['txtmarca'];
	$precio=$_POST['txtprecio'];
	$categoria=$_POST['cbocategoria'];
	if(empty($nombre)){
		$areglo['error'] = "Complete el campo Nombre ";
	}elseif(empty($descripcion)){
		$areglo['error'] = "Complete el campo Descripcion ";
	}elseif(empty($marca)){
		$areglo['error'] = "Complete el campo Marca ";
	}elseif(empty($precio)){
		$areglo['error'] = "Complete el campo Precio ";
	}elseif(empty($categoria)){
		$areglo['error'] = "Seleccione Categoria ";
	}else{
	if(isset($_FILES["imagenProducto"])){
	$tipoImagen=["image/jpeg", "image/png", "image/gif"];
	$imagen=$_FILES["imagenProducto"];
		if(in_array($imagen["type"],$tipoImagen)){
			$tmp_name=$imagen["tmp_name"];
			$name=$imagen["name"];
			$ZonaHoraria= date_default_timezone_set('America/lima'); 
			$fecha_actual=date("dmyGi");
			$n_aleatorio = rand(10, 99);			
			$carpeta="../imagenes/productos/".$fecha_actual.$categoria."_".$n_aleatorio.$name;
			$rutabd="http://localhost/L&M.StoreTecnology/imagenes/productos/".$fecha_actual.$categoria."_".$n_aleatorio.$name;
			$estado=true;
			
			$u = $user->insertar(
				"productos",
				"'$nombre','$descripcion','$marca','$precio','$categoria',
				'$rutabd','$estado'");			
			if ($u) {	
				move_uploaded_file($tmp_name,$carpeta);
				$areglo['exito'] = 'Registro corecto';
			} else {
				$areglo['error'] = 'Hubo un error en el registro';
			}
		}else{
			$areglo['error']="Sube una imagen valida";
		}
	}else{
		$areglo['error']="no se subio ninguna imagen";
		
	} 
}

echo json_encode($areglo);