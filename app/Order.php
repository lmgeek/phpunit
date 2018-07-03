<?php
/**
 * Created by PhpStorm.
 * User: zaratedev
 * Date: 3/07/18
 * Time: 10:05 AM
 */

namespace App;


class Order
{
    protected $products = [];

    public function add(Product $product) {
        $this->products[] = $product;
    }

    public function products() {
        return $this->products;
    }

    public function total() {
        return array_reduce($this->products, function($carry, $product) {
           return $carry + $product->cost();
        });
    }
}