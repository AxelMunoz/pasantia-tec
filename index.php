<?php
    include ('php/conexion.php');
    session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Stilo_index.css">
    <link rel="stylesheet" href="css/noticias.css">
    <title>Inicio</title>
</head>
<body>
    <header>
        <div class="titulo">
        <?php
                if(isset($_SESSION['nombre']))
                {
                    if($_SESSION['estado']==1)
                    {
                        echo "<div class='barra'>";
                        echo "<input type='checkbox' class='menu-bar_ses' id='menu-bar_ses'>";
                        echo "<label for='menu-bar_ses'>Menu</label>";
                        echo "<h1 class='icon-guidedog'></h1>";
                        echo "<nav class='menu_ses'>
                            <li class='opcion'><a class='lin' href='php/noticias_admin.php'>Noticias Administrativas</a></li>
                            <li class='opcion'><a class='lin' href='noticias.php'>Noticias de Proyectos</a></li>
                            </nav>";
                        echo "</div>";
                    }
                    else{
                        echo "<div class='barra'>";
                        echo "<input type='checkbox' class='menu-bar_ses' id='menu-bar_ses'>";
                        echo "<label for='menu-bar_ses'>Menu</label>";
                        echo "<h1 class='icon-guidedog'></h1>";
                        echo "<nav class='menu_ses'>
                            <li class='opcion'><a class='lin' href='php/noticias_admin.php'>Noticias Administrativas</a></li>
                            </nav>";
                        echo "</div>";
                    }
                }
        ?>
        <h1 class="ti"><p>El taller de la tecnica 3</p></h1>
        <?php
                if(isset($_SESSION))
                {
                    if(isset($_SESSION['nombre']))
                    {
                        echo "<button class='boton1'><a class='a_back' href='php/cerrarSesion.php'>Cerrar Sesion</a></button>";
                    }
                    else{
                        echo "<button class='boton1'><a class='a_back' href='login.html'>Inicio de sesion</a></button>";
                    }
                }
            ?>
        </div>
    </header>
    <div class="bar">
        <ul class="barra_in">
            <li class="opcion_in"><a class="lin" href="galeria.html">Galeria de Taller</a></li>
            <li class="opcion_in"><a class="lin" href="php/lista.php">Profesores/ras de Taller</a></li>
            <li class="opcion_in"><a class="lin" href="materias.html">Materias por Año</a></li>
            <li class="opcion_in"><a class="lin" href="preguntas.html">Preguntas Frecuentes</a></li>
            <li class="opcion_in"><a class="lin" href="plan.html">Planes de Seguridad de Taller</a></li>
            
        </ul>
    </div>
    <?php
        $sql="SELECT * FROM noticias";
        $resul=mysqli_query($conexion,$sql);
        while($row=mysqli_fetch_assoc($resul))
            {
                $id=$row['id_noticias'];
                echo "<div class='contenimg'>
                <h1>".$row['titulo']."</h1>";
                echo "<img src=".$row['imagen'].">
                <p>".$row['descripcion']."<p>
                </div>";
            }
    ?>
</body>
</html>