<?php

require 'conexao.php'; // passa a existir aqui dentro a variavel $conexao

$especies = ['Cão', 'Gato', 'Ave', 'Roedor', 'Outro'];
$sexos = ['Macho', 'Fêmea'];

$erros = [];
$nome_pet = '';
$especie = '';
$idade = '';
$peso = '';
$sexo = '';
$nome_tutor = '';
$telefone_tutor = '';
$email_tutor = '';
$vacinado = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_pet = trim($_POST['nome_pet']);
    $especie = $_POST['especie'];
    $idade = trim($_POST['idade']);
    $peso = str_replace(',', '.', trim($_POST['peso']));
    $nome_tutor = trim($_POST['nome_tutor']);
    $telefone_tutor = trim($_POST['telefone_tutor']);
    $email_tutor = trim($_POST['email_tutor']);

    // radio e checkbox não são enviados quando ninguém marca nada
    $sexo = $_POST['sexo'] ?? '';
    $vacinado = isset($_POST['vacinado']);

    if ($nome_pet == '') {
        $erros[] = 'O nome do pet é obrigatório.';
    } else if (mb_strlen($nome_pet) < 2 || mb_strlen($nome_pet) > 40) {
        $erros[] = 'O nome do pet deve ter entre 2 e 40 caracteres.';
    }

    if (!in_array($especie, $especies)) {
        $erros[] = 'Selecione uma espécie da lista.';
    }

    if ($idade == '') {
        $erros[] = 'A idade é obrigatória.';
    } else if (filter_var($idade, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 30]]) === false) {
        $erros[] = 'A idade deve ser um número inteiro entre 0 e 30.';
    }

    if ($peso == '') {
        $erros[] = 'O peso é obrigatório.';
    } else if (!is_numeric($peso) || $peso <= 0) {
        $erros[] = 'O peso deve ser um número maior que 0.';
    }

    if (!in_array($sexo, $sexos)) {
        $erros[] = 'Selecione o sexo do pet.';
    }

    if ($nome_tutor == '') {
        $erros[] = 'O nome do tutor é obrigatório.';
    } else if (!preg_match('/^[\p{L} ]+$/u', $nome_tutor)) {
        $erros[] = 'O nome do tutor deve ter apenas letras e espaços.';
    }

    $telefoneNumeros = str_replace(['(', ')', '-', ' '], '', $telefone_tutor);
    if ($telefone_tutor == '') {
        $erros[] = 'O telefone do tutor é obrigatório.';
    } else if (!preg_match('/^\d{10,11}$/', $telefoneNumeros)) {
        $erros[] = 'O telefone do tutor deve ter 10 ou 11 dígitos.';
    }

    if ($email_tutor == '') {
        $erros[] = 'O e-mail do tutor é obrigatório.';
    } else if (!filter_var($email_tutor, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'Informe um e-mail válido para o tutor.';
    }

    if (count($erros) == 0) {
        $sql = "INSERT INTO pet (nome, especie, idade, peso, sexo, nome_tutor, telefone_tutor, email_tutor, vacinado)
                VALUES (:nome, :especie, :idade, :peso, :sexo, :nome_tutor, :telefone_tutor, :email_tutor, :vacinado)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':nome' => $nome_pet,
            ':especie' => $especie,
            ':idade' => $idade,
            ':peso' => $peso,
            ':sexo' => $sexo,
            ':nome_tutor' => $nome_tutor,
            ':telefone_tutor' => $telefone_tutor,
            ':email_tutor' => $email_tutor,
            ':vacinado' => $vacinado ? 1 : 0,
        ]);

        // redireciona para não cadastrar de novo ao apertar F5
        header('Location: cadastropet.php?sucesso=1');
        exit;
    }
}

$pets = $conexao->query("SELECT * FROM pet ORDER BY id DESC")->fetchAll();
