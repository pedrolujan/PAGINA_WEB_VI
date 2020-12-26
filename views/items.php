<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L&M TECNO STORE</title>
</head>

<body>
    <div class="conten_items">
        <?php 
        if($_SESSION['usuarioLogeado']){
        ?>

        <div class="item">
            <a href="#" class="MostLaptop">
                <div class="icon"><span class="icon-laptop"></span></div>
                <div class="title"><span>Laptos</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#" class="Mostceluares">
                <div class="icon"> <span class="icon-mobile"></span></div>
                <div class="title"><span>Telefono Celulares</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#" class="MostMouses">
                <div class="icon"> <span class="icon-mouse"></span></div>
                <div class="title"><span>Mouses</span></div>
            </a>
        </div>

        <div class="item">
            <a href="#" class="MostDiscos">
                <div class="icon"> <span class="icon-hard-drive"></span></div>
                <div class="title"><span>Discos Duros</span></div>
            </a>
        </div>
        <div class="item" >
            <a href="#" class="MostTelevisores">
                <div class="icon"> <span class="icon-tv"></span></div>
                <div class="title"><span>Televisores</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#" class="MostTeclados">
                <div class="icon"> <span class="icon-keyboard"></span></div>
                <div class="title"><span>Teclados</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#" class="MostEquiposSonido">
                <div class="icon"> <span class="icon-speaker_group"></span></div>
                <div class="title"><span>Equipos de Sonido</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"> <span class="icon-speaker_group"></span></div>
                <div class="title"><span>Equipos de Sonido</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"> <span class="icon-speaker_group"></span></div>
                <div class="title"><span>Equipos de Sonido</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"> <span class="icon-speaker_group"></span></div>
                <div class="title"><span>Equipos de Sonido</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"> <span class="icon-speaker_group"></span></div>
                <div class="title"><span>Equipos de Sonido</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"> <span class="icon-speaker_group"></span></div>
                <div class="title"><span>Equipos de Sonido</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"> <span class="icon-speaker_group"></span></div>
                <div class="title"><span>Equipos de Sonido</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"> <span class="icon-speaker_group"></span></div>
                <div class="title"><span>finalllll</span></div>
            </a>
        </div>
        <?php }elseif($_SESSION['adminLogeado']){?>
        <div class="item">
            <a href="#" class="btnregistraProducto">
                <div class="icon"><img src="<?php echo $urlProyecto?>imagenes/fuentes/addProductos.png" alt="" srcset=""></div>
                <div class="title"><span>REGISTRAR PRODUCTOS</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#" class="verClientes">
                <div class="icon"> <img src="<?php echo $urlProyecto?>imagenes/fuentes/usuarios.png" alt="" srcset=""></span></div>
                <div class="title"><span>USUARIOS REGISTRADOS</span></div>
            </a>
        </div>
        
        <div class="item">
            <a href="todasLasCompras.php" class="verCompras">
                <div class="icon"> <img src="<?php echo $urlProyecto?>imagenes/fuentes/ventas.png" alt="" srcset=""></div>
                <div class="title"><span>TOTAL VENTAS</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#" class="verTodoElDinero">
                <div class="icon"><img src="<?php echo $urlProyecto?>imagenes/fuentes/dinero.png" alt="" srcset=""></div>
                <div class="title"><span>GANANCIAS</span></div>
            </a>
        </div>
        <div class="item">
            
            <a href="#form-RegistroCategoria" rel="modal:open" class="ReguistrarCategoria">
                <div class="icon"><img src="<?php echo $urlProyecto?>imagenes/fuentes/settings.png" alt="" srcset=""></span></div>
                <div class="title"><span>CONFIG. / ACCIONES</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#" class="TodosLosProductos">
                <div class="icon"><span class="icon-eye"></span></div>
                <div class="title"><span>TODOS LOS PRODUCTOS</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#" class="ProductosInactivos">
                <div class="icon"><span class="icon-eye-blocked"></span></div>
                <div class="title"><span>Productos Inactivos</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"><img src="<?php echo $urlProyecto?>imagenes/fuentes/settings.png" alt="" srcset=""></span></div>
                <div class="title"><span>CONFIG. / ACCIONES</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"><img src="<?php echo $urlProyecto?>imagenes/fuentes/settings.png" alt="" srcset=""></span></div>
                <div class="title"><span>CONFIG. / ACCIONES</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"><img src="<?php echo $urlProyecto?>imagenes/fuentes/settings.png" alt="" srcset=""></span></div>
                <div class="title"><span>CONFIG. / ACCIONES</span></div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="icon"><img src="<?php echo $urlProyecto?>imagenes/fuentes/add.png" alt="" srcset=""></span></div>
                <div class="title"><span>final</span></div>
            </a>
        </div>

        <?php }?>
    </div>
</body>

</html>