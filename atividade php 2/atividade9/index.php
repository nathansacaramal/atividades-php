<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 9 - Caixa Eletrônico</title>
</head>
<body>

<h1>Caixa Eletrônico</h1>

<?php

$saldo = 500;
$valorSaque = 200;
$limiteDiario = 1000;

if ($valorSaque <= 0) {
    echo "Valor inválido";
} else if ($valorSaque % 10 != 0) {
    echo "Valor deve ser múltiplo de 10";
} else if ($valorSaque > $limiteDiario) {
    echo "Valor excede o limite diário";
} else if ($valorSaque > $saldo) {
    echo "Saldo insuficiente";
} else {
    $saldo = $saldo - $valorSaque;
    echo "Saque realizado <br>";
    echo "Novo saldo: R$ " . number_format($saldo, 2, ',', '.');
}

?>

</body>
</html>
