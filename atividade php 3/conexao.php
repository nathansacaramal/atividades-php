<?php

$servidor = 'localhost';
$usuarioBanco = 'root';
$senhaBanco = 'VoucherDev@2024';
$nomeBanco = 'atividade_php3';

try {
    $conexao = new PDO("mysql:host=$servidor;charset=utf8mb4", $usuarioBanco, $senhaBanco);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // cria o banco e a tabela se ainda não existirem
    $conexao->exec("CREATE DATABASE IF NOT EXISTS $nomeBanco");
    $conexao->exec("USE $nomeBanco");
    $conexao->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL,
        telefone VARCHAR(20) NOT NULL,
        criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
