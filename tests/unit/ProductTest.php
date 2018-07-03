<?php


use App\Product;

class ProductTest extends PHPUnit_Framework_TestCase {

    protected $product;

    function setUp() {
        $this->product = new Product('Curso Vue', 100);
    }

    /** @test */
    function a_product_a_has_name() {
        $this->assertEquals('Curso Vue', $this->product->name());
    }

    /** @test */
    function a_product_a_has_cost() {

        $this->assertEquals(100, $this->product->cost());
    }
}