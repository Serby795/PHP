<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinco Dados</title>
</head>
<body>
    
<?php

$jugador1 = array(6); 
$jugador2 = array(6);
$suma1=0;
$suma2=0;
$max1=0;
$min1=6;
$max2=0;
$min2=6;

echo "<h1> Jugador1 </h1>";

for ($i = 0; $i < 6; $i++){
    $jugador1[$i] = random_int(1,6);
    $suma1 += $jugador1[$i];
    
    $dado;
    if ($jugador1[$i] > $max1){
        $max1 = $jugador1[$i];
    } else if ($jugador1[$i] < $min1){
        $min1 = $jugador1[$i];
    }
    
    switch ($jugador1[$i]){
        case $jugador1[$i] == 1:
            $dado = "&#9856";
            break;
        case $jugador1[$i] == 2:
            $dado = "&#9857;";
            break;
        case $jugador1[$i] == 3:
            $dado = "&#9858;";
            break;
        case $jugador1[$i] == 4:
            $dado = "&#9859;";
            break;
        case $jugador1[$i] == 5:
            $dado = "&#9860;";
            break;
        case $jugador1[$i] == 6:
            $dado = "&#9861;";
            break;
    }
    echo "<span style = 'font-size: 50px';>" .$dado . "</span>";
     
}  

$suma1 = $suma1 - $max1 - $min1;
echo "<br>" . "total: " . $suma1 . "<br>";
echo "minimo: " . $min1 . "<br>";
echo "maximo: " . $max1 . "<br>";


echo "<h1> Jugador2 </h1>";

for ($i = 0; $i < 6; $i++){
    $jugador2[$i] = random_int(1,6);
    $suma2 += $jugador2[$i];
    $dado;
    
    if($jugador2[$i] > $max2){
    $max2 = $jugador2[$i];
    } else if ($jugador2[$i] < $min2){
    $min2 = $jugador2[$i];
    }
    
    switch ($jugador2[$i]){
        case $jugador2[$i] == 1:
            $dado = "&#9856";
            break;
        case $jugador2[$i] == 2:
            $dado = "&#9857;";
            break;
        case $jugador2[$i] == 3:
            $dado = "&#9858;";
            break;
        case $jugador2[$i] == 4:
            $dado = "&#9859;";
            break;
        case $jugador2[$i] == 5:
            $dado = "&#9860;";
            break;
        case $jugador2[$i] == 6:
            $dado = "&#9861;";
            break;
    }
    echo "<span style = 'font-size: 50px';>" .$dado . "</span>";

}

$suma2 = $suma2 - $max2 - $min2;
echo "<br>". "total: " . $suma2 . "<br>";
echo "minimo: " . $min2 . "<br>";
echo "maximo: " . $max2 . "<br>";
echo "<br><hr>";

if ($suma1 === $suma2){
    echo "<span style = 'font-size: 30px';>Empate</span>";
} else if ($suma1 > $suma2){
    echo "<span style = 'font-size: 30px';>Gana el jugador 1</span>";
} else if ($suma1 < $suma2){
    echo "<span style = 'font-size: 30px';>Gana el jugador 2</span>";
}


?>
</body>
</html>
