<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_SESSION["adminLogeado"])){?>
<img src="imagenes/fuentes/icon_editar.png" alt="" srcset="" style="width: 60px;">
<button class='btnAbreEliminarPro'><span class='icon-bin'></span>Eliminar</button>
<?php } ?>

    
							
    <img src="imagenes/productos/asus-logo.jpg" alt="" srcset="">
    <p style="font-size: 16px; margin: 0 auto 10px;  width: 70%;">¿Buscas renovar tu antigua laptop por una de mayor calidad? No esperes más, ahora tendrás la laptop perfecta gracias a Asus y su nuevo modelo X543NA-DM355T. Ya sea para el trabajo, universidad o escuela; este producto se adaptará de la mejor manera a tus necesidades. Ensamblada con una potente memoria de 500GB, aquí podrás almacenar todo tipo de programas, juegos, archivos y videos; todo ello sin preocuparte por el espacio. Asimismo, presenta una cámara web, la cual te permitirá estar interconectado con tus clases o el trabajo. ¡No lo dudes más! Consigue este producto ingresando al portal de EFE, lo hace posible.</p>
    <img src="imagenes/productos/asus-laptop.jpg" alt="" srcset="">
</body>
</html>