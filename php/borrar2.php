<?php
    include ('conexion.php');
    session_start();
    $sql="DELETE FROM profesores WHERE id=".$_GET['id']."";
    $res=mysqli_query($conexion,$sql);
    header('location:lista.php');
?>