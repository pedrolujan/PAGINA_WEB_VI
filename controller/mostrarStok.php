<?php 
 include("../model/conexion.php");
 $bus=new ApptivaDB();
$idPro=$_POST["idPro"];
 $stokPro= $bus->buscarCar("SUM(stok_pro) AS STOK","productos","id_pro=".$idPro);
    foreach($stokPro as $stok){   
	$stokDisponible=$stok["STOK"];
    } 
    
    echo $stokDisponible;
    ?>   
							