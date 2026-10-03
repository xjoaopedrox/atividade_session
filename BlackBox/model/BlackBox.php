
<?php

class BlackBox
{
    private string $nome;
    private string $descricao;
    private DateTime $data;

    public function __construct(
        string $nome,
        string $descricao,
        DateTime $data
    ) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->data = $data;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }
}
