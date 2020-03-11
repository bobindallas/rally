<?php namespace Shop\Models;

class Carts
{
    /** @var CartItems[] */
    private $items = [];


    /**
     * @param Products $product
     * @param $quantity
     * @return $this
     */
    public function addItem(Products $product, $quantity)
    {
        $cartItem = new CartItems();
        $cartItem->product = $product;
        $cartItem->quantity = $quantity;

        if ($cartItem->quantity > 0) {
            $this->items[] = $cartItem;
        }

        return $this;
    }

    /**
     * @return CartItems[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return float
     */
    public function getSubtotal()
    {
        $subtotal = '0.00';

        foreach ($this->items as $item) {
            $subtotal += $item->getPrice();
        }

        return (float) $subtotal;
    }
}
