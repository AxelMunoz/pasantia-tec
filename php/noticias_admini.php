<?php

include ("conexion.php");


if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}


$nombreArchivo = $_FILES['archivo']['name'];
$tipoArchivo = $_FILES['archivo']['type'];
$rutaArchivo = $_FILES['archivo']['tmp_name'];


$directorioDestino = "../archivos";
$rutaDestino = $directorioDestino . $nombreArchivo;
move_uploaded_file($rutaArchivo, $rutaDestino);


$sql = "INSERT INTO archivos (nombre_archivo, tipo_archivo, ruta_archivo) VALUES ('$nombreArchivo', '$tipoArchivo', '$rutaDestino')";
if (mysqli_query($conexion, $sql)) {
    echo "Archivo cargado y guardado en la base de datos.";
} else {
    echo "Error al guardar el archivo: " . mysqli_error($conexion);
}


// Obtener lista de archivos desde la base de datos
$sql = "SELECT * FROM archivos";
$resultado = mysqli_query($conexion, $sql);

// Mostrar la lista de archivos
echo "<h1>Archivos almacenados</h1>";
echo "<ul>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $nombreArchivo = $fila['nombre_archivo'];
    $rutaArchivo = $fila['ruta_archivo'];
    echo "<li><a href='$rutaArchivo' download>$nombreArchivo</a></li>";
}
echo "</ul>";

// Cerrar conexión a la base de datos
mysqli_close($conexion);
header('location:noticias_admin.php');
?>