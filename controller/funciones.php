<?php
session_start(); 
include("../model/conexion.php");
$user=new ApptivaDB();
$html=[];
if(isset($_SESSION[ 'usuarioLogeado'])){  
	$u=$user->buscar("usuarios"," usuarios.id_usu=".$_SESSION[ 'usuarioLogeado']);
   foreach ($u as $v)
    $html['datos']="<p>Usuario <br>".$v["nombre_usu"]."</p>"; 
    $html['img']=$v["imagen_usu"];
}elseif(isset($_SESSION['adminLogeado'])){
    $u=$user->buscar("administrador"," administrador.id_admin=".$_SESSION['adminLogeado']);
    foreach ($u as $v)
    $html['datos']="<p>Admin <br>".$v["nombre_admin"]."</p>"; 
    $html['img']=$v["imagen_admin"];
   
}else {
    $html['datos']="<p> inicia session </p>";
}
echo json_encode($html);
