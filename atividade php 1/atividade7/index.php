<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 7 - Carrinho de Compras</title>
</head>
<body>

<h1>Carrinho de Compras</h1>

<?php

$carrinho = [
    'Camiseta' => 50.00,
    'Calça' => 120.00,
    'Tênis' => 250.00
];

$total = 0;

foreach ($carrinho as $produto => $preco) {
    echo "$produto: R$ " . number_format($preco, 2, ',', '.') . "<br>";
    $total = $total + $preco;
}

echo "<br><strong>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</strong>";

?>

</body>
</html>
