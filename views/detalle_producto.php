<?php
session_start();
if(!isset($_SESSION["usuarioLogeado"]) and !isset($_SESSION["adminLogeado"])){
    header("Location: ../index.php");
}
include("../model/url.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../js/jquery-3.5.1.min.js"></script>  <!-- 
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">   -->
    <!-- <link rel="stylesheet" href="CSS/carrito/bootstrap-grid.css"> -->
	<link rel="stylesheet" href="../js/jquery.modal.min.css">
    <link rel="stylesheet" href="../css/estilos_principal.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/carrito/estilos.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>fonts/style.css">
	<link rel="stylesheet" href="../fonts/fonts/style.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_regProducto.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosFooter.css">
	<link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosHeader.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mystery+Quest">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../fontawesome/css/all.css">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
</head>
<body>

<?php include("header.php"); ?>

<?php

$html="";
if(isset($_GET['id']) && ($_GET['id']!="")){

	include("../model/conexion.php");
	$user=new ApptivaDB();
	$u=$user->buscar("productos","productos.id_pro='".$_GET['id']."'");
	$desc=$user->buscarFech("descripcionproducto.fotoUno_descripPro,descripcionproducto.fotoDos_descripPro",
	"productos
	INNER JOIN descripcionproducto ON productos.id_pro=descripcionproducto.ID_PRODUCTO",
					"descripcionproducto.ID_PRODUCTO='".$_GET['id']."'");
	foreach ($u as $v){
		if(isset($_SESSION['adminLogeado'])){	?>			
				<div class='contenDetPro' capturoid="<?php echo $v['id_pro']?>">
					<div class='contenDatosDetProMain simpleCart_shelfItem' id="contenDatosDetProMain">
						<div class='imgDet_Pro'>
							<div class="carruselImagenes">
							<img src="<?php echo $v['imagen_pro']?>" alt=""  class="img_descripProd1"srcset="">
							<?php foreach ($desc as $des){?>								
								<img src="<?php echo $des['fotoUno_descripPro']?>" class="img_descripProd2" alt="" srcset="">
								<img src="<?php echo $des['fotoDos_descripPro']?>" class="img_descripProd3" alt="" srcset="">
							<?php }?>
							</div>
							<img src="<?php echo $v['imagen_pro']?>" class='item_image' id="imagenDetPro">
						</div>
						<div class='contenDatosDetPro ' capId="<?php echo $v['id_pro']?>">
							<div class='DetProNombre_pro'>
									<label class='nombre_pro'><?php echo $v["nombre_pro"];?></label></br>
									</div>
									<div class='DetProMarca_pro DMarcaProducto'>
										<label class='marca_pro'><?php echo $v["marca_pro"]?></label></br>
									</div>
									<div class='DetProDescrip_pro'>
										<label class='descripcion_pro'><?php echo $v["descripcion_pro"]?></label></br>
									</div>
									<div class='DetProPrecio_pro'>
										S/ <label class='precio_pro'><?php echo $v["precio_pro"]?></label>
									</div>
															
									<div class="mostStokDisponible">
									Stok disponible	<label class='stok_pro'><?php echo $v["stok_pro"]?></label>
									</div>
									
									<button class='btnAbreActualizaPro'><span class='icon-pencil'></span>Editar</button>
									<button class='btnAbreEliminarPro'><span class='icon-bin'></span>Eliminar</button>
						</div>
						
					</div>
					<div class='conten_fTecnicaPro' id="okok" capturoid="<?php echo $v['id_pro']?>">
						<div class='ftcaberera'>
							<button class='btnCargaDescrip'> Descripcion</button>
							<button class='btnCargaFichaT'>Ficha Tecnica</button>
						</div>
						<div class='ftbody'>
						</div>					
					</div>
				</div>
					
			
	
			<?php 
		}	
		elseif(isset($_SESSION['usuarioLogeado'])){?>
					
				<div class='contenDetPro' id="contenDetPro"  capturoid="<?php echo $v['id_pro']?>">					
					<div class='contenDatosDetProMain simpleCart_shelfItem' id="contenDatosDetProMain">
						<div class='imgDet_Pro'>
							<div class="carruselImagenes">
							<img src="<?php echo $v['imagen_pro']?>" alt=""  class="img_descripProd1"srcset="">
							<?php foreach ($desc as $des){?>								
								<img src="<?php echo $des['fotoUno_descripPro']?>" class="img_descripProd2" alt="" srcset="">
								<img src="<?php echo $des['fotoDos_descripPro']?>" class="img_descripProd3" alt="" srcset="">
							<?php }?>
							</div>
							<img src="<?php echo $v['imagen_pro']?>" id="imagenDetPro" class='item_image'>
						</div>
						<div class='contenDatosDetPro ' capId="<?php echo $v['id_pro']?>">
							<input type='hidden' class='item_idpro' id="idProducto" value="<?php echo $v['id_pro']?>" style='display:blok;'>
							<div class='DetProNombre_pro'>
								<h4 class='item_name nombre_pro' > <?php echo $v["nombre_pro"] ?></h4></br>
							</div>
							<div class='DetProMarca_pro'>
								<label> <?php echo $v["marca_pro"]?></label></br>
							</div>
							<!-- <div class='DetProDescrip_pro'>
								<label> <?php echo $v["descripcion_pro"] ?></label></br>
							</div> -->
							<div class='DetProPrecio_pro precio_pro' id="DetProPrecio_pro">
								<input type="hidden" id="precioProducto" value="<?php echo $v["precio_pro"] ?>">
								<div class='item_price'>S/  <?php echo $v["precio_pro"] ?></div>
							</div>
							<div class='contenDetAddCar'>	
							
								<input type="hidden" name="" class="item_stokpro" id="stokDisponible" value="<?php echo $stokDisponible?>">							
								<div class="mostStokDisponible"></div>
								<div class='contenBtnAdd'>
									<label for='#cantidadPro'>Cantidad
										<input type='number' class="item_quantity" id='cantidadPro' value='1'>
									</label>
									<a href='javascript:;' class='item_add'> añadir a carrito</a>
									<input type="hidden" id="subTotalPro">
								</div>
								<div class='contenAddDesp'>									
									<div class='truck-title'>
										<img src='../imagenes/fuentes/delivery.png' alt='' class='imgDelivery'>
										<div>
											<label>Despacho a Domicilio</label>
											<label class='estadoStok'>Stok disponible</label>												
										</div>
										<a href='#localizar-form' rel='modal:open' class='bntConsulCostoPro'>Consultar costo</a>
									</div>
									<div class='truck-title'>
										<img src='../imagenes/fuentes/tienda.png' alt='' class='imgDelivery'>
										<div>
											<label>Despacho en tienda</label>
											<label class='estadoStok'>Stok disponible</label>												
										</div>
										<a href='#localizar-form' rel='modal:open' class='bntConsulCostoPro'>Consultar costo</a>
									</div>
								</div>								
							</div>
						</div>
						
					</div>

					<div class='conten_fTecnicaPro' id="okok" capturoid="<?php echo $v['id_pro']?>">
						<div class='ftcaberera'>
							<button class='btnCargaDescrip'> Descripcion</button>
							<button class='btnCargaFichaT'>Ficha Tecnica</button>
						</div>
						<div class='ftbody'>
						</div>					
					</div>
				
				</div>
			
		
			<?php 
		}else{?>
				<div class='contenDetPro' id="contenDetPro"  capturoid="<?php echo $v['id_pro']?>">					
					<div class='contenDatosDetProMain simpleCart_shelfItem' id="contenDatosDetProMain">
						<div class='imgDet_Pro'>
							
							<img src="<?php echo $v['imagen_pro']?>" class='item_image'>
						</div>
						<div class='contenDatosDetPro ' capId="<?php echo $v['id_pro']?>">
							<input type='text' class='item_idpro' value='<?php echo $v['id_pro']?>' style='display:none;'>
							<div class='DetProNombre_pro'>
								<h4 class='item_name nombre_pro' > <?php echo $v["nombre_pro"] ?></h4></br>
							</div>
							<div class='DetProMarca_pro'>
								<label> <?php echo $v["marca_pro"]?></label></br>
							</div>
							<div class='DetProDescrip_pro'>
								
							</div>
							<div class='DetProPrecio_pro precio_pro' id="DetProPrecio_pro">
								
							</div>
							<div class='contenDetAddCar'>								
								<div class='contenBtnAdd'>
									<label for='#cantidadPro'>Cantidad
										<input type='number' id='cantidadPro' value='1'>
									</label>
									<!-- <a class='btnAdicionarCar abrirLogeoMId' id='btnAdLogeate' href='#login-form' rel='modal:open'>Añadir a carrito</a> -->
								</div>
								<div class='contenAddDesp'>									
									<div class='truck-title'>
										<img src='../imagenes/fuentes/delivery.png' alt='' class='imgDelivery'>
										<div>
											<label>Despacho a Domicilio</label>
											<label class='estadoStok'>Stok disponible</label>												
										</div>
										<a href='#localizar-form' rel='modal:open' class='bntConsulCostoPro'>Consultar costo</a>
									</div>
									<div class='truck-title'>
										<img src='../imagenes/fuentes/tienda.png' alt='' class='imgDelivery'>
										<div>
											<label>Despacho en tienda</label>
											<label class='estadoStok'>Stok disponible</label>												
										</div>
										<a href='#localizar-form' rel='modal:open' class='bntConsulCostoPro'>Consultar costo</a>
									</div>
								</div>								
							</div>
						</div>
						
					</div>
<!-- 
					<div class='conten_fTecnicaPro' id="okok" capturoid="<?php echo $v['id_pro']?>">
						<div class='ftcaberera'>
							<button class='btnCargaDescrip'> Descripcion</button>
							<button class='btnCargaFichaT'>Ficha Tecnica</button>
						</div>
						<div class='ftbody'>
						</div>					
					</div> -->
				
				</div>				
	<?php 
		}
		
	
	}
}

include("ventanas_modal.php");
?>	
<script>
$(".btnCargaDescrip").click();
</script>
<!-- 
<script src="../js/jquery-Carrito/simpleCart.min.js"></script>
<script src="../js/jquery-Carrito/app.js"></script> -->
<?php include("chat.php"); ?>


<script src="../js/principal.js"></script>
<script src="../js/scrip_modals.js"></script>
<script src="../js/scripVentas.js"></script>
</body>
</html>




