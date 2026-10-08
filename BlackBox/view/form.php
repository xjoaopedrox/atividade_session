<?php

$tituloPagina = $alterando ? "MODIFY" : "INSERT DATA";
$subtitulo    = $alterando ? "Amend record information" : "Record information";
$codigoOp     = $alterando ? "03" : "01";
require_once(__DIR__ . "/partials/header.php");
?>

<section class="panel <?= $alterando ? 'panel-modify' : 'panel-insert' ?>">

    <div class="panel-head">
        <span>Data record</span>
        <span><?= $codigoOp ?> · <?= $tituloPagina ?></span>
    </div>

    <h2 class="panel-title"><?= $subtitulo ?></h2>

    <?php if ($msgErro !== ""): ?>
        <div class="alert" role="alert"><?= $msgErro ?></div>
    <?php endif; ?>

    <form action="" method="POST">

        <div class="field">
            <label for="nome">Name</label>
            <input
                type="text"
                id="nome"
                name="nome"
                value="<?= htmlspecialchars($nome) ?>"
            >
            <span class="hint">Nome do registro</span>
        </div>

        <div class="field">
            <label for="descricao">Description</label>
            <textarea
                id="descricao"
                name="descricao"
            ><?= htmlspecialchars($descricao) ?></textarea>
            <span class="hint">Descrição do registro</span>
        </div>

        <div class="field">
            <label for="data">Timestamp</label>
            <input
                type="datetime-local"
                id="data"
                name="data"
                value="<?= htmlspecialchars($data) ?>"
            >
            <span class="hint">Data e hora do registro</span>
        </div>

        <button type="submit" class="btn">Gravar</button>

    </form>
</section>

<?php require_once(__DIR__ . "/partials/footer.php"); ?>
