<!-- <link rel="stylesheet" href="js/jquery.modal.min.css">
<script src="js/jquery.modal.min.js"></script> -->
<link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilos_regProducto.css" type="text/css">

<link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilosHeader.css">
<?php include("header.php"); ?>

<?php
session_start();
$html="";
if(isset($_GET['id']) && ($_GET['id']!="")){

	include("../model/conexion.php");
	$user=new ApptivaDB();
	$u=$user->buscar("productos"," productos.id_pro=".$_GET['id']);
	foreach ($u as $v){
		
	if(isset($_SESSION['adminLogeado'])){
		if(file_exists("../".$v['imagen_pro'] ) ){?>						
			<div class='contenDetPro' capturoid=".$v['id_pro'].">
						<div class='imgDet_Pro'>
					
							<img src="../<?php $v['imagen_pro']?>" class='imagenDetPro' id='imagenDetPro'>
						</div>
						<div class='contenDatosDetProMain'>
							<div class='contenDatosDetPro'>
								<div class='DetProNombre_pro'>
									<label class='nombre_pro'><?php $v["nombre_pro"];?>"</label></br>
								</div>
								<div class='DetProMarca_pro'>
									<label class='marca_pro'>".$v["marca_pro"]."</label></br>
								</div>
								<div class='DetProDescrip_pro'>
									<label class='descripcion_pro'>".$v["descripcion_pro"]."</label></br>
								</div>
								<div class='DetProPrecio_pro'>
									S/ <label class='precio_pro'>".$v["precio_pro"]."</label>
								</div>
								<div class='contenDetAddCar'>
									<div class='contenAddDesp'>
										<div class='truck-title'>
											<img src='../imagenes/fuentes/delivery.png' alt='' class='imgDelivery'>
											<div>
												<label>Despacho a Domicilio</label>
												<label class='estadoStok'>Stok disponible</label>												
											</div>
											<a href='#localizar-form' rel='modal:open' class='bntConsulCostoPro'>Editar</a>
										</div>
										<div class='truck-title'>
											<img src='../imagenes/fuentes/tienda.png' alt='' class='imgDelivery'>
											<div>
												<label>Despacho en tienda</label>
												<label class='estadoStok'>Stok disponible</label>												
											</div>
											<button class='bntConsulCostoPro'>Editar</button>
										</div>
									</div>
								</div>
								<button class='btnAbreActualizaPro'><span class='icon-pencil'></span>Editar</button>
								<button class='btnAbreEliminarPro'><span class='icon-bin'></span>Eliminar</button>
							</div>
						</div>
					</div>
					<div class='conten_fTecnicaPro' capturoid=".$v['id_pro'].">
						<div class='ftcaberera'>
							<button class='btnCargaDescrip'> Descripcion</button>
							<button class='btnCargaFichaT'>Ficha Tecnica</button>
						</div>
						<div class='ftbody'>
						</div>
					
					</div>
								
		<?php }else{?>
			<div class='contenProductos'><div class='imgPro_buscados'><img src=imagenes/usuarioblanco.jpg class='imagenMosProductos' ></div>
			<div class='contenDatos'>
							<div class='contenDatosProducto'><label class='nombre_pro'>".$v["nombre_pro"]."</label></br></div>
							<div class='DetProMarca_pro'><label class='marca_pro'>".$v["marca_pro"]."</label></br></div>
							<div class='DetProPrecio_pro'><label>".$v["precio_pro"]."</label></div>
							<button class='btnAdicionarCar'>Añadir a carrito</button></div></div>

        <?php }	
	}elseif(isset($_SESSION['usuarioLogeado'])){
		if(file_exists("../".$v['imagen_pro'] ) ){?>
			
			<div class='contenDetPro' capturoid=".$v['id_pro'].">
			<div class='imgDet_Pro'>
				<img src=".$v['imagen_pro']." class='item_image'>
			</div>
			<div class='contenDatosDetProMain'>
				<div class='contenDatosDetPro simpleCart_shelfItem' capId=".$v["id_pro"].">
					<input type='text' class='item_idpro' value='".$v["id_pro"]."' style='display:none;'>
					<div class='DetProNombre_pro'>
						<h4 class='item_name nombre_pro' > <?php $v["nombre_pro"] ?></h4></br>
					</div>
					<img src= <?php $v['imagen_pro']?> class='item_image' style='display:none;'>
					<div class='DetProMarca_pro'>
						<label> <?php $v["marca_pro"]?></label></br>
					</div>
					<div class='DetProDescrip_pro'>
						<label> <?php $v["descripcion_pro"] ?></label></br>
					</div>
					<div class='DetProPrecio_pro precio_pro'>
						<div class='item_price'>S/  <?php $v["precio_pro"] ?></div>
					</div>
					<div class='contenDetAddCar'>
						<div class='contenAddDesp'>
							<label for='#cantidadPro'>Cantidad
								<input type='number' id='cantidadPro' value='1'>
							</label></br>
							<div class='truck-title'>
								<img src='imagenes/fuentes/delivery.png' alt='' class='imgDelivery'>
								<div>
									<label>Despacho a Domicilio</label>
									<label class='estadoStok'>Stok disponible</label>												
								</div>
								<a href='#localizar-form' rel='modal:open' class='bntConsulCostoPro'>Consultar costo</a>
							</div>
							<div class='truck-title'>
								<img src='imagenes/fuentes/tienda.png' alt='' class='imgDelivery'>
								<div>
									<label>Despacho en tienda</label>
									<label class='estadoStok'>Stok disponible</label>												
								</div>
								<button class='bntConsulCostoPro'>Consultar costo</button>
							</div>
						</div>
						
						<div class='contenBtnAdd'>
							<a href='javascript:;' class='item_add'> añadir a carrito</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class='conten_fTecnicaPro' capturoid=".$v['id_pro'].">
			<div class='ftcaberera'>
				<button class='btnCargaDescrip'> Descripcion</button>
				<button class='btnCargaFichaT'>Ficha Tecnica</button>
			</div>
			<div class='ftbody'>
			</div>					
        </div>
        
	<?php }else{?>
			<div class='contenProductos'><div class='imgPro_buscados'><img src=imagenes/usuarioblanco.jpg class='imagenMosProductos' ></div>
			<div class='contenDatos'>
							<div class='contenDatosProducto'><label class='nombre_pro'> <?php $v["nombre_pro"]?></label></br></div>
							<div class='DetProMarca_pro'><label class='marca_pro'> <?php $v["marca_pro"]?></label></br></div>
							<div class='DetProPrecio_pro'><label> <?php $v["precio_pro"]?></label></div>
							<button class='btnAdicionarCar'>Añadir a carrito</button></div></div>

    <?php }	
	}else{
		if(file_exists("../".$v['imagen_pro'] ) ){?>
			
			<div class='contenDetPro' capturoid=".$v['id_pro'].">
			<div class='imgDet_Pro'>
				<img src="../<?php echo $v['imagen_pro']?>" class='imagenDetPro'>
			</div>
			<div class='contenDatosDetProMain'>
				<div class='contenDatosDetPro'>
					<div class='DetProNombre_pro'>
						<label> <?php echo $v["nombre_pro"]?></label></br>
					</div>
					<div class='DetProMarca_pro'>
						<label> <?php echo $v["marca_pro"]?></label></br>
					</div>
					<div class='DetProDescrip_pro'>
						<label> <?php echo $v["descripcion_pro"]?></label></br>
					</div>
					<div class='DetProPrecio_pro precio_pro'>
						
					</div>
					<div class='contenDetAddCar'>
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
								<button class='bntConsulCostoPro'>Consultar costo</button>
							</div>
						</div>
						<div class='contenBtnAdd'>
						<a class='btnAdicionarCar' id='btnAdLogeate' href='#login-form' rel='modal:open'>Añadir a carrito</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='conten_fTecnicaPro' capturoid=".$v['id_pro'].">
			<div class='ftcaberera'>
				<button class='btnCargaDescrip'> Descripcion</button>
				<button class='btnCargaFichaT'>Ficha Tecnica</button>
			</div>
			<div class='ftbody'>
			</div>					
		</div>
	<?php }else{ ?>
			<div class='contenProductos'><div class='imgPro_buscados'><img src=imagenes/usuarioblanco.jpg class='imagenMosProductos' ></div>
			<div class='contenDatos'>
							<div class='contenDatosProducto'><label class='nombre_pro'> <?php $v["nombre_pro"]?></label></br></div>
							<div class='DetProMarca_pro'><label class='marca_pro'> <?php $v["marca_pro"]?></label></br></div>
							<div class='DetProPrecio_pro'><label> <?php $v["precio_pro"]?></label></div>
							<a class='btnAdicionarCar' id='btnAdLogeate' href='#login-form' rel='modal:open'>Añadir a carrito</a></div></div>
							

                            <?php }	
	}
}
}else{
	
}
?>