<?php
namespace App;
use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     public function testVerificaSeCarrinhoEstaVazio()
    {
        $carrinho=new cart();
		$this->assertEmpty($carrinho->all());
		$this->assertEquals(1.0, 1.0, '', 0.2);
    }
	
	   public function testVerificaSeCarrinhoEInstanciaDeCart()
    {
        $carrinho=new cart();
		$this->assertInstanceOf('Cart',$carrinho);
    }
     
    public function testAdicionaItemNoCarrinhoEConfereQuantidade()
    {
        $carrinho=new cart();
		$carrinho->add(0,'Tênis',10,1);
		$this->assertCount(1,$carrinho->all());
    }
	
	public function testAdicionaItemNoCarrinhoEConfereNomedoProduto()
    {
        $carrinho=new cart();
		$carrinho->add(1,'Tênis',10,1);
		$item=$carrinho->find(1);
		$this->assertEquals('Tênis',$item['name']);
		$this->assertContains('Tênis',$item);	
    }
	
	public function testConfereTotal()
    {
        $carrinho=new cart();
		$carrinho->add(1,'Sapato',25,2);
		$total=$carrinho->getTotal();
		$this->assertEquals(50,$total);
    }
	
	public function testArrayHasKey()
    {
        $carrinho=new cart();
		$carrinho->add(2,'Tênis',10,1);
		$items=$carrinho->all();
		$this->assertArrayHasKey(2,$items);
    }
	
}
