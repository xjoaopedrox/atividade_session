<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once(__DIR__ . "/../controller/BlackBoxController.php");
require_once(__DIR__ . "/../model/BlackBox.php");

session_start();


$nome = "";
$descricao = "";
$data = "";
$msgErro = "";
$alterando = true;

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


        $erros = $blackBoxCont->alterar($blackBox);
    }

    if (empty($erros)) {
        header("Location: exibir.php");
        exit;
    }

    $msgErro = implode("<br>", $erros);
} else {
    if (isset($_SESSION['blackbox'])) {
        $blackBoxAtual = $_SESSION['blackbox'];

        $nome = $blackBoxAtual->getNome();
        $descricao = $blackBoxAtual->getDescricao();
        $data = $blackBoxAtual->getData()->format('Y-m-d\TH:i');
    } else {
        $msgErro = "Sessão não existe!";
    }
}

require_once(__DIR__ . "/form.php");
