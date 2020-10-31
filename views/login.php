<?php
session_start();
 if(isset($_SESSION["usuarioLogeado"]) || isset($_SESSION["adminLogeado"])){
    header("location: ../index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login/PeJaTec Servis</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../fonts/fonts/style.css">
    <link rel="stylesheet" href="../css/stilos_login.css">

</head>

<body>

    <div class="container-form login-form">
        <div class="headerLogin">
            <div class="logo-title">
                <img src="../imagenes/mi-logo.gif" alt="" srcset="">
            </div>
            <div class="menu">
                <a href="login.php">
                    <li class="module-login active">Iniciar Sesion</li>
                </a>
                <a href="registro_usuario.php">
                    <li class="module-register">Registrate</li>
                </a>
            </div>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="conten-cajas">
                <div class="welcome-form">
                    <h2 style="margin-bottom:25px">PeJaTec Servis</h2>
                </div>
                <div class="user line-input">
                    <label class="lnr lnr-user"></label>
                    <input type="text" placeholder="Nombre Usuario" name="usuario" id="txtusuario">
                </div>
                <div class="password line-input">
                    <label class="lnr lnr-lock"></label>
                    <input type="password" placeholder="Contraseña" name="clave">
                </div>
                <div class="container" id="container"></div>
                <div class="mensajeerror" id="msgerror"></div>
                <div class="mensajeok" id="msgexito"></div>

                <button type="submit" id="btnacceder">Entrar<label class="lnr lnr-chevron-right"></label></button>
            </div>
        </form>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/script_login.js"></script>
</body>

</html>