<?php

$servidor = 'localhost';
$usuarioBanco = 'root';
$senhaBanco = 'VoucherDev@2024';
$nomeBanco = 'atividade_php3';

try {
    $conexao = new PDO("mysql:host=$servidor;
        dbname=$nomeBanco;
        charset=utf8mb4", 
        $usuarioBanco, 
        $senhaBanco
    );

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
