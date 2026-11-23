<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 8 - Conversor de Moedas</title>
</head>
<body>

<h1>Conversor de Moedas</h1>

<?php

$valorReais = 250;
$moeda = "USD";

if ($valorReais <= 0) {
    echo "Valor inválido";
} else {
    switch ($moeda) {
        case "USD":
            $convertido = $valorReais / 5.00;
            echo "US$ " . number_format($convertido, 2, ',', '.');
            break;
        case "EUR":
            $convertido = $valorReais / 5.50;
            echo "€ " . number_format($convertido, 2, ',', '.');
            break;
        case "GBP":
            $convertido = $valorReais / 6.50;
            echo "£ " . number_format($convertido, 2, ',', '.');
            break;
        default:
            echo "Moeda inválida";
    }
}

?>

</body>
</html>
