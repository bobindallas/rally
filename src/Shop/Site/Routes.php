<?php namespace Shop\Site;

class Routes
{
    public function initialize()
    {
		 // where to find our controllers by default
        $this->setDefaults([
            'namespace'  => '\Shop\Site\Controllers',
            'url_prefix' => ''
        ]);

		  // home page route - call get on index function / method of Home controller
        $this->add('/', 'GET', [
            'controller' => 'Home',
            'action'     => 'index'
        ]);

		  // view cart - call get on read function / method of Cart controller
        $this->add('/cart', 'GET', [
            'controller' => 'Cart',
            'action'     => 'read'
        ]);

		  // call add method on Cart controller - allow get or post request
        $this->add('/cart/add', 'GET|POST', [
            'controller' => 'Cart',
            'action'     => 'add'
        ]);

		  // call share method on wishlist controller - pass id as a parameter - allow get or post
        $this->add('/shop/wishlist/share/@id', 'GET|POST', [
            'controller' => 'Wishlist',
            'action'     => 'share'
        ]);
    }
}
