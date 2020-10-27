<?php
if(isset($_POST['id'])):
require "../model/conexion.php";
$user=new ApptivaDB();
$u=$user->buscar("provincia","ID_PAIS=".$_POST['id']);
$html="";
foreach ($u as $value)
$html.="<option
value='".$value['id_prob']."'>".$value['nombre_prob']."</option>";
echo $html;
endif;
?>
