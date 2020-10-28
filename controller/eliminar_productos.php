<?php
include("../model/conexion.php");
$id=$_POST['id'];
if(!empty($id)){
	$activ=new ApptivaDB();
	$tabla=  "productods";
		$condicion="productos.id_pro='$id'";		
		$sql=$activ->borrar($tabla,$condicion,);
		if($sql){
			$repuesta["exito"]="Se elimino el producto";
		}else{
			$repuesta["error"]="No se pudo eliminar el producto";

		}
}
echo json_encode($repuesta);
?>