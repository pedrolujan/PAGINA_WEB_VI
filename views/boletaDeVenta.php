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
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="..7js/jquery-Carrito/app.js"></script>
    <script src="../js/principal.js"></script>
</head>
<body>
    <div class="headerGeneral">       
        <div id="header-main" class="header-main">
            <div class="contenHMain">
                <img src="<?php echo $urlProyecto?>imagenes/mi-logo.gif" alt="" srcset="" class="logoEmpresa">
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

    <div class="contenedorGeneral">
        <div class="contenedor">
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
               AND usuarios.id_usu=".$_SESSION["usuarioLogeado"]);
               
               $datUsu=$bus->buscar("usuarios","usuarios.id_usu=".$_SESSION["usuarioLogeado"]);
               ?>
           <div class="BVDatosUsuario">
               <div class="BVDatUHeader">TUS DATOS PERSONALES</div>
                <table border="1">
                <?php foreach($datUsu as $dUs){?>
                <tr>
                    <td><?php echo $dUs["nombre_usu"];?></td>
                    <td><?php echo $dUs["dni_usu"];?></td>
                    <td><?php echo $dUs["telefono_usu"];?></td>
                </tr>
                
                <tr>
                    <td><?php echo $dUs["correo_usu"];?></td>
                    <td><?php echo $dUs["provincia_usu"];?></td>
                    <td><?php echo $dUs["pais_usu"];?></td>
                    
                </tr>
                <?php }?>
                
                </table>
            </div>
            <div class="BVDatosCarrito">
                <div class="BVDatProHeader">TUS PRODUCTOS</div>
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO UNIDAD</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach($datos as $recor){?>
                        <tr>
                            <td class="td"><div><img src="<?php echo $recor["imagen_pro"]; ?>" alt="" srcset="" width="80px"></div></td>
                            <td class="td"><div><?php echo $recor["nombre_pro"];?></div></td>
                            <td class="td"><div><?php echo $recor["unidades_car"]; ?> Un</div></td>
                            <td class="td"><div>S/ <?php echo $recor["precio_pro"];?></div></td>
                            <td class="td"><div><?php echo $recor["subTotal_car"]; ?></div></td>
                        </tr>
                     <?php }?>
                     <tr>
                         <td colspan="2"></td>                         
                         <td colspan="1">SUBTOTAL</td>
                         <td colspan="2"><span class="simpleCart_total"></span></td>
                     </tr>
                     <tr>
                         <td colspan="2"></td>                         
                         <td colspan="1">IGV</td>
                         <td olspan="2" class="igv">18%</td>
                     </tr>
                     <tr>
                         <td colspan="2"></td>                         
                         <td colspan="1">TOTAL</td>
                         <td olspan="2" class="totalAPagar">Por calcular</td>
                     </tr>
                     
                    </tbody>

                </table>
                <button class="btn btnTerminarCompra">TERMINAR COMPRA</button>
            </div>
        </div>
        
        <div class="datosProductos">dfghj</div>
    </div>
    <?php include("footer.php"); ?>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/scripVentas.js"></script>
    <script src="../js/principal.js"></script>
</body>
</html>