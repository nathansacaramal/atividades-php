<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 10 - Produtos Caros</title>
</head>
<body>

<h1>Produtos acima de R$ 100,00</h1>

<?php

$produtos = [
    'Camiseta' => 50.00,
    'Calça' => 120.00,
    'Tênis' => 250.00,
    'Boné' => 35.00,
    'Jaqueta' => 199.90
];

foreach ($produtos as $produto => $preco) {
    if ($preco > 100) {
        echo "$produto: R$ " . number_format($preco, 2, ',', '.') . "<br>";
    }
}

?>

</body>
</html>
