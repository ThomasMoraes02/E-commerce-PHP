<?php
namespace test\Produtos;

use src\Produto\Produto;
use PHPUnit\Framework\TestCase;
use src\Repository\RepositorioDeProdutos;

class RepositorioDeProdutosTest extends TestCase
{
    private $repositorioDeProdutos;

    protected function setUp()
    {
        $this->repositorioDeProdutos = new RepositorioDeProdutos();
        $this->repositorioDeProdutos->cadastraProduto(new Produto("Celular", 1200, 1));
        $this->repositorioDeProdutos->cadastraProduto(new Produto("Pelicula", 10, 0));
        $this->repositorioDeProdutos->cadastraProduto(new Produto("Capinha", 500, 5));
        parent::setUp();   
    }

    public function test_verifica_repositorio_de_produtos()
    {
        $this->assertEquals(3, count($this->repositorioDeProdutos->recuperaProdutos()));
    }

    public function test_verifica_se_produto_existe_e_possui_estoque()
    {
        $produto = "Celular";
        $produtoExiste = $this->repositorioDeProdutos->verificaEstoque($produto);

        $this->assertEquals(true, $produtoExiste);
    }

    public function test_verifica_se_produto_nao_possui_estoque()
    {
        $produto = "Pelicula";
        $produtoExiste = $this->repositorioDeProdutos->verificaEstoque($produto);

        $this->assertEquals(false, $produtoExiste);
    }

    public function test_verifica_se_produto_nao_existe()
    {
        $produto = "Bicicleta";
        $produtoExiste = $this->repositorioDeProdutos->verificaEstoque($produto);

        $this->assertEquals(false, $produtoExiste);
    }
}