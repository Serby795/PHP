<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUD DE Clientes</title>
    <link href="web/default.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="web/js/funciones.js"></script>
</head>

<body>
    <div id="container">
        <div id="header">
            <h1>MIS CLIENTES CRUD versión 1.0</h1>
        </div>
        <div id="content">
            <?= $contenido ?>
            <form>
                <input type="submit" name="orden" value="Nuevo">
                <input type="submit" name="orden" value="Terminar">
                <input type="submit" name="orden" value="Primero">
                <input type="submit" name="orden" value="Siguiente">
                <input type="submit" name="orden" value="Anterior">
                <input type="submit" name="orden" value="Ultimo">
            </form>
        </div>
    </div>
</body>