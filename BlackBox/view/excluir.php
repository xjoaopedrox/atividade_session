<?php

require_once(__DIR__ . "/../controller/BlackBoxController.php");
require_once(__DIR__ . "/../model/BlackBox.php");


session_start();

$controller = new BlackBoxController();

$erros = $controller->excluir();

header("Location: exibir.php");
exit;