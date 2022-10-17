<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de imágenes</title>
</head>

<body>
    <?php

    const UPDIR = "uploads/";
    const MAX_SIZE = 200000;
    const TYPE = array("png", "jpg");

    if (isset($_FILES['imagen'])) {
        $errores = 0;
        $nombreArchivo = $_FILES['imagen']['name'];
        $fileSize = $_FILES['imagen']['size'];
        $fileType = $_FILES['imagen']['type'];
        $directorioTemp = $_FILES['imagen']['tmp_name'];
        $arrayFile = pathinfo($nombreArchivo);
        $extension = $arrayFile['extension'];
        if (!in_array($extension, TYPE)) {
            echo "Extensión no válida";
            $errores = 1;
        }else if ($fileSize > MAX_SIZE) {
            echo "La imagen excede el tamaño máximo permitido.";
            $errores = 1;
        }
        
        if ($errores == 0){
            $nombreCompleto = UPDIR.$nombreArchivo;
            move_uploaded_file($directorioTemp, $nombreCompleto);
            echo "Archivo subido";
        }
    }





    ?>
</body>

</html>