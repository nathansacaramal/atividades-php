<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 1 - Classificação de Triângulos</title>
</head>
<body>

<h1>Classificação de Triângulos</h1>

<?php

$a = 1;
$b = 2;
$c = 10;

if (!($a < $b + $c && $b < $a + $c && $c < $a + $b)) {
    echo "Não forma um triângulo";
} else if ($a == $b && $b == $c) {
    echo "Equilátero";
} else if ($a == $b || $b == $c || $a == $c) {
    echo "Isósceles";
} else {
    echo "Escaleno";
}

?>

</body>
</html>
