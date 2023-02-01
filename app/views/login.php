<?php

if ($_SESSION['intentos'] >= 3) {
    $error = "Ha superado el límite de intentos, cierre el navegador.";
    include_once "app/views/error.php";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Log-in</title>
</head>

<body>
    <div class="container">
        <h1>LOG IN</h1>
        <form method="POST">
            <div class="d-inline">
                <label>
                    User: <input type="text" name="user">
                </label>
                <label>
                    Password: <input type="password" name="password">
                </label>
                <input type="submit" value="Log-In" class="btn btn-outline-primary"></input>
            </div>
        </form>
    </div>
</body>

</html>