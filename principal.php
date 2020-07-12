<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo2.css" type="text/css">
    <link rel="stylesheet" href="css/all.css" type="text/css">
    <title>PRINCIPAL</title>
</head>
<?php
    $cedula=$_POST['cedula'];
    include ('conexion.php');
    $sql="select * from identificador where ci='$cedula'";
    $r=mysqli_query($con, $sql);
    while($res=mysqli_fetch_array($r))
    {
        $color=$res['color'];
        $foto=$res['foto'];
    }
    include ('cerrar_conexion.php');
?>
<?php
session_start();
ob_start();
$_SESSION['sesion_exito']=0;
if(isset($_POST['btnlogin']))
{
    $_SESSION['sesion_exito']=0;
    $cedula=$_POST['cedula'];
    $clave=$_POST['clave'];

    if($cedula=="" || $clave=="")
    {
        $_SESSION['sesion_exito']=2;//datos vacios
    }
    else {
        include('conexion.php');
        $_SESSION['sesion_exito']=3;//datos erroneos
        $sql="select * from usuario where ci='$cedula' and clave='$clave'";
        $res=mysqli_query($con, $sql);
        while ($registro=mysqli_fetch_array($res))
        {
            $_SESSION['sesion_exito']=1;
        }
        include('cerrar_conexion.php');
    }
    if($_SESSION['sesion_exito']<>1)
    {
        header('Location:index.php');
    }
}
else{
    $color=$_POST['selector'];
}
?>
<body style="background:<?php echo $color?>;">


    <div class="principal">
        <header class="header margen-interno">
            <div class="menu">
                <div class="logo"><a href="#"><img src="img/logotipo-erik.png"></a></i>
                </div>
                <nav class="nav">
                    <h2>INF324 PROGRAMACION MULTIMEDIAL</h2>
                </nav>
                <div class="social">
                    <a href="https://www.facebook.com/erikdark/"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=59161216696&text=Hola"><i class="fab fa-whatsapp"></i></a>
                    <a href="index.php"><i class="fas fa-home"></i></a>
                </div>
            </div>
        </header>

        <section class="contenido margen-interno">
            <div class="imagen">
                <img src="<?php echo $foto;?>">       
            </div>
            <div class="tabs">
                <form method="POST" action="principal.php">
                    <div class="input">
                        <select name="selector" value="seleccione">
                            <option selected="true" disabled="disabled">Seleccione un color</option>
                            <option value="#ff0000" name="red">Rojo</option>
                            <option value="#00ff00">Verde</option>
                            <option value="#0000ff">Azul</option>
                        </select>
                        <input type="hidden" value="<?php echo $cedula;?>" name="cedula">
                    </div>
                    <input class="boton" type="submit" name="btnColor" value="Cambiar Color">
                </form>
            </div>
        </section>
        <footer class="footer margen-interno">
            <h2>Elaborado por Univ. Erik Maquera C.</h2>
        </footer>
        <?php
        if (isset($_POST['btnColor']))
        {
            $colour=$_POST['selector'];
            include('conexion.php');
            $sql1="update identificador set color='$colour' where ci='$cedula'";
            mysqli_query($con, $sql1);
        }
        ?>
    </div>
    </body>
</html>