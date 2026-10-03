<?php

require_once(__DIR__ . "/../../controller/BlackBoxController.php");

session_start();

$nome = "";
$descricao = "";
$data = "";
$msgErro = "";
$alterando = false;

if (isset($_POST['nome'])) {

    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $data = trim($_POST['data']);

    if ($data === "") {

        $erros = array("Informe a data da Black Box!");
    } else {

        try {
            $dataObjeto = new DateTime($data);
            $erros = array();
        } catch (Exception $e) {
            $erros = array("Informe uma data válida!");
        }
    }

    if (empty($erros)) {

        $blackBox = new BlackBox(
            $nome,
            $descricao,
            $dataObjeto
        );

        $blackBoxCont = new BlackBoxController();

        $erros = $blackBoxCont->inserir($blackBox);
    }

    if (empty($erros)) {
        header("Location: exibir.php");
        exit;
    }

    $msgErro = implode("<br>", $erros);
}

require_once(__DIR__ . "/form.php");
