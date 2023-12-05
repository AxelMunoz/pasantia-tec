<?php
    include ('conexion.php');
    session_start();
    $sql="DELETE FROM archivos WHERE id=".$_GET['id']."";
    $res=mysqli_query($conexion,$sql);
    header('location:noticias_admin.php');
?>