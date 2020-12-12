<?php
include("../model/conexion.php");
$id=$_POST['id'];
if(!empty($id)){
	$activ=new ApptivaDB();
	$tabla=  "productos";
		$datos="productos.estado='0'";		
		$sql=$activ->actualizar($tabla,$datos,"productos.id_pro=".$id);
		
		if($sql){
			$repuesta["exito"]="Se elimino el producto";
		}else{
			$repuesta["error"]="No se pudo eliminar el producto";

		}
}
echo json_encode($repuesta);
?>