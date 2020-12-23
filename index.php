<?php
error_reporting(0);
session_start();
if((isset($_SESSION["adminLogeado"]))){
    header("Location: views/Admin.php");
}elseif(isset($_SESSION["usuarioLogeado"])){
    header("Location: views/Usuario.php");
}
include("model/url.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <!-- <link rel="stylesheet" href="CSS/carrito/bootstrap-grid.css"> -->
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_principal.css">
	
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/carrito/estilos.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>fonts/style.css">
    <link rel="stylesheet" href="fonts/fonts/style.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_regProducto.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosFooter.css">
	<link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosHeader.css">
</head>

<body>
<?php include("views/header.php"); ?>    
    <?php include("views/carrusel.php"); ?>
    <div class="contenBotones">
        <a href="views/registro_usuario.php" class="btn btnInicio mr-5 btn-primary text-white py-3 px-5">registrarce</a>
        <a href="#login-form"  rel="modal:open" class="btn btnInicio ml-5 btn-primary text-white py-3 px-5">Iniciar Session</a>
        
    </div>
    <?php include("views/ventanas_modal.php"); ?>
    <div class="masUevo">
        <p>Lo mas nuevo</p>
    </div>
    <div id="" class="area_trabajo">
        <div class="cargarDatos"></div>
    </div>

    
    <?php include("views/footer.php"); ?>
    <script>
    function abrirMenu() {
        console.log("aca toy");
        const menu = document.querySelector('.sidemenu');
        menu.classList.toggle("menu-espanded");
        menu.classList.toggle("menu-collapsed");

        document.querySelector('body').classList.toggle('body-expanded');

    }
    </script>


<script src="js/principal.js"></script>
<script src="js/scrip_modals.js"></script>
</body>

</html>