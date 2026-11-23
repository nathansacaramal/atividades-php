<?php

require 'conexao.php';

// percurso => valor da inscrição
$percursos = ['5 km' => 60.00, '10 km' => 80.00, '21 km' => 120.00];
$camisetas = ['P', 'M', 'G', 'GG'];

$erros = [];
$nome = '';
$cpf = '';
$data_nascimento = '';
$email = '';
$confirmar_email = '';
$percurso = '';
$camiseta = '';
$termo = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = preg_replace('/\s+/', ' ', trim($_POST['nome'])); // tira espaços repetidos
    $cpf = trim($_POST['cpf']);
    $data_nascimento = $_POST['data_nascimento'];
    $email = trim($_POST['email']);
    $confirmar_email = trim($_POST['confirmar_email']);

    // radio e checkbox não são enviados quando ninguém marca nada
    $percurso = $_POST['percurso'] ?? '';
    $camiseta = $_POST['camiseta'] ?? '';
    $termo = isset($_POST['termo']);

    $partesNome = explode(' ', $nome);
    if ($nome == '') {
        $erros[] = 'O nome completo é obrigatório.';
    } else if (count($partesNome) < 2) {
        $erros[] = 'Informe o nome e o sobrenome.';
    }

    $cpfNumeros = str_replace(['.', '-', ' '], '', $cpf);
    if ($cpf == '') {
        $erros[] = 'O CPF é obrigatório.';
    } else if (!preg_match('/^\d{11}$/', $cpfNumeros)) {
        $erros[] = 'O CPF deve ter 11 dígitos numéricos.';
    }

    $nascimento = DateTime::createFromFormat('Y-m-d', $data_nascimento);
    $hoje = new DateTime('today');
    if ($data_nascimento == '') {
        $erros[] = 'A data de nascimento é obrigatória.';
    } else if (!$nascimento || $nascimento->format('Y-m-d') != $data_nascimento) {
        $erros[] = 'Informe uma data de nascimento válida.';
    } else if ($nascimento > $hoje) {
        $erros[] = 'A data de nascimento não pode ser no futuro.';
    } else if ($nascimento->diff($hoje)->y < 16) {
        $erros[] = 'A idade mínima para participar é de 16 anos.';
    }

    if ($email == '') {
        $erros[] = 'O e-mail é obrigatório.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'Informe um e-mail válido.';
    }

    if ($confirmar_email == '') {
        $erros[] = 'Confirme o seu e-mail.';
    } else if ($email != $confirmar_email) {
        $erros[] = 'Os e-mails informados não são iguais.';
    }

    if (!array_key_exists($percurso, $percursos)) {
        $erros[] = 'Escolha um percurso.';
    }

    if (!in_array($camiseta, $camisetas)) {
        $erros[] = 'Escolha o tamanho da camiseta.';
    }

    if (!$termo) {
        $erros[] = 'É obrigatório aceitar o termo de responsabilidade.';
    }

    if (count($erros) == 0) {
        $sql = "INSERT INTO inscricao (nome, cpf, data_nascimento, email, percurso, camiseta, valor)
                VALUES (:nome, :cpf, :data_nascimento, :email, :percurso, :camiseta, :valor)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpfNumeros,
            ':data_nascimento' => $data_nascimento,
            ':email' => $email,
            ':percurso' => $percurso,
            ':camiseta' => $camiseta,
            ':valor' => $percursos[$percurso],
        ]);

        // redireciona para não cadastrar de novo ao apertar F5
        header('Location: inscricaocorrida.php?sucesso=1');
        exit;
    }
}

$inscricoes = $conexao->query("SELECT * FROM inscricao ORDER BY id DESC")->fetchAll();

// calcula a idade e formata o CPF de cada atleta para mostrar na tabela
$hoje = new DateTime('today');
foreach ($inscricoes as $i => $inscricao) {
    $nascimento = new DateTime($inscricao['data_nascimento']);
    $inscricoes[$i]['idade'] = $nascimento->diff($hoje)->y;
    $inscricoes[$i]['cpf'] = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $inscricao['cpf']);
}
