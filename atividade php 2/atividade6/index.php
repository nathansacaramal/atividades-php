<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 6 - Somando Pares e Ímpares</title>
</head>
<body>

<h1>Somando Pares e Ímpares</h1>

<?php

$numeros = range(1, 20);

$somaPares = 0;
$somaImpares = 0;
$multiplosDe3 = 0;

foreach ($numeros as $numero) {
    if ($numero % 2 == 0) {
        $somaPares = $somaPares + $numero;
    } else {
        $somaImpares = $somaImpares + $numero;
    }

    if ($numero % 3 == 0) {
        $multiplosDe3++;
    }
}

echo "Soma dos pares: $somaPares <br>";
echo "Soma dos ímpares: $somaImpares <br>";
echo "Múltiplos de 3: $multiplosDe3";

?>

</body>
</html>
