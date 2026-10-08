<?php

$controllerStatus = new BlackBoxController();
$boxAtual = $controllerStatus->buscar();         
$paginaAtual = basename($_SERVER['SCRIPT_NAME']); 

if (!isset($tituloPagina))
    $tituloPagina = "";

$itensMenu = array(
    array("01", "inserir.php", "INSERT DATA", "Record", "the data",       "nav-insert"),
    array("02", "exibir.php",  "READ",        "Review", "recorded data",  "nav-read"),
    array("03", "alterar.php", "MODIFY",      "Amend",  "the record",     "nav-modify"),
    array("04", "excluir.php", "PURGE",       "Erase",  "the recording",  "nav-purge"),
);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Box - Flight Data Recorder<?= $tituloPagina !== "" ? " - " . htmlspecialchars($tituloPagina) : "" ?></title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="container">

<div class="unit">

    <header class="plate">
        <div>
            <div class="plate-title">BLACK BOX</div>
            <div class="plate-sub">
                FLIGHT DATA RECORDER
                <span class="plate-tag">EQUIPMENT / DATA RECORD</span>
            </div>
        </div>
        <dl class="plate-meta">
            <div>
                <dt>MEDIA</dt>
                <dd>PHP Session</dd>
            </div>
            <div>
                <dt>DATA OBJECT</dt>
                <dd>BlackBox</dd>
            </div>
        </dl>
    </header>

    <div class="status-strip">
        <div class="status-cell status-primary">
            <span class="label">Recorder status</span>
            <?php if ($boxAtual !== NULL): ?>
                <div class="value is-active"><span class="dot dot-on"></span>ACTIVE</div>
            <?php else: ?>
                <div class="value is-empty"><span class="dot"></span>EMPTY</div>
            <?php endif; ?>
        </div>

        <div class="status-cell">
            <span class="label">Recorded data</span>
            <?php if ($boxAtual !== NULL): ?>
                <div class="value"><?= htmlspecialchars($boxAtual->getNome()) ?></div>
            <?php else: ?>
                <div class="value is-empty">No data recorded</div>
            <?php endif; ?>
        </div>

        <div class="status-cell">
            <span class="label">Storage</span>
            <?php if ($boxAtual !== NULL): ?>
                <div class="value mono">$_SESSION['blackbox']</div>
            <?php else: ?>
                <div class="value is-empty">No data</div>
            <?php endif; ?>
        </div>
    </div>

    <div class="ops-head">
        <span class="label">Recorder operations</span>
        <span class="ops-seq">RECORD / REVIEW / AMEND / ERASE</span>
    </div>
    <nav class="nav">
        <?php foreach ($itensMenu as $item): ?>
            <a
                class="nav-item <?= $item[5] ?><?= $paginaAtual === $item[1] ? ' is-current' : '' ?>"
                href="<?= $item[1] ?>"
                <?php if ($item[1] === "excluir.php"): ?>
                onclick="return confirm('PURGE: remover a Black Box da sessão?');"
                <?php endif; ?>
            >
                <span class="nav-code"><?= $item[0] ?></span>
                <span class="nav-title"><?= $item[2] ?></span>
                <span class="nav-desc"><strong><?= $item[3] ?></strong> <?= $item[4] ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

</div>

    <main>
