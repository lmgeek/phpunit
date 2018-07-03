<?php
/**
 * Created by PhpStorm.
 * User: zaratedev
 * Date: 2/07/18
 * Time: 06:52 PM
 */

namespace App;


class Product
{
    protected $name;
    protected $cost;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function name() {

        return $this->name;
    }

    public function cost() {
        return $this->cost;
    }
}