<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/noticias.css">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="php/noti.php" method="post">
        <label for="">Titulo</label>
        <input type="text" name="titulo">
        <label for="">Descripcion</label>
        <textarea name="descrip" id="" cols="51" rows="5"></textarea>
        <label for="">Imagen</label>
        <input name="Imagen" type="file" id="Imagen">
        <input style="color:black;" type="submit">
    </form>
</body>
</html>
