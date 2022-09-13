<?php 
namespace src\Produto;

class Produto
{
    private $nome;

    private $valor;

    private $quantidade;

    public function __construct($nome, $valor, $quantidade = 1)
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->quantidade = $quantidade;
    }
        
    public function getNome()
    {
        return $this->nome;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
}