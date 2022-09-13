<?php 
namespace src\Repository;

use src\Produto\Produto;

class RepositorioDeProdutos
{
    private $produtos = [];

    public function cadastraProduto(Produto $produto): void
    {
        $this->produtos[] = $produto;
    }

    public function recuperaProdutos()
    {
        return $this->produtos;
    }

    public function verificaEstoque(string $nomeProduto)
    {
        foreach($this->produtos as $produto) {
            if($produto->getNome() == $nomeProduto && $produto->getQuantidade() > 0) {
                return true;
            }
        }
        return false;
    }
}