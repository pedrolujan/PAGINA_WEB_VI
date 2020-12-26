<?php
include("../model/conexion.php");
$id=$_POST['id'];
$repuesta=array();
if(!empty($id)){
	$activ=new ApptivaDB();
	$buscar=$activ->buscarFech("productos.estado","productos","productos.id_pro='".$id."'");
	$result=mysqli_fetch_array($buscar);
	
	$tabla=  "productos";
	if($result["estado"]=="0"){
		$datos="productos.estado='1'";		
	}elseif ($result["estado"]=="1") {
		$datos="productos.estado='0'";		
		
	}
		$sql=$activ->actualizar($tabla,$datos,"productos.id_pro='".$id."'");
		
		if($sql){
			$repuesta["exito"]="Se actualizo conexito";
		}else{
			$repuesta["error"]="No realizar la actualizacion";

		}
}
echo json_encode($repuesta);
?>