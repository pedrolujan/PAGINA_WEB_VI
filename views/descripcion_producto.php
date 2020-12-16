<?php
    session_start();
    include("../model/url.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="../js/jquery-3.5.1.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosFooter.css">

   
<!--    <script src="../js/principal.js"></script> -->
</head>
<body>
    <input type="hidden" name="txtidDescripPro" id="txtidDescripPro">
<div class="contenFTPAcciones">
    <?php  if(isset($_SESSION["adminLogeado"])){?>
        <a href="#form-DescripcionProducto" rel="modal:open" >
            <img src="<?php echo $urlProyecto?>imagenes/fuentes/icon_editar.png" alt="" srcset="" class="btnEditFT" id="btnEditDetalle">
        </a>
    <?php }?>
</div>  
							
    <img src="<?php echo $urlProyecto?>imagenes/productos/10122022092_72celular.jpg" alt="" srcset="" class="imagen1DescripPro" id="imagen1DescripPro">
    <p class="textoDescripcion" style="font-size: 16px; margin: 0 auto 10px;  width: 70%;">¿Buscas renovar tu antigua laptop por una de mayor calidad? No esperes más, ahora tendrás la laptop perfecta gracias a Asus y su nuevo modelo X543NA-DM355T. Ya sea para el trabajo, universidad o escuela; este producto se adaptará de la mejor manera a tus necesidades. Ensamblada con una potente memoria de 500GB, aquí podrás almacenar todo tipo de programas, juegos, archivos y videos; todo ello sin preocuparte por el espacio. Asimismo, presenta una cámara web, la cual te permitirá estar interconectado con tus clases o el trabajo. ¡No lo dudes más! Consigue este producto ingresando al portal de EFE, lo hace posible.</p>
    <img src="<?php echo $urlProyecto?>imagenes/productos/asus-laptop.jpg" alt="" srcset="" class="imagen2DescripPro" id="imagen2DescripPro">
    <?php include("footer.php"); ?>
</body>
</html>