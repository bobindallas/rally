<?php
namespace Shop\Site\Controllers;

use Shop\Services\ShipHawk;

class Cart extends \Dsc\Controller
{
    public function beforeRoute()
    {
        \Shop\Services\NewRelic::addCartInfo();
    }

    public function read()
    {
        $cart = \Shop\Models\Carts::fetch();

        \Base::instance()->set('cart', $cart);
        $this->app->set('meta.title', 'Shopping Cart');

        echo $this->render('Shop/Site/Views::cart/index.php');
    }

    public function add()
    {
        $modelNumber = $this->input->get('model', null, 'raw');
        $qty = $this->input->get('quantity', 1);

        try {
            $product = null;

            if (!empty($modelNumber)) {
                $product = (new \Shop\Models\Products)
                    ->setCondition('tracking.model_number', $modelNumber)
                    ->getItem();
            }
        } catch (\Exception $e) {
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
            $cart = \Shop\Models\Carts::fetch();
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

        return $this->app->reroute('/shop/cart');
    }
}
