<?php 
namespace src\Pedido;

use Exception;
use src\Pedido\Pedido;

class ProcessadorDePedidos
{
    /**
     * Processa os dados do pedido
     *
     * @param Pedido $pedido
     * @return void
     */
    protected function processaPedido(Pedido $pedido): void
    {
        $total = 0;

        if(empty($pedido->getProdutos())) {
            throw new Exception("Pedido deve possuir produtos");
        }

        foreach($pedido->getProdutos() as $produto) {
            $total += ($produto->getValor() * $produto->getQuantidade());
        }

        if($pedido->getCupom() > 0) {
            $total -= $pedido->getCupom();
        }

        if($total <= 0) {
            throw new Exception("Valor do total inválido");
        }

        $pedido->setTotal(floatval($total));
    }
}