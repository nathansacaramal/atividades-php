<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 10 - Lista de Tarefas</title>
</head>
<body>

<h1>Lista de Tarefas</h1>

<?php

$tarefas = [
    ['titulo' => 'Estudar PHP',      'concluida' => true],
    ['titulo' => 'Lavar a louça',    'concluida' => false],
    ['titulo' => 'Pagar as contas',  'concluida' => true],
    ['titulo' => 'Ler um livro',     'concluida' => false],
    ['titulo' => 'Fazer exercícios', 'concluida' => false],
];

$concluidas = 0;

echo "<strong>Tarefas pendentes:</strong><br>";

foreach ($tarefas as $tarefa) {
    if ($tarefa['concluida'] == false) {
        echo "- " . $tarefa['titulo'] . "<br>";
    } else {
        $concluidas++;
    }
}

$total = count($tarefas);
$percentual = ($concluidas / $total) * 100;

echo "<br>Concluídas: $concluidas de $total (" . round($percentual) . "%)";

?>

</body>
</html>
