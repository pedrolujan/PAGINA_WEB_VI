<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Registro PeJaTec Servis</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    
    <link rel="stylesheet" href="../fonts/fonts/style.css">
    <link rel="stylesheet" href="../css/stilos_login.css">
    
</head>
<body>
    
<div class="container-form">
        <div class="headerLogin">
        <div class="logo-title">
            <img src="../imagenes/fuentes/logo.png" alt="" srcset="">
               
            </div>
            <div class="menu">
                <a href="login.php"><li class="module-login ">Iniciar Sesion</li></a>
                <a href="registro_usuario.php"><li class="module-register active">Registrate</li></a>
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="conten-cajas">
            <div class="welcome-form"><h1>Bienvenido</h1></div>
                <div class="datos-personales">
                    <div class="user line-input">
                        <label class="lnr lnr-user"></label>
                        <input type="text" placeholder="Nombres" name="txtnombre" id="txtnombre">
                    </div>
                    <div class="user line-input">
                        <label class="lnr lnr-users"></label>
                        <input type="text" placeholder="Apellidos" name="txtapellido" id="txtapellido">
                    </div>
                </div>
                <div class="datos-personales">
                    <div class="user line-input">
                        <label class="lnr lnr-license"></label>
                        <input type="number" placeholder="DNI" name="txtdni" id="txtdni">
                    </div>
                    <div class="user line-input">
                        <label class="lnr lnr-phone-handset"></label>
                        <input type="number" placeholder="Telefono" name="txttelefono" id="txttelefono"> 
                    </div>
                </div>
                <div class="datos-personales">
                    <div class="combo line-input">
                        <label class="lnr lnr-map-marker"></label>
                        <select name="cbo_pais" class="combobox" id="cbo_pais">
                            <option>Seleccione Pais</option>
                            <?php
                            include("../model/conexion.php");
                            $user=new ApptivaDB();
                            
                            $departamentos=$user->buscar("pais","1");   
                            foreach($departamentos as $dep){   ?>
                            <option value="<?php echo $dep['id_pais'] ?>">
                            <?php  echo $dep['nombre_pais'] ?>
                            </option>
                            <?php   }   ?>
                        </select>
                    </div>
                    <div class="combo line-input">
                    <label class="lnr lnr-map-marker"></label>
                    <select name="cbo_provincia" class="combobox" id="cbo_provincia" width="113">
                    <?php $dprov=$user->buscar("provincia","1");
                   foreach($dprov as $pr){ ?>
                        <option value="<?php echo $pr['id_provincia'] ?>"><?php echo $pr['prov_nombre'] ?></option>
                    <?php } ?>
                    </select>
                    </div>
                </div>
            <div class="coreo-usuario">
            <div class="user line-input">
                <label class="lnr lnr-envelope"></label>
                <input type="email" placeholder="Correo" name="txtcorreo" id="txtcorreo">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="txtusuario" id="txtusuario">
            </div>
            </div>
            <div class="claves">
                <div class="password line-input">
                    <label class="lnr lnr-lock"></label>
                    <input type="password" placeholder="Contraseña" name="txtclave" id="txtclave">
                </div>
                <div class="password line-input">
                    <label class="lnr lnr-lock"></label>
                    <input type="password" placeholder="Confirmar contraseña" name="txtconfclave" id="txtconfclave">
                </div>
            </div>
           
            <div class="mensajeerror"></div>
            <div class="mensajeok"></div> 
            <div class="container" id="container"></div>           
            <button id="btnRegistrar">Registrarse<label class="lnr lnr-chevron-right"></label></button>   
            <div class="salida" id="salida" style="background: #000; color: #fff;"></div>      
        </div>        
    </form>
    </div>    
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/script_login.js"></script>
</body>
</html>