<?php
include("../model/conexion.php");
$id=$_POST['id'];
$tipoCon=$_POST['tipoCon'];
$repuesta=array();
if ($tipoCon=="producto") {

	if(!empty($id)){
		$activ=new ApptivaDB();
		$buscar=$activ->buscarFech("productos.estado","productos","productos.id_pro='".$id."'");
		$result=mysqli_fetch_array($buscar);
		
		$tabla=  "productos";
		if($result["estado"]=="0"){
			$datos="productos.estado='1'";

			$repuesta["activarPro"]="0";

		}elseif ($result["estado"]=="1") {
			$datos="productos.estado='0'";	

			$repuesta["desActivarPro"]="1";

		}
			$sql=$activ->actualizar($tabla,$datos,"productos.id_pro='".$id."'");
			
			if($sql){
				$repuesta["exito"]="Se actualizo conexito";
			}else{
				$repuesta["error"]="Error en la   actualizacion";

			}
	}
}elseif ($tipoCon=="usuario") {
	if(!empty($id)){
		$activ=new ApptivaDB();
		$buscar=$activ->buscarFech("usuarios.estado_usu","usuarios","usuarios.id_usu='".$id."'");
		$result=mysqli_fetch_array($buscar);
		
		$tabla=  "usuarios";
		if($result["estado_usu"]=="0"){
			$datos="usuarios.estado_usu='1'";	

			$repuesta["activarUsu"]="0";

		}elseif ($result["estado_usu"]=="1") {
			$datos="usuarios.estado_usu='0'";	
			$repuesta["desActivarUsu"]="0";	
			
		}
			$sql=$activ->actualizar($tabla,$datos,"usuarios.id_usu='".$id."'");
			
			if($sql){
				$repuesta["exito"]="Se actualizo conexito";
			}else{
				$repuesta["error"]="Error en la actualizacion";

			}
	}
}


echo json_encode($repuesta);
