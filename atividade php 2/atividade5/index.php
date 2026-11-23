<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 5 - Temperaturas da Semana</title>
</head>
<body>

<h1>Temperaturas da Semana</h1>

<?php

$temperaturas = ['Segunda' => 28, 'Terça' => 31, 'Quarta' => 25,
                 'Quinta' => 33, 'Sexta' => 29, 'Sábado' => 30,
                 'Domingo' => 26];

$soma = 0;
$diasQuentes = 0;
$diaMaisQuente = '';
$maiorTemperatura = null;

foreach ($temperaturas as $dia => $temperatura) {
    echo "$dia: $temperatura °C";

    if ($temperatura >= 30) {
        echo " (dia quente)";
        $diasQuentes++;
    }

    echo "<br>";

    $soma = $soma + $temperatura;

    if ($maiorTemperatura === null || $temperatura > $maiorTemperatura) {
        $maiorTemperatura = $temperatura;
        $diaMaisQuente = $dia;
    }
}

$media = $soma / count($temperaturas);

echo "<br>Média: " . number_format($media, 2, ',', '.') . " °C <br>";
echo "Dias quentes: $diasQuentes <br>";
echo "Dia mais quente: $diaMaisQuente ($maiorTemperatura °C)";

?>

</body>
</html>
