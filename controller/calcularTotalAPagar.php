<?php

$subTotal=$_POST["subTotal"];
$costoEnvio=$_POST["costoEnvio"];
$total= ($subTotal+$costoEnvio);
echo number_format($total,1);