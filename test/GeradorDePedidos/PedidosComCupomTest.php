<?php 
namespace test\GeradorDePedidos;

use PHPUnit\Framework\TestCase;
use src\Pedido\Pedido;
use src\Produto\Produto;
use src\Usuario\Usuario;

class PedidosComCupomTest extends TestCase
{
    public function test_descontar_100_do_pedido_com_cupom()
    {
        $usuario = new Usuario("Thomas");

        $produto = new Produto("Pulseira Xiomi", 250, 1);

        $pedido = new Pedido($usuario);
        $pedido->adicionaProduto($produto);
        $pedido->adicionaCupom(50);

        $pedido->processa();

        $this->assertEquals(200, $pedido->getTotal());
    }
}