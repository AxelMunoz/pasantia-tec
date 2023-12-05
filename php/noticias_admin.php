<?php
    session_start();
    include('conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/Stile_noticia.css">
    <title>Carga de archivos</title>
</head>
<body>
    <header class="titulo">
        <button class='boton1'><a class='a_back' href='../index.php'>Volver</a></button>
        <h1 class="ti">Carga de archivos</h1>
    </header>
    
    <?php
    if(isset($_SESSION))
        {
            if($_SESSION['nombre']=="Gustavo Eiriz")
            {
                echo "<div class='login'><form action='noticias_admini.php' method='POST'  enctype='multipart/form-data'>
                <input type='file' name='archivo' accept='.jpg, .docx, .exe, .pdf'>
                <br>
                <input class='boton1' type='submit' value='Cargar archivo'>
                </form></div>";
                $sql = "SELECT * FROM archivos";
                $resultado = mysqli_query($conexion, $sql);
                echo "<h1 class='sub_ti'>Archivos almacenados</h1>";
                echo "<ul>";
                while ($fila = mysqli_fetch_assoc($resultado)) {
                $nombreArchivo = $fila['nombre_archivo'];
                $rutaArchivo = $fila['ruta_archivo'];
                $id=$fila['id'];

                echo "<div class='container_ar'>
                    <li class='li_ar'><h2><a href='$rutaArchivo' download>$nombreArchivo</a></h2></li>
                    <button class='boton1'><a href='borrar.php?id=$id'>borrar</a></button>
                    </div>";
                }
                echo "</ul>";
                mysqli_close($conexion);
            }
            else{
                $sql = "SELECT * FROM archivos";
                $resultado = mysqli_query($conexion, $sql);
                echo "<h1 class='sub_ti'>Archivos almacenados</h1>";
                echo "<ul>";
                while ($fila = mysqli_fetch_assoc($resultado)) {    
                    $nombreArchivo = $fila['nombre_archivo'];
                    $rutaArchivo = $fila['ruta_archivo'];
                    echo "<li><a href='$rutaArchivo' download>$nombreArchivo</a></li>";
                }
            echo "</ul>";
            mysqli_close($conexion);
            }
        }
    ?>
</body>
</html>
