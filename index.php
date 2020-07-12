<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <title>Login</title>
</head>
<body>
    <?php
           session_start();
           ob_start(); 
           $mensaje="Bienvenido";
           if(isset($_SESSION['sesion_exito']))
           {
                    if($_SESSION['sesion_exito']==0)
                    {
                        $mensaje="Ingrese sus datos";
                    }
                    if($_SESSION['sesion_exito']==2)
                    {
                        $mensaje="Campos Obligatorios";
                    }
                    if($_SESSION['sesion_exito']==3)
                    {
                        $mensaje="Datos erroneos";
                    } 
            }                 
    ?>
    <div class="align">
        <img class="logo" src="img/erik-cyborg2.png">
        <div class="card">
            <div class="head">
                <div></div>
                <a id="login" class="selected" href="#login">Login</a>
                <div></div>
            </div>
            <div class="tabs">
                <form action="principal.php" method="POST">
                    <div class="inputs">
                        <div class="input">
                            <input placeholder="Cedula" type="text" name="cedula"><img src="img/user.png">
                        </div>
                        <div class="input">
                            <input placeholder="Clave" type="password" name="clave"><img src="img/pass.png">
                        </div>
                        <input class="boton" type="submit" value="Login" name="btnlogin">
                    </div>
                    <label class="msj"><?php echo $mensaje;?></label>
                </form>
            </div>
        </div>
    </div>
    <!--<script src="js/jquery-3.3.1.min.js"></script>-->
    <!--<script src="js/index.js"></script>-->
</body>
</html>