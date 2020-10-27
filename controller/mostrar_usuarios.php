<?php
$servidor="localhost";
    $user="root";
    $pass="";
    $base_datos="bdpaginaweb";

    $conexion= new mysqli($servidor,$user,$pass,$base_datos) ; 
   
$query="SELECT * FROM usuarios";
	$resul=mysqli_query($conexion,$query);
	/*$num_row=mysqli_num_rows($resul);*/
	if(!$resul){
		die('Hubo un erro al mostrar alumnos '.mysqli_error($conexion));
		/*$areglo['error']= 'no tienes cuenta';*/
	}else{
		$json=array();
		
		while($row =mysqli_fetch_array($resul)){
			
				$json[] = array(
				'nombre' => $row['nombre_usu'],
				'apellido' => $row['apellido_usu'],
				'correo' =>$row['correo_usu']
			);
		}
		
	}
$jsonString = json_encode($json);
	echo $jsonString;

?>
