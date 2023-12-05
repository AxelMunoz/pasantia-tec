<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="submit">
    </form>
</body>
</html>
<?php
include('conexion.php');
if(isset($_POST['actualizar'])){
    $usuario=$_POST['nombre'];
    $mail=$_POST['mail'];
    $contrasenia=$_POST['contrasenia'];

$sql="UPDATE usuario SET nombre='{$usuario}', contrasenia='{$contrasenia}', mail='{$mail}' 
    WHERE id=".$_POST['id']; 

if(mysqli_query($conexion,$sql)){
    echo"<script>alert('Usuario actualizado correctamente');</script>";
}    
else{
    echo"<div> <h2> Error!!! </h2> </div>";
    }
}

$id=isset($_GET['id'])? (int)$_GET['id']:0;
$sql="SELECT * FROM profesor WHERE id_profesor={$id}";
$resultado= mysqli_query($conexion,$sql);
$row=mysqli_fetch_assoc($resultado);    

?>