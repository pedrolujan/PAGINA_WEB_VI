<?php

sleep(1);
session_start();
$html="";
	include("../model/conexion.php");
	$user=new ApptivaDB();
	if(isset($_SESSION['usuarioLogeado'])){
		$u=$user->buscarChat("chat,usuarios","chat.ID_USUARIO=".$_SESSION['usuarioLogeado']." and usuarios.id_usu=".$_SESSION['usuarioLogeado'],"id_chat");
		foreach ($u as $v)		
			
				$html.="<div class='conten_oneChat'><div class='conten_oneChatUsu'></div>
									<div class='conten_oneChatSms'>".$v["mensaje_chat"]."</div></div>"; 
		
	}elseif(isset($_SESSION['adminLogeado'])){
		$u=$user->buscarChat("chat,usuarios","chat.ID_USUARIO=".$_SESSION['adminLogeado']." and usuarios.id_usu=".$_SESSION['adminLogeado'],"id_chat");
		foreach ($u as $v)		
			
				$html.="<div class='conten_oneChat'><div class='conten_oneChatUsu'></div>
									<div class='conten_oneChatSms'>".$v["mensaje_chat"]."</div></div>"; 
	}else{
		$html.="Inicie session para chatear"; 
	}
echo $html;

?>