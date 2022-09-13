<?php 
namespace src\Pedido;

use DateTime;
use DateTimeZone;
use src\Produto\Produto;
use src\Usuario\Usuario;
use src\Pedido\ProcessadorDePedidos;

class Pedido extends ProcessadorDePedidos
{
    private $usuario;
    private $produtos = [];
    private $total = 0;
    private $dataHora;
    private $cupom;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
        $this->dataHora = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
    }

    public function processa()
    {
        parent::processaPedido($this);
    }

    public function adicionaProduto(Produto $produto)
    {
        array_push($this->produtos, $produto);
        return $this;
    }

    public function adicionaCupom($cupom)
    {
        $this->cupom = $cupom;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function getCupom()
    {
        return $this->cupom;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    public function getDataHora()
    {
        return $this->dataHora;
    }
}