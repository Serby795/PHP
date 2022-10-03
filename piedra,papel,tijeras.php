<!-- Marius Bogdan Serban -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra, papel o tijeras</title>
    <style type="text/css">
       
       .titulo{
            font-size: 40px;
        
        }
        .jugadores {
            display: flex;
            gap: 10px;
        }

        .jugador {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px;
            font-size: 25px;
        }
        .emoji {
            font-size: 50px;
        }
        h3 {
            margin: 0;
        }

        .ganador{
            font-size: 30px;
            padding: 20px;
        }

    </style>
</head>

<body>
    <?php

    define('PIEDRA1',  "&#x1F91C;");
    define('PIEDRA2',  "&#x1F91B;");
    define('TIJERAS',  "&#x1F596;");
    define('PAPEL',    "&#x1F91A;");

    function jugada1()
    {
        $num = random_int(1, 3);
        $jugador1 = "";
        if ($num == 1) {
            $jugador1 = "piedra";
        } else if ($num == 2) {
            $jugador1 = "papel";
        } else if ($num == 3) {
            $jugador1 = "tijeras";
        }
        return $jugador1;
    }

    function jugada2()
    {
        $num = random_int(2, 4);
        $jugador2 = "";
        if ($num == 2) {
            $jugador2 = "papel";
        } else if ($num == 3) {
            $jugador2 = "tijeras";
        } else if ($num == 4) {
            $jugador2 = "piedra";
        }
        return $jugador2;
    }

    function ganador($jugador1, $jugador2)
    {
        if ($jugador1 == "papel" && $jugador2 == "piedra" || $jugador1 == "tijeras" && $jugador2 == "papel" || $jugador1 == "piedra" && $jugador2 == "tijeras") {
            return "\nGana el Jugador1";
        } else if ($jugador2 == "papel" && $jugador1 == "piedra" || $jugador2 == "tijeras" && $jugador1 == "papel" || $jugador2 == "piedra" && $jugador1 == "tijeras") {
            return "\nGana el Jugador2";
        } else {
            return "\nEmpate";
        }
    }

    $jugador1 = jugada1();
    $jugador2 = jugada2();

    function emoji1($jugador1)
    {

        if ($jugador1 == "papel") {
            $emoji1 = PAPEL;
        } else if ($jugador1 == "tijeras") {
            $emoji1 = TIJERAS;
        } else if ($jugador1 == "piedra") {
            $emoji1 = PIEDRA1;
        }

        return $emoji1;
    }

    function emoji2($jugador2)
    {
        if ($jugador2 == "papel") {
            $emoji2 = PAPEL;
        } else if ($jugador2 == "tijeras") {
            $emoji2 = TIJERAS;
        } else if ($jugador2 == "piedra") {
            $emoji2 = PIEDRA2;
        }
        return $emoji2;
    }



    $resultado = ganador($jugador1, $jugador2);
    $emoji1 = emoji1($jugador1);
    $emoji2 = emoji2($jugador2);

    echo "
    <h1 class = 'titulo'>¡Piedra, papel, tijeras!</h1>
    <section>
        <article class = 'juego'>
            <div class = 'jugadores'>
                <div class = 'jugador'>
                    <h3>Jugador1</h3>
                    <div class = 'emoji'>$emoji1</div>
                </div>
                <div class = 'jugador'>
                    <h3>Jugador2</h3>
                    <div class = 'emoji'>$emoji2</div>
                </div>
            </div>
            <div class = 'ganador'>
                $resultado    
            </div>
        <article>
    </section>
    "
    ?>



</body>

</html>