<?php
include("../model/conexion.php");
$prov=new ApptivaDB();
$provincias=array();
$distritos="";
if(isset($_POST["idDepa"])){
    $provincia=$prov->buscarFech("provincia.id_provincia,provincia.prov_nombre,departamento.dep_costo_envio",
                                "provincia
                                INNER JOIN departamento 
                                ON provincia.departamento_id_departamento=departamento.id_departamento",
                                "provincia.departamento_id_departamento=".$_POST["idDepa"]);
    /* foreach($provincia as $pr){
        $provincias[]="<option value=".$pr['id_provincia'].">".$pr['prov_nombre']."</option>";
    } */	
    while($row =mysqli_fetch_array($provincia)){			
        $provincias[] = array(			
            'combo' => $row['prov_nombre'],
            'valorCombo' => $row['id_provincia'],	
            'precio' => $row['dep_costo_envio']	
        );
    }
    echo json_encode($provincias);
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