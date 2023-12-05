<?php
    include('conexion.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stilo_index.css">
    <title>Profesores</title>
</head>
<body>
    <header>
        <div class="titulo">
            <div class="barra">
            <h1 class="icon-guidedog"></h1>
            <input type="checkbox" class="menu-bar" id="menu-bar">
            <label for="menu-bar-2">Menu</label>
            <nav class="menu">
                <li class="opcion"><a class="lin" href="../galeria.html">Galeria de Taller</a></li>
                <li class="opcion"><a class="lin" href="../materias.html">Materias por Año</a></li>
                <li class="opcion"><a class="lin" href="preguntas.html">Preguntas Frecuentes</a></li>
                <li class="opcion"><a class="lin" href="plan.html">Planes de Seguridad de Taller</a></li>
            </nav>
        </div>
            <h1 class="ti"><p>Profesores/ras de Taller</p></h1>
            <button class="volver"><a class="a_volver" href="../index.php">Volver</a></button>
        </div>
    </header>
    <div class="conten">
    
    </div>
    
    <div class="conten_tabla">
        <table border=2 class='tabla_pro'>
            <tr>
                <th>Nombre del profesor</th>
                <th>Curso</th>
                <th>Grupo</th>
                <th>Día</th>
                <th>Cantidad de horas</th>
                <th>Materias</th>
            </tr>
            <?php
                $sql="SELECT * FROM profesor";
                $resul=mysqli_query($conexion,$sql);
                
                    if(isset($_SESSION))
                    {
                        if(isset($_SESSION['estado'])!=1)
                        {
                            while($row=mysqli_fetch_assoc($resul))
                            {
                                $id=$row['id_profe'];
                                echo "<tr><td>".(utf8_encode($row['nombre']))."</td><td>".$row['Curso']."</td><td>".$row['Grupo']."</td><td>".(utf8_encode($row['Dia']))."</td><td>".$row['Modulos']."</td><td>".$row['Materia']."</td>";
                                echo "</tr>";
                            }    
                        }
                        else
                        {
                            echo "<div style='display:flex; flex-direction:column' height:100%><form style='height:30%; margin:0%'action='insert.php' method='post'><label for=''>Ingrese nombre del profesor/ra</label><br>
                            <input name='nombre' type='text'><br>
                            <label for=''>Ingresa tu año(ej:1ro 1ra)</label><br>
                            <input name='anio' type='text'><br>
                            <label for=''>Selecciona tu grupo de taller</label><br>
                            <select name='grupo' id=''>
                                <option value='1'>1</option>
                                <option value='2'>2</option>                
                            </select><br>
                            <label for=''>ingresa el horario(ej:7:30 a 9:40)</label><br>
                            <input name='hor' type='text'><br>
                            <label for=''>Seleccione dia</label><br>
                            <select name='dia' id=''>
                                <option value='LUNES'>LUNES</option>
                                <option value='MARTES'>MARTES</option>                
                                <option value='MIERCOLES'>MIERCOLES</option>                
                                <option value='JUEVES'>JUEVES</option>                
                                <option value='VIERNES'>VIERNES</option>                
                            </select><br>
                            <label for=''>Seleccione cantidad de horas</label><br>
                            <select name='mod' id=''>
                                <option value='2'>2</option>
                                <option value='4'>4</option>                
                            </select><br>
                            <label for=''>Seleccione turno</label><br>
                            <select name='tur' id=''>
                                <option value='MAÑANA'>MAÑANA</option>
                                <option value='TARDE'>TARDE</option>                
                            </select><br>
                            
                            <label for=''>Selecciona la materia</label><br>
                            <select name='mat' id=''>
                                <option value='Procedimientos tecnicos'>Procedimientos tecnicos</option>
                                <option value='Sistemas Tecnologicos'>Sistemas Tecnologicos</option>
                                <option value='Lenguajes Tecnologicos'>Lenguajes Tecnologicos</option>
                            </select><br>
                            <input type='submit'></form>";
                            while($row=mysqli_fetch_assoc($resul))
                            {
                                $id=$row['id_profe'];
                                echo "<tr><td>".(utf8_encode($row['nombre']))."</td><td>".$row['Curso']."</td><td>".$row['Grupo']."</td><td>".(utf8_encode($row['Dia']))."</td><td>".$row['Modulos']."</td><td>".$row['Materia']."<td><a href='borrar2.php?$id'>Borrar</a></td>";
                                echo "</tr></div>";
                            }
                        }
                    }
                    elseif(isset($_SESSION))
                    {
                        while($row=mysqli_fetch_assoc($resul))
                        {
                        echo "<tr><td>".(utf8_encode($row['nombre']))."</td><td>".$row['Curso']."</td><td>".$row['Grupo']."</td><td>".(utf8_encode($row['Dia']))."</td><td>".$row['Modulos']."</td><td>".$row['Materia']."";
                        echo "</tr>";
                        }
                    }
            ?>
        </table>
    </div>
    
</body>
</html>
<?php
function limitar($conexion)
{
    if (isset($_POST['borrar']))
    {
        header('location:lista.php');
    }
    else
    {
        $nombre=$_POST['prof'];
        $Cur=$_POST['anio'];
        $grup=$_POST['grupo'];
        $dia=$_POST['dia'];
        $hor=$_POST['hora'];
        $mat=$_POST['mat'];
        $sql="SELECT * FROM profesor WHERE nombre= '".(utf8_encode($nombre))."'AND Curso= '".$Cur."' AND Grupo= '".$grup."' AND Dia= '".$dia."' AND Modulo= '".$hor."' AND Materia= '".$mat."'";
        $res=mysqli_query($conexion,$sql);
        while ($row=mysqli_fetch_assoc($res))
            {
                if ($_SESSION['nombre']=="Gustavo Eiriz")
                {   
                echo "<tr><td>".(utf8_encode($row['nombre']))."</td><td>".$row['Curso']."</td><td>".$row['Grupo']."</td><td>".(utf8_encode($row['Dia']))."</td><td>".$row['Horario']."</td><td>".$row['Materia']."<td><a href='lista.php'>borrar</a></td>";
                echo "</tr>";
            }
            else{
                echo "<tr><td>".(utf8_encode($row['nombre']))."</td><td>".$row['Curso']."</td><td>".$row['Grupo']."</td><td>".(utf8_encode($row['Dia']))."</td><td>".$row['Horario']."</td><td>".$row['Materia']."<td><a href='lista.php'>borrar</a></td>";
                echo "</tr>";    
            }
        }
    }
}
?>