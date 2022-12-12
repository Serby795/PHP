<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUD DE Clientes</title>
    <link href="web/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" style="width: 600px;">
        <div id="header">
            <h1>MIS CLIENTES CRUD versión 1.0</h1>
        </div>
        <div id="content">
            <hr>
            <form method="POST">
                <table>
                    <tr>
                        <td>id </td>
                        <td>
                            <input type="text" name="id" value="<?= $user->id ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size="20" autofocus>
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre </td>
                        <td>
                            <input type="text" name="first_name" value="<?= $user->first_name ?>" <?= ($orden == "Detalles" || $orden == "Modificar") ? "readonly" : "" ?> size="8">
                        </td>
                    </tr>
                    <tr>
                        <td>Apellidos</td>
                        <td>
                            <input type="text" name="last_name" value="<?= $user->last_name ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size=10>
                        </td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td>
                            <input type="text" name="email" value="<?= $user->email ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size=20>
                        </td>
                    </tr>
                    <tr>
                        <td>Género</td>
                        <td>
                            <input type="text" name="gender" value="<?= $user->gender ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size=8>
                        </td>
                    </tr>
                    <tr>
                        <td>IP</td>
                        <td>
                            <input type="text" name="ip_address" value="<?= $user->ip_address ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size=20>
                        </td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td>
                            <input type="text" name="telefono" value="<?= $user->telefono ?>" <?= ($orden == "Detalles") ? "readonly" : "" ?> size=20>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="orden" value="<?= $orden ?>">
                <input type="submit" name="orden" value="Volver">
            </form>
        </div>
    </div>
</body>

</html>
<?php exit(); ?>