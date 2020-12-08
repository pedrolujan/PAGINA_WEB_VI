<?php
error_reporting(0);
session_start();
if((isset($_SESSION["adminLogeado"])) || (isset($_SESSION["usuarioLogeado"]))){
    header("Location: Usuario.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://localhost/PAGINA_WEB_VI/js/jquery-3.5.1.min.js"></script>
    <script src="jhttp://localhost/PAGINA_WEB_VI/js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="http://localhost/PAGINA_WEB_VI/js/jquery-Carrito/app.js"></script>
    <!-- <link rel="stylesheet" href="CSS/carrito/bootstrap-grid.css"> -->
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilos_principal.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/carrito/estilos.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/fonts/style.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/fonts/fonts/style.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilos_regProducto.css" type="text/css">
    <link rel="stylesheet" href="css/estilosUsuComun.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilosFooter.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilosHeader.css">
</head>

<body>

    <?php include("views/header.php"); ?>
    <?php include("views/carrusel.php"); ?>
    <div class="contenBotones">
        <a href="" class="btn mr-5 btn-primary text-white py-3 px-5">registrarce</a>
        <a href="#login-form" rel="modal:open" class="btn ml-5 btn-primary text-white py-3 px-5">Iniciar Session</a>
        
    </div>
    <div id="" class="area_trabajo">
        <div class="cargarDatos"></div>
    </div>

    <?php include("views/ventanas_modal.php"); ?>
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


    <script src="http://localhost/PAGINA_WEB_VI/js/principal.js"></script>
</body>

</html>