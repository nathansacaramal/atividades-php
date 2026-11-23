<?php

require 'conexao.php'; //$conexao

$erros = [];
$nome = '';
$email = '';
$telefone = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $telefone = trim($_POST['telefone']);

    if ($nome == '') {
        $erros[] = 'Informe o nome.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'Informe um e-mail válido.';
    }

    if (strlen($senha) < 6) {
        $erros[] = 'A senha deve ter pelo menos 6 caracteres.';
    }

    $somenteNumeros = preg_replace('/\D/', '', $telefone);
    if (strlen($somenteNumeros) < 10 || strlen($somenteNumeros) > 11) {
        $erros[] = 'Informe um telefone válido com DDD.';
    }

    if (count($erros) == 0) {
        try {
            $sql = "INSERT INTO usuarios (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)";
            $stmt = $conexao->prepare($sql); //passa a conter todos as funções que antes pertenciam a $conexao
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => password_hash($senha, PASSWORD_DEFAULT),
                ':telefone' => $telefone,
            ]);

            // redireciona para não cadastrar de novo ao apertar F5
            header('Location: cadastro.php?sucesso=1');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $erros[] = 'Este e-mail já está cadastrado.';
            } else {
                $erros[] = 'Erro ao salvar: ' . $e->getMessage();
            }
        }
    }
}

$usuarios = $conexao->query("SELECT * FROM usuarios ORDER BY id DESC")->fetchAll();
