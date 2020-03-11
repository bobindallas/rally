<?php namespace Shop\Models;

use PHPUnit\Framework\TestCase;
use Mockery as m;

class CartsItemsTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }

   public function testCartItemsGetPrice() {

      $service = m::mock('service');
      $service->shouldReceive('getPrice');

		$cart = new Carts($service);
      $prod = new Products;

      $cart->addItem($prod, 1, 10); // added a price param for testing
      $items = $cart->getItems();
      $this->assertEquals(10, $items[0]->getPrice());

   }
}
