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
    <link rel="stylesheet" href="css/carrito/estilos.css">
    <link rel="stylesheet" href="fonts/fonts/style.css">
</head>
<body>
    <?php
    include("interfas.php");
    ?>
       <div id="" class="area_trabajo">
            <div class="respuestas"></div>
            <div class="cargarBaner">
                <ul class="slider">
                    <li class="slider1"><img src="imagenes/fuentes/baner.jpg" alt="" srcset=""></li>
                    <li class="slider2"><img src="imagenes/fuentes/bamer2.jpg" alt="" srcset=""></li>
                    <li class="slider3"><img src="imagenes/fuentes/baner.jpg" alt="" srcset=""></li>
                </ul>
                
            </div>
            <div class="cargarDatos"></div>
        </div>
        <div class="messagechat" id="messagechat">
            <img src="imagenes/fuentes/icono_messeger.PNG" alt="" srcset="">
        </div>
        <div class="conten_chat" id="conten_chat">
            <div class="contenCH_header">
                <h3>Realiza tus consultas</h3>
            </div>
            <div class="contenCH_body"></div>
            <div class="contenCH_footer">
                <input type="text" name="txtmensaje" id="txtmensaje" placeholder="Escribe un mensaje">
                <div class="CHFoterImg"><span class="icon-send"></span></div>
            </div>
        </div>
        <?php include("views/ventanas_modal.php"); ?>
    
    <script src="js/principal.js"></script>
</body>
</html>