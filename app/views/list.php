<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body class="container ">
    <div class="container bg-info">


        <form class="bg-info">
            <button type="submit" name="orden" value="Nuevo"> Cliente Nuevo </button><br>
        </form>

        <br>

        <table class="table table-dark table-hover table-sm">
            <tr>
                <th><a href="?orden=Ordenar&tipoOrden=id">ID</a></th>
                <th><a href="?orden=Ordenar&tipoOrden=first_name">first_name</a></th>
                <th><a href="?orden=Ordenar&tipoOrden=email">email</a></th>
                <th><a href="?orden=Ordenar&tipoOrden=gender">gender</a></th>
                <th><a href="?orden=Ordenar&tipoOrden=ip_address">ip_address</a></th>
                <th><a href="?orden=Ordenar&tipoOrden=telefono">teléfono</a></th>
                <th colspan="3">Acciones</th>
            </tr>
            <?php foreach ($tvalores as $valor) : ?>
                <tr>
                    <td><?= $valor->id ?> </td>
                    <td><?= $valor->first_name ?> </td>
                    <td><?= $valor->email ?> </td>
                    <td><?= $valor->gender ?> </td>
                    <td><?= $valor->ip_address ?> </td>
                    <td><?= $valor->telefono ?> </td>
                    <td><a class="btn btn-primary" href="#" onclick="confirmarBorrar('<?= $valor->first_name ?>',<?= $valor->id ?>);">Borrar</a></td>
                    <td><a class="btn btn-primary" href="?orden=Modificar&id=<?= $valor->id ?>">Modificar</a></td>
                    <td><a class="btn btn-primary" href="?orden=Detalles&id=<?= $valor->id ?>">Detalles</a></td>

                <tr>
                <?php endforeach ?>
        </table>

        <form>
            <br>
            <button class="btn btn-primary" type="submit" name="nav" value="Primero">
                << </button>
                    <button class="btn btn-primary" type="submit" name="nav" value="Anterior">
                        < </button>
                            <button class="btn btn-primary" type="submit" name="nav" value="Siguiente"> > </button>
                            <button class="btn btn-primary" type="submit" name="nav" value="Ultimo"> >> </button>
        </form>
    </div>
</body>

</html>