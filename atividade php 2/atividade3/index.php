<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 3 - Meses do Ano</title>
</head>
<body>

<h1>Meses do Ano</h1>

<?php

$mes = 1;

// Primeiro switch: nome do mês
switch ($mes) {
    case 1:
        echo "Janeiro";
        break;
    case 2:
        echo "Fevereiro";
        break;
    case 3:
        echo "Março";
        break;
    case 4:
        echo "Abril";
        break;
    case 5:
        echo "Maio";
        break;
    case 6:
        echo "Junho";
        break;
    case 7:
        echo "Julho";
        break;
    case 8:
        echo "Agosto";
        break;
    case 9:
        echo "Setembro";
        break;
    case 10:
        echo "Outubro";
        break;
    case 11:
        echo "Novembro";
        break;
    case 12:
        echo "Dezembro";
        break;
    default:
        echo "Mês inválido";
}

echo "<br>";

// Segundo switch: quantidade de dias (cases agrupados)
switch ($mes) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        echo "31 dias";
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        echo "30 dias";
        break;
    case 2:
        echo "28 dias";
        break;
}

?>

</body>
</html>
