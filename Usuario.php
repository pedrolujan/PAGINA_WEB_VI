<?php
session_start();
if(!isset($_SESSION)){
    header("Location: index.php");
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.5.1.min.js"></script>    
    <script src="js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="js/jquery-Carrito/app.js"></script>
    <!-- <link rel="stylesheet" href="CSS/carrito/bootstrap-grid.css"> -->
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilos_principal.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/carrito/estilos.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/fonts/style.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/fonts/fonts/style.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilos_regProducto.css" type="text/css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilosFooter.css">
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilosHeader.css">
</head>
<body>

<?php

 include("views/header.php"); ?>
    <?php include("views/menu_lateral.php"); ?>

       <div id="" class="area_trabajo">
           <div class="cargarDatos"></div>
        </div>
        <?php
    ?>
     
        <?php include("views/ventanas_modal.php"); ?>

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
</body>
</html>