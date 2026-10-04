<?php

require_once(__DIR__ . "/../controller/BlackBoxController.php");
require_once(__DIR__ . "/../model/BlackBox.php");


session_start();

if (!isset($_SESSION['blackbox'])) {
    echo "Sessao nao existe!";
} else {
    $blackBox = $_SESSION['blackbox'];

    $nome = $blackBox->getNome();
    $descricao = $blackBox->getDescricao();
    $dataFormatada = $blackBox->getData()->format('d/m/Y H:i:s');

    echo "<h1>BlackBox</h1>";
    echo "<p>Nome: " . $nome . "</p>";
    echo "Descricao: " . $descricao . "</p>";
    echo "Data de Criação: " . $dataFormatada . "</p>";
}
