<?php
    include('conexion.php');
      $nombre=$_POST['nombre'];
      $contrasenia=$_POST['contra'];
      $email=$_POST['email'];
      $sql="SELECT * FROM usuario WHERE nombre='".$nombre."' AND email='".$email."'";
      $result=mysqli_query($conexion,$sql);
      $nr=mysqli_num_rows($result);
      if($nr>0){
        echo "<script>alert('nombre de usuario o email ya en uso!');window.location='../login.html';</script>";
        
      }else{
        $sql="INSERT INTO usuario (nombre,contrasenia,email) VALUES ('$nombre','$contrasenia','$email')";
        $result=mysqli_query($conexion,$sql); 
        header('location:../login.html');
        echo "<script>alert('usuario registrado correctamente, inicie sesion');</script>";
      }
 ?>