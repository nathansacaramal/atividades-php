<?php 

    require 'conexao.php'; // passa a existir aqui dentro a variavel $conexao

    $erro = [];

    $nome_pet = $_POST['nome_pet'];
    $especie = $_POST['especie']; //cao ou gato

    if(empty($nome_pet) || strlen($nome_pet) >= 2 || strlen($nome_pet) <= 40) {
        $erro[] = "Nome do pet é obrigatorio e deve possuir entre 2 e 40 caracteres";
    }

    $sql = "INSERT INTO pet (nome, especie) values (:nome, :especie)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
                ':nome' => $nome_pet,
                ':especie' => $especie
            ]);


?>