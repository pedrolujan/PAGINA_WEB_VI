<?php
include("model/url.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $urlProyecto?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_principal.css">

</head>

<body>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block " src="<?php echo $urlProyecto?>imagenes/fuentes/car1.gif" alt="First slide">
                <div class="cantenInfoIndex">
                    <div class="carInfo">Pejatec Servis</div>
                    <p class="subCarInfo">siempre a tu servicio</p>
                    
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block " src="<?php echo $urlProyecto?>imagenes/fuentes/car2.gif" alt="Second slide">
                <div class="cantenInfoIndex">
                    <div class="carInfo">Precios Bajos</div>
                    <p class="subCarInfo">siempre a tu servicio</p>                    
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block" src="<?php echo $urlProyecto?>imagenes/fuentes/car3.png" alt="Third slide">
                <div class="cantenInfoIndex">
                    <div class="carInfo">Oferta Navideña pejatec</div>
                    <p class="subCarInfo">siempre a tu servicio</p>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/popper.min.js"></script>
</body>

</html>