<?php
include("../model/conexion.php");
include("../model/url.php");
session_start();
$bus=new ApptivaDB();
$html="";
$fecha=$_POST["fecha"];

if(isset($_POST["idUsu"])){
    $fechaCompra=$bus->buscarFech("carrito.id_car,
            carrito.ID_USUARIOS,               
            productos.imagen_pro,                
            productos.nombre_pro,                
            compras.COD_COMPRA,
            compras.fecha_comp,
            carrito.unidades_car,
            compras.fecha_corta_comp",
            "compras
            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
            "carrito.ID_USUARIOS='".$_POST["idUsu"]."' AND compras.fecha_corta_comp='".$fecha."'");


if($fechaCompra){
    $html.="<table>
    <thead>
        <th colspan='2'>PRODUCTO</th>
        <th>CODIGO DE COMPRA</th>
        <th>FECHA DE COMPRA</th>
    </thead>
    <tbody>";
    foreach($fechaCompra as $recor){
        $html.="<tr>
            <td ><img src=".$recor['imagen_pro']." alt='' srcset=''></td>
            <td>".$recor['nombre_pro']."</td>
            <td>".$recor['COD_COMPRA']."</td>
            <td>".$recor['fecha_comp']."</td>
        </tr>";

    }
    $html.="</tbody>
    </table>";

}
echo $html;
}else{

$fechaCompra=$bus->buscarFech("carrito.id_car,
            carrito.ID_USUARIOS,               
            productos.imagen_pro,                
            productos.nombre_pro,                
            compras.COD_COMPRA,
            compras.fecha_comp,
            carrito.unidades_car,
            compras.fecha_corta_comp",
            "compras
            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
            "carrito.ID_USUARIOS='".$_SESSION["usuarioLogeado"]."' AND compras.fecha_corta_comp='".$fecha."'");


if($fechaCompra){
    $html.="<table>
    <thead>
        <th colspan='2'>PRODUCTO</th>
        <th>CODIGO DE COMPRA</th>
        <th>FECHA DE COMPRA</th>
    </thead>
    <tbody>";
    foreach($fechaCompra as $recor){
        $html.="<tr>
            <td ><img src=".$recor['imagen_pro']." alt='' srcset=''></td>
            <td>".$recor['nombre_pro']."</td>
            <td>".$recor['COD_COMPRA']."</td>
            <td>".$recor['fecha_comp']."</td>
        </tr>";

    }
    $html.="</tbody>
    </table>";

}
echo $html;
}












?>
