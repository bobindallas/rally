<?php
namespace Shop\Site\Controllers;

/*
 * shiphawk shipping / reporting app
 *
 */
use Shop\Services\ShipHawk;

class Cart extends \Dsc\Controller
{

	/*
	 * newrelic app statistics - add cart stats (I assume)
	 */
    public function beforeRoute()
    {
        \Shop\Services\NewRelic::addCartInfo();
    }

	 /*
	  * Pull shopping cart (function fetch() not found)
	  */
    public function read()
    {
		 // pull cart info from DB
        $cart = \Shop\Models\Carts::fetch();

		  // add cart to base f3 instance
        \Base::instance()->set('cart', $cart);

		  // set page title
        $this->app->set('meta.title', 'Shopping Cart');

		  // render cart view
        echo $this->render('Shop/Site/Views::cart/index.php');
    }

	 /*
	  * add item to cart
	  */
    public function add()
    {
		 // pull modelNumber and qty from user input
        $modelNumber = $this->input->get('model', null, 'raw');
        $qty = $this->input->get('quantity', 1);

        try {

			   // fail by default
            $product = null;

				// pull product from DB by modelNumber
            if (!empty($modelNumber)) {
                $product = (new \Shop\Models\Products)
                    ->setCondition('tracking.model_number', $modelNumber)
                    ->getItem();
            }
        } catch (\Exception $e) {
			  // product not found error
			  // return json if ajax request else re-render route / view with error message
            if ($this->app->get('AJAX')) {
                return $this->outputJson($this->getJsonResponse([
                    'error'   => true,
                    'message' => 'Item not added to cart - Invalid Product',
                ]));
            } else {
                \Dsc\System::addMessage('Item not added to cart - Invalid Product', 'error');
                return $this->app->reroute('/shop/cart');
            }
        }

        try
        {
			  // get instance of cart from DB
            $cart = \Shop\Models\Carts::fetch();
				
				// add $qty of $product to cart
				// same as above - if ajax return json with error else re-render route / view with error message
            $cart->addItem($product, $qty);

        } catch (\Exception $e) {
            if ($this->app->get('AJAX')) {
                return $this->outputJson($this->getJsonResponse([
                    'error' => true,
                    'message' => $e->getMessage()
                ]));
            } else {
                \Dsc\System::addMessage($e->getMessage(), 'error');
                return $this->app->reroute('/shop/cart');
            }
        }

		  // return route / view with updated cart data
        return $this->app->reroute('/shop/cart');
    }
}
