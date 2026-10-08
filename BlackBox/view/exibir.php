<?php

require_once(__DIR__ . "/../controller/BlackBoxController.php");
require_once(__DIR__ . "/../model/BlackBox.php");


session_start();

$tituloPagina = "READ";
require_once(__DIR__ . "/partials/header.php");

if (!isset($_SESSION['blackbox'])) {
?>
    <section class="panel panel-read">
        <div class="panel-head">
            <span>Data record</span>
            <span><span class="dot"></span>No record</span>
        </div>
        <div class="empty-body">
            <div class="empty-state">Empty · No data recorded</div>
            <p class="empty-message">Sessao nao existe!</p>
        </div>

        <div class="logline">
            <span class="label">Record log</span>
            <div class="log-entry is-empty">No entries</div>
        </div>
    </section>

    <section class="diagnostics">
        <span class="eyebrow">Diagnostics</span>
        <div class="diag-grid">
            <div><span class="label">Session status</span><div class="value is-empty">EMPTY</div></div>
            <div><span class="label">Recorded data</span><div class="value is-empty">NOT FOUND</div></div>
            <div><span class="label">Object type</span><div class="value is-empty">—</div></div>
            <div><span class="label">Storage</span><div class="value is-empty">NO DATA</div></div>
        </div>
    </section>
<?php
} else {
    $blackBox = $_SESSION['blackbox'];

    $nome = $blackBox->getNome();
    $descricao = $blackBox->getDescricao();
    $dataFormatada = $blackBox->getData()->format('d/m/Y H:i:s');
    $dataParte = $blackBox->getData()->format('d/m/Y');
    $horaParte = $blackBox->getData()->format('H:i:s');
?>
    <section class="panel panel-read">
        <div class="panel-head">
            <span>Data record</span>
            <span class="is-active"><span class="dot dot-on"></span>Record stored</span>
        </div>

        <h2 class="panel-title">Recorded data</h2>

        <dl class="datasheet">
            <div class="row">
                <dt>Recorder status</dt>
                <dd class="is-active"><span class="dot dot-on"></span>ACTIVE</dd>
            </div>
            <div class="row">
                <dt>Name</dt>
                <dd class="big"><?= htmlspecialchars($nome) ?></dd>
            </div>
            <div class="row">
                <dt>Description</dt>
                <dd><?= htmlspecialchars($descricao) ?></dd>
            </div>
            <div class="row">
                <dt>Timestamp</dt>
                <dd class="timestamp">
                    <span class="ts-part"><span class="ts-label">DATE</span><span class="ts-value"><?= $dataParte ?></span></span>
                    <span class="ts-part"><span class="ts-label">TIME</span><span class="ts-value"><?= $horaParte ?></span></span>
                </dd>
            </div>
            <div class="row">
                <dt>Storage</dt>
                <dd><code>$_SESSION['blackbox']</code></dd>
            </div>
        </dl>

        <div class="logline">
            <span class="label">Record log</span>
            <div class="log-entry">
                <span class="log-time"><?= $dataFormatada ?></span>
                <span class="log-event">RECORD STORED</span>
                <span class="log-name"><?= htmlspecialchars($nome) ?></span>
            </div>
        </div>
    </section>

    <section class="diagnostics">
        <span class="eyebrow">Diagnostics</span>
        <div class="diag-grid">
            <div><span class="label">Session status</span><div class="value is-active">ACTIVE</div></div>
            <div><span class="label">Recorded data</span><div class="value is-active">FOUND</div></div>
            <div><span class="label">Object type</span><div class="value mono"><?= get_class($blackBox) ?></div></div>
            <div><span class="label">Storage</span><div class="value mono">$_SESSION['blackbox']</div></div>
        </div>
    </section>
<?php
}

require_once(__DIR__ . "/partials/footer.php");
