<?php require 'processardados.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 2 - Inscrição em Corrida</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="topo">
    <span class="topo-titulo">Questão 2 <small>Inscrição em Corrida</small></span>
    <a href="../index.php" class="botao-voltar">&larr; Voltar para a Home</a>
</header>

<main class="container">

    <section class="painel">
        <h1>Inscrição em Corrida</h1>
        <p class="subtitulo">Preencha seus dados para garantir a vaga na corrida de rua.</p>

        <?php if (isset($_GET['sucesso'])) { ?>
            <div class="alerta alerta-sucesso">Inscrição realizada com sucesso!</div>
        <?php } ?>

        <?php if (count($erros) > 0) { ?>
            <div class="alerta alerta-erro">
                <strong>Corrija os campos abaixo:</strong>
                <ul>
                    <?php foreach ($erros as $erro) { ?>
                        <li><?= $erro ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <form action="inscricaocorrida.php" method="post" class="formulario" novalidate>
            <h2 class="formulario-secao">Dados do atleta</h2>

            <div class="campo campo-inteiro">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome" placeholder="Nome e sobrenome" value="<?= htmlspecialchars($nome) ?>">
            </div>

            <div class="campo">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" inputmode="numeric" placeholder="000.000.000-00" maxlength="14" value="<?= htmlspecialchars($cpf) ?>">
            </div>

            <div class="campo">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($data_nascimento) ?>">
            </div>

            <div class="campo">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="voce@exemplo.com" value="<?= htmlspecialchars($email) ?>">
            </div>

            <div class="campo">
                <label for="confirmar_email">Confirmar e-mail</label>
                <input type="email" id="confirmar_email" name="confirmar_email" placeholder="Digite o e-mail novamente" value="<?= htmlspecialchars($confirmar_email) ?>">
            </div>

            <h2 class="formulario-secao">Dados da prova</h2>

            <div class="campo campo-inteiro">
                <span class="rotulo">Percurso</span>
                <div class="opcoes">
                    <?php foreach ($percursos as $opcao => $valor) { ?>
                        <label class="opcao opcao-card">
                            <input type="radio" name="percurso" value="<?= $opcao ?>" <?php if ($percurso == $opcao) { echo 'checked'; } ?>>
                            <span>
                                <strong><?= $opcao ?></strong>
                                R$ <?= number_format($valor, 2, ',', '.') ?>
                            </span>
                        </label>
                    <?php } ?>
                </div>
            </div>

            <div class="campo campo-inteiro">
                <span class="rotulo">Tamanho da camiseta</span>
                <div class="opcoes">
                    <?php foreach ($camisetas as $opcao) { ?>
                        <label class="opcao">
                            <input type="radio" name="camiseta" value="<?= $opcao ?>" <?php if ($camiseta == $opcao) { echo 'checked'; } ?>>
                            <span><?= $opcao ?></span>
                        </label>
                    <?php } ?>
                </div>
            </div>

            <div class="campo-inteiro">
                <label class="checkbox">
                    <input type="checkbox" name="termo" value="1" <?php if ($termo) { echo 'checked'; } ?>>
                    <span>Declaro estar em boas condições de saúde e aceito o termo de responsabilidade da corrida.</span>
                </label>
            </div>

            <div class="campo-inteiro">
                <button type="submit" class="botao">Fazer inscrição</button>
            </div>
        </form>
    </section>

    <section class="painel">
        <div class="painel-topo">
            <h2>Atletas inscritos</h2>
            <span class="contador"><?= count($inscricoes) ?> registro(s)</span>
        </div>

        <?php if (count($inscricoes) == 0) { ?>
            <p class="vazio">Nenhuma inscrição realizada ainda.</p>
        <?php } else { ?>
            <div class="tabela-wrapper">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Nascimento</th>
                            <th>Idade</th>
                            <th>E-mail</th>
                            <th>Percurso</th>
                            <th>Camiseta</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inscricoes as $inscricao) { ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($inscricao['nome']) ?></strong></td>
                                <td><?= $inscricao['cpf'] ?></td>
                                <td><?= date('d/m/Y', strtotime($inscricao['data_nascimento'])) ?></td>
                                <td><?= $inscricao['idade'] ?> anos</td>
                                <td><?= htmlspecialchars($inscricao['email']) ?></td>
                                <td><span class="tag"><?= $inscricao['percurso'] ?></span></td>
                                <td><?= $inscricao['camiseta'] ?></td>
                                <td><strong>R$ <?= number_format($inscricao['valor'], 2, ',', '.') ?></strong></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </section>

</main>

<script>
    // máscara do CPF
    document.getElementById('cpf').addEventListener('input', function () {
        let v = this.value.replace(/\D/g, '').slice(0, 11);

        v = v.replace(/^(\d{3})(\d)/, '$1.$2');
        v = v.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
        v = v.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');

        this.value = v;
    });
</script>

</body>
</html>
