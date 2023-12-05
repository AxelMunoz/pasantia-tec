
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
      include('conexion.php');
        session_start();
        $usuario = mysqli_real_escape_string($conexion,trim($_POST['nombre']));
        $contra=mysqli_real_escape_string($conexion,trim($_POST['contra']));
        $sql="SELECT * FROM usuario WHERE nombre='".$usuario."' AND contrasenia='".$contra."'";
        $result=mysqli_query($conexion,$sql);
        $nr=mysqli_num_rows($result);
        $res=mysqli_fetch_assoc($result);
        if($nr>0)
        {
          $_SESSION['nombre']=$res['nombre'];
          $_SESSION['estado']=$res['estado'];
        }
        else{
          echo "<script>alert('nombre de usuario o contrasenia equivocados!');window.location='../login.html';</script>";
        }
        $_SESSION['nombre']=$usuario;
        echo "<script>alert('bienvenido '".$_SESSION['nombre'].");</script>";
        header('location:../index.php');        
    }
?>