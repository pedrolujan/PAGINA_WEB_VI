<?php
 session_start();
 error_reporting(0);
 include("../model/conexion.php");
 $id;
 $nombre;
 $apellido;
 $dni;
 $telefono;
 $coreo;
 $imagen;
    $user=new ApptivaDB();
    if(isset($_SESSION['adminLogeado'])){
        $usu=$user->buscar("usuarios","usuarios.id_usu=".$_SESSION['adminLogeado']);   
        foreach ($usu as $key ){  
            $id=$key['id_usu'];
            $nombre=$key['nombre_usu'];
            $apellido=$key['apellido_usu'];
            $dni=$key['dni_usu'];
            $telefono=$key['telefono_usu'];
            $coreo=$key['correo_usu'];
            $imagen=$key['imagen_usu'];
          }
    }elseif(isset($_SESSION['usuarioLogeado'])){
        $usu=$user->buscar("usuarios","usuarios.id_usu=".$_SESSION['usuarioLogeado']);   
        foreach ($usu as $key ){  
            $id=$key['id_usu'];
            $nombre=$key['nombre_usu'];
            $apellido=$key['apellido_usu'];
            $dni=$key['dni_usu'];
            $telefono=$key['telefono_usu'];
            $coreo=$key['correo_usu'];
            $imagen=$key['imagen_usu'];
          }
    }else{
        echo ("usted no esta logeado");
    }
     
     
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login / actualiza PeJaTec Servis</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="fonts/fonts/style.css">
    <link rel="stylesheet" href="../css/stilos_login.css">
    <link rel="stylesheet" href="fonts/style.css">
</head>

<body>
    <div class="container-actualizar">
        <form action="#" method="post" class="form_actualizarDU" id="form_actualizarDU" enctype="multipart/form-dat">
            <div class="form-actualizar" id="form-actualizar">
                <div class="imagen_usuario">
                    <?php 
                    if(file_exists("../".$imagen)){
                    ?>
                    <img src="../<?php echo $imagen; ?>" width="150"
                        class="imgcargarimagen" />
                    <?php }else{  ?>
                    <img src="imagenes/usuarioblanco.jpg" width="150" class="imgcargarimagen" />
                    <?php }?>
                    <input type="file" name="imagenUsuario" id="imagenUsuario" style="display: none;">
                    <div class="btnSubeImgUsu">
                        <center><span class="lnr lnr-camera"><br>
                                <p>cambiar imagen</p>
                            </span> </center>
                    </div>
                    <input type="text" name="txtimagen" id="txtimagen" value="<?php echo $imagen ?>" style="display: none;">
                </div>
            </div>

            <div class="cajas-actualizar" capIdUpdate="<?php echo $id ?>">
                <div class="datos-actualizar">
                    <div class="user line-input">
                        <label class="lnr lnr-user"></label>
                        <input type="text" value="<?php echo $id; ?>" name="txtid" style="display: none;">
                        <input type="text" placeholder="Nombres" value="<?php echo $nombre; ?>" name="txtnombre"
                            id="txtnombre">
                    </div>
                    <div class="user line-input">
                        <label class="lnr lnr-users"></label>
                        <input type="text" placeholder="Apellidos" value="<?php echo $apellido;?>" name="txtapellido"
                            id="txtapellido">
                    </div>
                </div>
                <div class="datos-actualizar">
                    <div class="user line-input">
                        <label class="lnr lnr-license"></label>
                        <input type="number" placeholder="DNI" value="<?php echo $dni ?>" name="txtdni" id="txtdni">
                    </div>
                    <div class="user line-input">
                        <label class="lnr lnr-phone-handset"></label>
                        <input type="number" placeholder="Telefono" value="<?php echo $telefono?>" name="txttelefono"
                            id="txttelefono">
                    </div>
                </div>
                <div class="datos-actualizar">
                    <div class="combo line-input">
                        <label class="lnr lnr-map-marker"></label>
                        <select name="cbo_pais" class="combobox" id="cbo_pais">
                            <option>Seleccione Pais</option>
                            <?php                           
                            $departamentos=$user->buscar("pais","1");   
                            foreach($departamentos as $dep):   ?>
                            <option value="<?php echo $dep['id_pais'] ?>">
                                <?php  echo $dep['nombre_pais'] ?>
                            </option>
                            <?php   endforeach;   ?>
                        </select>
                    </div>
                    <div class="combo line-input">
                        <label class="lnr lnr-map-marker"></label>
                        <select name="cbo_provincia" class="combobox" id="cbo_provincia" width="113">
                            <option value="0">Seleccione Ciudad</option>
                        </select>
                    </div>
                </div>
                <div class="coreo-usuario">
                    <div class="user line-input">
                        <label class="lnr lnr-envelope"></label>
                        <input type="email" placeholder="Correo" value="<?php echo $coreo?>" name="txtcorreo"
                            id="txtcorreo">
                    </div>
                </div>
                <button id="btnActualizaDU" class="btnActualizaDU">Actualizar</button>
            </div>
        </form>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/script_login.js"></script>
</body>

</html>