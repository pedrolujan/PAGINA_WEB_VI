<?php
include("../model/conexion.php");
$prov=new ApptivaDB();
$provincias="";
$distritos="";
if(isset($_POST["idDepa"])){
    $provincia=$prov->buscarCar("id_provincia,prov_nombre",
                                "provincia",
                                "departamento_id_departamento=".$_POST["idDepa"]);
    foreach($provincia as $pr){
        $provincias.="<option value=".$pr['id_provincia'].">".$pr['prov_nombre']."</option>";
    }
    echo $provincias;
}else if(isset($_POST["idProv"])){
    $distrit=$prov->buscarCar("id_distrito,dis_nombre",
                                "distrito",
                                "provincia_id_provincia='".$_POST["idProv"]."'");
    foreach($distrit as $dis){
    $distritos.="<option value=".$dis['id_distrito'].">".$dis['dis_nombre']."</option>";
    }
    echo $distritos;
}
?>