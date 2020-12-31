<?php

include "../model/conexion.php";
$con = new ApptivaDB();
session_start();
$respuesta="";
$departamento = $_POST["departamento"];
$provincia = $_POST["provincia"];
$distrito = $_POST["distrito"];

/* $comp_series_compradas = $_POST["series_compradas"]; */ 


$cantRegistros=array();
$buscar="";
$obtener_ultimo_id=0;
/* consulta para buscar la cantidad de registros existentes en la tabla copras */
$buscar = $con->buscarCar("id_comp","compras","1");
foreach($buscar as $v){   
       $cantRegistros[]=$v["id_comp"];
}  
 /* si has menos de un registro a la variable le agrego uno si no le agrego el id maximo */
if(count($cantRegistros)<=1){
 $obtener_ultimo_id =1;
} else {
    $buscar = $con->buscarCar("MAX(id_comp) as id","compras","1");
    foreach($buscar as $v){   
       $obtener_ultimo_id=$v["id"];
    }  
}
/* obtengo el id del usuario logeado */
$obtener_id = $_SESSION['usuarioLogeado'];

$carrito = $con->buscarCar(
    "id_car,subTotal_car",
    "carrito 
    INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu",
    "carrito.ID_USUARIOS='$obtener_id' AND carrito.estado_car=0 GROUP BY carrito.id_car"
);

$ids_carrito = array();
$subTotales_carrito=array();

foreach($carrito as $car){

    $ids_carrito[] =  $car["id_car"];
    $subTotales_carrito[] =  $car["subTotal_car"];
}
$cantidad_Comras=count($ids_carrito);

date_default_timezone_set("America/Lima");
$fecha_actual = date('Y-m-d H:i:s');
$fecha_corta=date('Y-m-d');

for ($i = 0; $i < $cantidad_Comras; $i++) {
    $generar_cod = "CLM_0" . $obtener_ultimo_id;
    $registrar_compras = $con->insertar(
        "compras",
        "'$ids_carrito[$i]','$generar_cod','$departamento','$provincia','$distrito','$subTotales_carrito[$i]','$fecha_actual','$fecha_corta'");

    if (!$registrar_compras) {
        $respuesta =  "Error al Registrar Compra";
       
    } else {
        $actualiza=$con->actualizar("carrito","carrito.estado_car=1","carrito.ID_USUARIOS=".$obtener_id);
        $respuesta =  "Registro corecto";
    }
}
echo $respuesta;