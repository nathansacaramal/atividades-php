<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Atividade PHP 3</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="navbar">
    <a href="index.php" class="logo">Atividade<span>PHP</span></a>
    <nav>
        <a href="index.php" class="ativo">Home</a>
        <a href="cadastro.php">Cadastro</a>
    </nav>
</header>

<main class="container">

    <section class="hero">
        <h1>Bem-vindo ao sistema de cadastro</h1>
        <p>Projeto em PHP com MySQL: cadastre usuários e veja a lista atualizada logo abaixo do formulário.</p>
        <a href="cadastro.php" class="botao">Ir para o cadastro</a>
    </section>

    <section class="cards">
        <a href="cadastro.php" class="card">
            <h2>Cadastro de usuários</h2>
            <p>Preencha nome, e-mail, senha e telefone. Os dados são salvos no banco e listados em uma tabela.</p>
            <span class="card-link">Acessar →</span>
        </a>

        <div class="card card-info">
            <h2>Banco de dados</h2>
            <p>A conexão fica no arquivo <code>conexao.php</code>, usando PDO e consultas preparadas.</p>
        </div>
    </section>

</main>

<footer class="rodape">
    Atividade PHP 3 - Cadastro com MySQL
</footer>

</body>
</html>
