<?php namespace Shop\Models;

class CartItems
{
    /** @var Products */
    public $product;

    /** @var int */
    public $quantity;


    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->product->price * $this->quantity;
    }
}
