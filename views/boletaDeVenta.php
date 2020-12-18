<?php
error_reporting(0);
include("../model/conexion.php");
include("../model/url.php");
session_start();
$bus=new ApptivaDB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_principal.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosHeader.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/ventas.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosFooter.css">
    <script src="../js/jquery-3.5.1.min.js"></script><!-- 
    <script src="../js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="..7js/jquery-Carrito/app.js"></script> -->
    <script src="../js/principal.js"></script>
</head>
<body>
    <div class="headerGeneral">       
        <div id="header-main" class="header-main">
            <div class="contenHMain">
                <div class="logo">
                    <img src="<?php echo $urlProyecto?>imagenes/fuentes/logo.jpg" alt="" srcset="" class="logoEmpresa">
                </div>
                <div class="contenMenu">
                <?php
                if(!isset($_SESSION["usuarioLogeado"]) && !isset($_SESSION["adminLogeado"])){ ?>
                    <span class="icon-menu" onclick="abrirMenuProductos()"></span>
                <?php }?> 
                </div>
            
                <div class="busqueda">
                    <div class="contengif"></div>
                </div>            
            
                <div class="divCarrito">                
                </div>
               

                <div class="datos_usuario" onclick="desplemenulogin()">
                    <?php
				    include("controller/datos_usuario.php");
			        ?>
                         <a href="#login-form" rel="modal:open" class="aAbrirLogeo"></a>
                    <?php if(!isset($_SESSION["usuarioLogeado"]) and !isset($_SESSION["adminLogeado"])){?>
                    <div class="datos_usuarioEsp abrirLogeo">               
                    <?php }else{?>
                        <div class="datos_usuarioEsp" >
                        <?php }?>
                    
                        <img src="<?php echo $urlProyecto?>imagenes/usuarioblanco.jpg" width="150" / class="img_usuario" />
                    

                        <p class="bievenido_usu"></p>
                    </div>
                <?php if(isset($_SESSION["usuarioLogeado"])){?>
                        <ul class="celusubmenuUsuario" id="celusubmenu" onclick="desplemenulogin()">
                    <?php }else{?>
                    <ul class="celusubmenu" id="celusubmenu" onclick="desplemenulogin()">
                    <?php }?>
                        <li><a href="php/cambiar_contrasena">Cabiar Contraseña</a></li>
                        <li><a id="btnperfil">Perfil</a></li>
                        <li><a href="../controller/salir.php">Salir</a></li>
                    </ul>
                    <!-- <a href="views/login.php" class="btnlogin">login</a> -->
                </div>
            </div>
            
           

        </div>
    </div>
    <?php
               $datos=$bus->buscarCar(
               "productos.id_pro,productos.imagen_pro,
               productos.nombre_pro,
               productos.precio_pro,
               carrito.unidades_car,
               carrito.subTotal_car,
               carrito.fecha_car",
               "carrito,productos,usuarios",
               "carrito.ID_PRODUCTOS=productos.id_pro
               AND carrito.ID_USUARIOS=usuarios.id_usu
               AND carrito.estado_car=0
               AND usuarios.id_usu=".$_SESSION["usuarioLogeado"]);
               
               $datUsu=$bus->buscar("usuarios","usuarios.id_usu=".$_SESSION["usuarioLogeado"]);
               ?>
<div class="contenedorGeneralBoleta">
    <div class="contenHeaderBoleta">
        <div class="contenDatosEmpresa">
            <h2>L&M TecnoStore</h2>
            <div class="contactoEmpresa">
                <p>Calle Macgregor #712 La Esperanza</p>
                <p>http//L&M.StoreTecnology.in</p>
                <p>910210378</p>
            </div>
        </div>
        <div class="contenLogoEmpresa">
            <img src="../imagenes/fuentes/logo.png" alt="" srcset="">
        </div>
    </div>
    <div class="contenDatosCliente">
        <div class="contenDatosCli">
            <h2 class="dtCliente">Cliente</h2>
            <?php foreach($datUsu as $dUs){?>
                <p>NOMBRE  <span><?php echo $dUs["apellido_usu"];?> <?php echo $dUs["nombre_usu"];?></span></p>
                <p>DNI  <span><?php echo $dUs["dni_usu"];?></span></p>
                <p>TELEFONO <span><?php echo $dUs["telefono_usu"];?></span></p>
                <p>CORREO <span><?php echo $dUs["correo_usu"];?></span></p>
               
            <?php }?>
        </div>
        <div class="contenDatosClieAEnviar">
            <h2 class="dtCliente">Enviar A:</h2>
            <p>Departamento <span class="BVdepartamento"><?php echo $_POST["departamento"];?></span></p>
            <p>Provincia <span class="BVprovincia"><?php echo $_POST["provincia"];?></span></p>
            <p>Distrito <span class="BVdistrito"><?php echo $_POST["distrito"];?></span></p>
        </div>
        <div class="contenFechaBoleta">  
            <div class="fecha_Nfactura">
                <p class="labelFecha">FECHA </p>
                <?php
                $ZonaHoraria= date_default_timezone_set('America/lima'); 
                $fecha_actual=date("d/m/yy G:i");
                ?>
                <p><?php echo $fecha_actual;?></p>
                <p class="labelNfactura">N° FACTURA</p>
                <P>0000012</P>
            </div>
        </div>
    </div>
    <div class="contenDetalleBoleta">
        <table>
            <thead>
                <tr>
                    <th colspan="2">PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>P. UNIDAD</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($datos as $recor){?>
                <tr>
                    <td class="td"><div><img src="<?php echo $recor["imagen_pro"]; ?>" alt="" srcset="" width="80px"></div></td>
                    <td class="td"><div><?php echo $recor["nombre_pro"];?></div></td>
                    <td class="td"><div><?php echo $recor["unidades_car"]; ?> Un</div></td>
                    <td class="td"><div>S/ <?php echo number_format($recor["precio_pro"],1);?></div></td>
                    <td class="td"><div>S/ <?php echo number_format($recor["subTotal_car"],1); ?></div></td>
                </tr>
            <?php }?>
            
            </tbody>

        </table>
        <div class="boletadSaldosAPagar">
            <div class="etiquetas">
                <p>SUBTOTAL</p>
                <p>Costo Envio</p>
                <p>TOTAL</p>
            </div>
            <div class="etiquetasPrecios">
                <p><span class="simpleCart_total"></span></p>
                <p class="CostoEnvio">S/ <?php echo $_POST["CostoEnvio"];?></p>
                <p class="totalAPagar">S/ <?php echo $_POST["total"];?></p>
            </div>
<!-- 
                
                <tr>
                    <td colspan="2"></td>                         
                    <td colspan="1">SUBTOTAL</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2"></td>                         
                    <td colspan="">Costo Envio</td>
                    <td olspan="2" ></td>
                </tr>
                <tr>
                    <td colspan="2"></td>                         
                    <td colspan="1">TOTAL</td>
                    <td olspan="2" </td> -->
                </tr>
            </div>
    </div>
</div>
<button class="btn btnTerminarCompra"> realizar pago</button>
    <?php include("footer.php"); ?>
    <script src="../js/jquery-3.5.1.min.js"></script><!-- 
    <script src="../js/principal.js"></script> -->
    <script src="../js/scripVentas.js"></script>
</body>
</html>