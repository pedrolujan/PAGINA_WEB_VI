
<?php

sleep(1);
session_start();
include("../model/conexion.php");
	$user=new ApptivaDB();
$html="";
if(isset($_POST['search']) && ($_POST['search']!="")){

	$u=$user->buscar("productos"," productos.nombre_pro like '%".$_POST['search']."%'");
	if(!$u){
		$html.="<p style='background: #D9534F; color: #fff; padding: 5px;'> No se encontraron datos </p>";
	}else{
	foreach ($u as $v)
	if(file_exists("../".$v['imagen_pro'])){
		
	$html.="<div class='contenProductos' capturoid=".$v['id_pro']."><div class='imgPro_buscados'><img src=".$v['imagen_pro']." class='imagenMosProductos' ></div>
	<div class='contenDatos'><div class='contenDatosProducto'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
						<div class='marca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
						<div class='precio_pro'><label>S/ ".$v["precio_pro"]."</label></div></div></div>"; 
	}else{
		$html.="<div class='contenProductos'><div class='imgPro_buscados'><img src=imagenes/usuarioblanco.jpg class='imagenMosProductos' ></div>
		<div class='contenDatos'><div class='contenDatosProducto'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
						<div class='marca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
						<div class='precio_pro'><label>".$v["precio_pro"]."</label></div></div></div>"; 

	}
}
	
}else{
	$u=$user->buscarTodo("productos");
	foreach ($u as $v)
	if(file_exists("../".$v['imagen_pro'])){
		
	$html.="<div class='contenProductos' capturoid=".$v['id_pro']."><div class='imgPro_buscados'><img src=".$v['imagen_pro']." class='imagenMosProductos' ></div>
	<div class='contenDatos'><div class='contenDatosProducto'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
						<div class='marca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
						<div class='precio_pro'><label>S/ ".$v["precio_pro"]."</label></div></div></div>"; 
	}else{
		$html.="<div class='contenProductos'><div class='imgPro_buscados'><img src=imagenes/usuarioblanco.jpg class='imagenMosProductos' ></div>
		<div class='contenDatos'><div class='contenDatosProducto'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
						<div class='marca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
						<div class='precio_pro'><label>".$v["precio_pro"]."</label></div></div></div>"; 

	}
}
echo $html;
   ?>
   
