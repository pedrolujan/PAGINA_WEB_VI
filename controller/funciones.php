<?php
session_start(); 
include("../model/conexion.php");
include("../model/url.php");
$user=new ApptivaDB();
$html=[];
if(isset($_SESSION[ 'usuarioLogeado'])){  
	$u=$user->buscar("usuarios"," usuarios.id_usu=".$_SESSION[ 'usuarioLogeado']);
   foreach ($u as $v)
    $html['datos']="<p>".$v["nombre_usu"]."</p>"; 
    $html['img']=$urlProyecto.$v["imagen_usu"];
}elseif(isset($_SESSION['adminLogeado'])){
    $u=$user->buscar("usuarios"," usuarios.id_usu=".$_SESSION[ 'adminLogeado']);
    foreach ($u as $v)
    $html['datos']="<p>Admin <br>".$v["nombre_usu"]."</p>"; 
    $html['img']=$urlProyecto.$v["imagen_usu"];
   
}else {
    $html['datos']="<p> inicia session </p>";
}
echo json_encode($html);
