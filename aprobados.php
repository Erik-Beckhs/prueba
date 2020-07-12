<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo3.css" type="text/css">
    <link rel="stylesheet" href="css/all.css" type="text/css">
    <title>Aprobados</title>
</head>
<body>
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
                </div>
            </div>
        </header>

        <section class="contenido margen-interno">
            <form action="aprobados.php" method="POST">
                <input class="boton" type="submit" name="btnAprobados" value="Ver Aprobados">
            </form>
            <div class="caja">
                <table class="tabla">  
                    <?php
                        if(isset($_POST['btnAprobados']))
                        {
                            ?>
                            <tr><th>DEPARTAMENTO</th><th>CANTIDAD DE APROB.</th></tr>
                            <?php
                            include('conexion.php');
                            $sql="select d.nombre_dep, count(*) as cantidad
                            from departamento d, identificador i, nota n
                            where d.cod_depar=i.cod_depar and i.ci=n.ci
                            and ((n.nota1+n.nota2+n.nota3)/3) > 51
                            group by d.nombre_dep order by cantidad" ;
                            $r=mysqli_query($con, $sql);
                            while($res=mysqli_fetch_array($r))
                            {
                                ?>
                                <tr><td>
                                <?php 
                                echo $res['nombre_dep'];?> </td>
                                <td>
                               <?php  
                                echo $res['cantidad'];?></td></tr>
                                <?php
                            }
                            include ('cerrar_conexion.php');
                        }
                    ?>
                </table>
            </div>
        </section>
</body>
</html>