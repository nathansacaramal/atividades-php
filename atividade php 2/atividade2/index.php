<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 2 - Ano Bissexto</title>
</head>
<body>

<h1>Ano Bissexto</h1>

<?php

$ano = 2024;

if (($ano % 4 == 0 && $ano % 100 != 0) || $ano % 400 == 0) {
    echo "$ano é bissexto";
} else {
    echo "$ano não é bissexto"; 
}

?>

</body>
</html>
