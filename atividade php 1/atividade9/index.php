<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 9 - Validação de Senha</title>
</head>
<body>

<h1>Validação de Senha</h1>

<?php

$senhaCadastrada = "12345";
$senhaTentativa = "1234";

if ($senhaTentativa === $senhaCadastrada) {
    echo "Acesso permitido";
} else {
    echo "Senha incorreta";
}

?>

</body>
</html>
