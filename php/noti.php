<?php
    include ('conexion.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $imagen=$_FILES['Imagen'];
        $titular=mysqli_real_escape_string($conexion,trim($_POST['titulo']));
        $cuerpo=mysqli_real_escape_string($conexion,trim($_POST['descrip']));
        echo $titular;
        $path=$imagen['name'];
        if($imagen['error'] === 0){
            if($imagen['size'] > 16000000){
                echo "<script>window.alert('ERROR IMAGEN MUY GRANDE, NO PUEDE SUPERAR 16 MEGABYTES'); window.location='../formulario/formulario.html';</script>";
            }else{
                $extension_archivo= pathinfo($imagen['name'], PATHINFO_EXTENSION);
                $extension_minuscula = strtolower($extension_archivo);
    
                $extensiones_posibles= array("jpg","jpeg","png","webp");
    
                if(in_array($extension_minuscula,$extensiones_posibles)){
                    $nuevo_nombre_img = uniqid("IMG-", true).'.'.$extension_minuscula;
                    $upload_path = '../uploads/'.$nuevo_nombre_img;
                    $upload_path2 = 'uploads/'.$nuevo_nombre_img;
                    move_uploaded_file($imagen['tmp_name'], $upload_path);
                    $sql="INSERT INTO noticias (imagen,titulo,descripcion) VALUES ('".$upload_path2."','".$titular."','".$cuerpo."')";
                    $result=mysqli_query($conexion,$sql);
                    header("Location: ../index.html");
                }else{
                    echo "<script>window.alert('UTILIZE FORMATO DE IMAGEN ADMITIDO'); window.location='../formulario/formulario.html';</script>";
                }
            }   
        }else{
            echo "<script>window.alert('ERROR AL SUBIR LA IMAGEN'); window.location='../formulario/formulario.html';</script>";
        }
    }    
    header('location:../index.php');
?>