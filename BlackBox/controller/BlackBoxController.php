
<?php

require_once(__DIR__ . "/../util/config.php");
require_once(__DIR__ . "/../model/BlackBox.php");

class BlackBoxController
{
    public function buscar()
    {
        if (isset($_SESSION['blackbox']))
            return $_SESSION['blackbox'];

        return NULL;
    }

    public function inserir(BlackBox $blackBox)
    {
        $erros = $this->validar($blackBox);

        if (isset($_SESSION['blackbox']))
            array_push($erros, "ja existe uma Black Box na sessão (Use PURGE antes de criar outra)");

        // Gravar na sessão
        if (empty($erros))
            $_SESSION['blackbox'] = $blackBox;

        return $erros;
    }

    public function alterar(BlackBox $blackBox)
    {
        $erros = $this->validar($blackBox);

        if (!isset($_SESSION['blackbox']))
            array_push($erros, "nao existe uma Black Box na sessão para alterar");

        // Alterar na sessão
        if (empty($erros))
            $_SESSION['blackbox'] = $blackBox;

        return $erros;
    }

    public function excluir()
    {
        if (!isset($_SESSION['blackbox']))
            return "nao existe uma Black Box na sessão para excluir";

        unset($_SESSION['blackbox']);

        return "";
    }

    private function validar(BlackBox $blackBox)
    {
        $erros = array();

        if ($blackBox->getNome() === "")
            array_push($erros, "informe o nome da Black Box");

        if ($blackBox->getDescricao() === "")
            array_push($erros, "informe a descrição da Black Box");

        return $erros;
    }
}
