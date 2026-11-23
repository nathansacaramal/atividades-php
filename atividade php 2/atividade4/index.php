<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 4 - Conta de Energia</title>
</head>
<body>

<h1>Conta de Energia</h1>

<?php

$consumo = 80;
$taxa = 10.00;

if ($consumo < 0) {
    echo "Consumo inválido";
} else {
    if ($consumo <= 100) {
        $valorKwh = 0.50;
    } else if ($consumo <= 200) {
        $valorKwh = 0.70;
    } else {
        $valorKwh = 0.90;
    }

    $total = $consumo * $valorKwh + $taxa;

    echo "Consumo: $consumo kWh <br>";
    echo "Total a pagar: R$ " . number_format($total, 2, ',', '.');
}

?>

</body>
</html>
