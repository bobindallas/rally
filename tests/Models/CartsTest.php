<?php namespace Shop\Models;

use PHPUnit\Framework\TestCase;
use Mockery as m;

class CartsTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }

	public function testCartsAddItem() {
	
       $prod = new Products;
       $cart = new Carts;

       $this->assertEquals($cart, $cart->addItem($prod, 1));

	}

	public function testCartsGetItems() {
	
      $service = m::mock('service');
      $service->shouldReceive('getItems');

      $cart = new Carts($service);

      $this->assertEquals([], $cart->getItems());

	}

	public function testCartsGetSubtotal() {
	
      $service = m::mock('service');
      $service->shouldReceive('getSubtotal');

      $cart = new Carts($service);

      $this->assertEquals(0, $cart->getSubtotal());

	}

}
