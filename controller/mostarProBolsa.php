<?php
session_start();
include("../model/conexion.php");
$bus=new ApptivaDB();
$html="";
if(isset($_SESSION['usuarioLogeado'])){  
    $busqCarrito= $bus->buscarCar("productos.imagen_pro,productos.nombre_pro,carrito.unidades_car,productos.precio_pro","carrito
    INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro","carrito.ID_USUARIOS=".$_SESSION["usuarioLogeado"]);
    foreach($busqCarrito as $car){ 
        /* $respuesta["imagen"]=$car["imagen_pro"]; */
        $html.= "<tr >
        <td><img src=".$car['imagen_pro']." alt='' srcset='' class='imagenProBolsaCar'></td>
        <td><h3 class='nombreProBolsaCar'>".$car['nombre_pro']."</h3></td>
         <td><h3 class='cantidadProBolsaCar'>".$car['unidades_car']."</h3></td>
         <td><h3 class='precioBolsaCar'>".$car['precio_pro']."</h3></td></tr>";

       /*  $respuesta["total"]=$car["TOTAL"]; */

     }  


}
echo $html;
?>