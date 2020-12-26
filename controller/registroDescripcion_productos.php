<?php 
include("../model/conexion.php");
$user = new ApptivaDB();
 $areglo=[];
	$descripcion=$_POST['txtdescripcion'];
	$idProdcto=$_POST['txtidDescripProModal'];

	
	$tipoImagen=["image/jpeg", "image/png", "image/gif"];
	$imagen1=$_FILES["imagen1DescripProducto"];
	$imagen2=$_FILES["imagen2DescripProducto"];

		if(in_array($imagen1["type"],$tipoImagen) && in_array($imagen2["type"],$tipoImagen)){
			$ZonaHoraria= date_default_timezone_set('America/lima'); 
			$fecha_actual=date("dmyGi");
			$n_aleatorio = rand(10, 99);

			$tmp_name1=$imagen1["tmp_name"];
			$name1=$imagen1["name"];			
			$carpeta1="../imagenes/descripcionProductos/".$fecha_actual.$idProdcto."_".$n_aleatorio.$name1;
			$rutabd1="../imagenes/descripcionProductos/".$fecha_actual.$idProdcto."_".$n_aleatorio.$name1;
			
			/* segunda imagen */
			$tmp_name2=$imagen2["tmp_name"];
			$name2=$imagen2["name"];			
			$carpeta2="../imagenes/descripcionProductos/".$fecha_actual.$idProdcto."_".$n_aleatorio.$name2;
			$rutabd2="../imagenes/descripcionProductos/".$fecha_actual.$idProdcto."_".$n_aleatorio.$name2;
			
			$consul=$user->buscar("descripcionproducto","descripcionproducto.ID_PRODUCTO=".$idProdcto);
			if($consul){
				$actualiza = $user->actualizar(
					"descripcionproducto",
					"descripcion_descriPro='".$descripcion."',
					fotoUno_descripPro='".$rutabd1."',
					fotoDos_descripPro='".$rutabd2."'",
					"descripcionproducto.ID_PRODUCTO=".$idProdcto);
				if ($actualiza) {
					$areglo['exito'] = 'Actualizacion corecta';
					move_uploaded_file($tmp_name1,$carpeta1);
					move_uploaded_file($tmp_name2,$carpeta2);
				} else {
					$areglo['error'] = 'Hubo un error en el registro';
				}
			}else{
			$u = $user->insertar(
				"descripcionproducto",
				"'$descripcion','$rutabd1','$rutabd2','$idProdcto'");			
			if ($u) {	
				$areglo['exito'] = 'Registro corecto';
				move_uploaded_file($tmp_name1,$carpeta1);
				move_uploaded_file($tmp_name2,$carpeta2);
			} else {
				$areglo['error'] = 'Hubo un error en el registro';
			}
		}
		}else{
			$areglo['error']="Sube una imagen valida";
		}



echo json_encode($areglo);