<?php
namespace test\www\html\projetos\ecommerce\test;

use src\Pedido\Pedido;
use src\Produto\Produto;
use src\Usuario\Usuario;
use PHPUnit\Framework\TestCase;

class GeradorDePedidosTest extends TestCase
{
    private $usuario;
    private $pedido;

    protected function setUp()
    {
        $this->usuario = new Usuario("Thomas");
        $this->pedido = new Pedido($this->usuario);
        parent::setUp();
    }

    public function test_cria_pedido_com_um_produto()
    {
        $produto = new Produto("Notebook", 5000, 1);

        $this->pedido->adicionaProduto($produto)->processa();

        $this->assertEquals(5000, $this->pedido->getTotal());
    }

    public function test_cria_pedido_com_mais_de_um_produto()
    {
        $produto1 = new Produto("Notebook", 5000, 1);
        $produto2 = new Produto("Mouse", 500, 1);

        $this->pedido->adicionaProduto($produto1)->adicionaProduto($produto2);
        $this->pedido->processa();

        $this->assertEquals(5500, $this->pedido->getTotal());
    }

    public function test_cria_pedido_com_produtos_de_quantidades_diferentes()
    {
        $this->pedido->adicionaProduto(new Produto("Xiomi Redmi Note 10", 5000, 2))->adicionaProduto(new Produto("Capinha Xiomi", 50, 3));

        $this->pedido->processa();

        $this->assertEquals(10150, $this->pedido->getTotal());
    }
}