<?php

use App\Order;

class OrderTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    function an_order_consists_of_products() {
        $order = $this->createOrderWithProducts();
        $this->assertCount(2, $order->products());
    }

    /** @test */
    function an_order_can_determine_the_total_cost_of_all_its_products() {
        $order = $this->createOrderWithProducts();
        $this->assertEquals(300, $order->total());
    }

    function createOrderWithProducts() {
        $order = new Order;

        $product = new \App\Product('Curso Laravel', 200);
        $product2 = new \App\Product('Curso Vue', 100);

        $order->add($product);
        $order->add($product2);

        return $order;
    }
}
