<?php require 'processa.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Atividade PHP 3</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="navbar">
    <a href="index.php" class="logo">Atividade<span>PHP</span></a>
    <nav>
        <a href="index.php">Home</a>
        <a href="cadastro.php" class="ativo">Cadastro</a>
    </nav>
</header>

<main class="container">

    <section class="painel">
        <h1>Cadastro de usuário</h1>
        <p class="subtitulo">Preencha os campos abaixo para criar um novo cadastro.</p>

        <?php if (isset($_GET['sucesso'])) { ?>
            <div class="alerta alerta-sucesso">Usuário cadastrado com sucesso!</div>
        <?php } ?>

        <?php if (count($erros) > 0) { ?>
            <div class="alerta alerta-erro">
                <?php foreach ($erros as $erro) { ?>
                    <div><?= htmlspecialchars($erro) ?></div>
                <?php } ?>
            </div>
        <?php } ?>

        <form action="cadastro.php" method="POST" class="formulario">
            <div class="campo campo-inteiro">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome completo" value="<?= htmlspecialchars($nome) ?>" required>
            </div>

            <div class="campo">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="voce@exemplo.com" value="<?= htmlspecialchars($email) ?>" required>
            </div>

            <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(11) 91234-5678" value="<?= htmlspecialchars($telefone) ?>" maxlength="15" required>
            </div>

            <div class="campo campo-inteiro">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Mínimo de 6 caracteres" minlength="6" required>
            </div>

            <div class="campo-inteiro">
                <button type="submit" class="botao">Cadastrar</button>
            </div>
        </form>
    </section>

    <section class="painel">
        <div class="painel-topo">
            <h2>Usuários cadastrados</h2>
            <span class="contador"><?= count($usuarios) ?> registro(s)</span>
        </div>

        <?php if (count($usuarios) == 0) { ?>
            <p class="vazio">Nenhum usuário cadastrado ainda.</p>
        <?php } else { ?>
            <div class="tabela-wrapper">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Cadastrado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <tr>
                                <td><?= $usuario['id'] ?></td>
                                <td><?= htmlspecialchars($usuario['nome']) ?></td>
                                <td><?= htmlspecialchars($usuario['email']) ?></td>
                                <td><?= htmlspecialchars($usuario['telefone']) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($usuario['criado_em'])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </section>

</main>

<footer class="rodape">
    Atividade PHP 3 - Cadastro com MySQL
</footer>

<script>
    // máscara do telefone
    document.getElementById('telefone').addEventListener('input', function () {
        let v = this.value.replace(/\D/g, '').slice(0, 11);

        if (v.length > 10) {
            v = v.replace(/^(\d{2})(\d{5})(\d{0,4})$/, '($1) $2-$3');
        } else if (v.length > 6) {
            v = v.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
        } else if (v.length > 2) {
            v = v.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
        } else if (v.length > 0) {
            v = v.replace(/^(\d{0,2})$/, '($1');
        }

        this.value = v;
    });
</script>

</body>
</html>
