<?php namespace Shop\Site;

class Routes
{
    public function initialize()
    {
        $this->setDefaults([
            'namespace'  => '\Shop\Site\Controllers',
            'url_prefix' => ''
        ]);

        $this->add('/', 'GET', [
            'controller' => 'Home',
            'action'     => 'index'
        ]);

        $this->add('/cart', 'GET', [
            'controller' => 'Cart',
            'action'     => 'read'
        ]);

        $this->add('/cart/add', 'GET|POST', [
            'controller' => 'Cart',
            'action'     => 'add'
        ]);

        $this->add('/shop/wishlist/share/@id', 'GET|POST', [
            'controller' => 'Wishlist',
            'action'     => 'share'
        ]);
    }
}
