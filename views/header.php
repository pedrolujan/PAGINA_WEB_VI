<?php
error_reporting(0);
session_start();
include("../model/url.php");
$direccion=$urlProyecto;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
     
    <div class="headerGeneral" style="z-index: 30;">       
        <div id="header-main" class="header-main">
            <div class="contenHMain">
                <div class="logo">
                    <img class="logoEmpresa" src="<?php echo $direccion ?>imagenes/fuentes/logo.png" alt="" srcset="">
                </div>
                <div class="contenMenu">          
               
                   
               
                </div>
            
                <div class="busqueda">
                <?php if(!isset($_SESSION["adminLogeado"])){ ?>
                    <input class="searchBuscar" id="searchBuscar" type="search" placeholder="buscar producto"
                        style="width: 80%; padding: 8px;border-radius: 7px;">
                    <div class="contengif"></div>
                    <?php }?> 
                </div>
               
            
                <div class="divCarrito">
                <?php
                                
                
                if(isset($_SESSION["usuarioLogeado"])){                     
                   ?>
                    <div class="row">
                        <div class="carrito">
                            <div class="carrito-total" onclick="desplegarCarrito()">
                                <span class="fas"><img src="../imagenes/fuentes/carrito.png" alt="" srcset=""></span>
                                <p class="simpleCart_quantity cantidadUnidades"><?php echo $TOTALUNIDADES?></p>
                                <span class="simpleCart_total" id="totalAPagar"> <?php echo $TOTALCARRITO ?></span>
                            </div>
                            <div class="bolsa_carrito" id="bolsa_carrito" >
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colSpan="2" class="productoCantidadCarrito">producto</th>
                                            <th class="productoCantidadCarrito">Cantidad</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody class='mostrarBolsa'>  
                                    </tbody>   
                                </table>
                               <!--  <div class="itemBolsaCarito">
                                

                                </div> -->
                                <button class="btn btnDetalleCarrito btn-primary">ver carrito</button>
                                
                            </div>

                        </div>
                    </div>
                     <?php }?>
                </div>
               

                <div class="datos_usuario">
                    <?php
				    include("controller/datos_usuario.php");
			        ?>
                         <a href="#login-form" rel="modal:open" class="aAbrirLogeo"></a>
                    <?php if(!isset($_SESSION["usuarioLogeado"]) and !isset($_SESSION["adminLogeado"])){?>
                    <div class="datos_usuarioEsp abrirLogeo">               
                    <?php }else{?>
                        <div class="datos_usuarioEsp" onclick="desplemenulogin()">
                        <?php }
                        
                        ?>
                        <img src="<?php echo $urlProyecto?>imagenes/usuarioblanco.jpg" width="150" onclick="desplemenulogin()" / class="img_usuario" />
                    

                        <p class="bievenido_usu"></p>
                    </div>
                <?php if(isset($_SESSION["usuarioLogeado"])){?>
                        <ul class="celusubmenuUsuario" id="celusubmenu" onClick="desplemenulogin()">
                    <?php }else{?>
                    <ul class="celusubmenu" id="celusubmenu" onClick="desplemenulogin()">
                    <?php }?>
                        <li><a href="php/cambiar_contrasena">Cabiar Contraseña</a></li>
                        <li><a id="btnperfil">Perfil</a></li>
                        <li><a href="misCompras.php" id="btnMisCompras">Mis Compras</a></li>
                        <li><a href="../controller/salir.php">Salir</a></li>
                    </ul>
                    <!-- <a href="views/login.php" class="btnlogin">login</a> -->
                </div>
            </div>
            
           

        </div>
    </div>
    <div class="menuProcutos-espanded" id="menuProductos">
        <ul>
            <li class="icon-laptop"><a href="">Laptops</a></li>
            <li class="icon-tv"><a href="">Celulares</a></li>
            <li class="icon-mobile"><a href="">Celulares</a></li>
            <li class="icon-speaker_group"><a href="">Audio</a></li>
            <li class="icon-mouse"><a href="">Maus</a></li>
            <li class="icon-keyboard"><a href="">Teclados</a></li>
        </ul>
    </div>
    <script>
    function abrirMenuProductos() {
        const menu = document.querySelector('#menuProductos');
        menu.classList.toggle("menuProcutos-espanded");
        menu.classList.toggle("menuProcutos-collapsed");
    }
    </script>
   <div class="respuesta" id="respuesta"></div>

</body>

</html>