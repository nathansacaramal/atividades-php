<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 6 - Tabuada do 5</title>
</head>
<body>

<h1>Tabuada do 5</h1>

<?php

$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

foreach ($numeros as $numero) {
    $resultado = 5 * $numero;
    echo "5 x $numero = $resultado <br>";
}

?>

</body>
</html>
