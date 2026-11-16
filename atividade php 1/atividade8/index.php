<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 8 - Calculadora Simples</title>
</head>
<body>

<h1>Calculadora Simples</h1>

<?php

$num1 = 10;
$num2 = 5;
$operador = '+';

switch ($operador) {
    case '+':
        $resultado = $num1 + $num2;
        echo "$num1 + $num2 = $resultado";
        break;
    case '-':
        $resultado = $num1 - $num2;
        echo "$num1 - $num2 = $resultado";
        break;
    case '*':
        $resultado = $num1 * $num2;
        echo "$num1 * $num2 = $resultado";
        break;
    case '/':
        if ($num2 == 0) {
            echo "Erro: não é possível dividir por zero!";
        } else {
            $resultado = $num1 / $num2;
            echo "$num1 / $num2 = $resultado";
        }
        break;
    default:
        echo "Operador inválido";
}

?>

</body>
</html>
