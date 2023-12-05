<?php
    include('conexion.php');
    $nom=$_POST['nombre'];
    $ani=$_POST['anio'];
    $gru=$_POST['grupo'];
    $hor=$_POST['hor'];
    $dia=$_POST['dia'];
    $mat=$_POST['mat'];
    $tur=$_POST['tur'];
    $mod=$_POST['mod'];
    $sql="INSERT INTO profesor (nombre,Curso,Grupo,Horario,Dia,Modulos,turno,Materia) VALUES ('$nom','$ani','$gru','$hor','$dia','$mat','$tur','$mod')";
    $resul=mysqli_query($conexion,$sql);
    header('location:lista.php');
?>