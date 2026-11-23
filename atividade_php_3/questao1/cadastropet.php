<?php require 'processardados.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 1 - Cadastro de Pet</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="topo">
    <span class="topo-titulo">Questão 1 <small>Cadastro de Pet</small></span>
    <a href="../index.php" class="botao-voltar">&larr; Voltar para a Home</a>
</header>

<main class="container">

    <section class="painel">
        <h1>Cadastro de Pet</h1>
        <p class="subtitulo">Preencha os dados do animal atendido e do seu tutor.</p>

        <?php if (isset($_GET['sucesso'])) { ?>
            <div class="alerta alerta-sucesso">Pet cadastrado com sucesso!</div>
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

        <form action="cadastropet.php" method="post" class="formulario" novalidate>
            <h2 class="formulario-secao">Dados do pet</h2>

            <div class="campo">
                <label for="nome_pet">Nome do pet</label>
                <input type="text" id="nome_pet" name="nome_pet" placeholder="Ex: Thor" value="<?= htmlspecialchars($nome_pet) ?>">
            </div>

            <div class="campo">
                <label for="especie">Espécie</label>
                <select id="especie" name="especie">
                    <option value="">Selecione</option>
                    <?php foreach ($especies as $opcao) { ?>
                        <option value="<?= $opcao ?>" <?php if ($especie == $opcao) { echo 'selected'; } ?>><?= $opcao ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="campo">
                <label for="idade">Idade (anos)</label>
                <input type="number" id="idade" name="idade" placeholder="Ex: 3" value="<?= htmlspecialchars($idade) ?>">
            </div>

            <div class="campo">
                <label for="peso">Peso (kg)</label>
                <input type="text" id="peso" name="peso" inputmode="decimal" placeholder="Ex: 4,5" value="<?= htmlspecialchars($peso) ?>">
            </div>

            <div class="campo campo-inteiro">
                <span class="rotulo">Sexo</span>
                <div class="opcoes">
                    <?php foreach ($sexos as $opcao) { ?>
                        <label class="opcao">
                            <input type="radio" name="sexo" value="<?= $opcao ?>" <?php if ($sexo == $opcao) { echo 'checked'; } ?>>
                            <span><?= $opcao ?></span>
                        </label>
                    <?php } ?>
                </div>
            </div>

            <h2 class="formulario-secao">Dados do tutor</h2>

            <div class="campo campo-inteiro">
                <label for="nome_tutor">Nome do tutor</label>
                <input type="text" id="nome_tutor" name="nome_tutor" placeholder="Nome completo" value="<?= htmlspecialchars($nome_tutor) ?>">
            </div>

            <div class="campo">
                <label for="telefone_tutor">Telefone do tutor</label>
                <input type="tel" id="telefone_tutor" name="telefone_tutor" placeholder="(11) 91234-5678" maxlength="15" value="<?= htmlspecialchars($telefone_tutor) ?>">
            </div>

            <div class="campo">
                <label for="email_tutor">E-mail do tutor</label>
                <input type="email" id="email_tutor" name="email_tutor" placeholder="tutor@exemplo.com" value="<?= htmlspecialchars($email_tutor) ?>">
            </div>

            <div class="campo-inteiro">
                <label class="checkbox">
                    <input type="checkbox" name="vacinado" value="1" <?php if ($vacinado) { echo 'checked'; } ?>>
                    <span>O pet está vacinado</span>
                </label>
            </div>

            <div class="campo-inteiro">
                <button type="submit" class="botao">Cadastrar pet</button>
            </div>
        </form>
    </section>

    <section class="painel">
        <div class="painel-topo">
            <h2>Pets cadastrados</h2>
            <span class="contador"><?= count($pets) ?> registro(s)</span>
        </div>

        <?php if (count($pets) == 0) { ?>
            <p class="vazio">Nenhum pet cadastrado ainda.</p>
        <?php } else { ?>
            <div class="tabela-wrapper">
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Pet</th>
                            <th>Espécie</th>
                            <th>Idade</th>
                            <th>Peso</th>
                            <th>Sexo</th>
                            <th>Tutor</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Vacinado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pets as $pet) { ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($pet['nome']) ?></strong></td>
                                <td><?= htmlspecialchars($pet['especie']) ?></td>
                                <td><?= $pet['idade'] ?> ano(s)</td>
                                <td><?= number_format($pet['peso'], 2, ',', '.') ?> kg</td>
                                <td><?= htmlspecialchars($pet['sexo']) ?></td>
                                <td><?= htmlspecialchars($pet['nome_tutor']) ?></td>
                                <td><?= htmlspecialchars($pet['telefone_tutor']) ?></td>
                                <td><?= htmlspecialchars($pet['email_tutor']) ?></td>
                                <td>
                                    <?php if ($pet['vacinado']) { ?>
                                        <span class="tag tag-sim">Sim</span>
                                    <?php } else { ?>
                                        <span class="tag tag-nao">Não</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </section>

</main>

<script>
    // máscara do telefone
    document.getElementById('telefone_tutor').addEventListener('input', function () {
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
