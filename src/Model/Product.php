<?php

namespace App\Model;

class Product
{
    /*
     * @var string
     */
    private $name;

    /*
     * @var string
     */
    private $color;

    /*
     * @var integer
     */
    private $price;

    /*
     * @var Brand
     */
    private $brand;

    /*
     * @var integer
     */
    private $quantity;

    /*
     * @var boolean
     */
    private $reserved;

    /*
     * @var integer
     */
    private $sum_price;

    /*
     * @var integer
     */
    private $sum_reserved_price;

    function __construct($productData)
    {
        $this->name = $productData['name'];
        $this->color = $productData['color'];
        $this->price = $productData['price'];
        $this->brand = $productData['brand'];
        $this->quantity = $productData['quantity'];
        $this->reserved = $productData['reserved'];

        $this->reserved_price = $this->price * $this->quantity;
        $this->sum_reserved_price = $this->price * $this->reserved;
    }

    public function get_name()
    {
        return $this->name;
    }
    public function get_color()
    {
        return $this->color;
    }
    public function get_price()
    {
        return $this->price;
    }
    public function get_brand()
    {
        return $this->brand;
    }
    public function get_quantity()
    {
        return $this->quantity;
    }
    public function get_reserved()
    {
        return $this->reserved;
    }
    public function get_reserved_price()
    {
        return $this->reserved_price;
    }
    public function get_sum_reserved_price()
    {
        return $this->sum_reserved_price;
    }
}
